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

if($_POST){
	// update main
	$icon = upload('icon',_UPLOAD,time().'-');
	if (!empty($icon) && trim($_POST['current_icon']) != "" && $icon != $_POST['current_icon']){
		@unlink(_UPLOAD.$_POST['current_icon']);
	}
	
	$oImg = new image(_UPLOAD.$icon);
	$oImg->resize(50,50,_UPLOAD.'thumb/'.$icon);
	
	$_POST['icon'] = empty($icon)?$_POST['current_icon']:$icon;
	
	$image = upload('image',_UPLOAD,time().'-');
	if (!empty($image) && trim($_POST['current_image']) != "" && $image != $_POST['current_image']){
		@unlink(_UPLOAD.$_POST['current_image']);
	}
	$_POST['image'] = empty($image)?$_POST['current_image']:$image;
	
	$arr = array(
		'icon'=>$_POST['icon'],
		'image'=>$_POST['image'],
	);
	
	if($do == 'new'){
		$arr['parentid'] = $parentid;
		$arr['type'] = $type;
		$lastid = $oClass->insert($arr);
	}else{
		$oClass->update($_GET['id'],$arr);
		$lastid = $_GET['id'];
	}


	// update _ln
	if($_POST['name']) foreach($_POST['name'] as $ln=>$val){
		if($val){
			$arr_ln  = array(
				'name'=>$val,
				'intro'=>$_POST['intro'][$ln]
			);
			$oClass->update_ln($lastid,$ln,$arr_ln);
		}
	}
	// refresh
	
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	$mod = $result['p'];
	unset($result['mod'],$result['act'],$result['id'],$result['c'],$result['p'],$result['do']);
	$hook->redirect('?mod='.$mod.'&'.http_build_query($result));
}


$tpl->setfile(array(
	'body'=>'category.update.tpl',
));


if($do=='new'){
	$breadcrumb->assign("","New");
	$cat_ln = array();
}else{
	$cat_ln = $oClass->get_ln($_GET['id']);
	$cat = $oClass->get($_GET['id']);
	$tpl->assign($cat->fetch());
	$request['display_update'] = 'style="display: block;"';
	$breadcrumb->assign("","Edit");
}

$lang = $dao->language();
while($rs = $lang->fetch()){
	$arr = array_merge($rs,$cat_ln[$rs['ln']]?$cat_ln[$rs['ln']]:array());
	$tpl->assign($arr,'language');
	
}


//$breadcrumb->reset();

//$breadcrumb->assign("./?mod=product","Manage Products");

$request['breadcrumb'] = $breadcrumb->parse();
$tpl->assign($request);

switch($_GET['type']){
	case 1: $show_fields = array('name','intro','icon','image'); break;
	default: $show_fields = array('name','icon','image'); break;
}
$show = array();
foreach($show_fields as $field) $show['display_'.$field] = 'style="display: table-row;"';
$tpl->assign($show);

?>