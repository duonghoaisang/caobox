<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

if($_POST){
	if(in_array('gallery',$show_actions)){ // use image
		if($cfg_type['gallery_icon']['chose']){
			$icon = upload('icon',_UPLOAD,time().'-');
			if (!empty($icon) && trim($_POST['current_icon']) != "" && $icon != $_POST['current_icon']){
				@unlink(_UPLOAD.$_POST['current_icon']);
			}
			
			if($icon){
				$oImg = new image(_UPLOAD.$icon);
				$oImg->resize($cfg_type['gallery_icon']['w'],$cfg_type['gallery_icon']['h'],_UPLOAD.$icon);
			}
			$_POST['icon'] = empty($icon)?$_POST['current_icon']:$icon;
		}
		
		
		
		if($cfg_type['gallery_img']['chose']){
			$image = upload('image',_UPLOAD,time().'-');
			if (!empty($image) && trim($_POST['current_image']) != "" && $image != $_POST['current_image']){
				@unlink(_UPLOAD.$_POST['current_image']);
				@unlink(_UPLOAD.'thumb/'.$_POST['current_image']);
			}
			if($image){
				$oImg = new image(_UPLOAD.$image);
				$oImg->resize($cfg_type['gallery_img']['w'],$cfg_type['gallery_img']['h'],_UPLOAD.$image);
				if($cfg_type['gallery_thumb']['chose']) 
					$oImg->resize($cfg_type['gallery_thumb']['w'],$cfg_type['gallery_thumb']['h'],_UPLOAD.'thumb/'.$image);
			}
			$_POST['image'] = empty($image)?$_POST['current_image']:$image;
		}
	}
	
	$arr = array(
		'name'=>$_POST['name'],
		'content'=>$_POST['content'],
		'icon'=>$_POST['icon'],
		'image'=>$_POST['image'],
	);
	
	if($do == 'new'){
		$lastid = $dao->gallery_insert($request['p'],$request['pid'],$arr);
	}else{
		$dao->gallery_update($request['id'],$arr);
		$lastid = $request['id'];
	}


	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	
	if($request['pid']){
		unset($result['mod'],$result['act'],$result['id'],$result['c'],$result['p'],$result['do']);
		$hook->redirect('?mod='.$request['p'].'&'.http_build_query($result));
	}else{
		unset($result['act'],$result['do']);
		$hook->redirect('?'.http_build_query($result));
		
	}
}


$tpl->setfile(array(
	'body'=>'gallery.update.tpl',
));


if($do=='new'){
	$breadcrumb->assign("","New");
	$cat_ln = array();
}else{
	$cat = $oClass->get($_GET['id']);
	$tpl->assign($cat->fetch());
	$request['display_update'] = 'style="display: block;"';
	if($request['mod'] != 'gallery' && $request['p'])	$breadcrumb->assign("?mod=$p&act=update&id=$pid&parentid=$parentid&type=$type&bread=1","Gallery",true);
	$breadcrumb->assign("","Edit");
}



//$breadcrumb->reset();

//$breadcrumb->assign("./?mod=product","Manage Products");

$request['breadcrumb'] = $breadcrumb->parse();
$request['size_icon'] = demension_size($cfg_type['main_icon']['w'],$cfg_type['main_icon']['']);
$request['size_image'] = demension_size($cfg_type['main_img']['w'],$cfg_type['main_img']['']);

$tpl->assign($request);

//$show_fields = array('title','content','icon','image'); 

$show = array();
if($show_fields) foreach($show_fields as $field) $show['display_'.$field] = 'style="display: table-row;"';
$tpl->assign($show);

?>