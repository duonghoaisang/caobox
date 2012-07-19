<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
if(isset($_SESSION['user_login']['id'])) unset($_SESSION['user_login']);
cookie('remember','',-3600);
unset($_COOKIE);
$hook->redirect('../');



?>