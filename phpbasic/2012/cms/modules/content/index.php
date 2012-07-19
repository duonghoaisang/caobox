<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$oClass = new ClassModel;
$breadcrumb = new breadcrumb;
extract($_GET);
$request = $_GET;
$request['type'] = intval($type);
$request['parentid'] = intval($parentid);
$request['query_string'] = '?'.$_SERVER['QUERY_STRING'];
$request['http_referer'] = $_SERVER['HTTP_REFERER'];



$cfg_type = array();
if($request['type']){
	$result = $dao->cfg_module(" `module`='".$system->module."' AND typeid=".intval($request['type']));
	$tmp = $result->fetch();
	if($tmp['data']) $cfg_type = unserialize($tmp['data']);
}	
//
$show_actions = $cfg_type['act']?$cfg_type['act']:array();
if(in_array('rootproduct',$show_actions)) $show_actions[] = 'rootnew';
elseif($request['parentid']) $show_actions[] = 'rootnew';
if(!$cfg_type['nlevel'] || $level < $cfg_type['nlevel']) $show_actions[] = 'nlevel';


$show_fields = $cfg_type['show_fields']?explode(',',$cfg_type['show_fields']):array();

if(in_array('image',$show_actions)&&$cfg_type['main_icon']['chose']) $show_fields[] = 'icon';
if(in_array('image',$show_actions)&&$cfg_type['main_img']['chose']) $show_fields[] = 'image';
if(in_array('gallery',$show_actions)) $show_fields[] = 'gallery';

if($cfg_type['gallery_fields']){
	$tmp = explode(',',$cfg_type['gallery_fields']);
	if(in_array('gallery',$cfg_type['act']) && $cfg_type['gallery_icon']['chose']) $tmp[] = 'icon';
	foreach($tmp as $v) $show_fields[] = 'gallery_'.$v.':inline';
}

if(in_array('newcat',$show_actions)){
	$aPath = $dao->xpath($_GET['parentid']);
	$level = count($aPath);
	$xPath = '<a href="?mod=product&type='.$request['type'].'">Root</a>';
	if($aPath) for($i=$level-1;$i>=0;$i--){
		$xPath .=  ' &raquo; <a href="?mod=product&parentid='.$aPath[$i]['id'].'&type='.$aPath[$i]['type'].'">'.$aPath[$i]['name'].'</a>';
	}
	$tpl->assign(array('xpath' => $xPath));
}

?>