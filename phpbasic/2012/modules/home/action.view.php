<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$favorites = $oClass->favorite($_SESSION['user_login']['id']);
if(!$_SESSION['user_login']['viewtype']) $_SESSION['user_login']['viewtype'] = 'list';
$data = array();
$tpl->setfile(array(
	'body'=>'home.view.'.$_SESSION['user_login']['viewtype'].'.tpl',
));

if($catname = $system->params[0]){
	// newest box data 
	$cond = 1;
	if($system->params[1]=='tutorial') $cond .= " AND typeid = 2";
	$newest = $dao->view_data("$cond AND c_rewrite = '".addslashes($system->params[0])."'",0,20);
	$data['web_title']  = $catname;
}else{

	//important box
	$stiky = $dao->view_data("stinky = 1",0,5);
	$tpl->box('stinky');
	while($rs = $stiky->fetch()){
		$rs['title'] = $hook->html($rs['title']);
		$rs['title_url'] = str2url($rs['title']);
		$rs['favorited'] = in_array($rs['id'],$favorites)?' favorited':'';
		$tpl->assign($rs,'stinky');
	}
	
	// newest box data
	$newest = $dao->view_data("stinky = 0",0,20);
}


// display newest box
$tpl->box('newest');
while($rs = $newest->fetch()){
	$rs['title'] = $hook->html($rs['title']);
	$rs['title_url'] = str2url($rs['title']);
	$rs['intro'] = $hook->format($rs['intro']);
	$rs['favorited'] = in_array($rs['id'],$favorites)?' favorited':'';
	$tpl->assign($rs,'list');
}

$tpl->assign($data);
?>