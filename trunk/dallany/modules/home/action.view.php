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
	'body'=>'index.tpl',
	
));

$briefintro = $oHtml->get(1);
$briefintro = $hook->format($briefintro);
$briefintro['content'] = nl2br($briefintro['content']);
$tpl->merge($briefintro,'briefintro');


$ourstory = $oHtml->get(2);
$ourstory = $hook->format($ourstory);
//$ourstory['content'] = nl2br($ourstory['content']);
$tpl->merge($ourstory,'ourstory');

$insurance = $oHtml->get(6);
$insurance = $hook->format($insurance);
$tpl->merge($insurance,'insurance');


$result = $oCategory->view(2,0);
$k = 0;
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['stt'] = $k++;
	$tpl->assign($rs,'category');
}

?>