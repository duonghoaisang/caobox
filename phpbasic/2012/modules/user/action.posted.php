<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


$tpl->setfile(array(
	'body'=>'user.posted.tpl',
));

$result = $dao->view_data('v.userid = '.intval($_SESSION['user_login']['id']));
if($result->num_rows()){
	while($rs = $result->fetch()){
		$rs['title_url'] = str2url($rs['title']);
		$tpl->assign($rs,'posted');
	}
}else{
	
}


?>