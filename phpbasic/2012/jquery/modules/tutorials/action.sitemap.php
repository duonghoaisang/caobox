<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

if(!$_SESSION['user_login']['viewtype']) $_SESSION['user_login']['viewtype'] = 'list';
$data = array();
$tpl->reset();
$tpl->setfile(array(
	'body'=>'home.sitemap.tpl',
));

	// newest box data 
$newest = $dao->view_data(1,0,5000);
while($rs = $newest->fetch()){
	$tpl->assign($rs,'list');
}

?>