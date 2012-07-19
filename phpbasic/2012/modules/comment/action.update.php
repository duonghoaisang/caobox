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
			$oClass->update($_GET['id'],$_POST['content']);	
			echo $hook->format($_POST['content']);
			exit();
		}
	}//elseif($_SESSION['session_submit']){
	unset($_SESSION['session_submit']);
	//}
	$tpl->setfile(array(
		'body'=>'comment.insert.tpl',
		'bbcode'=>'bbcode.tpl',
	));
	$result = $oClass->view($_GET['id']);
	$comment = $result->fetch();
	if(comment_permission($comment['userid'],$comment['id'])){
		$comment['content'] = $hook->outedit($comment['content']);
		$comment['cls_id'] = $_POST['cls_id'];
		$tpl->assign($comment);
		$tpl->box('form');
	}else{
		die('You can not update this comment');
	}
}
?>