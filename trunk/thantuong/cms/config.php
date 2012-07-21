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

$cfg['client'] = 'ThanTuong.vn';

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

$MenuName[$i] = 'Giới thiệu';

$MenuLink[$i][] = array('name'=>'Hình ảnh','link'=>'?mod=html&act=update&id=1');

$MenuLink[$i][] = array('name'=>'Tiêu điểm','link'=>'?mod=content&type=9');



$i++;

$MenuName[$i] = 'Trang chủ';

$MenuLink[$i][] = array('name'=>'Tin nóng','link'=>'?mod=content&type=10');



$i++;

$MenuName[$i] = 'Tin tức';

$MenuLink[$i][] = array('name'=>'Soi sao ','link'=>'?mod=content&type=2');

$MenuLink[$i][] = array('name'=>'Âm nhạc ','link'=>'?mod=content&type=3');

$MenuLink[$i][] = array('name'=>'Điện ảnh ','link'=>'?mod=content&type=4');

$MenuLink[$i][] = array('name'=>'Phong cách ','link'=>'?mod=content&type=5');

$MenuLink[$i][] = array('name'=>'Thể thao ','link'=>'?mod=content&type=6');

$MenuLink[$i][] = array('name'=>'Giải trí ','link'=>'?mod=content&type=7');

$MenuLink[$i][] = array('name'=>'Media ','link'=>'?mod=content&type=8');

$MenuLink[$i][] = array('name'=>'Sao trẻ ','link'=>'?mod=content&type=1');



$i++;

$MenuName[$i] = 'Banners';

$MenuLink[$i][] = array('name'=>'Banners ','link'=>'?mod=content&type=11');



$i++;

$MenuName[$i] = 'Footer';

$MenuLink[$i][] = array('name'=>'Manage footer','link'=>'?mod=html&act=update&id=2');









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

$MenuLink[$i][] = array('name'=>'Manage Admin Users','link'=>'?mod=user','class'=>'users');

$MenuLink[$i][] = array('name'=>'Languages','link'=>'?mod=language','class'=>'languages','root_admin'=>true);

$MenuLink[$i][] = array('name'=>'Configure','link'=>'?mod=configure','class'=>'configure');

$MenuLink[$i][] = array('name'=>'Defined pages','link'=>'?mod=module','class'=>'pages');



?>