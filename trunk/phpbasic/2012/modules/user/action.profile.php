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
$data = $_SESSION['user_login'];

$data['msg'] = NULL;
if($_POST){
	$data = $_POST;
	$result = $oClass->profile("id != ".$_SESSION['user_login']['id']." AND email = '".addslashes($_POST['email'])."'");
	if($result->num_rows()) $data['msg'] .= 'Email duoc su dung boi nguoi khac<br />';
	
	$result = $oClass->profile("id != ".$_SESSION['user_login']['id']." AND isdisplay = '".addslashes($_POST['isdisplay'])."'");
	if($result->num_rows()) $data['msg'] .= 'Ten hien thi duoc su dung boi nguoi khac<br />';

	if(!$data['msg']){
		$oClass->update($_POST,$_SESSION['user_login']['id']);
		$result = $oClass->profile("id = ".$_SESSION['user_login']['id']);
		$_SESSION['user_login'] = $result->fetch();
	}
	
}

//$tpl->reset();
$tpl->setfile(array(
	'body'=>'user.profile.tpl',
));

$tpl->assign($data);

?>