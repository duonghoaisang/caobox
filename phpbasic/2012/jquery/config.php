<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

$cfg = array();
$cfg['session'] = 0; // 0: session file, 1: session db
$cfg['error_report'] = 0;

$cfg['limit'] = 20;
$cfg['debug'] = 1;
$cfg['session_layer'] = '';
$cfg['cookie_domain'] = 'phpbasic.com';
$cfg['cookie_path'] = '/';
$cfg['template'] = 'Default';


require_once _ROOT.'libraries/common/functions.php';
include _ROOT.'libraries/smtp/class.phpmailer.php';
require_once _ROOT.'libraries/common/email.php';
require_once _ROOT.'libraries/common/page.php';

?>