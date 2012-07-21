<?php

/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->reset();
if($_POST){
	$url = str_replace('[]','data[]',$_POST['data']);
	$start = intval($_POST['start']);
	parse_str($url,$result);
	if($result['data']) foreach($result['data'] as $ordid=>$id) $oClass->update($id,array('order_id'=>$ordid+$start));
	clear_sql_cache();
}

?>