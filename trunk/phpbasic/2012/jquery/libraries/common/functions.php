<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


	
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


function upload($tagname,$upload_dir,$ex_name=NULL,$allow_ext=NULL,$lang = NULL){
	if($lang){
		$filesize=$_FILES[$tagname]["size"][$lang];
		$filename = basename($_FILES[$tagname]["name"][$lang]);
		$file_tmp = $_FILES[$tagname]["tmp_name"][$lang];
	}else{
		$filesize=$_FILES[$tagname]["size"];
		$filename = basename($_FILES[$tagname]["name"]);
		$file_tmp = $_FILES[$tagname]["tmp_name"];
	}
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
		if (@move_uploaded_file($file_tmp, $upload_dir.$upload_file) ){       
			@chmod ($upload_file,0777);         
			return $upload_file;
		}
		return NULL;
	}
	return -1;        
}


?>