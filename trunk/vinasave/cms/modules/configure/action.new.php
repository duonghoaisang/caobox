<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
extract($_GET);
$request = $_GET;
$request['type'] = intval($type);
$request['parentid'] = intval($parentid);
$request['query_string'] = '?'.$_SERVER['QUERY_STRING'];
$request['http_referer'] = $_SERVER['HTTP_REFERER'];
$error = NULL;
if($_POST){
	// update main
	
	$result = $oConfigure->view("`code` = '".addslashes($_POST['code'])."'");
	if($result->num_rows()){
		$error .= "<strong>".$_POST['code']."</strong>  already exists, please enter another code!";
	}
	
	if(!$error){
		$arr = array(
			'code'=>$_POST['code'],
			'name'=>$_POST['name'],
			'value'=>$_POST['value'],
			'note'=>$_POST['note'],
		);
		$oClass->insert($arr);
		//clear_cache_configure();
		clear_sql_cache();
		$hook->redirect('?mod=configure');
	}
}


$tpl->setfile(array(
	'body'=>'configure.new.tpl',
));


$breadcrumb->assign("","New");


$request['breadcrumb'] = $breadcrumb->parse();
$request['error'] =  $error;
$tpl->assign($request);



?>