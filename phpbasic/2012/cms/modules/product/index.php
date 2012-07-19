<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$oClass = new ClassModel;
$breadcrumb = new breadcrumb;

$aPath = $dao->xpath($_GET['parentid']);
$xPath = '<a href="?mod=product&type='.$arr['type'].'">Root</a>';
if($aPath) for($i=count($aPath)-1;$i>=0;$i--){
	$xPath .=  ' &raquo; <a href="?mod=product&parentid='.$aPath[$i]['id'].'&type='.$aPath[$i]['type'].'">'.$aPath[$i]['name'].'</a>';
}
$tpl->assign(array('xpath' => $xPath));


//


?>