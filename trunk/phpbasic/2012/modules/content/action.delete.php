<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
if(!ajax_permission()) $hook->redirect('./');
$tpl->reset();
if($_POST){
	$result = $dao->view_data("v.id = ".intval($_GET['id']),0,5);
	$content = $result->fetch();
	if(content_permission($content['userid'],$content['id'])){
		echo $oClass->delete($_GET['id']);
	}
	exit();
}
?>