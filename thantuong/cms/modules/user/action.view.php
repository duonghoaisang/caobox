<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
 
defined('_ROOT') or die(__FILE__);
if($access!='ALL') $hook->redirect('./');

$tpl->setfile(array(
	'body'=>'user.tpl',
));

$cat = $oClass->view();
while($rs = $cat->fetch()){
	$rs['delete'] = $rs['is_admin']?'':'style="display: inline;"';
	$rs['return'] = $rs['is_admin']?' style="cursor: default;" onclick="return false;"':'';
	$tpl->assign($rs,'user');
}





$breadcrumb->reset();
$menu = explode('.',$_SESSION['cms_menu']);
$breadcrumb->assign("",$MenuName[$menu[0]]);
$level = $MenuLink[$menu[0]][$menu[1]];
$breadcrumb->assign($level['link'],$level['name']);
$request['breadcrumb'] = $breadcrumb->parse();


$tpl->assign($request);


?>