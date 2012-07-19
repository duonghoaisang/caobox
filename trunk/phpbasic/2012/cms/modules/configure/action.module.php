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
	unset($_POST['Submit']);
	$arr = array(
		'data'=>serialize($_POST)
	);
	
	$oClass->update_module($request['module'],$request['typeid'],$request['page_or_id'],$arr);


	// refresh
	
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act'],$result['module'],$result['typeid'],$result['page_or_id']);
	$hook->redirect('?'.http_build_query($result));
}


$tpl->setfile(array(
	'body'=>'configure.module.'.$request['module'].'.tpl',
));

$result = $oClass->get_module($request['module'],$request['typeid'],$request['page_or_id']);
$cfg = $result->fetch();
$data = array();
if($cfg['data']) $data = unserialize($cfg['data']);

$arrCfg = array();
//action
if($data['act']) foreach($data['act'] as $v){
	$tmp = explode(':',$v);
	$arrCfg[$tmp[0].'_checked'] = 'checked';
}
//show fields
$arrCfg['show_fields'] = $data['show_fields'];
$arrCfg['gallery_fields'] = $data['gallery_fields'];
$arrCfg['nlevel'] = intval($data['nlevel']);
$arrCfg['category_fields'] = $data['category_fields'];
//
$arrCfg['main_icon_chose'] = $data['main_icon']['chose']?'checked':'';
$arrCfg['main_icon_w'] = intval($data['main_icon']['w']);
$arrCfg['main_icon_h'] = intval($data['main_icon']['h']);

$arrCfg['main_img_chose'] = $data['main_img']['chose']?'checked':'';
$arrCfg['main_img_w'] = intval($data['main_img']['w']);
$arrCfg['main_img_h'] = intval($data['main_img']['h']);

$arrCfg['main_thumb_chose'] = $data['main_thumb']['chose']?'checked':'';
$arrCfg['main_thumb_w'] = intval($data['main_thumb']['w']);
$arrCfg['main_thumb_h'] = intval($data['main_thumb']['h']);

$arrCfg['gallery_icon_chose'] = $data['gallery_icon']['chose']?'checked':'';
$arrCfg['gallery_icon_w'] = intval($data['gallery_icon']['w']);
$arrCfg['gallery_icon_h'] = intval($data['gallery_icon']['h']);

$arrCfg['gallery_img_chose'] = $data['gallery_img']['chose']?'checked':'';
$arrCfg['gallery_img_w'] = intval($data['gallery_img']['w']);
$arrCfg['gallery_img_h'] = intval($data['gallery_img']['h']);

$arrCfg['gallery_thumb_chose'] = $data['gallery_thumb']['chose']?'checked':'';
$arrCfg['gallery_thumb_w'] = intval($data['gallery_thumb']['w']);
$arrCfg['gallery_thumb_h'] = intval($data['gallery_thumb']['h']);

$arrCfg['catimg_icon_chose'] = $data['catimg_icon']['chose']?'checked':'';
$arrCfg['catimg_icon_w'] = intval($data['catimg_icon']['w']);
$arrCfg['catimg_icon_h'] = intval($data['catimg_icon']['h']);

$arrCfg['catimg_img_chose'] = $data['catimg_img']['chose']?'checked':'';
$arrCfg['catimg_img_w'] = intval($data['catimg_img']['w']);
$arrCfg['catimg_img_h'] = intval($data['catimg_img']['h']);

$arrCfg['catimg_thumb_chose'] = $data['catimg_thumb']['chose']?'checked':'';
$arrCfg['catimg_thumb_w'] = intval($data['catimg_thumb']['w']);
$arrCfg['catimg_thumb_h'] = intval($data['catimg_thumb']['h']);

$tpl->assign($arrCfg);
$request['display_update'] = 'style="display: block;"';
$breadcrumb->assign("","Edit configure type");



//$breadcrumb->reset();

//$breadcrumb->assign("./?mod=product","Manage Products");

$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);

?>