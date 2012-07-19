<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$result = $dao->view_data("v.id = ".intval($system->params[2]),0,5);
$content = $result->fetch();
if($content){
	$content['title_url'] = str2url($content['title']);
	$hook->redirect('/'.$content['c_rewrite'].'/'.$content['id'].'/'.$content['title_url'].'.html');
}else{
	die('The url is not exists!');
}
?>