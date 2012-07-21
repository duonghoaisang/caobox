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
	$eTpl = new View('template/_email',$languages); 
	$eTpl->assign($data);
	$content = $eTpl->parse();
	if(email('w2ajax@gmail.com','User contact',$content)){
		die('Your message has been sent, thank you!');
	}else{
		die('Current mail server  cannot this email, please try again!');
	}
}else{
	$tpl->setfile(array(
		'body'=>'contact.tpl',
	));

	$web = array(
		'app_title'=>'DivBox - jquery multibox',
		'app_keyword'=>'jquery multibox, multibox jquery, divbox, jquery lightbox',
		'app_description'=>'DivBox plugin is simple, easy style format,support draggable,supports a range of multimedia formats, no need extra markup and is used to overlay images on the current page through the power and flexibility of jQuery´s selector',
		'app_name'=>'jquery plugins'
	);
	
	$tpl->assign($web);

}
?>