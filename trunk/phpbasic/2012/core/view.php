<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class View extends bTemplate{
	var $display = 1;
	var $loaded_menu = 0;
	var $loaded_menu_type = array();
	function View($tpl_dir,$lang){
		parent::__construct($tpl_dir);
		$this->aLang = $lang;
		//$this->path = "template/$tpl_dir/";
		
	}
	function display(){
		$this->display = 0;
		echo $this->parse();
	}
	
	
	function __destruct(){
		//if($this->display) $this->parse();
	}
}
?>