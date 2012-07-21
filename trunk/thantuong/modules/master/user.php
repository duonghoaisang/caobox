<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


$container = array();
if($system->module=='home'){
	$container['class'] = 'Intro';
	$container['logo'] = 'logo_intro.gif';
}else{
	$container['logo'] = 'logo_index.gif';
	$tpl->box('footer');
}
$tpl->merge($container,'container');


$menu_active = array();
$menu_active[$system->module] = 'Active';
$tpl->merge($menu_active,'menu_active');


// top banner
$result = $oContent->view(11,'c.catid = 3');
while($rs = $result->fetch()){
	$tpl->assign($rs,'topbanner');
}

// footer banner
$result = $oContent->view(11,'c.catid =4');
while($rs = $result->fetch()){
	$tpl->assign($rs,'footerbanner');
}
$footer = $oHtml->get(2);
$tpl->merge($footer,'footer');

// right banner 320
$result = $oContent->view(11,'c.catid = 5');
while($rs = $result->fetch()){
	$tpl->assign($rs,'rightbanner320');
}

// right banner 200
$result = $oContent->view(11,'c.catid = 6');
while($rs = $result->fetch()){
	$tpl->assign($rs,'rightbanner200');
}
// right banner footer
$result = $oContent->view(11,'c.catid = 7');
while($rs = $result->fetch()){
	$tpl->assign($rs,'rightbanner_footer');
}

$tpl->assign(array(
	'root_dir_absolute' => $system->root_dir_absolute,
));

?>