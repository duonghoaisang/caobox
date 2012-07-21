<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$dao = new DAO;
$tpl = new View('template/'.$cfg['template'],$languages); 
//$tpl->folder = 'img|format|media|css|images|flash|js';
$request = $_GET;

//Load main template
$tpl->setfile(array(
	'main'=>'master.tpl',
));


$tpl->setfile(array(
	'body'=>'article.tpl',
));

$tpl->assign(array(
	'module'=>$system->module,
	'action'=>$system->action,
	'lang'=>$system->lang,
	'page'=>$system->page,
	'URI'=>$system->uri,
	'DOMAIN'=>'http://'.$_SERVER['HTTP_HOST'],
	'root_dir'=>$system->root_dir,
	'project'=>$system->module=='home'?'':$system->module,
	'_UPLOAD'=>_UPLOAD,
	'web_title'=>$cfg['web_title'],
	'web_keyword'=>$cfg['web_keyword'],
	'web_desc'=>$cfg['web_desc'],
	
));

?>