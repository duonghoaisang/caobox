<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class Model extends CaoBox{
	var $db;
	var $prefix;
	var $lang;
	function __construct(){
		$this->db = new DB($GLOBALS['cfg']['server'],$GLOBALS['cfg']['usr'],$GLOBALS['cfg']['psw'],$GLOBALS['cfg']['name']);
		$this->lang = $GLOBALS['controller']->lang;
		$this->prefix = $GLOBALS['cfg']['prefix'];
	}
	
}
?>