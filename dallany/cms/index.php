<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
define('_ROOT',rtrim(dirname(dirname(__FILE__)),'/').'/',true);
define('_CORE',_ROOT,true);
define('_APP',_ROOT.'cms/',true);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ini_session = ini_get('session.save_path');
include _CORE.'bootstrap.php';
//Controller 
	// argurment 1:  rewrite url ?
	// argument 2:  use mod rewrite ?
	// argument 3: multi language 
$controller = new Controller(false,false,false);
$controller->model = new Model;
$controller->model->db->query("SET NAMES 'UTF8'");
$controller->load();
?>