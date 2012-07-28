<?php
//error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
define('_ROOT',rtrim(dirname(__FILE__),'/').'/',true);
define('_APP',_ROOT,true);
define('_CORE',_ROOT,true);
//date_default_timezone_set('Asia/Ho_Chi_Minh');
include _CORE.'bootstrap.php';
/* Controller($rewrite, $htaccess, $multi_lang, $sef) */
$controller = new Controller(true,false,false,true);
$controller->model = new Model;
$controller->model->setCache(_CACHE);
$controller->model->db->query("SET NAMES 'UTF8'");
$controller->load_ext();
$controller->load();

?>