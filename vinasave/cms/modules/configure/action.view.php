<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$request['type'] = intval($type);
$request['parentid'] = intval($parentid);

$tpl->setfile(array(
	'body'=>'configure.tpl',
));

$icons = $login_user['setting']['icon']?$login_user['setting']['icon']:'default';

$cat = $oConfigure->getMod("`module` = 'content'");
while($rs = $cat->fetch()){
	$rs['attr'] = $rs['is_attribute']?'<em>(Attr)</em> ':'';
	$tpl->assign($rs,'cfg_module');
}
$cat = $oConfigure->getMod("`module` = 'html'");
while($rs = $cat->fetch()){
	$result = $oClass->check_html($rs['typeid'])->fetch();
	//$tmp = $result->fetch();
	//print_r($tmp);
	$rs['plus'] = $result && $result['draft'] == 0 ?''.$tmp['draft']:' <a href="#" onclick="newHTMLCfg('.$rs['typeid'].');return false;"><img src="template/images/icons_'.$icons.'/plus.jpg" border="0" /></a>';
	$tpl->assign($rs,'cfg_html');
}

$cat = $oConfigure->getMod("`module` = 'options'");
while($rs = $cat->fetch()){
	$tpl->assign($rs,'options');
}


$k = 0;
$c_group = NULL;
$result = $oConfigure->group();
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$active = '';
	if((!$_GET['gid'] && $k==0) || ($_GET['gid'] && $rs['id'] == $_GET['gid']) ){ $active = 'selected'; $c_group = $rs;}
	$rs['selected'] = $active;
	$tpl->assign($rs,'cfg_group');
	$k++;
}


$result = $oConfigure->view(" group_id = ".intval($c_group['id']));
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$tpl->assign($rs,'cfg_common');
}

// configure common values

$request['group_id'] = intval($c_group['id']);

?>