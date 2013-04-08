<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

//$cache->set('page');
$tpl->setfile(array(
	'body'=>'index.tpl',
	
));
$limit = 12;

$categories = $oCategory->view(1);
while($rs = $categories->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'categories');
}

$products = $oContent->view(1,1,0,$limit,' `like` desc, visited desc');
$total = $products->num_rows();
$i = 0;
while($rs = $products->fetch()){
	if($i == $limit) break;
	$i++;
	$rs = $hook->format($rs);
	$rs['remain_time'] = strtotime($rs['date_end']) - strtotime('now');
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'products');
}

$paging = new paging($system->root_dir.$system->modules[$system->lang]['module']['diadiem'].'/',$total, $limit);
$paging->label = array('&lt;&lt;','&lt;','&gt;','&gt;&gt;');
$paging->current = '<a href="#" class="on">%d</a>';
$paging->first_current = $paging->current;
$paging->last_current = $paging->current;
$tpl->assign(array(
	'paging'=>$paging->simple(5),
	'current_page'=>$paging->info['page'] + 1,
	'total_page'=>$paging->info['pnum'],
	'module_url'=>$system->modules[$system->lang]['module']['diadiem'],
		'lang_hot'=>$languages['submenu_tab']['hot'],
		'lang_popular'=>$languages['submenu_tab']['popular'],
		'lang_newest'=>$languages['submenu_tab']['newest'],
		'lang_expire'=>$languages['submenu_tab']['expire'],
	//'current_submenu'=>'hot'
));
//print_r($languages);
$tpl->assign(array('hot'=>'on'),'submenu_active');

?>