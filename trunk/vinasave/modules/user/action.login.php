<?php
/**
 * @Name: CaoBox v1.0
* @author LinhNMT <w2ajax@gmail.com>
* @link http://code.google.com/p/caobox/
* @copyright Copyright &copy; 2009 phpbasic
*/
defined('_ROOT') or die(__FILE__);
if($_POST){
	$login = $oClass->login($_POST['username'],$_POST['password']);
	if($login){
		die(json_encode(array('error'=>false,'code'=>'ok','redirect_url'=>$_POST['redirect_url'])));
	}else{
		die(json_encode(array('error'=>true,'code'=>'user_password_invalid')));
	}
}
$tpl->setfile(array(
		'body'=>'user.login.tpl',
));

$tpl->assign(array(
	'redirect_url'=>isset($_GET['redirect_url'])?$_GET['redirect_url']:'',
));

?>