<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$cfg = array();
//databas configure
$cfg['driver'] 	= 'mysql';
$cfg['server'] 	= 'localhost';
$cfg['port'] 		= '3306';
$cfg['usr'] 		= 'root';
$cfg['psw'] 		= '123';
$cfg['name'] 		= 'php_fw';
$cfg['prefix'] 		= 'php_';

//
$cfg['lang'] = 'vn';
$cfg['session_handle'] = '';// user / file
$cfg['error_report'] = E_ALL & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED;
$cfg['error_display'] = true;
$cfg['error_log'] = false;
$cfg['error_log_path'] = _ROOT.'data/log/';
$cfg['server_var'] = 'REQUEST_URI';
$cfg['url_file_default'] = 'index.php';
$cfg['cache'] = false;
$cfg['gzip'] = true;



//
//$core_ext[] = 'name_ext';

?>