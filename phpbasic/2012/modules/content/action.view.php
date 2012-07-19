<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->setfile(array(
	'body'=>'content.view.tpl',
));

//important box
if(intval($system->params[0])){
	$result = $dao->view_data("v.id = ".intval($system->params[0]),0,5);
	$content = $result->fetch();
	$hook->redirect('/'.$content['c_rewrite'].'/'.$content['id'].'/'.str2url($content['title']).'.html');
	
}
$tpl->box('content');
$result = $dao->view_data("v.id = ".intval($system->params[1]),0,5);
$content = $result->fetch();
//print_r($content);exit();
if($content['c_rewrite'] != $system->params[0] || !$system->params[2]) 
	$hook->redirect('/'.$content['c_rewrite'].'/'.$content['id'].'/'.str2url($content['title']).'.html');
$content['title'] = $hook->html($content['title']);
$content['title_url'] = str2url($content['title']);
$content['web_title'] = $hook->html($content['title']);
$content['web_desc'] = preg_replace('/(\t|\r|\n|\")/','',$hook->html($content['intro']));
$content['content'] = $hook->format($content['content']);
$content['favorited'] = $oClass->check_favorite($content['id'],$_SESSION['user_login']['id'])?' favorited':'';
$tpl->assign($content);
cookie('visit['.intval($system->params[1]).']',$content['title']);
if(content_permission($content['userid'],$content['id'])) $tpl->box('content_toolbar');

$tpl->box('comment');
$result = $oClass->comment($system->params[1]);
while($rs = $result->fetch()){
	$rs['content'] = $hook->format($rs['content']);
	$rs['comment_toolbar'] = comment_permission($rs['userid'],$rs['id'])?'<a href="./?mod=comment&amp;act=update&amp;id='.$rs['id'].'" class="update">Edit</a> <a href="./?mod=comment&amp;act=delete&amp;id='.$rs['id'].'" class="delete">Remove</a>':'';
	$tpl->assign($rs,'comment');
}


//setcookie('history['.$content['id'].']',serialize($content),24*60*60);

?>