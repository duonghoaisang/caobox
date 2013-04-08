<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->setfile(array(
	'body'=>'news.tpl',
));

$cond = 1;
$result = $oContent->view(1,$cond);
while($rs  = $result->fetch()){
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'loop');
}

?>