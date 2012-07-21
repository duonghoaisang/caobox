<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$tpl->reset();
if($_POST){
	$data = $_POST;
	//print_r($_POST);exit();
	$dir = _CACHE;
	$file = upload('file',$dir,time());

//print_r($cfg);
	
	//print_r($_POST);exit();
	$email = new Email($cfg['email_contact'],'Dallany- contact form','contact.tpl');
	if(!is_array($file)){
		$data['file'] = $system->domain.$system->project.$dir.$file;
		$email->attach($dir.$file,'File Attached');
	}
	$email->connect($cfg);
	$email->tpl->assign($data);
	if($email->send()){
		echo('1');
	}else{
		echo('0');
	}
	if(!is_array($file)){ @unlink($dir.$file);}
	exit();
}else{
	$tpl->setfile(array(
		'body'=>'xml.contact.tpl',
	));
	
	$store1 = $oHtml->get(7);
	$store2 = $oHtml->get(8);
	$tpl->assign(array(
		'contact_store1'=>$store1['name'],
		'contact_store2'=>$store2['name'],
	));
}
?>