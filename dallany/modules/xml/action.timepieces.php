<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$icon_h = 116;
$image_h = 368;
$tpl->reset();
if(intval($_GET['id'])){
	$tpl->setfile(array(
		'body'=>'xml.gallery.detail.tpl',
	));
	
	$detail = $oContent->get(intval($_GET['id']));
	$detail = $hook->format($detail);
	$icon = array();
	if(file_exists(_UPLOAD.$detail['icon'])) $icon = getimagesize(_UPLOAD.$detail['icon']);
	$detail['h'] = $icon[1] < $icon_h? $icon[1]:$icon_h;
	$img = array();
	if(file_exists(_UPLOAD.$detail['image'])) $img = getimagesize(_UPLOAD.$detail['image']);
	$detail['imgh'] = $img[1] < $image_h? $img[1]:$image_h;
	$tpl->merge($detail,'detail');
	
	if($_GET['json']){
		echo json_encode($detail);
		exit();
	}
	
	// other products
	
	$result = $oContent->view(4,'c.id != '.intval($detail['id']),0,10);
	while($rs = $result->fetch()){
		$rs = $hook->format($rs);
		$rs['name_url'] = str2url($rs['name']);
		$icon = array();
		if(file_exists(_UPLOAD.$rs['icon'])) $icon = getimagesize(_UPLOAD.$rs['icon']);
		$rs['h'] = $icon[1] < $icon_h? $icon[1]:$icon_h;
		$img = array();
		if(file_exists(_UPLOAD.$rs['image'])) $img = getimagesize(_UPLOAD.$rs['image']);
		$rs['imgh'] = $img[1] < $image_h? $img[1]:$image_h;
		$tpl->assign($rs,'other');
	}
	
	
	
}else{
	$tpl->setfile(array(
		'body'=>'xml.timepieces.tpl',
	));
	$result = $oContent->view(6,'c.catid = 0');
	while($rs = $result->fetch()){
		$rs = $hook->format($rs);
		$rs['name_url'] = str2url($rs['name']);
		$rs['intro'] = $rs['top']?'#/timepieces/one-of-a-kind':$rs['intro'];
		$rs['onclick'] = $rs['top']?' onclick="setBackGround(this,\'images/bg-timepieces_kind.jpg\',function(w,h){timepieces_kind.main(w,h);},function(w,h){timepieces_kind.call_again(w,h);});"':'';
		$rs['target'] = $rs['top']?'':'target="_blank"';
		$tpl->assign($rs,'list');
	}
}
?>