<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
require _ROOT.'config.inc.php';
if(file_exists(_APP.'config.inc.local.php')) require _APP.'config.inc.local.php';
require _APP.'defined.php';

// require framework
require _CORE.'core/caobox/framework.php';
require _CORE.'core/caobox/hooks.php';
require _CORE.'core/caobox/driver/'.$cfg['driver'].'.php';
require _CORE.'core/caobox/db.php';
require _CORE.'core/caobox/session.php';
require _CORE.'core/caobox/template.php';

//require MVC
require _CORE.'core/controller.php';
require _CORE.'core/model.php';
require _CORE.'core/view.php';
?>