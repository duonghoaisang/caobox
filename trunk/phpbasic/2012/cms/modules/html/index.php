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
$request['query_string'] = '?'.$_SERVER['QUERY_STRING'];
$request['http_referer'] = $_SERVER['HTTP_REFERER'];

$cfg_type = array();
$result = $dao->cfg_module(" `module`='".$system->module."' AND page_or_id='".intval($request['id'])."'");
$tmp = $result->fetch();
if($tmp['data']) $cfg_type = unserialize($tmp['data']);
$show_actions = $cfg_type['act']?$cfg_type['act']:array();

$show_fields = $cfg_type['show_fields']?explode(',',$cfg_type['show_fields']):array();

if(in_array('image',$cfg_type['act'])&&$cfg_type['main_icon']['chose']) $show_fields[] = 'icon';
if(in_array('image',$cfg_type['act'])&&$cfg_type['main_img']['chose']) $show_fields[] = 'image';
if(in_array('gallery',$cfg_type['act'])) $show_fields[] = 'gallery';

$tmp = $cfg_type['gallery_fields']?explode(',',$cfg_type['gallery_fields']):array();
if(in_array('gallery',$cfg_type['act']) && $cfg_type['gallery_icon']['chose']) $tmp[] = 'icon';
foreach($tmp as $v) $show_fields[] = 'gallery_'.$v.':inline';

?>