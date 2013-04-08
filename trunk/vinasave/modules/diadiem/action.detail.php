<?php
$tpl->setfile(array(
		'body'=>'diadiem.detail.tpl',

));
$id = intval($system->params[2]);

$content = $oContent->get($id);


if(!isset($_SESSION['visited_'.$id])){
	$oContent->db->update($oClass->prefix.'content',array('visited'=>$content['visited'] + 1),"id = ".$id);
	$_SESSION['visited_'.$id] = true;
}


//print_r($content);
$content = $hook->format($content);
$content['remain_time'] = strtotime($content['date_end']) - strtotime('now');
$content['name_url'] = str2url($content['name']);
$tpl->assign($content);
$current_submenu = isset($system->params[1])?$system->params[1]:NULL;
if(isset($system->params[3])) $current_submenu = $system->params[3];
//print_r($languages);
$tmp = array_flip($languages["submenu_tab"]);
$tpl->assign(array(
		'module_name'=>$system->modules[$system->lang]['name'][$system->module],
		'module_url'=>$system->modules[$system->lang]['module'][$system->module],
		'current_submenu_name'=>$languages[$tmp[$current_submenu?$current_submenu:'hot']],
		'lang_hot'=>$languages['submenu_tab']['hot'],
		'lang_popular'=>$languages['submenu_tab']['popular'],
		'lang_newest'=>$languages['submenu_tab']['newest'],
		'lang_expire'=>$languages['submenu_tab']['expire'],
));
//print_r(array($current_submenu?$current_submenu:'hot'=>'on'));

$tpl->assign(array($current_submenu?$tmp[$current_submenu]:$languages['submenu_tab']['hot']=>'on'),'submenu_active');

$cond = 1;
$cond .= " AND c.id != ".$content['id']." AND c.catid = ".$content['catid'];
$related_products = $oContent->view($typeid,$cond, 0,5,'visited desc,`like` desc');
while($rs = $related_products->fetch()){
	//print_r($rs);
	$rs = $hook->format($rs);
	$rs['remain_time'] = strtotime($rs['date_end']) - strtotime('now');
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'related_products');
}

// recommend products
$cond = 1;
$cond .= " AND c.id != ".$content['id']." AND c.catid = ".$content['catid'];
$related_products = $oContent->view($typeid,$cond, 0,5,'visited desc,`like` desc');
while($rs = $related_products->fetch()){
	//print_r($rs);
	$rs = $hook->format($rs);
	$rs['remain_time'] = strtotime($rs['date_end']) - strtotime('now');
	$rs['name_url'] = str2url($rs['name']);
	$tpl->assign($rs,'recommend_products');
}

$current_cat = $content['catid'];
$categories = $oCategory->view($typeid);
while($rs = $categories->fetch()){
	$rs = $hook->format($rs);
	$rs['name_url'] = str2url($rs['name']);
	$rs['active'] = $rs['id'] == $current_cat?'on':'';
	$tpl->assign($rs,'categories');
}


$comments =  $oClass->query("SELECT me.fullname,cm.* FROM ".$oClass->prefix."comment cm
				LEFT JOIN ".$oClass->prefix."member me ON me.id = cm.memid
				WHERE cm.`module`='content' AND cm.pageid = ".intval($content['id'])." AND cm.`active`=0 ORDER BY cm.`timestamp`");
while($rs = $comments->fetch()){
	$tpl->assign($rs,'comment');
}
		
	
?>