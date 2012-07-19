<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);


function ajax_permission(){
	$headers = getallheaders();
	if((!$headers['X-Requested-With']&&!$headers['x-requested-with']) || ($headers['X-Requested-With']&&$headers['X-Requested-With']!='XMLHttpRequest') // Firefox
		|| ($headers['x-requested-with']&&$headers['x-requested-with']!='XMLHttpRequest') // IE
	) return false;
	return true;
}

function content_permission($userid,$contentid){
	if($_SESSION['user_login']['isadmin']) return true;
	if($_SESSION['user_login']['id']==intval($userid)) return true;
	if(!isset($_SESSION['user_login']['id']) && $_COOKIE['content'][$contentid] && md5($contentid) == substr($_COOKIE['content'][$contentid],10,32)) return true;
	return false;
}

function comment_permission($userid,$commentid){
	if($_SESSION['user_login']['isadmin']) return true;
	if($_SESSION['user_login']['id']==intval($userid)) return true;
	if(!isset($_SESSION['user_login']['id']) && $_COOKIE['comment'][$commentid] && md5($commentid) == substr($_COOKIE['comment'][$commentid],10,32)) return true;
	return false;
}

function login_permission(){
	if($_SESSION['user_login']['id']) return true;
	return false;
}

function cookie($name,$value=NULL,$time=NULL,$path=NULL,$domain=NULL){
	setcookie($name,$value,$time?$time:time()+24*3600,'/~phpbasic/v02/','112.213.88.177');
}

	

?>