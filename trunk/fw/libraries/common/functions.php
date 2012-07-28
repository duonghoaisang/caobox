<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


function stripUnicode($str){
	if(!$str) return false;
	$unicode = array(
	'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
	'd'=>'đ',
	'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
	'i'=>'í|ì|ỉ|ĩ|ị',
	'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
	'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
	'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
	);
	foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
	return $str;
}
function str2url($str  = NULL){
	if(!$str) return NULL;
	$str = mb_strtolower($str,'utf-8');
	$str  = stripUnicode($str);
	$str = preg_replace('/[^0-9a-z\.]/is',' ',$str);
	$str = trim($str);
	$str = preg_replace('/\s+/','-',$str);
	return str_replace(' ','-',$str);
}

function format_date($date_system,$date_format = 'Y-m-d'){
	return date($date_format, strtotime($date_system));
}

function print_flash_image($file,$w=0,$h=0,$url = NULL){
	if(substr($file,'-4')=='.swf'){
		$str = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="'.$w.'" height="'.$h.'" title="Homepage Banner">
                    <param name="movie" value="'.$file.'" />
                    <param name="quality" value="high" />
                    <embed src="'.$file.'" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'.$w.'" height="'.$h.'"></embed>
       	  	      </object>';
	}else{
		$str = '';
		if($url) $str .= '<a href="'.$url.'">';
		$str .= '<img src="'.$file.'"'.($w?' width="'.$w.'"':'').' '.($h?'height="'.$h.'"':'').' />';
		if($url) $str .= '</a>';
	}
	return $str;
}

function cutnwords($str,$n = 20){
	$tmp = explode(' ',$str);
	$count = count($tmp);
	if($count <= $n) return $str;
	for($i=$n;$i<$count;$i++) unset($tmp[$i]);
	return implode(' ',$tmp).'...';
}
	
function data2xml($data,$parent = 0,$parents = '',$sep = '/',$dir,$ext = ''){
	$str = '';
	if(isset($data[$parent]) && count($data[$parent])){
		$str .= '<ul>';
		if($parents) $parents .= $sep.$parent;
		else $parents = $dir;
		foreach($data[$parent] as $rs){
			$str .= '<li><a href="'.$parents.$sep.$rs['id'].$ext.'">'.$rs['name'].'</a></li>';
			$str .= data2xml($data,$rs['id'],$parents,$sep,$dir,$ext);
		}
		$str .= '</ul>';
	}
	return $str;
}


function upload($tagname,$upload_dir,$ex_name=NULL,$allow_ext=NULL,$lang = NULL){
	$arr = array();
	$arr['error'] = 0;
	if(!is_writable($upload_dir)){
		$arr['error'] = 1;
		$arr['msg'] =  'You have no <strong>WRITE</strong> access for folder <strong>'.$upload_dir.'</strong>';
		return $arr;
	}
	
	if($lang){
		$filesize=$_FILES[$tagname]["size"][$lang];
		$fileerror=$_FILES[$tagname]["error"][$lang];
		$filename = basename($_FILES[$tagname]["name"][$lang]);
		$file_tmp = $_FILES[$tagname]["tmp_name"][$lang];
	}else{
		$filesize=$_FILES[$tagname]["size"];
		$fileerror=$_FILES[$tagname]["error"];
		$filename = basename($_FILES[$tagname]["name"]);
		$file_tmp = $_FILES[$tagname]["tmp_name"];
	}
	
	if($filename && $fileerror){
		$arr['error'] = 1;
		$arr['msg'] =  'The file size is so large to upload ( Max file size: <strong>'.ini_get('upload_max_filesize ').'</strong>)';
		return $arr;
	}	
	$continue = 0;
	if($filename && is_array($allow_ext)) for($i=0; $i<count($allow_ext);){
		if(strtolower(substr($filename,-1*strlen($allow_ext[$i]))) == $allow_ext[$i]){ 
			$continue = 1; 
			$i = count($allow_ext)  + 1;
		}else{
			$i++;
		}
	}else{
		$continue = 1;
	}
	
	if(!$continue){
		$arr['error'] = 1;
		$arr['msg'] =  'Not allow extentions file, you can only upload file '.implode(',',$allow_ext);
		return $arr;
	}
	
	$upload_file = preg_replace('/[^a-z0-9\.\-_]/is','',$filename);
	$path = pathinfo($upload_file);
	if(file_exists($upload_dir.$upload_file)) $upload_file = $path['filename'].'-'.$ex_name.'.'.$path['extension'];
	if(file_exists($upload_dir.$upload_file)) $upload_file = $path['filename'].'-'.$ex_name.'-'.str_shuffle('phpbasic').'.'.$path['extension'];
	//str_shuffle('phpbasic').'_'.$upload_file;
	if (@move_uploaded_file($file_tmp, $upload_dir.$upload_file) ){       
		@chmod ($upload_file,0777);         
		return  $upload_file;
	}
	if(!$continue){
		$arr['error'] = 1;
		$arr['msg'] =  'Server cannot upload this file, please try again';
	
	}
}


?>