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
	parse_str($url,$result);
	if($result['data']) foreach($result['data'] as $ordid=>$id) $oGallery->update($id,array('order_id'=>$ordid));
	clear_sql_cache();
}

?>