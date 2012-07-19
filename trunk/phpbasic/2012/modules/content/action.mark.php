<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


if($_SESSION['user_login']['id']){
	$result = $oClass->insert_mark($system->params[2],$_SESSION['user_login']['id']);
	die("$result");
	
}else{
	die('-1');
}



?>