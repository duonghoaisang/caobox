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
			$oClass->update($_GET['id'],$data);
			echo $hook->format($_POST['content']);
			exit();
		}
	}elseif($_SESSION['session_submit']){
		unset($_SESSION['session_submit']);
	}
	$tpl->setfile(array(
		'body'=>'content.insert.tpl',
		'bbcode'=>'bbcode.tpl',
	));
	$result = $dao->view_data("v.id = ".intval($_GET['id']),0,5);
	$content = $result->fetch();
	if(content_permission($content['userid'],$content['id'])){
		$content['content'] = $hook->outedit($content['content']);
		$tpl->assign($content);
	}else{
		die('You can not update this content');
	}
}
?>