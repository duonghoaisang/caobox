<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
//$model = new Model;
//$model->setCache('data/cache/');
$result =  $model->db->query("SELECT c.`module`,ln.* FROM ".$model->prefix."module c,".$model->prefix."module_ln ln WHERE c.id = ln.id AND c.active = 1");
$arrModule = array();
$controller->modules['main'] = array();
while($rs = $result->fetch()){
	$controller->modules['main'][$rs['module_name']] = $rs;
	$controller->modules['data'][$rs['module']][$rs['ln']] = $rs;
	$controller->modules[$rs['ln']]['module'][$rs['module']] = $rs['module_name'];
	$controller->modules[$rs['ln']]['name'][$rs['module']] = $rs['name'];
	$tmp = $controller->params;
	$tmp[0] = $rs['module_name'];
	$controller->modules['url'][$rs['module']][$rs['ln']] = count($tmp)?rtrim(implode('/',$tmp),'/'):'';
}
$result->cache();
if(isset($controller->modules['main'][$controller->module]['ln']) && $controller->modules['main'][$controller->module]['ln']) $controller->lang = $controller->modules['main'][$controller->module]['ln'];
if(!$controller->params[0]){
	$result = $model->db->query("SELECT `ln` FROM ".$model->prefix."language WHERE `is_default` = 1");
	$data = $result->fetch();
	$controller->lang = $data['ln'];
	$result->cache();
}
if(isset($controller->modules['main'][$controller->module]['module']) && $controller->modules['main'][$controller->module]['module']) $controller->module = $controller->modules['main'][$controller->module]['module'];


?>