<?php
define('_ROOT',rtrim(dirname(__FILE__),'/').'/',true);
define('APPLICATION','',true);
define('_CORE',rtrim(dirname(__FILE__),'/').'/',true);
include _ROOT.'bootstrap.php';
require_once _ROOT.'libraries/common/functions.php';
$controller = new Controller(true,true,false);
$aArticle = array('general','php','mysql','ajax','javascript','css','html','htaccess','lesson');
if(intval($controller->params[1])) $controller->module = 'content';
elseif(in_array($controller->module,$aArticle)) $controller->module = 'home';
elseif(intval($controller->module)) header('location: ./genneral/'.$controller->module);
$controller->load();
?>