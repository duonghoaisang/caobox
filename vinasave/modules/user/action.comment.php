<?php
if($_POST){
	$comment = addslashes($_POST['comment']);
	$_SESSION['post_comment'] = $comment;
	if(!isset($_SESSION["member"])){
		die(json_encode(array('error'=>true,'code'=>'not_login','redirect_url'=>$_POST['redirect_url'])));
	}
	
	$arr = array(
		'module'=>'content',
		'pageid'=>intval($_POST['id']),
		'memid'=>$_SESSION["member"]['id'],
		'content'=>$comment,
		'active'=>0,
	);
	$oContent->db->insert($oClass->prefix.'comment',$arr);
	unset($_SESSION['post_comment']);
	die(json_encode(array(
		'error'=>false,
		'code'=>'ok',
		'fullname'=>$_SESSION["member"]["fullname"],
		'comment'=>$_POST['comment'],
		'avatar'=>''
	)));
}
?>