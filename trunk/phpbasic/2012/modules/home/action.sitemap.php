<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
//header('Content-type: text/xml');
if(!$_SESSION['user_login']['viewtype']) $_SESSION['user_login']['viewtype'] = 'list';
$data = array();
$tpl->reset();
$tpl->setfile(array(
	'body'=>'home.sitemap.tpl',
));

	$data['date'] = date('Y-m-d');
	$data['hours'] = date('H:i:s');
	$tpl->assign($data);
	// newest box data 
$newest = $dao->view_data(1,0,5000);
while($rs = $newest->fetch()){
	$rs['name_url'] = str2url($rs['title']);
	$rs['date'] = date('Y-m-d');
	$rs['hours'] = date('H:i:s');
	$tpl->assign($rs,'list');
}

echo $tpl->parse('text/xml');
die('');
?>