<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class View extends bTemplate{
	var $gzip = false;
	function View($tpl_dir,$lang){
		parent::__construct($tpl_dir);
		$this->aLang = $lang;
		
	}
	function display(){
		header('Content-Type: text/html;charset=UTF-8');
		$html =  $this->parse();
		if($this->gzip){
			$encoding = explode(',',$_SERVER["HTTP_ACCEPT_ENCODING"]);
			if(in_array('deflate',$encoding)){
				header('Content-Encoding: deflate');
				$html =  gzdeflate($html,9);
			}
		}
		return $html;
	}
	
	
	
	
}
?>