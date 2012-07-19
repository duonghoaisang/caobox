<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


$tpl->setfile(array(
	'body'=>'content.view.tpl',
));

//important box
$result = $dao->view_data("v.id = ".intval($_GET['id']),0,5);
$content = $result->fetch();
$content['title'] = output_title($content['title']);
$content['content'] = $hook->output($content['content']);
$tpl->assign($content);


/*$result = $oClass->view($_GET['id']);
$total = $result->num_rows();
*/

$result = $oClass->view($_GET['id']);
while($rs = $result->fetch()){
	$rs['content'] = $hook->output($rs['content']);
	$tpl->assign($rs,'comment');
}

?>