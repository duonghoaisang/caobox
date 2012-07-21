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
$tpl->setfile(array(
	'body'=>'xml.diamond.tpl',
));
$result = $oContent->view(3,'c.catid = 0');
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$img = array();
	//echo _UPLOAD.$rs['icon'].'<br />';
	if(file_exists(_UPLOAD.$rs['icon'])) $img = getimagesize(_UPLOAD.$rs['icon']);
	$rs['h'] = $img[1] < $icon_h? $img[1]:$icon_h;
	$rs['intro'] = $rs['top']?'#/timepieces/one-of-a-kind':$rs['intro'];
	$rs['onclick'] = $rs['top']?' onclick="setBackGround(this,\'images/bg-timepieces_kind.jpg\',function(w,h){timepieces_kind.main(w,h);},function(w,h){timepieces_kind.call_again(w,h);});"':'';
	$rs['target'] = $rs['top']?'':'target="_blank"';
	$tpl->assign($rs,'list');
}

$html = $oHtml->get(3);
$html = $hook->format($html);
$tpl->merge($html,'html');
?>