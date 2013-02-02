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
		$user = $result->fetch();
		$data = unserialize($user['data']);
		$ip = $_SERVER['REMOTE_ADDR'];
		
		// from system
		if($cfg['ip_allow'] && !$user['is_admin']){
			$ip_allow = preg_replace("/(\n|\t|\r|\s)/is",",",$cfg['ip_allow']);
			$ip_allow = explode(',', $ip_allow);
			if(!in_array($ip,$ip_allow)) $msg['error'] = 'Your location is not allow to login!';
		}
		if($cfg['ip_deny'] && !$user['is_admin']){
			$ip_deny = preg_replace("/(\n|\t|\r|\s)/is",",",$cfg['ip_deny']);
			$ip_deny = explode(',', $ip_deny);
			if(in_array($ip,$ip_deny)) $msg['error'] = 'Your location has been denied!';
		}
		
		//from user
		if($data['ip_allow']){
			$ip_allow = preg_replace("/(\n|\t|\r|\s)/is",",",$data['ip_allow']);
			$ip_allow = explode(',', $ip_allow);
			if(!in_array($ip,$ip_allow)) $msg['error'] = 'Your location is not allow to login!';
		}
		if($data['ip_deny']){
			$ip_deny = preg_replace("/(\n|\t|\r|\s)/is",",",$data['ip_deny']);
			$ip_deny = explode(',', $ip_deny);
			if(in_array($ip,$ip_deny)) $msg['error'] = 'Your location has been denied!';
		}
		
		
	}else{
		$msg['error'] = 'Username/Password is invalid!';
	}
	if(count($msg) == 0){
		$_SESSION['admin_login'] = $user;
		$oMaster->user_log('Logged in');
		$hook->redirect('./?token='.$token);
	}
	
}

$tpl->reset();

$tpl->setfile(array(
	'body'=>'user.login.tpl',
));
$tpl->assign($msg);

?>