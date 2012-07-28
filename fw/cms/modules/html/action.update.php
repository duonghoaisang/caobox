<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$fields = $oMaster->fields('html');
$ln_fields = $oMaster->fields('html_ln');

$error = NULL;
if($_POST){
	//print_r($_POST); print_r($_FILES);exit();
	//foreach($required_fields as $v) if(!$_POST[$v])
	// update main
	

	if(in_array('image',$show_actions)){ // use image
		if($cfg_type['main_icon']['chose']){
			$icon = upload('icon',_UPLOAD,time(),$image_exts);
			if(!is_array($icon)){
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
			}else{
				$error .= $icon['msg'].'<br />';
			}
		}
		
		
		if($cfg_type['main_img']['chose']){
			$image = upload('image',_UPLOAD,time(),$image_exts);//,$image_exts
			if(!is_array($image)){
				if ($_POST['delete_image'] || (!empty($image) && trim($_POST['current_image']) != "")){
					@unlink(_UPLOAD.$_POST['current_image']);
					@unlink(_UPLOAD.'thumb/'.$_POST['current_image']);
					@unlink(_UPLOAD.'orginal/'.$_POST['current_image']);
					if($_POST['delete_image']) $_POST['current_image'] = "";
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
			/*'web_keyword'=>$_POST['web_keyword'],*/
		);
		foreach($cfg_type['main_fields'] as $code=>$info) if($info['chose'] && in_array($code,$fields)){
			$arr[$code] = $_POST[$code];
			
		}
		$arr['icon'] = $_POST['icon'];
		$arr['image'] = $_POST['image'];
		$arr['date'] = $_POST['date'];
		$arr['web_keyword'] = $_POST['web_keyword'];
		$arr['web_desc'] = $_POST['web_desc'];
		$arr['file_extra'] = serialize($file_extra);
		$arr['fields_extra'] = serialize($_POST['fields_extra']);
		$oClass->update($request['id'],$arr);
		
		$lastid = $request['id'];
		
		//die('----update success---');
	}
	
	// update options
	if(count($_POST['options'])) foreach($_POST['options'] as $options_type=>$options_array){
		$oContent->deleteOpt($lastid,'html',$options_type);
		foreach($options_array as $options_id) if($options_id){
			$opts = array(
				'page'=>'html',
				'content_id'=>intval($lastid),
				'options_id'=>$options_id,
				'options_type'=>$options_type,
			);
			$oContent->insertOpt($opts);
		}
	}
	
	//print_r($required_fields);exit();
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
					$ln_icon = upload('ln_icon',_UPLOAD,time(),$image_exts,$ln);
					if(!is_array($ln_icon)){
						if ($_POST['delete_ln_icon'][$ln] || (!empty($icon) && trim($_POST['current_ln_icon'][$ln]) != "")){
							@unlink(_UPLOAD.$_POST['current_ln_icon'][$ln]);
							@unlink(_UPLOAD.'orginal/'.$_POST['current_ln_icon'][$ln]);
							if($_POST['delete_ln_icon'][$ln]) $_POST['current_ln_icon'][$ln] = "";
						}
						
						if($ln_icon){
							$oImg = new image(_UPLOAD.$ln_icon);
							if($cfg_type['ln_main_icon']['orginal']) @copy(_UPLOAD.$ln_icon,_UPLOAD.'orginal/'.$ln_icon);
							$force_resize = $cfg_type['ln_main_icon']['force_resize']=='true'?true:false;
							$specify = $cfg_type['ln_main_icon']['specify'];
							$oImg->resize($cfg_type['ln_main_icon']['w'],$cfg_type['ln_main_icon']['h'],_UPLOAD.$ln_icon,$force_resize,$specify);
						}
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
							if($_POST['delete_ln_image'][$ln]) $_POST['current_ln_image'][$ln] = "";
						}
						if($ln_image){
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
						}
						$_POST['ln_image'][$ln] = empty($ln_image)?$_POST['current_ln_image'][$ln]:$ln_image;
					}else{
						$error .= $ln_image['msg'].'<br />';
					}
				}
			}
			$arr_ln['ln_icon'] = $_POST['ln_icon'][$ln];
			$arr_ln['ln_image'] = $_POST['ln_image'][$ln];
			$arr_ln['ln_fields_extra'] = serialize($_POST['ln_fields_extra'][$ln]);
			$oClass->update_ln($request['id'],$ln,$arr_ln);
		}
	}
	if(in_array('gallery',$show_actions)) foreach($_FILES as $key=>$a){
		if(substr($key,0,13)=='image_gallery'){
			
			if($cfg_type['gallery_icon']['chose']){
				$icon = upload(str_replace('image_','icon_',$key),_UPLOAD,time(),$image_exts);
				if(!is_array($icon)){
					$oImg = new image(_UPLOAD.$icon);
					if($cfg_type['gallery_icon']['orginal']) @copy(_UPLOAD.$icon,_UPLOAD.'orginal/'.$icon);
					$force_resize = $cfg_type['gallery_icon']['force_resize']=='true'?true:false;
					$specify = $cfg_type['gallery_icon']['specify'];
					$oImg->resize($cfg_type['gallery_icon']['w'],$cfg_type['gallery_icon']['h'],_UPLOAD.$icon,$force_resize,$specify);
				}else{
					$error .= $icon['msg'].'<br />';
				}
			}
			
			if($cfg_type['gallery_img']['chose']){
				$img = upload($key,_UPLOAD,time(),$image_exts);
				if(!is_array($img)){
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
				}else{
					$error .= $img['msg'] .'<br />';
				}
			}
			
			if(!$error){
				$name = $_POST[str_replace('image_','name_',$key)];
				if($img){
					$data = array(
						'name'=>$name,
						'icon'=>$icon,
						'image'=>$img,
					);
					$oGallery->insert($system->module,$request['id'],$data);
				}
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
		clear_sql_cache();
		$_SESSION['updated'] = true;
		//$hook->redirect('?'.http_build_query($_GET,NULL,'&'));
	}else{
		$request['msg'] = $error;
	}
}

$tpl->setfile(array(
	'body'=>$cfg_type['tpl_update']?$cfg_type['tpl_update']:'html.update.tpl',
));


if($_SESSION['updated']){
	$request['msg'] = $languages['data_updated'];
	unset($_SESSION['updated']);
}

$lang_cond = "active = 1";
$lang_cond .= $cfg_type['languages']?" AND is_default=1":"";
$lang = $oLanguage->view($lang_cond);
if(!$lang->num_rows()){
	$request['msg'] = $languages['require_least_language_enable'];
	$request['hide_no_languages'] = 'hide';
}



$cat_ln = $oClass->get_ln($_GET['id']);
while($rs = $lang->fetch()){ 
	$arr = array_merge($rs,$cat_ln[$rs['ln']]?$cat_ln[$rs['ln']]:array());
	$ln_fields_extra = unserialize($arr['ln_fields_extra']);
	$arr = $hook->format($arr);
	$str_ln_fields = array();
	$required_ln_fields = array();
	foreach($cfg_type['ln_fields'] as $code=>$info){
		if($info['chose'] && in_array($code,$ln_fields)){
			$tmp = '<tr>
      <td class="textLabel">'.$info['name'].' '.$arr['ln_alias'].($info['require']?'<span class="red">*</span>':'').'</td>
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
	$str = '';
	if($cfg_type['ln_fields_extra']['name']){
		foreach($cfg_type['ln_fields_extra']['name'] as $k=>$name) if($name){
			$str .= '<tr>
				<td class="textLabel">'.$name.' '.$arr['ln_alias'].'</td>
				<td>'.html_input($cfg_type['ln_fields_extra']['type'][$k],'ln_fields_extra['.$arr['ln'].']['.$cfg_type['ln_fields_extra']['code'][$k].']',$ln_fields_extra[$cfg_type['ln_fields_extra']['code'][$k]],' class="w100pc"').'</td>
			</tr>';
			
		}
	}
	
	$arr['ln_fields_extra'] = $str;
	$tpl->assign($arr,'language');
}



$cat = $oClass->get($request['id']);
if(!$cat->num_rows()){
	$request['msg'] = $languages['require_html_record'];
	$request['hide_no_html_record'] = 'hide';
}
$data = $cat->fetch();
$required_fields = array();
$str_main_fields = array();
foreach($cfg_type['main_fields'] as $code=>$info){
	if($info['chose'] && $info['type'] != 'status' && in_array($code,$fields)){
		$tmp = '<tr>
  <td class="textLabel">'.$info['name'].' '.$arr['ln_alias'].($info['require']?'<span class="red">*</span>':'').'</td>
  <td>'.html_input($info['type'],$code,$data[$code],' class="w100pc" title="'.$info['require_msg'].'"').'
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

$file_extra = $data['file_extra']?unserialize($data['file_extra']):array();
$fields_extra = $data['fields_extra']?unserialize($data['fields_extra']):array();
//print_r($file_extra);exit();

$data  = $hook->format($data);
//$data['date'] = date('Y-m-d',strtotime($data['timestamp']));
$tpl->assign($data);
$request['display_update'] = 'style="display: block;"';

$result = $oGallery->get($system->module,$request['id']);
while($rs = $result->fetch()){
	$rs['name'] = $rs['name']?$rs['name']:'';
	$tpl->assign($rs,'gallery');
}


$request['breadcrumb'] = $breadcrumb->parse();
$request['size_icon'] =demension_size($cfg_type['main_icon']['w'],$cfg_type['main_icon']['h']);
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
$request['field_gallery_name'] = $cfg_type['gallery_name']?$cfg_type['gallery_name']:'Gallery';
if(in_array('drapdrop_gallery',$show_actions))  $tpl->box('drapdrop_gallery');
if(in_array('enable_editor',$cfg_type['act'])) $tpl->box('enable_editor');


$show = array();
if($show_fields) foreach($show_fields as $field){
	$a = explode(':',$field);
	$show['display_'.$a[0]] = 'show';// 'style="display: '.($a[1]?$a[1]:$table_row).';"';
	$show['is_'.$a[0]] = 1;
}
$tpl->assign($show);
$action = array();
foreach($show_actions as $act) $action['action_'.$act] = 'show';//'style="display: '.$table_row.';"';
$tpl->assign($action);


// Load options
$attributes = array();
//if($request['do'] != 'new'){
	$result = $oContent->options($request['typeid']);
	while($rs = $result->fetch()){
		$attributes[$rs['options_type']][] = $rs['options_id'];
	}
//}


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
// fields extra
if($cfg_type['fields_extra']['name']){
	foreach($cfg_type['fields_extra']['name'] as $k=>$name) if($name){
		$rs = array();
		$rs['stt'] = $k;
		$rs['name'] = $name;
		$rs['value'] = html_input($cfg_type['fields_extra']['type'][$k],'fields_extra['.$cfg_type['fields_extra']['code'][$k].']',$fields_extra[$cfg_type['fields_extra']['code'][$k]]);
		$tpl->assign($rs,'fields_extra');
		
	}
}


?>