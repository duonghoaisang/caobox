<?php
define('_ROOT',rtrim(dirname(__FILE__),'/').'/',true);
define('_CORE','/home/phpbasic/domains/phpbasic.com/public_html/',true);
define('APPLICATION','',true);
include _CORE.'bootstrap.php';
$controller = new Controller(true,true,true);
$controller->load();
?>