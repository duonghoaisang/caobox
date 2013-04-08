<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$tpl->assign($request);
$html = $tpl->display();
if(is_dir($tpl->tpl_dir.'images/icons_'.$login_user['setting']['icon']))
	$html = str_replace('images/icons_default/','images/icons_'.$login_user['setting']['icon'].'/',$html);
echo $html;
$tpl->cache();
?>