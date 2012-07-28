<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
extract($_GET);
$request['type'] = intval($request['type']);
$url = $_GET;
unset($url['do']);
$request['http_referer'] = '?'.http_build_query($url);
$oClass = new ClassModel;



?>