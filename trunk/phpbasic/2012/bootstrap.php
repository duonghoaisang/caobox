<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
session_start();
require _ROOT.'db_config.php';
require _CORE.'core/caobox.php';
require _CORE.'core/hooks.php';
require _CORE.'core/controller.php';
require _CORE.'core/scripts/driver/'.$cfg['driver'].'.php';
require _CORE.'core/scripts/db.php';
require _CORE.'core/model.php';
require _CORE.'core/scripts/template.php';
require _CORE.'core/view.php';
?>