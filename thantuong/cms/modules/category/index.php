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

$request['query_string'] = '?'.$_SERVER['QUERY_STRING'];
$request['http_referer'] = $_SERVER['HTTP_REFERER'];



$aPath = $oCategory->xpath($_GET['parentid']);
$xPath = '<a href="?mod=content&type='.$_GET['type'].'">Root</a>';
if($aPath) for($i=count($aPath)-1;$i>=0;$i--){
	$xPath .=  ' &raquo; <a href="?mod=content&parentid='.$aPath[$i]['id'].'&type='.$aPath[$i]['type'].'">'.$aPath[$i]['name'].'</a>';
}
$tpl->assign(array('xpath' => $xPath));

$cfg_type = array();

$result = $oConfigure->getMod(" `module`='content' AND typeid=".intval($request['type']));
$tmp = $result->fetch();
if($tmp['data']) $cfg_type = unserialize($tmp['data']);
$show_actions = $cfg_type['act']?$cfg_type['act']:array();
$show_fields = array();
if(in_array('catimg',$show_actions) && $cfg_type['catimg_icon']['chose']) $show_fields[] = 'icon';
if(in_array('catimg',$show_actions) && $cfg_type['catimg_img']['chose']) $show_fields[] = 'image';
if(in_array('ln_catimg',$show_actions) && $cfg_type['ln_catimg_icon']['chose']) $show_fields[] = 'ln_icon';
if(in_array('ln_catimg',$show_actions) && $cfg_type['ln_catimg_img']['chose']) $show_fields[] = 'ln_image';
if(in_array('enable_catdate',$show_actions)) $show_fields[] = 'enable_catdate';

?>