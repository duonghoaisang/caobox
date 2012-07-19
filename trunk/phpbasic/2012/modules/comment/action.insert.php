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
			$toAuthor = $system->params[3]?'@'.$system->params[3].': ':'';
			$commentId = $oClass->insert($_SESSION['user_login']['id'],$system->params[2],$toAuthor.$_POST['content'],$_POST['author']);
			$tpl->setfile(array(
				'body'=>'comment.insert.tpl',
			));
			$_POST['date']  = date('Y-m-d h:i:s');
			$_POST['content'] = $hook->format($toAuthor.$_POST['content']);
			$_POST['commentId'] = $commentId;
			if(!login_permission()) cookie('comment['.$commentId.']', str_shuffle('qwertyu678').md5($commentId).str_shuffle('12345678qwertyuighjklASDghj'));
			$_POST['id'] = intval($system->params[2]);
			$tpl->assign($_POST);
			$tpl->box('data');
			echo $tpl->parse();
			exit();
		}
	}//elseif($_SESSION['session_submit']){
	unset($_SESSION['session_submit']);
	//}
	$tpl->setfile(array(
		'body'=>'comment.insert.tpl',
		'bbcode'=>'bbcode.tpl',
	));
	$tpl->assign(array(
		'cls_id'=>$_POST['cls_id'],
		'readonly'=>login_permission()?'readonly="readonly"':'',
		'author'=>$_SESSION['user_login']['isdisplay'],
	));
	$tpl->box('form');
	
}
?>