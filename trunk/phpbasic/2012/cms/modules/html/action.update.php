<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$error = NULL;
if($_POST){
	// update main
	if(in_array('image',$show_actions)){ // use image
		if($cfg_type['main_icon']['chose']){
			$icon = upload('icon',_UPLOAD,time().'-',$image_exts);
			if (!empty($icon) && trim($_POST['current_icon']) != "" && $icon != $_POST['current_icon']){
				@unlink(_UPLOAD.$_POST['current_icon']);
			}
			
			if($icon){
				$oImg = new image(_UPLOAD.$icon);
				$oImg->resize($cfg_type['main_icon']['w'],$cfg_type['main_icon']['h'],_UPLOAD.$icon);
			}
			if($icon!=-1){
				$_POST['icon'] = empty($icon)?$_POST['current_icon']:$icon;
			}else{
			 	$error .= $languages['invalid_icon_ext'].'<br />';
			}
		}
		
		
		
		if($cfg_type['main_img']['chose']){
			$image = upload('image',_UPLOAD,time().'-',$image_exts);
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
			if($image!=-1){
				$_POST['image'] = empty($image)?$_POST['current_image']:$image;
			}else{
				$error .= $languages['invalid_image_ext'].'<br />';
			}
		}
	}
	
	if(!$error){
		$arr = array(
			'icon'=>$_POST['icon'],
			'image'=>$_POST['image'],
		);
		
		$oClass->update($request['id'],$arr);
	}

	if($_POST['name']) foreach($_POST['name'] as $ln=>$val){
		if($val){
			$arr_ln  = array(
				'name'=>$val,
				'intro'=>$_POST['intro'][$ln],
				'content'=>$_POST['content'][$ln]
			);
			$oClass->update_ln($request['id'],$ln,$arr_ln);
		}
	}

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
/*	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	
	if($request['pid']){
		unset($result['mod'],$result['act'],$result['id'],$result['c'],$result['p'],$result['do']);
		$hook->redirect('?mod='.$request['p'].'&'.http_build_query($result));
	}else{
		unset($result['act'],$result['do']);
		$hook->redirect('?'.http_build_query($result));
		
	}
*/
	if(!$error){
		$_SESSION['updated'] = true;
		$hook->redirect('?'.http_build_query($_GET));
	}else{
		$request['msg'] = $error;
	}
}


$tpl->setfile(array(
	'body'=>'html.update.tpl',
));


if($_SESSION['updated']){
	$request['msg'] = $languages['data_updated'];
	unset($_SESSION['updated']);
}

$lang = $dao->language("active=1");
$cat_ln = $oClass->get_ln($_GET['id']);
while($rs = $lang->fetch()){ 
	$arr = array_merge($rs,$cat_ln[$rs['ln']]?$cat_ln[$rs['ln']]:array());
	$tpl->assign($arr,'language');
}



$cat = $oClass->get($_GET['id']);
$tpl->assign($cat->fetch());
$request['display_update'] = 'style="display: block;"';
$breadcrumb->reset();
if(!$_SESSION['cms_menu']) $_SESSION['cms_menu'] = '0.0';
if($_GET['menu']){
	$_SESSION['cms_menu'] = $_GET['menu'];
}
$menu = explode('.',$_SESSION['cms_menu']);
$breadcrumb->assign("",$MenuName[$menu[0]]);
$level = $MenuLink[$menu[0]][$menu[1]];
$breadcrumb->assign($level['link'],$level['name']);

$result = $dao->gallery($system->module,$request['id']);
while($rs = $result->fetch()){
	$rs['name'] = $rs['name']?$rs['name'].'<br />':'';
	$tpl->assign($rs,'gallery');
}


$request['breadcrumb'] = $breadcrumb->parse();
$request['size_icon'] =demension_size($cfg_type['main_icon']['w'],$cfg_type['main_icon']['']);
$request['size_image'] = demension_size($cfg_type['main_img']['w'],$cfg_type['main_img']['']);
$request['size_gallery'] =demension_size($cfg_type['gallery_img']['w'],$cfg_type['gallery_img']['']);

$tpl->assign($request);


$show = array();
if($show_fields) foreach($show_fields as $field){
	$a = explode(':',$field);
	$show['display_'.$a[0]] = 'style="display: '.($a[1]?$a[1]:'table-row').';"';
	$show['is_'.$a[0]] = 1;
}
$tpl->assign($show);


?>