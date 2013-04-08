<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
$oMaster = new MasterModel;
$configure_mod = $oMaster->configure_mod();
$cfg = $configure_mod['cfg'];

$cache_dao = _CACHE.'dao.php';
if(!file_exists($cache_dao)){
	$file_str = '<?php'."\ndefined('_ROOT') or die('Not Allowed');\n";
	$dir = dir(_APP."/dao/");
	while ($file = $dir->read()) {
	  if (substr($file, -4) == '.php') {
		$class = ucfirst(substr($file,0,-4));
		$class_dao = $class.'DAO';
		require _APP.'dao/'.$file;
		$file_str .= 'require _APP.\''."dao/".$file."';\n";
		if(class_exists($class_dao)){
			${'o'.$class} = new $class_dao($configure_mod);
			if($cfg['cache_query']=='yes') ${'o'.$class}->setCache(_CACHE);
			$file_str .= '$o'.$class.' = new '.$class_dao."(\$configure_mod);\n";
			if($cfg['cache_query']=='yes') $file_str .= '$o'.$class.'->setCache(_CACHE);'."\n";
		}
	  }
	}
	$file_str .= '?>';
	$fp = @fopen($cache_dao,'w');
	if($fp){
		fwrite($fp,$file_str);
		fclose($fp);
	}
}else{
	include $cache_dao;
}


$request = $_GET;


if(!$cfg['template'] || !file_exists('template/'.$cfg['template'].'/master.tpl')) $cfg['template'] = 'Default';
$tpl = new View('template/'.$cfg['template'],$languages); 
$tpl->folder = 'img|format|media|css|images|flash|js|upload';
if(isset($cfg['gzip'])) $tpl->gzip = $cfg['gzip'];
if($cfg['cache_tpl']=='yes') $tpl->cache = _CACHE;

//Load main template
$tpl->setfile(array(
	'main'=>'master.tpl',
));



$tpl->assign(array(
	'root_dir'=>$system->root_dir,
	'_UPLOAD'=>_UPLOAD,
));
//print_r($_SERVER);
$tpl->merge((array)$system,'system');
$tpl->merge(isset($system->modules['url'][$system->module])?$system->modules['url'][$system->module]:array(),'switch_url');
$tpl->merge(isset($system->modules['data'][$system->module][$system->lang])?$system->modules['data'][$system->module][$system->lang]:array(),'pages');
$tpl->merge(isset($system->modules[$system->lang]['module'])?$system->modules[$system->lang]['module']:array(),'module');
$tpl->merge(isset($system->modules[$system->lang]['name'])?$system->modules[$system->lang]['name']:array(),'module_name');
$tpl->merge($cfg,'cfg');
$tpl->merge($languages,'lang');


?>