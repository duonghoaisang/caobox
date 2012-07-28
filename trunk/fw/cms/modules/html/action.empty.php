<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
 
defined('_ROOT') or die(__FILE__);
$tpl->reset();
if($request['c']){
	$oClass->delete($request['id']);
	clear_sql_cache();
}
$hook->redirect('?mod=configure');
?>