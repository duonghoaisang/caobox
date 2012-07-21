<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
ob_start();
phpinfo();
$html = ob_get_contents();
ob_end_clean();
$tpl->setfile(array(
	'body'=>'tools.serverinfo.tpl',
));
preg_match('/<body[^>]*>(.*).<\/body>/is',$html,$data);
$request['phpinfo'] = str_replace('class="h"','',$data[1]);
$tpl->assign($request);

?>