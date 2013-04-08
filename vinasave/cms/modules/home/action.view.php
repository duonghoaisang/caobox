<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$tpl->setfile(array(
	'body'=>'home.tpl',
));

$breadcrumb->reset();
$breadcrumb->assign("",$cfg['client']);
$breadcrumb->assign('?mod=home','Dashboard');
$request['breadcrumb'] = $breadcrumb->parse();
?>