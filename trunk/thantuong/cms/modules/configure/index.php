<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
if($access!='ALL') $hook->redirect('./');

$oClass = new ClassModel;
$breadcrumb = new breadcrumb;
extract($_GET);

if($cfg['root_admin']) $tpl->box('root_admin');
?>