<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


if(isset($_SESSION['member'])){
	$tpl->box('userinfo');
	$tpl->assign($_SESSION["member"],'member');
}else{
	$tpl->box('require_login');
	
}

?>