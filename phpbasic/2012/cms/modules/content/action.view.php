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

$cat = $dao->category($request['type'],$request['parentid'],$request['q']);
while($rs = $cat->fetch()){
	$tpl->assign($rs,'category');
}

$pro = $oClass->view($request['type'],$request['parentid'],$request['q']);
while($rs = $pro->fetch()){
	$tpl->assign($rs,'product');
}

if($request['q']){
	$req = $_GET;
	unset($req['q'],$req['cmd']);
	$request['search_result'] = ' <a href="?'.http_build_query($req).'">Clear search</a>';
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

$action = array();
if($show_actions) foreach($show_actions as $act){
	$tmp = explode(':',$act);
	$action['action_'.$tmp[0]] = 'style="display: '.($tmp[1]?$tmp[1]:'inline').';"';
}
$tpl->assign($action);

?>