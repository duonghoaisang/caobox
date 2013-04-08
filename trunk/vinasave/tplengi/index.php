<?php
ini_set('display_errors','On');


function exception_handler($exception) {
	echo $exception->getMessage();
	echo '<br />-----<br />';
	echo $exception->__toString();
	$trace = $exception->getTrace();
	//print_r( $trace);
	echo '-------------------';
	//print_r($exception);
}

set_exception_handler('exception_handler');

if(get_magic_quotes_runtime()){
	if(function_exists('set_magic_quotes_runtime')){
		set_magic_quotes_runtime(false);
	}
}
if(get_magic_quotes_gpc()){
	function strip_value(&$value){
		$value = stripslashes($value);
	}
	if(isset($_POST)) array_walk_recursive($_POST, 'strip_value');
	if(isset($_GET)) array_walk_recursive($_GET, 'strip_value');
	if(isset($_SESSION)) array_walk_recursive($_SESSION, 'strip_value');
	if(isset($_COOKIE)) array_walk_recursive($_COOKIE, 'strip_value');
}

$conn = mysql_connect('localhost','root','123');
mysql_select_db('game',$conn);
mysql_query("begin");
mysql_query("INSERT INTO `game`.`userinfo` (`username`, `password`, `nick`, `level`, `last_mana`, `mana`, `has_num`, `max_num`, `main_ueid`) VALUES ('abc', '2223', 'Linh NMT', 1, 33, 333, 1, 10, 0);
");
mysql_query("DELETE FROM `game`.`log_userinfo_login` WHERE uid = 1 LIMIT 1");
//mysql_query("commit");
include 'template.php';

$tpl = new Template();
$data = array();
$data['var'] = 5;
$data['var5'] = 20;
$data['loop'] = array(
	array('name'=>'Test 1'),
	array('name'=>'Test 2')
);

echo $tpl->get($data,'template.tpl');
echo '<br />-----------commit';
mysql_query("commit");
?>