<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


$tpl->setfile(array(
	'body'=>'index.tpl',
));
$web = array(
	'app_title'=>'DivBox - jquery multibox',
	'app_keyword'=>'jquery multibox, multibox jquery, divbox, jquery lightbox',
	'app_description'=>'DivBox plugin is simple, easy style format,support draggable,supports a range of multimedia formats, no need extra markup and is used to overlay images on the current page through the power and flexibility of jQuery´s selector',
	'app_name'=>'jquery plugins'
);

$tpl->assign($web);

?>