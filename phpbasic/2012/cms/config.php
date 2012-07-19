<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

//$cfg['lang'] = 'en';//if you want to run this application in 1 language ( no switch languages)
$cfg['template'] = 'Default';
$cfg['root_admin'] = true;
$cfg['client'] = 'Hoang Gia Turning';
$cfg['sef'] = true;

// config includes files for application
include _ROOT.'libraries/php4/common.php';
include _ROOT.'libraries/common/functions.php';
include _ROOT.'libraries/common/breadcrumb.php';
include _ROOT.'libraries/common/image.php';
include _ROOT.'libraries/common/page.php';
include _ROOT.'libraries/smtp/class.phpmailer.php';
include _ROOT.'libraries/common/email.php';
/*if(intval(PHP_VERSION) == 5){
	include _ROOT.'libraries/gapi/gapi.class.php';
}
*/
$i = -1;
// Menu 

$i++;
$MenuName[$i] = 'Homepage';
$MenuLink[$i][] = array('name'=>'Brief intro','link'=>'?mod=html&amp;act=update&id=3');


$i++;
$MenuName[$i] = 'About us';
$MenuLink[$i][] = array('name'=>'Brief intro','link'=>'?mod=html&amp;act=update&id=1');

$i++;
$MenuName[$i] = 'Design';
$MenuLink[$i][] = array('name'=>'Manage design','link'=>'?mod=content&type=1');
/*$MenuLink[$i][] = array('name'=>'Manage Events','link'=>'?mod=content&type=2');
$MenuLink[$i][] = array('name'=>'Manage Content3','link'=>'?mod=content&type=3');
$MenuLink[$i][] = array('name'=>'Manage Colors','link'=>'?mod=options&type=1');
$MenuLink[$i][] = array('name'=>'Manage Size','link'=>'?mod=options&type=2');
*/

$i++;
$MenuName[$i] = 'Gears';
$MenuLink[$i][] = array('name'=>'Manage gears','link'=>'?mod=content&type=2');

$i++;
$MenuName[$i] = 'News/Events';
$MenuLink[$i][] = array('name'=>'Manage news','link'=>'?mod=content&type=3');
$MenuLink[$i][] = array('name'=>'Manage events','link'=>'?mod=content&type=4');

$i++;
$MenuName[$i] = 'Jobs';
$MenuLink[$i][] = array('name'=>'Manage jobs','link'=>'?mod=content&type=5');
$MenuLink[$i][] = array('name'=>'Job app/ info','link'=>'?mod=html&act=update&id=2');








//////// Admin Menu - please don't change it if you're not sure. ///

$i++;
$MenuName[$i] = 'Tools';
$MenuLink[$i][] = array('name'=>'Database backup','link'=>'?mod=tools&act=backup','class'=>'dbbackup');
//$MenuLink[$i][] = array('name'=>'TinyMCE Editor','link'=>'?mod=tools&act=tinymce');
$MenuLink[$i][] = array('name'=>'Server info','link'=>'?mod=tools&act=serverinfo','class'=>'serverinfo');
$MenuLink[$i][] = array('name'=>'Google Analytics','link'=>'?mod=analytic','class'=>'analytic');

////
$i++;
$MenuName[$i] = 'Administrators';
$MenuLink[$i][] = array('name'=>'Manage Admin Users','link'=>'?mod=user','class'=>'users');
$MenuLink[$i][] = array('name'=>'Languages','link'=>'?mod=language','class'=>'languages');
$MenuLink[$i][] = array('name'=>'Configure','link'=>'?mod=configure','class'=>'configure');
$MenuLink[$i][] = array('name'=>'Defined pages','link'=>'?mod=module','class'=>'pages');

?>