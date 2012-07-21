<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->reset();
$tpl->setfile(array(
	'body'=>'xml.special.tpl',
));
$result = $oGallery->view('html',4);
$j  = 0;
$first_img = '';
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	if($j==0){
		$first_img = $rs['image'];
		$j++;
	}
	if(file_exists(_UPLOAD.$rs['image'])) $image = getimagesize(_UPLOAD.$rs['image']);
	$rs['h'] = $image[1];
	$tpl->assign($rs,'list');
}

$html = $oHtml->get(4);
$html = $hook->format($html);
$tpl->merge($html,'html');
$tpl->assign(array(
	'first_img'=>$first_img,
));

?>