<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

/*
// list functions can hook ( functions were defined in core/hooks.php)
	function web_header() // load first
	function web_footer() // load last
	function redirect($url = NULL)
	function dateformat($date = NULL,$format = 'd/m/Y')
	function encrypt($string) // current we are  using md5
*/

function format($array = NULL){
	if(is_array($array)){
		foreach($array as $k=>$v){
			$v = stripslashes($v);
			$v = str_replace(array('../plugins','../'._UPLOAD),array('plugins',_UPLOAD),$v);
			
			$array[$k] = $v;
		}
		if(!isset($array['web_keyword'])) unset($array['web_keyword']);
		if(!isset($array['web_desc'])) unset($array['web_desc']);
	}
	return $array;
}

?>