<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$data = $_SESSION['admin_login']['data']?unserialize($_SESSION['admin_login']['data']):array();
$data['menu'][intval($_POST['menuid'])] = intval($_POST['status']);
$_SESSION['admin_login']['data'] = serialize($data);
$oClass->update($login_user['id'],array('data'=>$_SESSION['admin_login']['data']));


exit();


?>