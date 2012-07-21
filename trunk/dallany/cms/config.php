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
$cfg['root_admin'] = false;
$cfg['client'] = 'Dallany';
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

/*$i++;
$MenuName[$i] = 'Homepage';
$MenuLink[$i][] = array('name'=>'Content 1','link'=>'?mod=content&type=1');
*/
$i++;
$MenuName[$i] = 'Homepage';
$MenuLink[$i][] = array('name'=>'Brief copy','link'=>'?mod=html&act=update&id=1');
$MenuLink[$i][] = array('name'=>'Our story','link'=>'?mod=html&act=update&id=2');
$MenuLink[$i][] = array('name'=>'Insurance service','link'=>'?mod=html&act=update&id=6');


$i++;
$MenuName[$i] = 'Bridal';
$MenuLink[$i][] = array('name'=>'Manage bridal','link'=>'?mod=content&type=1');


$i++;
$MenuName[$i] = 'Collections';
//$MenuLink[$i][] = array('name'=>'Manage Colors','link'=>'?mod=options&type=1');
//$MenuLink[$i][] = array('name'=>'Manage Styles','link'=>'?mod=options&type=2');
$MenuLink[$i][] = array('name'=>'Manage collections','link'=>'?mod=content&type=2');

$i++;
$MenuName[$i] = 'Catalog';
$MenuLink[$i][] = array('name'=>'Manage catalog','link'=>'?mod=content&type=8');


$i++;
$MenuName[$i] = 'Diamond';
$MenuLink[$i][] = array('name'=>'Brief intro','link'=>'?mod=html&act=update&id=3');
$MenuLink[$i][] = array('name'=>'Manage diamond','link'=>'?mod=content&type=3');
$MenuLink[$i][] = array('name'=>'One of a kind','link'=>'?mod=content&type=5');

$i++;
$MenuName[$i] = 'Special events';
$MenuLink[$i][] = array('name'=>'Special events','link'=>'?mod=html&act=update&id=4');
//$MenuLink[$i][] = array('name'=>'Manage diamond','link'=>'?mod=content&type=3');

$i++;
$MenuName[$i] = 'Gallery';
$MenuLink[$i][] = array('name'=>'Manage gallery','link'=>'?mod=content&type=4');


$i++;
$MenuName[$i] = 'Charity';
$MenuLink[$i][] = array('name'=>'Manage charity','link'=>'?mod=html&act=update&id=5');

$i++;
$MenuName[$i] = 'Timepieces';
$MenuLink[$i][] = array('name'=>'Manage timepieces','link'=>'?mod=content&type=6');



$i++;
$MenuName[$i] = 'Contact';
$MenuLink[$i][] = array('name'=>'Store 1','link'=>'?mod=html&act=update&id=7');
$MenuLink[$i][] = array('name'=>'Store 2','link'=>'?mod=html&act=update&id=8');

//////// Admin Menu - please don't change it if you're not sure. ///

$i++;
$MenuName[$i] = 'Tools';
$MenuLink[$i][] = array('name'=>'Database backup','link'=>'?mod=tools&act=backup','class'=>'dbbackup');
//$MenuLink[$i][] = array('name'=>'TinyMCE Editor','link'=>'?mod=tools&act=tinymce');
$MenuLink[$i][] = array('name'=>'Server info','link'=>'?mod=tools&act=serverinfo','class'=>'serverinfo');
//$MenuLink[$i][] = array('name'=>'Google Analytics','link'=>'?mod=analytic','class'=>'analytic');

////
$i++;
$MenuName[$i] = 'Administrators';
//$MenuLink[$i][] = array('name'=>'Manage Admin Users','link'=>'?mod=user','class'=>'users');
//$MenuLink[$i][] = array('name'=>'Languages','link'=>'?mod=language','class'=>'languages','root_admin'=>true);
$MenuLink[$i][] = array('name'=>'Configure','link'=>'?mod=configure','class'=>'configure');
//$MenuLink[$i][] = array('name'=>'Defined pages','link'=>'?mod=module','class'=>'pages');

?>