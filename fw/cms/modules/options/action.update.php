<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$fields = $oMaster->fields('options');
$ln_fields = $oMaster->fields('options_ln');

if($_POST){
	if($_POST['savequick']){
		$arr = array();
		$arr['type'] = $_POST['typeid'];
		$lastid = $oClass->insert($arr);
		if($lastid){
			$arr_ln = array();
			$arr_ln['name'] = $_POST['name'];
			$oClass->update_ln($lastid,$_POST['lang'],$arr_ln);
			die("$lastid");
		}
		die("0");
	}
	// update main
	//print_r($cfg_type);exit();
	$error = NULL;
	if(in_array('image',$show_actions)){ // use image
		if($cfg_type['main_icon']['chose']){
			$icon = upload('icon',_UPLOAD,time(),$image_exts);
			if(!is_array($icon)){
				if ($_POST['delete_icon'] || (!empty($icon) && trim($_POST['current_icon']) != "")){
					@unlink(_UPLOAD.$_POST['current_icon']);
					@unlink(_UPLOAD.'orginal/'.$_POST['current_icon']);
					if($_POST['delete_icon']) $_POST['current_icon'] = "";
				}
			
			
				$oImg = new image(_UPLOAD.$icon);
				if($cfg_type['main_icon']['orginal']) @copy(_UPLOAD.$icon,_UPLOAD.'orginal/'.$icon);
				$force_resize = $cfg_type['main_icon']['force_resize']=='true'?true:false;
				$specify = $cfg_type['main_icon']['specify'];
				$oImg->resize($cfg_type['main_icon']['w'],$cfg_type['main_icon']['h'],_UPLOAD.$icon,$force_resize,$specify);
				
				$_POST['icon'] = empty($icon)?$_POST['current_icon']:$icon;
			}else{
				$error .= $icon['msg'].'<br />';
			}
			
		}
		
		
		if($cfg_type['main_img']['chose']){
			$image = upload('image',_UPLOAD,time(),$image_exts);
			if(!is_array($image)){
				if ($_POST['delete_image'] || (!empty($image) && trim($_POST['current_image']) != "")){
					@unlink(_UPLOAD.$_POST['current_image']);
					@unlink(_UPLOAD.'thumb/'.$_POST['current_image']);
					@unlink(_UPLOAD.'orginal/'.$_POST['current_image']);
					if($_POST['delete_image']) $_POST['current_image'] = "";
				}
			
				$oImg = new image(_UPLOAD.$image);
				if($cfg_type['main_thumb']['chose']){
					$force_resize = $cfg_type['main_thumb']['force_resize']=='true'?true:false;
					$specify = $cfg_type['main_thumb']['specify'];
					$oImg->resize($cfg_type['main_thumb']['w'],$cfg_type['main_thumb']['h'],_UPLOAD.'thumb/'.$image,$force_resize,$specify);
				}
				if($cfg_type['main_img']['orginal']) @copy(_UPLOAD.$image,_UPLOAD.'orginal/'.$image);
				$force_resize = $cfg_type['main_img']['force_resize']=='true'?true:false;
				$specify = $cfg_type['main_img']['specify'];
				$oImg->resize($cfg_type['main_img']['w'],$cfg_type['main_img']['h'],_UPLOAD.$image,$force_resize,$specify);
				$_POST['image'] = empty($image)?$_POST['current_image']:$image;
			}else{
				$error .= $image['msg'].'<br />';
			}
			
		}
	}
	
	// file extra
	$file_extra = array();
	if($_POST['file_extra_type']) foreach($_POST['file_extra_type'] as $k=>$ext){
		$file_extra_allow = $ext?explode(',',$ext):NULL;
		$f = upload('file_extra'.$k,_UPLOAD,time(),$file_extra_allow);
		if(!is_array($f)){
			if ($_POST['delete_file_extra'.$k] || (!empty($f) && trim($_POST['current_file_extra'.$k]) != "")){
				@unlink(_UPLOAD.$_POST['current_file_extra'].$k);
				if($_POST['delete_file_extra'.$k]) $_POST['current_file_extra'.$k] = "";
			}
			$key = $_POST['file_extra_code'][$k]?$_POST['file_extra_code'][$k]:$k;
			$file_extra[$key] = empty($f)?$_POST['current_file_extra'.$k]:$f;
		}else{
			$error .= $f['msg'].'<br />'; 
		}
	}
	if(!$error){	
		$arr = array(
			//'icon'=>$_POST['icon'],
		);
		foreach($cfg_type['main_fields'] as $code=>$info) if($info['chose'] && in_array($code,$fields)){
			$arr[$code] = $_POST[$code];
			
		}
		
		$arr['icon'] = $_POST['icon'];
		$arr['image'] = $_POST['image'];
		$arr['date'] = $_POST['date'];
		$arr['file_extra'] = serialize($file_extra);
		
		if($request['do']=='new'){
			$arr['type'] = $request['type'];
			$lastid = $oClass->insert($arr);
		}else{
			$oClass->update($request['id'],$arr);
			$lastid = $request['id'];
		}
		// update _ln
		$ln_req = $cfg_type['required_fields']?explode(',',$cfg_type['required_fields']):array('name');
		
		if(!$cfg_type['required_fields'] || $_POST[$ln_req[0]]) foreach($_POST[$ln_req[0]] as $ln=>$val){
			if(!$cfg_type['required_fields'] || $val){
				$arr_ln  = array(
				);
				foreach($cfg_type['ln_fields'] as $code=>$info) if($info['chose'] && in_array($code,$ln_fields)){
					$arr_ln[$code] = $_POST[$code][$ln];
				}
				
				if(in_array('ln_image',$show_actions)){ // use image
				
					if($cfg_type['ln_main_icon']['chose']){
						$ln_icon = upload('ln_icon',_UPLOAD,time(),$image_exts,$ln);
						if(!is_array($ln_icon)){
							if ($_POST['delete_ln_icon'][$ln] || (!empty($icon) && trim($_POST['current_ln_icon'][$ln]) != "")){
								@unlink(_UPLOAD.$_POST['current_ln_icon'][$ln]);
								@unlink(_UPLOAD.'orginal/'.$_POST['current_ln_icon'][$ln]);
								if($_POST['delete_ln_icon'][$ln]) $_POST['current_ln_icon'][$ln] = "";
							}
						
						
							$oImg = new image(_UPLOAD.$ln_icon);
							if($cfg_type['ln_main_icon']['orginal']) @copy(_UPLOAD.$ln_icon,_UPLOAD.'orginal/'.$ln_icon);
							$force_resize = $cfg_type['ln_main_icon']['force_resize']=='true'?true:false;
							$specify = $cfg_type['ln_main_icon']['specify'];
							$oImg->resize($cfg_type['ln_main_icon']['w'],$cfg_type['ln_main_icon']['h'],_UPLOAD.$ln_icon,$force_resize,$specify);
							$_POST['ln_icon'][$ln] = empty($ln_icon)?$_POST['current_ln_icon'][$ln]:$ln_icon;
						}else{
							$error .= $ln_icon['msg'].'<br />';
						}
						
					}
					
					
					
					if($cfg_type['ln_main_img']['chose']){
						$ln_image = upload('ln_image',_UPLOAD,time(),$image_exts,$ln);
						if(!is_array($ln_image)){
							if ($_POST['delete_ln_image'][$ln] || (!empty($ln_image) && trim($_POST['current_ln_image'][$ln]) != "")){
								@unlink(_UPLOAD.$_POST['current_ln_image'][$ln]);
								@unlink(_UPLOAD.'thumb/'.$_POST['current_ln_image'][$ln]);
								@unlink(_UPLOAD.'orginal/'.$_POST['current_ln_image'][$ln]);
								if($_POST['delete_ln_image'][$ln]) $_POST['current_ln_image'][$ln] = "";
							}
						
							$oImg = new image(_UPLOAD.$ln_image);
							if($cfg_type['ln_main_thumb']['chose']){
								$force_resize = $cfg_type['ln_main_thumb']['force_resize']=='true'?true:false;
								$specify = $cfg_type['ln_main_thumb']['specify'];
								$oImg->resize($cfg_type['ln_main_thumb']['w'],$cfg_type['ln_main_thumb']['h'],_UPLOAD.'thumb/'.$ln_image,$force_resize,$specify);
							}
							if($cfg_type['ln_main_img']['orginal']) @copy(_UPLOAD.$ln_image,_UPLOAD.'orginal/'.$ln_image);
							$force_resize = $cfg_type['ln_main_img']['force_resize']=='true'?true:false;
							$specify = $cfg_type['ln_main_img']['specify'];
							$oImg->resize($cfg_type['ln_main_img']['w'],$cfg_type['ln_main_img']['h'],_UPLOAD.$ln_image,$force_resize,$specify);
						$_POST['ln_image'][$ln] = empty($ln_image)?$_POST['current_ln_image'][$ln]:$ln_image;
						}else{
							$error .= $ln_image['msg'].'<br />';
						}
						
					}
				}
				
				$arr_ln['ln_icon'] = $_POST['ln_icon'][$ln];
				$arr_ln['ln_image'] = $_POST['ln_image'][$ln];
				
				if(!$error) $oClass->update_ln($lastid,$ln,$arr_ln);
			}
		}
		
	
		// gallery 
		
		
		if(in_array('gallery',$show_actions)) foreach($_FILES as $key=>$a){
			if(substr($key,0,13)=='image_gallery'){
				
				if($cfg_type['gallery_icon']['chose']){
					$icon = upload(str_replace('image_','icon_',$key),_UPLOAD,time());
					if($icon){
						$oImg = new image(_UPLOAD.$icon);
						if($cfg_type['gallery_icon']['orginal']) @copy(_UPLOAD.$icon,_UPLOAD.'orginal/'.$icon);
						$force_resize = $cfg_type['gallery_icon']['force_resize']=='true'?true:false;
						$specify = $cfg_type['gallery_icon']['specify'];
						$oImg->resize($cfg_type['gallery_icon']['w'],$cfg_type['gallery_icon']['h'],_UPLOAD.$icon,$force_resize,$specify);
					}
				}
				
				if($cfg_type['gallery_img']['chose']){
					$img = upload($key,_UPLOAD,time());
					if($img){
						$oImg = new image(_UPLOAD.$img);
						if($cfg_type['gallery_thumb']['chose']){
							$force_resize = $cfg_type['gallery_thumb']['force_resize']=='true'?true:false;
							$specify = $cfg_type['gallery_thumb']['specify'];
							$oImg->resize($cfg_type['gallery_thumb']['w'],$cfg_type['gallery_thumb']['h'],_UPLOAD.'thumb/'.$img,$force_resize,$specify);
						}
						if($cfg_type['gallery_img']['orginal']) @copy(_UPLOAD.$img,_UPLOAD.'orginal/'.$img);
						$force_resize = $cfg_type['gallery_img']['force_resize']=='true'?true:false;
						$specify = $cfg_type['gallery_img']['specify'];
						$oImg->resize($cfg_type['gallery_img']['w'],$cfg_type['gallery_img']['h'],_UPLOAD.$img,$force_resize,$specify);
					}
				}
				
				
				$name = $_POST[str_replace('image_','name_',$key)];
				
				if($img){
					$data = array(
						'name'=>$name,
						'icon'=>$icon,
						'image'=>$img,
					);
					$oGallery->insert($system->module,$lastid,$data);
				}
			}
		}
		clear_sql_cache();
		
		// refresh
		if(!$error){
			$query_string = $_SERVER['QUERY_STRING'];
			parse_str($query_string,$result);
			if($_POST['back']){
				unset($result['act'],$result['id'],$result['do']);
			}else{
				$_SESSION['updated'] = true;
			}
			$hook->redirect('?'.http_build_query($result,NULL,'&'));
		}

	}
}


$tpl->setfile(array(
	'body'=>'options.update.tpl',
));

$request['error'] = $error;
if($_SESSION['updated']){
	$request['back_list_0'] = 'selected';
	$request['msg'] = $languages['data_updated'];
	unset($_SESSION['updated']);
}
$content = array();
if($request['do']=='new'){
	$cat_ln = array();
	$breadcrumb->assign("","New");
	$request['access_action'] = 'access_new';
	$request['date'] = date('Y-m-d');
	$file_extra = array();
}else{
	$cat_ln = $oClass->get_ln($_GET['id']);
	$result = $oClass->get($request['id']);
	$content = $result->fetch();
	$file_extra = $content['file_extra']?unserialize($content['file_extra']):array();
	$content['date'] = $cfg_type['enable_date_type']=='date'?substr($content['date'],0,10):$content['date'];
	$tpl->assign($hook->format($content));
	$breadcrumb->assign("","Edit",$request['bread']);
	$request['display_update'] = 'show';
	$request['access_action'] = 'access_edit';
}

$required_fields = array();
$str_main_fields = array();
foreach($cfg_type['main_fields'] as $code=>$info){
	if($info['chose'] && $info['type'] != 'status' && in_array($code,$fields)){
		$tmp = '<tr>
  <td class="textLabel">'.$info['name'].' '.$arr['ln_alias'].'</td>
  <td>'.html_input($info['type'],$code,$content[$code],' class="w100pc" title="'.$info['require_msg'].'"').'
	<span class="description">'.$info['description'].'</span>
  </td>
</tr>';
		if($str_main_fields[$info['sortorder']]) $str_main_fields[$info['sortorder']] .= $tmp;
		else $str_main_fields[$info['sortorder']] = $tmp;
		if($info['require']) $required_fields[] = $code;
	}
}
$request['main_fields'] = '';
ksort($str_main_fields);
foreach($str_main_fields as $v){
	$request['main_fields'] .= $v;
}

$lang_cond = "active = 1";
$lang_cond .= $cfg_type['languages']?" AND is_default=1":"";
$lang = $oLanguage->view($lang_cond);
if(!$lang->num_rows()){
	$request['msg'] = $languages['require_least_language_enable'];
	$request['hide_no_languages'] = 'hide';
}
while($rs = $lang->fetch()){
	$arr = array_merge($rs,$cat_ln[$rs['ln']]?$cat_ln[$rs['ln']]:array());
	$arr = $hook->format($arr);
	$str_ln_fields = array();
	$required_ln_fields = array();
	foreach($cfg_type['ln_fields'] as $code=>$info){
		if($info['chose'] && in_array($code,$ln_fields)){
			$tmp = '<tr>
      <td class="textLabel">'.$info['name'].' '.$arr['ln_alias'].'</td>
      <td>'.html_input($info['type'],$code.'['.$arr['ln'].']',$arr[$code],' class="w100pc" title="'.$info['require_msg'].'"').'
	  	<span class="description">'.$info['description'].'</span>
	  </td>
    </tr>';
			if($str_ln_fields[$info['sortorder']]) $str_ln_fields[$info['sortorder']] .= $tmp;
			else $str_ln_fields[$info['sortorder']] = $tmp;
			if($info['require']) { $required_ln_fields[] = $code; }
		
		}
	}
	$arr['ln_fields'] = '';
	ksort($str_ln_fields);
	foreach($str_ln_fields as $v){
		$arr['ln_fields'] .= $v;
	}
	$arr['default_ln'] = $cfg['language_tab'] == 'tab'?($arr['is_default']?'active':'hide'):'';
	$arr['tab_default'] = $rs['is_default']?'class="active"':'';
	$tpl->assign($arr,'language');
}

// load gallery
$result = $oGallery->get($system->module,$request['id']);
while($rs = $result->fetch()){
	$rs['name'] = $rs['name']?$rs['name'].'<br />':'';
	$tpl->assign($rs,'gallery');
}

$request['breadcrumb'] = $breadcrumb->parse();
$request['size_icon'] = demension_size($cfg_type['main_icon']['w'],$cfg_type['main_icon']['h']);
$request['field_icon'] = $cfg_type['main_icon']['name']?$cfg_type['main_icon']['name']:'Icon';
$request['size_image'] = demension_size($cfg_type['main_img']['w'],$cfg_type['main_img']['h']);
$request['field_image'] = $cfg_type['main_img']['name']?$cfg_type['main_img']['name']:'Image';
$request['size_ln_icon'] = demension_size($cfg_type['ln_main_icon']['w'],$cfg_type['ln_main_icon']['h']);
$request['ln_field_icon'] = $cfg_type['ln_main_icon']['name']?$cfg_type['ln_main_icon']['name']:'Icon';
$request['size_ln_image'] = demension_size($cfg_type['ln_main_img']['w'],$cfg_type['ln_main_img']['h']);
$request['ln_field_image'] = $cfg_type['ln_main_img']['name']?$cfg_type['ln_main_img']['name']:'Image';
$request['size_gallery'] = demension_size($cfg_type['gallery_img']['w'],$cfg_type['gallery_img']['h']);
$request['required_fields'] = count($required_fields)?"'".implode("','",$required_fields)."'":'';
$request['required_ln_fields'] = count($required_ln_fields)?"'".implode("','",$required_ln_fields)."'":'';
$request['msg'] = $error;
$request['enable_date_type'] = $cfg_type['enable_date_type']?$cfg_type['enable_date_type']:'date';
$tpl->assign($request);
$show = array();
if($show_fields) foreach($show_fields as $field){
	$a = explode(':',$field);
	$show['display_'.$a[0]] = 'show';
	$show['is_'.$a[0]] = 1;
}
$tpl->assign($show);

// file extra
//print_r($file_extra);
//print_r($cfg_type['file_extra']);exit();

if($cfg_type['file_extra']['name']){
	foreach($cfg_type['file_extra']['name'] as $k=>$name) if($name){
		$rs = array();
		$rs['stt'] = $k;
		$rs['name'] = $name;
		$rs['code'] = $cfg_type['file_extra']['code'][$k]?$cfg_type['file_extra']['code'][$k]:$k;
		$rs['file'] = $file_extra[$rs['code']];
		$rs['type'] = $cfg_type['file_extra']['type'][$k];
		$rs['note'] = $cfg_type['file_extra']['note'][$k];
		$tpl->assign($rs,'file_extra');
		
	}
}

?>