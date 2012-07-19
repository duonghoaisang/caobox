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

?>