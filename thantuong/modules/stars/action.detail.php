<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->setfile(array(
	'body'=>'news.detail.tpl',
));
// news list
$detail = $oContent->get($system->params[2]);
$detail = $hook->format($detail);
$detail['date'] = date('d/m/Y',strtotime($rs['date'])) . ' '.date('h:i:s',strtotime($rs['timestamp']));
$detail['intro'] = nl2br($detail['intro']);

$tpl->merge($detail,'detail');



// news list
$result = $oCategory->view($typeid);
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$rs['active'] = $rs['id'] == $detail['catid']?'Active': '';
	$tpl->assign($rs,'category');
}


$result = $oContent->view($typeid, " c.id != ".intval($system->params[2]),0,10);
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['date'] = date('d/m/Y',strtotime($rs['date']));
	$tpl->assign($rs,'otherlist');
}


?>