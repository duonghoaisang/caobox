<?php

/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$oClass->active($request['ln']);
$query_string = $_SERVER['QUERY_STRING'];
parse_str($query_string,$result);
unset($result['act'],$result['ln']);
$hook->redirect('?'.http_build_query($result));

?>