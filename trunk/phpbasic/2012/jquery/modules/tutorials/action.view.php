<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$data = array();
if(intval($system->params[1])){
	$tpl->setfile(array(
		'body'=>'tutorial.detail.tpl',
	));
	$tpl->box('content');
	$result = $dao->view_data("v.id = ".intval($system->params[1]),0,5);
	$data = $result->fetch();
	$data['title'] = $hook->format($data['title']);
	$data['content'] = $hook->format($data['content']);
	
}else{
	$tpl->setfile(array(
		'body'=>'tutorial.tpl',
	));
	// newest box data 
	$cond = 1;
	//$cond .= " AND typeid = 5";
	$newest = $dao->view_data("$cond");
	$total = $newest->num_rows();
	$url = '/'.$system->params[0].'/';
	$limit = 20;
	$start  = $limit * intval($_GET['page']);
	$dP = new paging($url,$total,$limit);
	
	$newest = $dao->view_data("$cond",$start,$limit);
	$data['web_title']  = $catname;
	
	// display newest box
	$tpl->box('newest');
	while($rs = $newest->fetch()){
		$rs['title'] = $hook->format($rs['title']);
		$rs['intro'] = $hook->format($rs['intro']);
		$tpl->assign($rs,'list');
	}
	$data['divPage'] = $dP->simple(5);
}
$tpl->assign($data);
?>