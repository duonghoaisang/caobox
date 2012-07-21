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
	'body'=>'options.empty.tpl',
));
$total = 0;

$result = $oClass->view($request['type']);
$total += $result->num_rows();
while($rs = $result->fetch()){
	$tpl->assign($rs,'product');
}
if(!$total) $request['empty_data'] = '<tr><td>This module are already empty data.</td></tr>';
$tpl->assign($request);
?>