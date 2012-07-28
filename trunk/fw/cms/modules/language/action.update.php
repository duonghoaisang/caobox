<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

if($_POST){
	// update main
	
	$arr = array(
		'ln_name'=>$_POST['ln_name'],
		'ln_alias'=>$_POST['ln_alias'],
	);
	
	$oClass->update($request['ln'],$arr);
	clear_sql_cache();

	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act'],$result['ln']);
	$hook->redirect('?'.http_build_query($result,NULL,'&'));
	
}


$tpl->setfile(array(
	'body'=>'language.update.tpl',
));


$cat = $oLanguage->view("ln='".addslashes($request['ln'])."'");
$tpl->assign($cat->fetch());
$breadcrumb->assign("","Edit");



//$breadcrumb->reset();

//$breadcrumb->assign("./?mod=product","Manage Products");



?>