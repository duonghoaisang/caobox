<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

// check user has loged in 
if($_SESSION['user_login']['id']) $hook->redirect('./');

// 
$error = array();
if($_POST){
	$usr = addslashes($_POST['username']);
	$psw = addslashes($_POST['password']);
	$result = $oClass->login($usr,$psw);
	if($result->num_rows()){
		$_SESSION['user_login'] = $result->fetch();
		if($_POST['remember']) cookie('remember', strlen($_SESSION['user_login']['id']).str_shuffle('iuy3748phs').$_SESSION['user_login']['id'].str_shuffle('abc4567hjk').$_SESSION['user_login']['password'].str_shuffle('12345678qwertyuighjklASDghj'));
		$hook->redirect('./');
	}else{
		$error['msg'] = 'Ban da nhap sai user/password, vui long thu lai<br />';
	}
}

//$tpl->reset();
$tpl->setfile(array(
	'body'=>'user.login.tpl',
));
$error['web_title'] = 'Login';
$tpl->assign($error);



?>