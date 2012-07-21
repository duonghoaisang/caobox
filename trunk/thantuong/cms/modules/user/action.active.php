<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
	
	$result = $oClass->get($request['id']);
	$user = $result->fetch();
	if(!$user['is_admin']){
		$oClass->active($request['id']);
		clear_sql_cache();
	}
	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act']);
	if($user['is_admin']) $result['msg'] = 'You cannot update status for this user';
	$hook->redirect('?'.http_build_query($result,NULL,'&'));
?>