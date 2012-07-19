<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
 
defined('_ROOT') or die(__FILE__);

$tpl->setfile(array(
	'body'=>'user.view.tpl',
));

$cat = $oClass->view();
while($rs = $cat->fetch()){
	$rs['delete'] = $rs['is_admin']?'':'style="display: inline;"';
	$tpl->assign($rs,'user');
}





$breadcrumb->reset();
if(!$_SESSION['cms_menu']) $_SESSION['cms_menu'] = '0.0';
if($_GET['menu']){
	$_SESSION['cms_menu'] = $_GET['menu'];
}
$menu = explode('.',$_SESSION['cms_menu']);
$breadcrumb->assign("",$MenuName[$menu[0]]);
$level = $MenuLink[$menu[0]][$menu[1]];
$breadcrumb->assign($level['link'],$level['name']);
$request['breadcrumb'] = $breadcrumb->parse();


$tpl->assign($request);


?>