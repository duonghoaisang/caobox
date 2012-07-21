<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


$tpl->setfile(array(
	'body'=>'jemotion.tpl',
));

$web = array(
	'app_title'=>'jEmotion - show/hide emotion icons on your website',
	'app_keyword'=>'jquery emotion,emotion toggle, emotion on/of, emotion show/hide',
	'app_description'=>'jEmotion is a small jquery plugins help you do that by a click and you needn\'t to reload the page.',
	'app_name'=>'jEmotion'
);

$tpl->assign($web);

?>