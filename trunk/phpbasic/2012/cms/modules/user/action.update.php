<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


if($_POST){
	
	
	$arr = array(
		'fullname'=>$_POST['fullname'],
		'username'=>$_POST['username'],
		'password'=>md5($_POST['password']),
	);
	
	if($do=='new'){
		$lastid = $oClass->insert($arr);
	}else{
		$oClass->update($_GET['id'],$arr);
	}

	
	
	
	// refresh
	
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	$mod = $result['p'];
	unset($result['act'],$result['id'],$result['do']);
	$hook->redirect('?'.http_build_query($result));
}


$tpl->setfile(array(
	'body'=>'user.update.tpl',
));


if($do=='new'){
	$cat_ln = array();
	$breadcrumb->assign("","New");
}else{
	$cat = $oClass->get($_GET['id']);
	$tpl->assign($cat->fetch());
	$breadcrumb->assign("","Edit",$request['bread']);
}

$request['breadcrumb'] = $breadcrumb->parse();

$tpl->assign($request);




?>