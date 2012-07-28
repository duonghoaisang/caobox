<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$fields = $oMaster->fields('content');
$ln_fields = $oMaster->fields('content_ln');
if($_POST){
	// update main
	//print_r($_POST);exit();
	
	$error = NULL;
	$warning  = NULL;
	if(in_array('image',$show_actions)){ // use image
		if($cfg_type['main_icon']['chose']){
			$icon = upload('icon',_UPLOAD,time().'-',$image_exts);
			if ($_POST['delete_icon'] || (!empty($icon) && trim($_POST['current_icon']) != "")){
				@unlink(_UPLOAD.$_POST['current_icon']);
				@unlink(_UPLOAD.'orginal/'.$_POST['current_icon']);
				if($_POST['delete_icon']) $_POST['current_icon'] = "";
			}
			
			if(is_array($icon)){
				$error .= $icon['msg'].'<br />';
			}
			if($icon){
				$oImg = new image(_UPLOAD.$icon);
				if($cfg_type['main_icon']['orginal']) @copy(_UPLOAD.$icon,_UPLOAD.'orginal/'.$icon);
				$force_resize = $cfg_type['main_icon']['force_resize']=='true'?true:false;
				$specify = $cfg_type['main_icon']['specify'];
				$oImg->resize($cfg_type['main_icon']['w'],$cfg_type['main_icon']['h'],_UPLOAD.$icon,$force_resize,$specify);
			}
			$_POST['icon'] = empty($icon)?$_POST['current_icon']:$icon;
		}
		
		
		if($cfg_type['main_img']['chose']){
			$image = upload('image',_UPLOAD,time().'-',$image_exts);
			if ($_POST['delete_image'] || (!empty($image) && trim($_POST['current_image']) != "")){
				@unlink(_UPLOAD.$_POST['current_image']);
				@unlink(_UPLOAD.'thumb/'.$_POST['current_image']);
				@unlink(_UPLOAD.'orginal/'.$_POST['current_image']);
				if($_POST['delete_image']) $_POST['current_image'] = "";
			}
			if(is_array($image)){
				$error .= $image['msg'].'<br />';
			}
			if($image){
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
			}
			$_POST['image'] = empty($image)?$_POST['current_image']:$image;
		}
	}
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
			/*'code'=>$_POST['code'],*/
		);
		
		
		foreach($cfg_type['main_fields'] as $code=>$info) if($info['chose'] && in_array($code,$fields)){
			$arr[$code] = $_POST[$code];
			
		}
		
		/// No modify
		$arr['icon'] = $_POST['icon'];
		$arr['image'] = $_POST['image'];
		$arr['date'] = $_POST['date'];
		$arr['file_extra'] = serialize($file_extra);
		$arr['fields_extra'] = serialize($_POST['fields_extra']);
		if($request['do']=='new'){
			$arr['catid'] = $request['parentid'];
			$arr['type'] = $request['type'];
			$arr['userid'] = intval($_SESSION['admin_login']['id']);
			$lastid = $oClass->insert($arr);
		}else{
			$oClass->update($request['id'],$arr);
			$lastid = $request['id'];
		}
		
		// update options
		if(count($_POST['options'])) foreach($_POST['options'] as $options_type=>$options_array){
			$oContent->deleteOpt($lastid,'content',$options_type);
			foreach($options_array as $options_id) if($options_id){
				$opts = array(
					'page'=>'content',
					'content_id'=>intval($lastid),
					'options_id'=>$options_id,
					'options_type'=>$options_type,
				);
				$oContent->insertOpt($opts);
			}
		}
		// update _ln
		$ln_req = $cfg_type['required_fields']?explode(',',$cfg_type['required_fields']):array('name');
		
		if(!$cfg_type['required_fields'] || $_POST[$ln_req[0]]) foreach($_POST[$ln_req[0]] as $ln=>$val){
			if(!$cfg_type['required_fields'] || $val){
				$arr_ln  = array(
					//'name'=>$_POST['name'][$ln],
				);

				foreach($cfg_type['ln_fields'] as $code=>$info) if($info['chose'] && in_array($code,$ln_fields)){
					$arr_ln[$code] = $_POST[$code][$ln];
				}
				
				if(in_array('ln_image',$show_actions)){ // use image
				
					if($cfg_type['ln_main_icon']['chose']){
						$ln_icon = upload('ln_icon',_UPLOAD,time().'-',$image_exts,$ln);
						if ($_POST['delete_ln_icon'][$ln] || (!empty($icon) && trim($_POST['current_ln_icon'][$ln]) != "")){
							@unlink(_UPLOAD.$_POST['current_ln_icon'][$ln]);
							@unlink(_UPLOAD.'orginal/'.$_POST['current_ln_icon'][$ln]);
							if($_POST['delete_ln_icon'][$ln]) $_POST['current_ln_icon'][$ln] = "";
						}
						if(is_array($ln_icon)){
							$error .= $ln_icon['msg'].'<br />';
						}
						if($ln_icon){
							$oImg = new image(_UPLOAD.$ln_icon);
							if($cfg_type['ln_main_icon']['orginal']) @copy(_UPLOAD.$ln_icon,_UPLOAD.'orginal/'.$ln_icon);
							$force_resize = $cfg_type['ln_main_icon']['force_resize']=='true'?true:false;
							$specify = $cfg_type['ln_main_icon']['specify'];
							$oImg->resize($cfg_type['ln_main_icon']['w'],$cfg_type['ln_main_icon']['h'],_UPLOAD.$ln_icon,$force_resize,$specify);
						}
						$_POST['ln_icon'][$ln] = empty($ln_icon)?$_POST['current_ln_icon'][$ln]:$ln_icon;
					}
					
					
					
					if($cfg_type['ln_main_img']['chose']){
						$ln_image = upload('ln_image',_UPLOAD,time().'-',$image_exts,$ln);
						if ($_POST['delete_ln_image'][$ln] || (!empty($ln_image) && trim($_POST['current_ln_image'][$ln]) != "")){
							@unlink(_UPLOAD.$_POST['current_ln_image'][$ln]);
							@unlink(_UPLOAD.'thumb/'.$_POST['current_ln_image'][$ln]);
							@unlink(_UPLOAD.'orginal/'.$_POST['current_ln_image'][$ln]);
							if($_POST['delete_ln_image'][$ln]) $_POST['current_ln_image'][$ln] = "";
						}
						if(is_array($ln_image)){
							$error .= $image['msg'].'<br />';
						}
						if($ln_image){
							$oImg = new image(_UPLOAD.$ln_image);
							if($cfg_type['ln_main_thumb']['chose']){
								$force_resize = $cfg_type['ln_main_img']['force_resize']=='true'?true:false;
								$specify = $cfg_type['ln_main_img']['specify'];
								$oImg->resize($cfg_type['ln_main_thumb']['w'],$cfg_type['ln_main_thumb']['h'],_UPLOAD.'thumb/'.$ln_image,$force_resize,$specify);
							}
							if($cfg_type['ln_main_img']['orginal']) @copy(_UPLOAD.$ln_image,_UPLOAD.'orginal/'.$ln_image);
							$force_resize = $cfg_type['ln_main_img']['force_resize']=='true'?true:false;
							$specify = $cfg_type['ln_main_img']['specify'];
							$oImg->resize($cfg_type['ln_main_img']['w'],$cfg_type['ln_main_img']['h'],_UPLOAD.$ln_image,$force_resize,$specify);
						}
						$_POST['ln_image'][$ln] = empty($ln_image)?$_POST['current_ln_image'][$ln]:$ln_image;
					}
				}
				
				$arr_ln['ln_icon'] = $_POST['ln_icon'][$ln];
				$arr_ln['ln_image'] = $_POST['ln_image'][$ln];
				$arr_ln['ln_fields_extra'] = serialize($_POST['ln_fields_extra'][$ln]);
				if(!$error) 	$oClass->update_ln($lastid,$ln,$arr_ln);
			}
		}
		
	
		// gallery 
		
		
		if(in_array('gallery',$show_actions)) foreach($_FILES as $key=>$a){
			if(substr($key,0,13)=='image_gallery'){
				
				if($cfg_type['gallery_icon']['chose']){
					$icon = upload(str_replace('image_','icon_',$key),_UPLOAD,time().'-');
					if($icon){
						$oImg = new image(_UPLOAD.$icon);
						if($cfg_type['gallery_icon']['orginal']) @copy(_UPLOAD.$icon,_UPLOAD.'orginal/'.$icon);
						$force_resize = $cfg_type['gallery_icon']['force_resize']=='true'?true:false;
						$specify = $cfg_type['gallery_icon']['specify'];
						$oImg->resize($cfg_type['gallery_icon']['w'],$cfg_type['gallery_icon']['h'],_UPLOAD.$icon,$force_resize,$specify);
					}
				}
				
				if($cfg_type['gallery_img']['chose']){
					$img = upload($key,_UPLOAD,time().'-');
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
			if($warning) $result['msg'] = $warning;
			$hook->redirect('?'.http_build_query($result,NULL,'&'));
		}

	}
}


$tpl->setfile(array(
	'body'=>$cfg_type['tpl_update']?$cfg_type['tpl_update']:'content.update.tpl',
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
	foreach($cfg_type['main_fields'] as $code=>$info) if($info['chose'] && $info['type'] == 'status'){
		$content[$code] = $info['status_default'];
	}
}else{
	$cat_ln = $oClass->get_ln($_GET['id']);
	$result = $oClass->get($request['id']);
	$content = $result->fetch();
	$file_extra = $content['file_extra']?unserialize($content['file_extra']):array();
	$fields_extra = $content['fields_extra']?unserialize($content['fields_extra']):array();
	$tpl->assign($hook->format($content));
	$breadcrumb->assign("","Edit",$request['bread']);
	$request['display_update'] = 'show';
	$request['access_action'] = 'access_edit';
	//if(!$request['date']) $request['date'] = date('Y-m-d');
}

$required_fields = array();
$str_main_fields = array();
foreach($cfg_type['main_fields'] as $code=>$info){
	if($info['chose'] && $info['type'] != 'status' && in_array($code,$fields)){
		$tmp = '<tr>
  <td class="textLabel"><label for="input_'.$code.'">'.$info['name'].' '.$arr['ln_alias'].'</label></td>
  <td>'.html_input($info['type'],$code,$content[$code],' id="input_'.$code.'" class="w100pc" title="'.$info['require_msg'].'"').'
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
	
	
	$ln_fields_extra = unserialize($arr['ln_fields_extra']);
	$arr = $hook->format($arr);
	$str_ln_fields = array();
	$required_ln_fields = array();
	foreach($cfg_type['ln_fields'] as $code=>$info){
		if($info['chose'] && in_array($code,$ln_fields)){
			$tmp  = '<tr>
      <td class="textLabel"><label for="'.$code.$arr['ln'].'">'.$info['name'].' '.$arr['ln_alias'].'</label></td>
      <td>'.html_input($info['type'],$code.'['.$arr['ln'].']',$arr[$code],' id="'.$code.$arr['ln'].'" class="w100pc"  title="'.$info['require_msg'].'"').'
	  	<span class="description">'.$info['description'].'</span>
	  </td>
    </tr>';
			if($str_ln_fields[$info['sortorder']]) $str_ln_fields[$info['sortorder']] .= $tmp;
			else $str_ln_fields[$info['sortorder']] = $tmp;
			if($info['require'])  $required_ln_fields[] = $code; 
		
		}
	}
	$arr['ln_fields'] = '';
	ksort($str_ln_fields);
	foreach($str_ln_fields as $v){
		$arr['ln_fields'] .= $v;
	}
	$arr['default_ln'] = $cfg['language_tab'] == 'tab'?($arr['is_default']?'active':'hide'):'';
	$arr['tab_default'] = $arr['is_default']?'class="active"':'';
	$str = '';
	if($cfg_type['ln_fields_extra']['name']){
		foreach($cfg_type['ln_fields_extra']['name'] as $k=>$name) if($name){
			$code = $cfg_type['ln_fields_extra']['code'][$k]?$cfg_type['ln_fields_extra']['code'][$k]:$k;
			$str .= '<tr>
				<td class="textLabel">'.$name.' '.$arr['ln_alias'].'</td>
				<td>'.html_input($cfg_type['ln_fields_extra']['type'][$k],'ln_fields_extra['.$arr['ln'].']['.$code.']',$ln_fields_extra[$code],'  class="w100pc" ').'</td>
			</tr>';
			
		}
	}
	
	$arr['ln_fields_extra'] = $str;
	
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
$request['field_gallery_name'] = $cfg_type['gallery_name']?$cfg_type['gallery_name']:'Gallery';
$request['required_fields'] = count($required_fields)?"'".implode("','",$required_fields)."'":'';
$request['required_ln_fields'] = count($required_ln_fields)?"'".implode("','",$required_ln_fields)."'":'';
if(in_array('drapdrop_gallery',$show_actions))  $tpl->box('drapdrop_gallery');
if(in_array('enable_editor',$cfg_type['act'])) $tpl->box('enable_editor');

$request['msg'] = $error;
$show = array();
if($show_fields) foreach($show_fields as $field){
	//$a = explode(':',$field);
	$show['display_'.$field] = 'show';
	$show['is_'.$field] = 1;
}
$tpl->assign($show);
$action = array();
foreach($show_actions as $act) $action['action_'.$act] = 'show';
$tpl->assign($action);


// Load options
$attributes = array();
if($request['do'] != 'new'){
	$result = $oContent->options($request['id']);
	while($rs = $result->fetch()){
		$attributes[$rs['options_type']][] = $rs['options_id'];
	}
}


if(count($cfg_type['options'])){
	$opt_type = $oConfigure->getMod("`module` = 'options' AND typeid IN(".implode(',',$cfg_type['options']).")");
	while($rs = $opt_type->fetch()){
		$result = $oOption->view($rs['typeid']);
		if($cfg_type['options_type'][$rs['typeid']] == 2) $aOpt = array(0=>'--');
		else $aOpt = array();
		while($opt = $result->fetch()){
			$aOpt[$opt['id']] = $opt['name'];
		}
		switch($cfg_type['options_type'][$rs['typeid']]){
			case '1':
				$rs['values'] = '<div id="opt'.$rs['typeid'].'" >'.options_checkbox($aOpt,$rs['typeid'],$attributes[$rs['typeid']]).'</div>';
				$rs['js_string'] = "<input checked=\'checked\' type=\'checkbox\' name=\'options[".$rs['typeid']."][]\' value=\'%value\' />%label";
				break;
			case '2': 
				$rs['values'] = options_dropdown($aOpt,$rs['typeid'],$attributes[$rs['typeid']],' id="opt'.$rs['typeid'].'" ');
				$rs['js_string'] = "<option selected=\'selected\' name=\'options[".$rs['typeid']."][]\' value=\'%value\'>%label</option>";
				break;
			case '3':
				$rs['values'] = options_dropdown($aOpt,$rs['typeid'],$attributes[$rs['typeid']],'  id="opt'.$rs['typeid'].'"  size="5" multiple="multiple"');
				$rs['js_string'] = "<option selected=\'selected\' name=\'options[".$rs['typeid']."][]\' value=\'%value\'>%label</option>";
				break;
			default: //0
				$rs['values'] = '<div id="opt'.$rs['typeid'].'" >'.options_radio($aOpt,$rs['typeid'],$attributes[$rs['typeid']]).'</div>';
				$rs['js_string'] = "<input type=\'radio\' name=\'options[".$rs['typeid']."][]\' value=\'%value\'  checked=\'checked\' />%label";
				break;
		}
		
		$tpl->assign($rs,'options');
	}
}
// file extra
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

foreach($cfg_type['main_fields'] as $code=>$info) if($info['chose'] && $info['type'] == 'status'){
	$rs = array();
	$rs['name'] = $info['name'];
	$rs['code'] = $code;
	$rs['note'] = $info['description'];
	$rs['value'] = html_status($code,$content[$code]);
	$tpl->assign($rs,'status_fields');
}

// fields extra
if($cfg_type['fields_extra']['name']){
	foreach($cfg_type['fields_extra']['name'] as $k=>$name) if($name){
		$rs = array();
		$rs['stt'] = $k;
		$rs['name'] = $name;
		$code = $cfg_type['fields_extra']['code'][$k]?$cfg_type['fields_extra']['code'][$k]:$k;
		$rs['value'] = html_input($cfg_type['fields_extra']['type'][$k],'fields_extra['.$code.']',$fields_extra[$code]);
		$tpl->assign($rs,'fields_extra');
	}
}

if($request['parentid']) $tpl->box('breadcrumb_cat');
$tpl->assign($request);

?>