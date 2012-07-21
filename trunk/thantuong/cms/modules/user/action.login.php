<?php

/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
if($_SESSION['admin_login']) $hook->redirect('./');
$msg = array();
if($_POST){
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);
	$result = $oClass->view(" `username` = '$username' AND `password` = MD5('$password')");
	if($result->num_rows()){
		$_SESSION['admin_login'] = $result->fetch();
		$oMaster->user_log('Logged in');
		$hook->redirect('./?token='.$token);
	}else{
		$msg['error'] = 'Username/Password is invalid!';
	}
	
	
}

$tpl->reset();

$tpl->setfile(array(
	'body'=>'user.login.tpl',
));
$tpl->assign($msg);

?>