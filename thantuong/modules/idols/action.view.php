<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->setfile(array(
	'body'=>'news.tpl',
));


// news list
$result = $oCategory->view($typeid);
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$rs['active'] = $rs['id'] == $system->params[1]?'Active': '';
	$tpl->assign($rs,'category');
}

$cond = 1;
if($_GET['date']){
	$tmp = explode('-',$_GET['date']);
	//echo '1';
	if(checkdate($tmp[1],$tmp[2],$tmp[0])) $cond .= " AND c.`date` = '".$_GET['date']."'";
	
}
if(intval($system->params[1])) $cond .= " AND c.catid = ".intval($system->params[1]);

// top list
$result = $oContent->view($typeid,$cond,0,3);
$top = $result->fetch();
$top = $hook->format($top);
$top['name_url'] = str2url($top['name']);
$top['icon'] = $top['icon']?'<img src="image.php?file='.$top['icon'].'&width=392"  />':'';
$tpl->merge($top,'top');

while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$rs['icon'] = $rs['icon']?'<img src="image.php?file='.$rs['icon'].'&width=176"  />':'';
	$tpl->assign($rs,'toplist');
}


// main list
$result = $oContent->view($typeid,$cond,3,13);
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$rs['icon'] = $rs['icon']?'<img src="image.php?file='.$rs['icon'].'&width=131"  />':'';
	$rs['intro'] = nl2br($rs['intro']);
	$tpl->assign($rs,'list');
}


// other list
$result = $oContent->view($typeid,$cond,13,23);
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$rs['date'] = date('d/m/Y',strtotime($rs['date']));
	$tpl->assign($rs,'otherlist');
}


// focust list
// other list
$cond .= " AND c.home = 1";
$result = $oContent->view($typeid,$cond);
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$rs['date'] = date('d/m/Y',strtotime($rs['date']));
	$rs['icon'] = $rs['icon']?'<img src="image.php?file='.$rs['icon'].'&width=56"  />':'';
	$rs['intro'] = nl2br($rs['intro']);
	$tpl->assign($rs,'focuslist');
}

if(!isset($_GET['date']) || !$_GET['date']) $tpl->box('topnews');

?>