<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

if($request['c']){
	$oClass->delete($request['id']);
	
	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	$mod = $result['p'];
	unset($result['act'],$result['id'],$result['c']);
	$hook->redirect('?'.http_build_query($result));
}else{

	
	$tpl->setfile(array(
		'body'=>'category.delete.tpl',
	));
	
	
	$aPath = $dao->xpath($parentid);
	$xPath = '<a href="?mod=product&type='.$request['type'].'">Root</a>';
	if($aPath) foreach($aPath as $arr){
		$xPath .=  ' &raquo; <a href="?mod=product&parentid='.$arr['id'].'&type='.$request['type'].'">'.$arr['name'].'</a>';
	}
	
	$request['breadcrumb'] = $breadcrumb->parse();
	$request['xpath'] = $xPath;
	
	
	$tpl->assign($request);
}	
?>