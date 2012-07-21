<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->reset();
$tpl->setfile(array(
	'body'=>'xml.gallery.tpl',
));
$insurance = $oHtml->get(6);
$insurance = $hook->format($insurance);
$tpl->merge($insurance,'html');
?>