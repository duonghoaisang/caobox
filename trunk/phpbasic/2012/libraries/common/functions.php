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
	$str = preg_replace('/[^0-9a-z]/is',' ',$str);
	$str = trim($str);
	$str = preg_replace('/\s+/','-',$str);
	return str_replace(' ','-',$str);
}

	
function data2xml($data,$parent = 0,$parents = '',$sep = '/',$dir,$ext = ''){
	$str = '';
	if(count($data[$parent])){
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


function upload($tagname,$upload_dir,$ex_name=NULL,$allow_ext=NULL){
	$filesize=$_FILES[$tagname]["size"];
	$filename = basename($_FILES[$tagname]["name"]);
	$continue = 0;
	if($filename && is_array($allow_ext)) for($i=0; $i<count($allow_ext);){
		if(strtolower(substr($filename,-1*strlen($allow_ext[$i]))) == $allow_ext[$i]){ $continue = 1; $i = count($allow_ext)  + 1;}
		else $i++;
	}else{
		$continue = 1;
	}
	
	if($continue){
		$upload_file = $ex_name.preg_replace('/[^a-z0-9\.\-_]/is','',$filename);
		if(file_exists($upload_dir.$upload_file)) $upload_file = str_shuffle('phpbasic').'_'.$upload_file;
		if (@move_uploaded_file($_FILES[$tagname]["tmp_name"], $upload_dir.$upload_file) ){       
			@chmod ($upload_file,0777);         
			return $upload_file;
		}
		return NULL;
	}
	return -1;        
}
?>