<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
function demension_size($width = 0,$height = 0){
	if($width || $height){
		if($height==0) return 'Width: '.$width.'px';
		elseif($width==0) return 'Height: '.$height.'px';
		else return 'Size: '.$width.' x '.$height;
	}else{
		return false;
	}
}

function ie(){
	if (preg_match("/MSIE/i", $_SERVER['HTTP_USER_AGENT'])) return true;
	return false;
}

/*function skins($folder_include_skin){
	$fskin = $folder_include_skin.'skins.txt';
	$skin = array();
	if(file_exists($fskin)){
		$handle = fopen($fskin, "r");
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$skin[] = $data;
		}
	}
	return $skin;
}
*/
/*function clear_cache_configure(){
	@unlink(_CACHE.'configure_mod.php');
}
*/

function clear_sql_cache(){
	$sql_cache = _CACHE.'sql_cache.txt';
	if(file_exists($sql_cache)) @unlink($sql_cache);
	$dao_cache = _CACHE.'dao.php';
	if(file_exists($dao_cache)) @unlink($dao_cache);
}

function remove_dir($folder){
	$dir = dir($folder);
	while ($file = $dir->read()) {
		if($file != '.' && $file != '..'){
			if(filetype($dir->path.$file) == 'file')  @unlink($dir->path.$file);
			if(filetype($dir->path.$file) == 'dir') remove_dir($dir->path.$file.'/');
		}
	}
}


function html_input($inputtype = 'input', $name = 'textfield',$value = '',$params=''){
	switch($inputtype){
		case 'textarea':
			return '<textarea name="'.$name.'" '.$params.'>'.$value.'</textarea>';
		case 'tinymce':
			return '<textarea class="tinymce" name="'.$name.'" '.$params.'>'.$value.'</textarea>';
		default: 
			return '<input type="text" name="'.$name.'" value="'.$value.'"  '.$params.' />';
	}
}

function html_status($name = 'select',$default_value = '1'){
	return '<select name="'.$name.'">
		  <option value="0">No</option>
		  <option value="1"'.($default_value?'selected':'').'>Yes</option>
		  </select>';
}


?>