<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
//defined('PHP') or die('You cannot connect this directory'); // this rows has been used for the app run from root server
define('_ROOT',rtrim(dirname(dirname(__FILE__)),'/').'/',true);
define('APPLICATION','cms',true);
include _ROOT.'bootstrap.php';
$controller = new Controller;
$controller->load();

?>