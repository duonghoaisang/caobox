<?php
defined('_ROOT') or die('Not Allowed');
$sql = "SELECT c.`module`,ln.* FROM php_module c,php_module_ln ln WHERE c.id = ln.id AND c.active = 1";
$num = "0";
$data = 'a:2:{i:0;a:9:{s:6:\"module\";s:4:\"news\";s:2:\"id\";s:1:\"1\";s:2:\"ln\";s:2:\"en\";s:4:\"name\";s:0:\"\";s:11:\"module_name\";s:0:\"\";s:9:\"web_title\";s:0:\"\";s:11:\"web_keyword\";s:0:\"\";s:8:\"web_desc\";s:0:\"\";s:10:\"meta_extra\";s:0:\"\";}i:1;a:9:{s:6:\"module\";s:4:\"news\";s:2:\"id\";s:1:\"1\";s:2:\"ln\";s:2:\"vn\";s:4:\"name\";s:7:\"Tin tuc\";s:11:\"module_name\";s:7:\"tin-tuc\";s:9:\"web_title\";s:7:\"Tin tuc\";s:11:\"web_keyword\";s:0:\"\";s:8:\"web_desc\";s:0:\"\";s:10:\"meta_extra\";s:0:\"\";}}';
?>