<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->setfile(array(
	'body'=>'news.detail.tpl',
));


// news list
$detail = $oContent->get($system->params[2]);
//$detail = $hook->format($detail);
$detail['intro'] = nl2br($detail['intro']);

$tpl->merge($detail,'detail');

?>