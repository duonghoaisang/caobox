<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

//$cache->set('page');
if(count($system->params) > 2 && substr($system->params[2],-1) == 'd'){
	include 'action.detail.php';
}else{
	$tpl->setfile(array(
		'body'=>'index.tpl',
		
	));
	$limit = 12;
	$current_cat = count($system->params) > 2 ? intval($system->params[2]):0;
	$categories = $oCategory->view($typeid);
	while($rs = $categories->fetch()){
		$rs = $hook->format($rs);
		$rs['name_url'] = str2url($rs['name']);
		$rs['active'] = $rs['id'] == $current_cat?'on':'';
		$tpl->assign($rs,'categories');
	}
	$current_submenu = isset($system->params[1])?$system->params[1]:NULL;
	if(isset($system->params[3])) $current_submenu = $system->params[3];
	$tmp = array_flip($languages["submenu_tab"]);
	
	
	
	
	$order_by = ' visited desc, `like` desc';
	if($current_submenu){
		switch($tmp[$current_submenu]){
			case 'newest': $order_by = '`timestamp` desc';break;
			case 'expire': $order_by = '`date_end` asc';break;
			default:break;
		}
	}
	
	$cond = 1;
	if($current_cat) $cond .= " AND c.catid = ".$current_cat;
	if($current_submenu && $tmp[$current_submenu]=='popular') $cond .= " AND c.popular = 1";
	
	$products = $oContent->view($typeid,$cond);
	$total = $products->num_rows();
	
	$paging = new paging($system->root_dir.$system->modules[$system->lang]['module'][$system->module].'/',$total, $limit);
	$start = $paging->info['page'] * $limit;
	$products = $oContent->view($typeid,$cond, $start,$limit,$order_by);
	while($rs = $products->fetch()){
		$rs = $hook->format($rs);
		$rs['remain_time'] = strtotime($rs['date_end']) - strtotime('now');
		$rs['name_url'] = str2url($rs['name']);
		$tpl->assign($rs,'products');
	}
	
	$paging->label = array('&lt;&lt;','&lt;','&gt;','&gt;&gt;');
	$paging->current = '<a href="#" class="on">%d</a>';
	$paging->first_current = $paging->current;
	$paging->last_current = $paging->current;
	//
	
	$tpl->assign(array(
			'paging'=>$paging->simple(5),
			'current_page'=>$paging->info['page'] + 1,
			'total_page'=>$paging->info['pnum'],
			'module_url'=>$system->modules[$system->lang]['module'][$system->module],
			'current_submenu'=>$current_submenu,
			'lang_hot'=>$languages['submenu_tab']['hot'],
			'lang_popular'=>$languages['submenu_tab']['popular'],
			'lang_newest'=>$languages['submenu_tab']['newest'],
			'lang_expire'=>$languages['submenu_tab']['expire'],
	));
	//print_r(array($current_submenu?$current_submenu:'hot'=>'on'));
	
	$tpl->assign(array($current_submenu?$tmp[$current_submenu]:$languages['submenu_tab']['hot']=>'on'),'submenu_active');
}

?>