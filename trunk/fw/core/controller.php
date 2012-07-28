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
	var $module_name;
	var $action = 'view';
	var $lang = 'vn';
	var $page = 0;
	var $uri;
	var $url = array();
	var $root_dir;
	var $root_dir_absolute;
	var $params;
	var $project;
	var $ext;
	var $modules = array('switch'=>array());
	var $domain;
	var $model;
	
	//
	function Controller($rewrite = false,$htaccess = false){
		/////
		parent::error_handle($GLOBALS['cfg']['error_report'],$GLOBALS['cfg']['error_display'],$GLOBALS['cfg']['error_log'],$GLOBALS['cfg']['error_log_path']);
		
		$this->uri = rtrim($_SERVER[$GLOBALS['cfg']['server_var']],'\\/').'/';
		$this->domain = 'http'.(isset($_SERVER['HTTPS']) && strtoupper($_SERVER['HTTPS']) != 'OFF'?'s':'').'://'.$_SERVER['SERVER_NAME'];
		$project = rtrim(dirname($_SERVER['SCRIPT_NAME']),'\\/').'/';
		if($rewrite){
			if($htaccess===true){
				$this->root_dir = './';
				$this->root_dir_absolute = $project;
				if($project!='/'){
					$this->params = explode('/',str_replace($project,'',$this->uri));
				}else{
					$this->params = explode('/',ltrim($this->uri,'/'));
				}
			}else{
				$file = $htaccess===false?'index.php':$htaccess;
				$tmp = explode('/'.$file.'/',$this->uri);
				$this->params = explode('/',isset($tmp[1])?$tmp[1]:'');
				$this->root_dir = "./$file/";
				$this->root_dir_absolute = "$project$file/";
			}
			if($this->params[0]) $this->module = $this->params[0];//$_GET['mod'];
			if(isset($this->params[1])) $this->action = $this->params[1];
		}else{
			if(isset($_GET['mod'])) $this->module = $_GET['mod'];
			if(isset($_GET['act'])) $this->action = $_GET['act'];		
		}
		$this->module_name = $this->module;
		$this->project = $project;
	}
	
	function load_ext(){
		$model = $this->model;
		$controller = &$this;
		if(is_dir(_ROOT."ext/")){
			$dir = dir(_ROOT."ext/");
			while ($file = $dir->read())  if (substr($file, -4) == '.php') require $dir->path.$file;
		}
		
	}	
	function load(){
		// check master module
		if(isset($_GET['lang'])  && file_exists(_APP."languages/".$_GET['lang'].'/index.php')) $this->lang = $_GET['lang'];
		if(!file_exists(_APP."languages/".$this->lang.'/index.php')) $this->lang = 'vn';
		if(!file_exists(_APP."modules/master/header.php")) $this->getError("Module MASTER:HEADER doesn't exists");
		if(!file_exists(_APP."modules/master/footer.php")) $this->getError("Module MASTER:FOOTER doesn't exists");
		if(!file_exists(_APP."modules/".$this->module.'/index.php')) $this->module = '404';//$this->getError("Module ".$this->module." doesn't exists");
		if(!file_exists(_APP."modules/".$this->module.'/action.'.$this->action.'.php')){
			if(file_exists(_APP."modules/".$this->module.'/action.view.php')) $this->action = 'view';
			else $this->getError("Action ".$this->action." doesn't exists");
		}
		
		
		$model = $this->model;
		$session = new bSession($model);
		$session->enable = $GLOBALS['cfg']['session_handle']=='user'?true:false;
		$session->load();
		
		if(isset($GLOBALS['core_ext'])) foreach($GLOBALS['core_ext'] as $ext){
			$ext_file = _CORE.'core/ext/'.$ext.'.php';
			if(file_exists($ext_file)) require $ext_file;
		}

		$system  = $this;
		if(file_exists(_APP.'modules/master/hooks.php')) require(_APP.'/modules/master/hooks.php');
		$hook = new bHooker;
		
		
		$hook->web_header();
		require(_APP.'config.php');
		//require(_APP.'defined.php');
		
		
		
		require _APP."languages/".$this->lang.'/index.php';
		if(file_exists(_APP."languages/".$this->lang.'/'.$this->module.'.php')) require _APP."languages/".$this->lang.'/'.$this->module.'.php';
		if(file_exists(_APP."modules/master/functions.php")) require(_APP."modules/master/functions.php");
		if(file_exists(_APP."modules/master/classes.php")) require(_APP."modules/master/classes.php");
		require _APP."modules/master/header.php";
		
		if(file_exists(_APP."modules/master/user.php"))
			require _APP."modules/master/user.php";
		
		
		//run only for this module/action
		if(file_exists(_APP."modules/master/".$this->module.'.'.$this->action.'.php')){
			require _APP."modules/master/".$this->module.'.'.$this->action.'.php';
		}elseif(file_exists(_APP."modules/master/".$this->module.'.php')){
			require _APP."modules/master/".$this->module.'.php';
		}
		
		
		if(file_exists(_APP."modules/".$this->module.'/classes.php'))
			require _APP."modules/".$this->module.'/classes.php';
		if(file_exists(_APP."modules/".$this->module.'/functions.php'))
			require _APP."modules/".$this->module.'/functions.php';
		if($this->module) require _APP."modules/".$this->module.'/index.php';
		if($this->action) require _APP."modules/".$this->module.'/action.'.$this->action.'.php';
		if(file_exists(_APP."modules/".$this->module."/footer.php")) require(_APP."modules/".$this->module."/footer.php");
		require _APP."modules/master/footer.php";
		
		$hook->web_footer();
	}
	
	
}

?>