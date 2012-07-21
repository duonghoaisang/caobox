<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


$tpl->setfile(array(
	'body'=>'mscroller.tpl',
));

$web = array(
	'app_title'=>'mScroller - jquery marquee scroller',
	'app_keyword'=>'jquery marquee, multibox scroller',
	'app_description'=>'mScroller - jquery marquee scroller',
	'app_name'=>'mScroller'
);

$tpl->assign($web);
?>