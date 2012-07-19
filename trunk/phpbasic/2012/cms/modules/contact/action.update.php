<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

if($_POST){
	// update main
	
	$arr = array(
		'name'=>$_POST['name'],
		'address'=>$_POST['address'],
		'email'=>$_POST['email'],
		'tel'=>$_POST['tel'],
		'fax'=>$_POST['fax'],
		
	);
	
	if($request['do']=='new'){
		$oClass->insert($arr);
	}else{
		$oClass->update($request['id'],$arr);
	}


	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act'],$result['ln']);
	$hook->redirect('?'.http_build_query($result));
	
}


$tpl->setfile(array(
	'body'=>'contact.update.tpl',
));

if($request['do']=='new'){
	$breadcrumb->assign("","New");
}else{
	$cat = $oClass->view("id=".$request['id']);
	$tpl->assign($cat->fetch());
	$breadcrumb->assign("","Edit");
}



//$breadcrumb->reset();

//$breadcrumb->assign("./?mod=product","Manage Products");

$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);


?>