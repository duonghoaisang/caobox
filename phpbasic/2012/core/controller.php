<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class Controller extends CaoBox{
	var $module = 'home';
	var $action = 'view';
	var $lang = 'vn';
	var $page = 0;
	var $uri;
	var $root_dir;
	var $params;
	var $project;
	
	function Controller($rewrite = false,$htaccess = false,$multi_lang = false){
		parent::__construct();
		$this->uri = rtrim($_SERVER['HTTP_X_REWRITE_URL']?$_SERVER['HTTP_X_REWRITE_URL']:$_SERVER['REQUEST_URI'],'/');
		$project = dirname($_SERVER['SCRIPT_NAME']);
		if($project == '\\') $project = '/';
		else $project = rtrim($project,'/').'/';
		if($rewrite){
			if($htaccess===true){
				$this->root_dir = './';
				if($project!='/'){
					$this->params = explode('/',str_replace($project,'',$this->uri));
				}else{
					$this->params = explode('/',ltrim($this->uri,'/'));
				}
			}else{
				$file = $htaccess===false?'index.php':$htaccess;
				$tmp = explode('/'.$file.'/',$this->uri);
				$this->params = explode('/',$tmp[1]);
				$this->root_dir = './'.$file.'/';
			}
			if($this->params[0]) $this->module = $this->params[0];//$_GET['mod'];
			if($this->params[1]) $this->action = $this->params[1];
		}else{
			if(isset($_GET['mod'])) $this->module = $_GET['mod'];
			if(isset($_GET['act'])) $this->action = $_GET['act'];		
		}
		$this->project = $project;
		
		//check language
		if($multi_lang){
			if(!$_SESSION['__caobox_lang']) $_SESSION['__caobox_lang'] = 'en';
			if(isset($_GET['lang'])){
				if(file_exists(_ROOT.APPLICATION."/languages/".$_GET['lang'].'/index.php'))  $_SESSION['__caobox_lang'] = $_GET['lang'];
				$url =  parse_url($this->uri);
				header('location: '.rtrim($url['path'],'/'));
				
			}
			$this->lang = $_SESSION['__caobox_lang'];
		}else{
			$this->lang = $GLOBALS['cfg']['lang'];
		}

	}
	
	function load(){
		// check global module
		if(!file_exists(_ROOT.APPLICATION."/modules/global/index.php")) $this->getError("Module GLOBAL doesn't exists");
		if(!file_exists(_ROOT.APPLICATION."/modules/".$this->module.'/index.php')) $this->getError("Module ".$this->module." doesn't exists");
		if(!file_exists(_ROOT.APPLICATION."/modules/".$this->module.'/action.'.$this->action.'.php')){
			if(file_exists(_ROOT.APPLICATION."/modules/".$this->module.'/action.view.php')) $this->action = 'view';
			else $this->getError("Action ".$this->action." doesn't exists");
		}
		
		
		$system  = $this;
		if(file_exists(_ROOT.APPLICATION.'/modules/global/hooks.php')) require(_ROOT.APPLICATION.'/modules/global/hooks.php');
		$hook = new bHooker;
		$hook->web_header();
		require(_ROOT.APPLICATION.'/config.php');
		require(_ROOT.APPLICATION.'/defined.php');
		if(isset($cfg['lang'])) $this->lang = $cfg['lang'];
		require _ROOT.APPLICATION."/languages/vn/index.php";
		if(file_exists(_ROOT.APPLICATION.'/modules/global/dao.php')) require(_ROOT.APPLICATION.'/modules/global/dao.php');
		if(file_exists(_ROOT.APPLICATION."/modules/global/functions.php")) include(_ROOT.APPLICATION."/modules/global/functions.php");
		require _ROOT.APPLICATION."/modules/global/index.php";
		
		//run only for this module/action
		if(file_exists(_ROOT.APPLICATION."/modules/global/".$this->module.'.'.$this->action.'.php')){
			require _ROOT.APPLICATION."/modules/global/".$this->module.'.'.$this->action.'.php';
		}elseif(file_exists(_ROOT.APPLICATION."/modules/global/".$this->module.'.php')){
			require _ROOT.APPLICATION."/modules/global/".$this->module.'.php';
		}
		
		
		if(file_exists(_ROOT.APPLICATION."/modules/".$this->module.'/classes.php'))
			require _ROOT.APPLICATION."/modules/".$this->module.'/classes.php';
		if($this->module) require _ROOT.APPLICATION."/modules/".$this->module.'/index.php';
		if($this->action) require _ROOT.APPLICATION."/modules/".$this->module.'/action.'.$this->action.'.php';
		if(isset($tpl)) echo $tpl->parse();
		$hook->web_footer();
	}
	
	
}

?>