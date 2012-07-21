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
$cfg['usr'] 		= 'dalla438_web';
$cfg['psw'] 		= 'basic753159';
$cfg['name'] 		= 'dalla438_web';
$cfg['prefix'] 		= 'php_';

//
$cfg['lang'] = 'vn';
$cfg['error_report'] = E_ALL & ~E_WARNING & ~E_NOTICE;
$cfg['error_display'] = false;
$cfg['server_var'] = 'REQUEST_URI';
$cfg['cache'] = false;
$cfg['gzip'] = true;


//
$core_ext[] = 'session';

?>