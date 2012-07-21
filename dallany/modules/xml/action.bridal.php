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
	'body'=>'xml.catalog.tpl',
));
$result = $oContent->view(1);
while($rs = $result->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'list');
}

//if(
//$fp = fopen('photoflow.xml','w');
//exit();

?>