<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


if($_GET['c']){
	$oClass->delete($request['id']);
	clear_sql_cache();
	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act'],$result['id'],$result['c']);
	$hook->redirect('?'.http_build_query($result,NULL,'&'));
}else{

	
	$tpl->setfile(array(
		'body'=>'category.delete.tpl',
	));
	
	$request['breadcrumb'] = $breadcrumb->parse();
	
	
	$tpl->assign($request);
}	
?>