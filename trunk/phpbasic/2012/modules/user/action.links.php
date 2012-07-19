<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


$tpl->setfile(array(
	'body'=>'user.links.tpl',
));

$result = $oClass->links($_SESSION['user_login']['id']);
if($result->num_rows()){
	while($rs = $result->fetch()){
		$tpl->assign($rs,'links');
	}
}else{
	
}


?>