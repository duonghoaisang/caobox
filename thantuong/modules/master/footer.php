<?php
$tpl->setfile(array(
	'rightbanner320'=>'master.rightbanner320.tpl',
	'rightbanner220'=>'master.rightbanner220.tpl',
));
echo $tpl->display();
$tpl->cache();
//$cache->parse($html);
?>