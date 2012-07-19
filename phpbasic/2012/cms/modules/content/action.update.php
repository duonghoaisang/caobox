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
	//print_r($cfg_type);exit();
	
	if(in_array('image',$show_actions)){ // use image
		if($cfg_type['main_icon']['chose']){
			$icon = upload('icon',_UPLOAD,time().'-');
			if (!empty($icon) && trim($_POST['current_icon']) != "" && $icon != $_POST['current_icon']){
				@unlink(_UPLOAD.$_POST['current_icon']);
			}
			
			if($icon){
				$oImg = new image(_UPLOAD.$icon);
				$oImg->resize($cfg_type['main_icon']['w'],$cfg_type['main_icon']['h'],_UPLOAD.$icon);
			}
			$_POST['icon'] = empty($icon)?$_POST['current_icon']:$icon;
		}
		
		
		
		if($cfg_type['main_img']['chose']){
			$image = upload('image',_UPLOAD,time().'-');
			if (!empty($image) && trim($_POST['current_image']) != "" && $image != $_POST['current_image']){
				@unlink(_UPLOAD.$_POST['current_image']);
				@unlink(_UPLOAD.'thumb/'.$_POST['current_image']);
			}
			if($image){
				$oImg = new image(_UPLOAD.$image);
				$oImg->resize($cfg_type['main_img']['w'],$cfg_type['main_img']['h'],_UPLOAD.$image);
				if($cfg_type['main_thumb']['chose']) 
					$oImg->resize($cfg_type['main_thumb']['w'],$cfg_type['main_thumb']['h'],_UPLOAD.'thumb/'.$image);
			}
			$_POST['image'] = empty($image)?$_POST['current_image']:$image;
		}
	}
	
	
	$arr = array(
		'price'=>$_POST['price'],
		'icon'=>$_POST['icon'],
		'image'=>$_POST['image'],
	);
	
	if($do=='new'){
		$arr['catid'] = $request['parentid'];
		$arr['type'] = $request['type'];
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

	// gallery 
	
	
	if(in_array('gallery',$show_actions)) foreach($_FILES as $key=>$a){
		if(substr($key,0,13)=='image_gallery'){
			
			if($cfg_type['gallery_icon']['chose']){
				$icon = upload(str_replace('image_','icon_',$key),_UPLOAD,time().'-');
				if($icon){
					$oImg = new image(_UPLOAD.$icon);
					$oImg->resize($cfg_type['gallery_icon']['w'],$cfg_type['gallery_icon']['h'],_UPLOAD.$icon);
				}
			}
			
			if($cfg_type['gallery_img']['chose']){
				$img = upload($key,_UPLOAD,time().'-');
				if($img){
					$oImg = new image(_UPLOAD.$img);
					$oImg->resize($cfg_type['gallery_img']['w'],$cfg_type['gallery_img']['h'],_UPLOAD.$img);
					if($cfg_type['gallery_thumb']['chose'])
						$oImg->resize($cfg_type['gallery_thumb']['w'],$cfg_type['gallery_thumb']['h'],_UPLOAD.'thumb/'.$img);
				}
			}
			
			
			$name = $_POST[str_replace('image_','name_',$key)];
			
			if($img){
				$data = array(
					'name'=>$name,
					'icon'=>$icon,
					'image'=>$img,
				);
				$dao->gallery_insert($system->module,$request['id'],$data);
			}
		}
	}
	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);

	if($_POST['back']){
		unset($result['act'],$result['id'],$result['do']);
	}else{
		$_SESSION['updated'] = true;
	}
	$hook->redirect('?'.http_build_query($result));
}


$tpl->setfile(array(
	'body'=>'content.update.tpl',
));

if($_SESSION['updated']){
	$request['back_list_0'] = 'selected';
	$request['msg'] = $languages['data_updated'];
	unset($_SESSION['updated']);
}

if($do=='new'){
	$cat_ln = array();
	$breadcrumb->assign("","New");
}else{
	$cat_ln = $oClass->get_ln($_GET['id']);
	$cat = $oClass->get($_GET['id']);
	$tpl->assign($cat->fetch());
	$breadcrumb->assign("","Edit",$request['bread']);
	$request['display_update'] = 'style="display: block;"';
}
$lang = $dao->language("active = 1");
while($rs = $lang->fetch()){
	$arr = array_merge($rs,$cat_ln[$rs['ln']]?$cat_ln[$rs['ln']]:array());
	$tpl->assign($arr,'language');
}

// load gallery
$result = $dao->gallery($system->module,$request['id']);
while($rs = $result->fetch()){
	$rs['name'] = $rs['name']?$rs['name'].'<br />':'';
	$tpl->assign($rs,'gallery');
}
$request['breadcrumb'] = $breadcrumb->parse();
$request['size_icon'] = demension_size($cfg_type['main_icon']['w'],$cfg_type['main_icon']['h']);
$request['size_image'] = demension_size($cfg_type['main_img']['w'],$cfg_type['main_img']['h']);
$request['size_gallery'] = demension_size($cfg_type['gallery_img']['w'],$cfg_type['gallery_img']['h']);

$tpl->assign($request);


$show = array();
if($show_fields) foreach($show_fields as $field){
	$a = explode(':',$field);
	$show['display_'.$a[0]] = 'style="display: '.($a[1]?$a[1]:'table-row').';"';
	$show['is_'.$a[0]] = 1;
}
$tpl->assign($show);


?>