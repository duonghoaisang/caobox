<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
//unset($_SESSION);
if($GLOBALS['controller']->module=='user' && $GLOBALS['controller']->action=='login'){
	if(isset($_SESSION['admin_login'])) header('location: ./');
}else{
	if(!isset($_SESSION['admin_login'])) header('location: ./?mod=user&act=login');
}

/* --------------------- LEFT MENU ----------------------------*/

$image_exts = array('.jpg','.jpeg','.gif','.png');

$dao = new DAO;
$tpl = new View('template/'.$cfg['template'],$languages); 
//Load main template
$tpl->setfile(array(
	'main'=>'index.html.tpl',
));
$tpl->assign(array(
	'module'=>$system->module,
	'action'=>$system->action,
	'section'=>$system->section,
	'page'=>$system->page,
));

for($i=0;$i<count($MenuName);$i++){
	$links = '';
	foreach($MenuLink[$i] as $j=>$arr)  $links .= '<a href="'.$arr['link'].'&menu='.$i.'.'.$j.'">'.($arr['icon']?'<img src="template/'.$GLOBALS['cfg']['template'].'/'.$arr['icon'].'" align="absmiddle" />':'').$arr['name'].'</a>';
	$tpl->assign(array(
		'name'=>$MenuName[$i],
		'links'=>$links,
	),'leftmenu');
}
?>