<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
if(!ajax_permission()) $hook->redirect('./');
$tpl->reset();
if($_POST){
	if($_POST['submit']){
		if(!$_SESSION['session_submit']){
			$_SESSION['session_submit'] = true;
			$data = $_POST;
			$data['catid'] = 7;
			$data['typeid'] = 1;
			$data['active'] = 1;
			$data['userid'] = isset($_SESSION['user_login']['id'])?intval($_SESSION['user_login']['id']):0;
			$insertid = $oClass->insert($data);
			$tpl->setfile(array(
				'body'=>'content.view.tpl',
			));
			$_POST['title'] = $hook->html($_POST['title']);
			$_POST['content'] = $hook->format($_POST['content']);
			$_POST['id'] = $insertid;
			if(!login_permission()) cookie('content['.$insertid.']', str_shuffle('qwertyu678').md5($insertid).str_shuffle('12345678qwertyuighjklASDghj'));
			$tpl->assign($_POST);
			$tpl->box('content');
			echo $tpl->parse();
			exit();
		}
	}elseif($_SESSION['session_submit']){
		unset($_SESSION['session_submit']);
	}
	$tpl->setfile(array(
		'body'=>'content.insert.tpl',
		'bbcode'=>'bbcode.tpl',
	));
	
	if(isset($_SESSION['user_login'])) $data = array('author'=>$_SESSION['user_login']['isdisplay']);
	$tpl->assign($data);
	//$tpl->merge($languages,'lang');
}
?>