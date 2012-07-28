<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

//$cache->set('page');
$tpl->setfile(array(
	'body'=>'jquery.tpl',
	
));


if($system->params[2]){
	$category = $oCategory->get($system->params[2]);
	$tpl->merge($category,'category');
	
	$parent = $oCategory->get($category['parentid']);
	$parent['string'] = ' / <a href="'.$system->root_dir.'jquery/'.$parent['id'].'">'.$parent['name'].'</a>';
	$parent['function_selector'] = $parent['id'] == 2?'selector':'function';
	$tpl->merge($parent,'parent');
	
	
	$result = $oCategory->view(1,$category['id']);
	while($rs = $result->fetch()){
		$tpl->assign($rs,'cat');
	}
	
	$tpl->box('loaddata');

}elseif($system->params[1]){
	$category = $oCategory->get($system->params[1]);
	$tpl->merge($category,'category');
	
	$result = $oCategory->view(1,$category['id']);
	while($rs = $result->fetch()){
		$rs['parent'] = '/'.$rs['parentid'];
		$tpl->assign($rs,'cat');
	}
	

}else{
	$result = $oCategory->view(1,0);
	while($rs = $result->fetch()){
		$tpl->assign($rs,'cat');
	}
}

// List Category
$result = $oCategory->view(1);
$cat = array();
while($rs = $result->fetch()){
//$tpl->assign($rs,'cat');
$cat[$rs['parentid']][] = $rs;
}
$result->cache();

$menu = array();
$menu['string'] = data2xml($cat,0,'','/',$system->root_dir.'jquery');	
$tpl->merge($menu,'menu');
	

?>