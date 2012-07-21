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
		'body'=>'xml.collection.detail.tpl',
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
	
	// collection cat
	$k = 0;
	$result = $oCategory->view(2,0);
	while($rs = $result->fetch()){
		$rs = $hook->format($rs);
		$rs['stt'] = $k++;
		$rs['active'] = $detail['catid']==$rs['id']?'active':'';
		$tpl->assign($rs,'list');
	}
	
	// other products
	
	$result = $oContent->view(2,'c.id != '.intval($detail['id']).' AND c.catid = '.intval($detail['catid']),0,10);
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
	
	
	
}elseif(intval($_GET['cat'])){
	$tpl->setfile(array(
		'body'=>'xml.collection.tpl',
	));
	$result = $oContent->view(2,'c.catid = '.intval($_GET['cat']));
	while($rs = $result->fetch()){
		$rs = $hook->format($rs);
		$rs['name_url'] = str2url($rs['name']);
		$img = array();
		//echo _UPLOAD.$rs['icon'].'<br />';
		if(file_exists(_UPLOAD.$rs['icon'])) $img = getimagesize(_UPLOAD.$rs['icon']);
		$rs['h'] = $img[1] < $icon_h? $img[1]:$icon_h;
		$tpl->assign($rs,'list');
	}
}
?>