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
$error = array(
	'onfocus'=>'onfocus="if(this.value==this.defaultValue) this.value=\'\'"',
	'username'=>'Enter a Username',
);
if($_POST){
	$error = $_POST;
	$error['msg'] = '';
	$usr = addslashes($_POST['username']);
	$psw = addslashes($_POST['password']);
	$retype = addslashes($_POST['retype']);
	$email = addslashes($_POST['email']);
	$user_display = addslashes($_POST['user_display']);
	
	preg_match('/[^a-z0-9]/i',$usr,$arr);
	if(count($arr)){
		$usr = preg_replace('/[^a-z0-9]/i','',$usr);
		$error['username'] = $usr;
		$error['msg'] .= 'Username co cac ky tu khac a-z 0-9 , ban co muon su dung <strong>'.$usr.'</strong> de lam ten dang nhap<br />';
	}

	if($psw =='') $error['msg'] .= 'Please enter a password<br />';
	if($oClass->check_exists("username='$usr'")) $error['msg'] .= 'Username <strong>'.$usr.'</strong> da ton tai<br />';
	if($psw != $retype) $error['msg'] .= 'Password & Confirm password fai giong nhau<br />';
	if($oClass->check_exists("email='$email'")) $error['msg'] .= 'Email <strong>'.$email.'</strong> da ton tai<br />';
	
	if(!$error['msg']){
		if($oClass->register($error)){
			$_SESSION['register_success'] = true;
			$hook->redirect('./?mod=user&act=register');
		}
	}

}

//$tpl->reset();
if($_SESSION['register_success']){
	$tpl->setfile(array(
		'body'=>'index.msg.tpl',
	));
	$tpl->assign(array(
		'msg'=>'Thanks you',
	));
	unset($_SESSION['register_success']);
}else{
	$tpl->setfile(array(
		'body'=>'user.register.tpl',
	));
	$error['web_title'] = 'Register';
	$tpl->assign($error);
}



?>