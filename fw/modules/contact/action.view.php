<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
if($_POST){
	$data = $_POST;
	//print_r($_POST);exit();
	$email = new Email($cfg['email_contact'],'Sofresh- contact form','contact.tpl');
	$email->connect($cfg);
	$email->tpl->assign($data);
	if($email->send()){
		die('Your message has been sent, thank you!');
	}else{
		die('Current mail server  cannot this email, please try again!');
	}
}else{
	$tpl->setfile(array(
		'body'=>'contact.tpl',
	));
}
?>