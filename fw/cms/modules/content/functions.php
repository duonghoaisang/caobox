<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

function textfield($name = 'textfield',$value=''){
	$str = '<input type="text" name="'.$name.'" value="'.$value.'"';
	$str .= ' />';
	return $str;
}
function textarea($value = ''){
	$str .= '<textarea name="value" rows="5">';
	$str .= htmlentities($value,ENT_QUOTES,'utf-8');
	$str .= '</textarea>';
	return $str;
}


?>