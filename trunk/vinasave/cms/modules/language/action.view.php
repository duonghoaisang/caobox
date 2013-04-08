<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$tpl->setfile(array(
	'body'=>'language.tpl',
));

$cat = $oLanguage->view();
while($rs = $cat->fetch()){
	$tpl->assign($rs,'language');
}





$request['hide_language_access'] = $cfg['root_admin']?'':'hide';
$tpl->assign($request);




$show_actions = array('delete');
$action = array();
foreach($show_actions as $act) $action['action_'.$act] = 'style="display: inline;"';
$tpl->assign($action);

?>