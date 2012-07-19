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

//Load main template
$tpl->setfile(array(
	'main'=>'index.html.tpl',
));
$cfg['web_title'] = 'Vietnamese web developer forum - www.phpbasic.com';
$cfg['web_keyword'] = 'php manual, mysql, ajax, jquery, javascript, divbox, caobox, css, html,vietnamese ';
$tpl->assign(array(
	'module'=>$system->module,
	'action'=>$system->action,
	'page'=>$system->page,
	'domain'=>'http://'.$_SERVER['HTTP_HOST'],
	'root_dir'=>$system->root_dir,
	'web_title'=>$cfg['web_title'],
	'web_keyword'=>$cfg['web_keyword'],
	'web_desc'=>$cfg['web_desc'],
));
///Load menu
$menu = $dao->view_menu();
$k= 0;
while($rs = $menu->fetch()){
	$rs['active'] = $system->params[0]==$rs['rewrite']? 'active': (!$system->params[0]&&$k++==0?'active':'');
	$tpl->assign($rs,'category');
}

// login from cookie
if($string = $_COOKIE['remember']){
	$len = substr($string,0,1);
	$id = substr($string,10+1,$len);
	$psw = substr($string,11+$len+10,32);
	$dao->login_remember($id,$psw);
}

if(isset($_SESSION['user_login']['id'])){
	$tpl->box('user');
	$tpl->assign(array('fullname'=>$_SESSION['user_login']['username']));
}else{
	$tpl->box('login');
}

print_r($_COOKIE['history']);
if($_COOKIE['history']) foreach($_COOKIE['history'] as $id=>$val){
	$info = unserialize($val);
	$tpl->assign(array(
		'id'=>$id,
		'title'=>$info['title'],
	),'history');
}

$tpl->merge($languages,'lang');

//print_r($_SESSION);
?>