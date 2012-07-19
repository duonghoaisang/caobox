<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

// check user has loged in 
if(!$_SESSION['user_login']['id']) $hook->redirect('./');

// 
$error = array();
if($_POST){
	$currentpsw = addslashes($_POST['currentpsw']);
	$newpsw = addslashes($_POST['newpsw']);
	$repsw = addslashes($_POST['repsw']);
	if($newpsw != $repsw) $error['msg'] = 'Password & Re-password is must same!';
	
	$result = $oClass->profile("id = ".$_SESSION['user_login']['id']);
	$user = $result->fetch();
	if($user['password'] != md5($currentpsw)) $error['msg'] = 'Current password is wrong!';
	
	if(!$error){
		$oClass->resetpsw($newpsw,$_SESSION['user_login']['id']);
		$error['msg'] = 'Your psw has been update!';
	}
}

//$tpl->reset();
$tpl->setfile(array(
	'body'=>'user.reset.tpl',
));
$tpl->assign($error);



?>