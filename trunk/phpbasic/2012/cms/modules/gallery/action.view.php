<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
extract($_GET);
$request = $_GET;
$request['type'] = intval($type);
$request['parentid'] = intval($parentid);

$tpl->setfile(array(
	'body'=>'gallery.view.tpl',
));

$cat = $dao->gallery($request['p'],$request['pid']);
while($rs = $cat->fetch()){
	$tpl->assign($rs,'gallery');
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
//$show_actions = array('newcat','new','update','delete','comment');
$action = array();
if($show_actions) foreach($show_actions as $act) $action['action_'.$act] = 'style="display: inline;"';
$tpl->assign($action);

?>