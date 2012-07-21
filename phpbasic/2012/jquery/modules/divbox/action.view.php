<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

if($_POST){
	$sql = "INSERT INTO jquery_comment(fullname,email,message) VALUES(
		'".addslashes($_POST['fullname'])."',
		'".addslashes($_POST['email'])."',
		'".addslashes($_POST['message'])."'
	)";
	
	$oClass->db->query($sql);
	if($oClass->db->insert_id()) die('1');
	die('0');
}
$tpl->setfile(array(
	'body'=>'divbox.tpl',
));

$web = array(
	'app_title'=>'DivBox - jquery multibox, support youtube videos',
	'app_keyword'=>'jquery multibox, multibox jquery, divbox, jquery lightbox',
	'app_description'=>'DivBox plugin is simple, easy style format,support draggable, youtube link,supports a range of multimedia formats, no need extra markup and is used to overlay images on the current page through the power and flexibility of jQuery\'s selector',
	'app_name'=>'Divbox'
);

$result = $oClass->db->query("SELECT * FROM jquery_comment ORDER BY `timestamp` DESC");
while($rs = $result->fetch()){
	//$rs = $hook->format($rs);
	$rs['fullname'] = stripslashes($rs['fullname']);
	$message = nl2br(stripslashes($rs['message']));
	$message = preg_replace('/http:\/\/([^\s]*$)/is','<a target="_blank" href="http://\\1">http://\\1</a>',$message);
	$rs['message'] = $message;
	$tpl->assign($rs,'comments');
}
$tpl->assign($web);
?>