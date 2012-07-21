<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$license = $_GET['l'];
$licenses = array('mit','gpl3','bsd');
if(in_array($license,$licenses)){

	$tpl->setfile(array(
		'body'=>'license.'.$license.'.tpl',
	));

}else{
	$tpl->setfile(array(
		'body'=>'license.tpl',
	));
}

$web = array(
	'app_title'=>'Divbox - Released under the MIT, BSD, and GPL Licenses. ',
	'app_keyword'=>'jquery multibox, multibox jquery, divbox, jquery lightbox',
	'app_description'=>'DivBox plugin is simple, easy style format,support draggable, youtube link,supports a range of multimedia formats, no need extra markup and is used to overlay images on the current page through the power and flexibility of jQuery\'s selector',
	'app_name'=>'Divbox'
);

$tpl->assign($web);
?>