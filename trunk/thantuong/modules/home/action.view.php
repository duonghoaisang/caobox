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
	'body'=>'home.tpl',
	
));

$images = $oHtml->get(1);
$tpl->merge($images,'images');


$result = $oContent->view(9);
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$tpl->assign($rs,'list');
}


?>