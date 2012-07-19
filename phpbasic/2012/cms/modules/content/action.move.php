<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
 
defined('_ROOT') or die(__FILE__);
$current_catid = $request['parentid'];
if($_POST){
	$current_catid = $_POST['catid'];
	$arr = array(
		'catid'=>$_POST['catid']
	);
	$oClass->update($request['id'],$arr);
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act'],$result['id']);
	$hook->redirect('?'.http_build_query($result));
}
	
$tpl->setfile(array(
	'body'=>'content.move.tpl',
));
$breadcrumb->assign("","Move to category");

$tree = $dao->tree($request['type'],0,'&nbsp;',1);
foreach($tree as $rs){
	$rs['prefix'] = $rs['prefix'].'|&mdash;';
	$rs['selected'] = $rs['id']==$current_catid?'selected':'';
	$tpl->assign($rs,'category');
}


$aPath = $dao->xpath($parentid);
$xPath = '<a href="?mod=product&type='.$request['type'].'">Root</a>';
if($aPath) foreach($aPath as $arr){
	$xPath .=  ' &raquo; <a href="?mod=product&parentid='.$arr['id'].'&type='.$request['type'].'">'.$arr['name'].'</a>';
}

$request['breadcrumb'] = $breadcrumb->parse();
$request['xpath'] = $xPath;


$tpl->assign($request);
?>