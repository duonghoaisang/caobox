<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$data = array();
$tpl->setfile(array(
	'body'=>'search.view.tpl',
));

	
// newest box data
$cond = 1;
if($_GET['q']){
	$q = addslashes($_GET['q']);
	$data['web_title'] = 'Search result: '.$q;
	//$cond .= " AND (v.title LIKE '+$q' OR v.content LIKE '+$q')";
}

$search = $oClass->search($q ,0,20);
// display newest box
$tpl->box('newest');
while($rs = $search->fetch()){
	$rs['title'] = $hook->html($rs['title']);
	$rs['intro'] = $hook->format($rs['intro']);
	$tpl->assign($rs,'list');
}
if(!$search->num_rows()) $data['empty_data'] = '<li>Xin lỗi, chúng tôi không tìm thấy thông tin nào liên quan tới "<strong>'.$q.'</strong>". Vui lòng thử lại hoặc tìm với từ khóa khác.</li>';
$tpl->assign($data);

?>