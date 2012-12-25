<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$fields = $oMaster->fields('category');
$ln_fields = $oMaster->fields('category_ln');
$error = NULL;
if($_POST){
	// update main
	if(in_array('catimg',$show_actions)){ // use image
		if($cfg_type['catimg_icon']['chose']){
			$icon = upload('icon',_UPLOAD,time().'-',$image_exts);
			if(!is_array($icon)){
				if ($_POST['delete_icon'] || (!empty($icon) && trim($_POST['current_icon']) != "")){
					@unlink(_UPLOAD.$_POST['current_icon']);
					@unlink(_UPLOAD.'orginal/'.$_POST['current_icon']);
					if($_POST['delete_icon']) $_POST['current_icon'] = "";
				}
			
			
				$oImg = new image(_UPLOAD.$icon);
				if($cfg_type['catimg_icon']['orginal']) @copy(_UPLOAD.$icon,_UPLOAD.'orginal/'.$icon);
				$force_resize = $cfg_type['catimg_icon']['force_resize']=='true'?true:false;
				$specify = $cfg_type['catimg_icon']['specify'];
				$oImg->resize($cfg_type['catimg_icon']['w'],$cfg_type['catimg_icon']['h'],_UPLOAD.$icon,$force_resize,$specify);
				$_POST['icon'] = empty($icon)?$_POST['current_icon']:$icon;
			}else{
				$error .= $icon['msg'].'<br />';
			}
			
		}
		
		
		
		if($cfg_type['catimg_img']['chose']){
			$image = upload('image',_UPLOAD,time().'-',$image_exts);
			if(!is_array($image)){
				if ($_POST['delete_image'] || (!empty($image) && trim($_POST['current_image']) != "")){
					@unlink(_UPLOAD.$_POST['current_image']);
					@unlink(_UPLOAD.'thumb/'.$_POST['current_image']);
					@unlink(_UPLOAD.'orginal/'.$_POST['current_image']);
					if($_POST['delete_image']) $_POST['current_image'] = "";
				}
			
				$oImg = new image(_UPLOAD.$image);
				if($cfg_type['catimg_thumb']['chose']){
					$force_resize = $cfg_type['catimg_thumb']['force_resize']=='true'?true:false;
					$specify = $cfg_type['catimg_thumb']['specify'];
					$oImg->resize($cfg_type['catimg_thumb']['w'],$cfg_type['catimg_thumb']['h'],_UPLOAD.'thumb/'.$image,$force_resize,$specify);
				}
				if($cfg_type['catimg_img']['orginal']) @copy(_UPLOAD.$image,_UPLOAD.'orginal/'.$image);
				$force_resize = $cfg_type['catimg_img']['force_resize']=='true'?true:false;
				$specify = $cfg_type['catimg_img']['specify'];
				$oImg->resize($cfg_type['catimg_img']['w'],$cfg_type['catimg_img']['h'],_UPLOAD.$image,$force_resize,$specify);

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
		
		foreach($cfg_type['cat_fields'] as $code=>$info) if($info['chose'] && in_array($code,$fields)){
			$arr[$code] = $_POST[$code];
		}
		$arr['draft'] = 0;
		$arr['icon'] = $_POST['icon'];
		$arr['image'] = $_POST['image'];
		$arr['date'] = $_POST['date'];	
		$arr['file_extra'] = serialize($file_extra);
		
		if($request['do']=='new'){
			$do = 'new';
		}else{
			$do = 'update';
		}
		if($_POST['btn_preview']){ // click preview
			
			if($_POST['draft_id']){
				$do = 'update';
				$request['id'] = $_POST['draft_id'];
			}else{
				$do = 'new';
				
			}
			if($request['id']){
				$arr['draft'] = $request['id'];
			}else{
				$arr['draft'] = -1;
			}
			
			
		}else{ // click save
			if($_POST['draft_id'] > 0){
				if($request['id']){
					$do = 'update';
				}else{
					$do = 'new';
				}
				if(!$_POST['draft']) $oClass->delete($_POST['draft_id']);
			}else{
				if($request['id']){
					$do = 'update';
				}else{
					$do = 'new';
				}
			}
		}
		
		if($do == 'new'){
			$arr['parentid'] = $request['parentid'];
			$arr['type'] = $request['type'];
			$lastid = $oClass->insert($arr);
		}else{
			$oClass->update($_GET['id'],$arr);
			$lastid = $request['id'];
			
		}
	
	}
	// update options
	if(count($_POST['options'])) foreach($_POST['options'] as $options_type=>$options_array){
		$oContent->deleteOpt($lastid,'category',$options_type);
		foreach($options_array as $options_id) if($options_id){
			$opts = array(
				'page'=>'category',
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
			
			foreach($cfg_type['ln_catfields'] as $code=>$info) if($info['chose'] && in_array($code,$ln_fields)){
				$arr_ln[$code] = $_POST[$code][$ln];
			}
			
			if(in_array('ln_catimg',$show_actions)){ // use image
				if($cfg_type['ln_catimg_icon']['chose']){
					$ln_icon = upload('ln_icon',_UPLOAD,time().'-',$image_exts,$ln);
					
					if(!is_array($ln_icon)){
						if ($_POST['delete_ln_icon'][$ln] || (!empty($icon) && trim($_POST['current_ln_icon'][$ln]) != "")){
							@unlink(_UPLOAD.$_POST['current_ln_icon'][$ln]);
							@unlink(_UPLOAD.'orginal/'.$_POST['current_ln_icon'][$ln]);
							if($_POST['delete_ln_icon'][$ln]) $_POST['current_ln_icon'][$ln] = "";
						}
					
					
						$oImg = new image(_UPLOAD.$ln_icon);
						if($cfg_type['ln_catimg_icon']['orginal']) @copy(_UPLOAD.$ln_icon,_UPLOAD.'orginal/'.$ln_icon);
						$force_resize = $cfg_type['ln_catimg_icon']['force_resize']=='true'?true:false;
						$specify = $cfg_type['ln_catimg_icon']['specify'];
						$oImg->resize($cfg_type['ln_catimg_icon']['w'],$cfg_type['ln_catimg_icon']['h'],_UPLOAD.$ln_icon,$force_resize,$specify);
						$_POST['ln_icon'][$ln] = empty($ln_icon)?$_POST['current_ln_icon'][$ln]:$ln_icon;
					}else{
						$error .= $ln_icon['msg'].'<br />';
					}
					
				}
				
				
				
				if($cfg_type['ln_catimg_img']['chose']){
					$ln_image = upload('ln_image',_UPLOAD,time().'-',$image_exts,$ln);
					
					if(!is_array($ln_image)){
						if ($_POST['delete_ln_image'][$ln] || (!empty($ln_image) && trim($_POST['current_ln_image'][$ln]) != "")){
							@unlink(_UPLOAD.$_POST['current_ln_image'][$ln]);
							@unlink(_UPLOAD.'thumb/'.$_POST['current_ln_image'][$ln]);
							@unlink(_UPLOAD.'orginal/'.$_POST['current_ln_image'][$ln]);
							if($_POST['delete_ln_image'][$ln]) $_POST['current_ln_image'][$ln] = "";
						}
					
						$oImg = new image(_UPLOAD.$ln_image);
						if($cfg_type['ln_catimg_thumb']['chose']){
							$force_resize = $cfg_type['ln_catimg_thumb']['force_resize']=='true'?true:false;
							$specify = $cfg_type['ln_catimg_thumb']['specify'];
							$oImg->resize($cfg_type['ln_catimg_thumb']['w'],$cfg_type['ln_catimg_thumb']['h'],_UPLOAD.'thumb/'.$ln_image,$force_resize,$specify);
						}
						if($cfg_type['ln_catimg_img']['orginal']) @copy(_UPLOAD.$ln_image,_UPLOAD.'orginal/'.$ln_image);
						$force_resize = $cfg_type['ln_catimg_img']['force_resize']=='true'?true:false;
						$specify = $cfg_type['ln_catimg_img']['specify'];
						$oImg->resize($cfg_type['ln_catimg_img']['w'],$cfg_type['ln_catimg_img']['h'],_UPLOAD.$ln_image,$force_resize,$specify);
						$_POST['ln_image'][$ln] = empty($ln_image)?$_POST['current_ln_image'][$ln]:$ln_image;
					}else{
						$error .= $ln_image['msg'].'<br />';
					}
					
				}
			}
			$arr_ln['ln_icon'] = $_POST['ln_icon'][$ln];
			$arr_ln['ln_image'] = $_POST['ln_image'][$ln];
			if(!$error) $oClass->update_ln($lastid,$ln,$arr_ln);
			
			//die('--update category--');
		}
	}
	// refresh
	
	if(!$error){
		clear_sql_cache();
		
		if($_POST['btn_preview']){
			$result_data = array('url_preview'=>$cfg_type['url_preview']);
			die(''.addslashes(str_replace(array('$parentid','$catid'),array($arr['parentid'],$lastid),$cfg_type['cat_url_preview'])).':'.$lastid.'');
		}
		$query_string = $_SERVER['QUERY_STRING'];
		parse_str($query_string,$result);
		$mod = $result['p'];
		unset($result['mod'],$result['act'],$result['id'],$result['c'],$result['p'],$result['do']);
		$hook->redirect('?mod='.$mod.'&'.http_build_query($result,NULL,'&'));
	}
}


$tpl->setfile(array(
	'body'=>$cfg_type['cattpl_update']?$cfg_type['cattpl_update']:'category.update.tpl',
));


if($request['do']=='new'){
	$breadcrumb->assign("","New");
	$request['access_action'] = 'access_new';
	$request['date'] = date('Y-m-d');
	$request['draft_id'] = 0;
	$file_extra = array();
	$cat_ln = array();
}else{
	$cat_ln = $oClass->get_ln($_GET['id']);
	$result = $oClass->get($_GET['id']);
	$cat = $result->fetch();
	$cat['date'] = $cfg_type['enable_catdate_type']=='date'?substr($cat['date'],0,10):$cat['date'];
	$tpl->assign($hook->format($cat));
	$request['display_update'] = ' show';
	$file_extra = $cat['file_extra']?unserialize($cat['file_extra']):array();
	$breadcrumb->assign("","Edit");
	$request['access_action'] = 'access_edit';
	$draft_result = $oClass->get_draft($cat['id']);
	$draft  = $draft_result->fetch();
	if($draft){
		//current is draft
		$request['draft_id'] = $draft['id'];
	}else{
		$request['draft_id'] = $cat['draft']?$cat['id']:0;
	}
}

$required_fields = array();
$str_catfields = array();
foreach($cfg_type['cat_fields'] as $code=>$info){
	if($info['chose'] && $info['type'] != 'status' &&   in_array($code,$fields)){
		$tmp = '<tr>
  <td class="textLabel">'.$info['name'].' '.$arr['ln_alias'].'</td>
  <td>'.html_input($info['type'],$code,$cat[$code],' title="'.$info['require_msg'].'"').'
	<span class="description">'.$info['description'].'</span>
  </td>
</tr>';
		if($str_catfields[$info['sortorder']]) $str_catfields[$info['sortorder']] .= $tmp;
		else $str_catfields[$info['sortorder']] = $tmp;
		if($info['require']) $required_fields[] = $code;
	}
}

$request['main_catfields'] = '';
ksort($str_catfields);
foreach($str_catfields as $v){
	$request['main_catfields'] .= $v;
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
	$str_ln_catfields = array();
	$required_ln_catfields = array();
	foreach($cfg_type['ln_catfields'] as $code=>$info){
		if($info['chose'] && in_array($code,$ln_fields)){
			$tmp = '<tr>
      <td class="textLabel">'.$info['name'].' '.$arr['ln_alias'].'</td>
      <td>'.html_input($info['type'],$code.'['.$arr['ln'].']',$arr[$code],' class="w100pc" title="'.$info['require_msg'].'"').'
	  	<span class="description">'.$info['description'].'</span>
	  </td>
    </tr>';
		if($str_ln_catfields[$info['sortorder']]) $str_ln_catfields[$info['sortorder']] .= $tmp;
		else $str_ln_catfields[$info['sortorder']] = $tmp;
			if($info['require']) { $required_ln_catfields[] = $code; }
		
		}
	}
	
	$arr['ln_fields'] = '';
	ksort($str_ln_catfields);
	foreach($str_ln_catfields as $v){
		$arr['ln_fields'] .= $v;
	}
	$arr['default_ln'] = $cfg['language_tab'] == 'tab'?($arr['is_default']?'active':'hide'):'';
	$arr['tab_default'] = $rs['is_default']?'class="active"':'';
	$tpl->assign($arr,'language');
	
}


//$breadcrumb->reset();

//$breadcrumb->assign("./?mod=product","Manage Products");
if($request['parentid']) $tpl->box('breadcrumb_cat');

$request['breadcrumb'] = $breadcrumb->parse();
$request['size_icon'] = demension_size($cfg_type['catimg_icon']['w'],$cfg_type['catimg_icon']['h']);
$request['size_image'] = demension_size($cfg_type['catimg_img']['w'],$cfg_type['catimg_img']['h']);
$request['size_ln_icon'] = demension_size($cfg_type['ln_catimg_icon']['w'],$cfg_type['ln_catimg_icon']['h']);
$request['size_ln_image'] = demension_size($cfg_type['ln_catimg_img']['w'],$cfg_type['ln_catimg_img']['h']);
//$request['category_required'] = $cfg_type['category_required']?"'".str_replace(',',"','",$cfg_type['category_required'])."'":'';
$request['required_ln_catfields'] = count($required_ln_catfields)?"'".implode("','",$required_ln_catfields)."'":'';
$request['required_catfields'] = count($required_catfields)?"'".implode("','",$required_catfields)."'":'';
$request['msg'] = $error;
$request['enable_catdate_type'] = $cfg_type['enable_catdate_type']?$cfg_type['enable_catdate_type']:'date';


$show = array();
if($show_fields) foreach($show_fields as $field) $show['display_'.$field] = 'show';
$tpl->assign($show);

// Load options
$attributes = array();
if($request['do'] != 'new'){
	$result = $oContent->options($request['id']);
	while($rs = $result->fetch()){
		$attributes[$rs['options_type']][] = $rs['options_id'];
	}
}


if(count($cfg_type['catoptions'])){
	$opt_type = $oConfigure->getMod("`module` = 'options' AND typeid IN(".implode(',',$cfg_type['catoptions']).")");
	while($rs = $opt_type->fetch()){
		$result = $oOption->view($rs['typeid']);
		if($cfg_type['catoptions_type'][$rs['typeid']] == 2) $aOpt = array(0=>'--');
		else $aOpt = array();
		while($opt = $result->fetch()){
			$aOpt[$opt['id']] = $opt['name'];
		}
		switch($cfg_type['catoptions_type'][$rs['typeid']]){
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
//print_r($cfg_type['catfile_extra']);exit();
if($cfg_type['catfile_extra']['name']){
	foreach($cfg_type['catfile_extra']['name'] as $k=>$name) if($name){
		$rs = array();
		$rs['stt'] = $k;
		$rs['name'] = $name;
		$rs['code'] = $cfg_type['catfile_extra']['code'][$k]?$cfg_type['catfile_extra']['code'][$k]:$k;
		$rs['file'] = $file_extra[$rs['code']];
		$rs['type'] = $cfg_type['catfile_extra']['type'][$k];
		$rs['note'] = $cfg_type['catfile_extra']['note'][$k];
		$tpl->assign($rs,'file_extra');
		
	}
}
if($cfg_type['cat_url_preview']) $tpl->box('btn_preview');
?>