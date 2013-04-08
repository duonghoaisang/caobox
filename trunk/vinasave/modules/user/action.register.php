<?php

if($_POST){
	if(isset($_SESSION["member"])){
		$result = json_encode(array('error'=>true, 'code'=> 'already_login'));
		die($result);
	}
	$email = addslashes($_POST['email']);
	$sql = $oClass->query("SELECT * FROM ".$oClass->prefix."member WHERE email = '$email'");
	if($sql->num_rows()){
		$result = json_encode(array('error'=>true, 'code'=> 'email_exists'));
		die($result);
	}
	
	$username = addslashes($_POST['username']);
	$sql = $oClass->query("SELECT * FROM ".$oClass->prefix."member WHERE username = '$username'");
	if($sql->num_rows()){
		$result = json_encode(array('error'=>true, 'code'=> 'username_exists'));
		die($result);
	}
	$check_date = checkdate(intval($_POST['m_dob']), intval($_POST['d_dob']), intval($_POST['y_dob']));
	if(!$check_date){
		$result = json_encode(array('error'=>true, 'code'=> 'date_invalid'));
		die($result);
	}
	
	if($_POST['security_code'] != $_SESSION['security_code']){
		$result = json_encode(array('error'=>true, 'code'=> 'security_code_invalid'));
		die($result);
	}
	
	$arr = array(
		'fullname'=>addslashes($_POST['fullname']),
		'email'=>addslashes($_POST['email']),
		'username'=>addslashes($_POST['username']),
		'password'=>md5($_POST['password']),
		'dob'=>addslashes($_POST['y_dob'].'-'.$_POST['m_dob'].'-'.$_POST['d_dob']),
		'sex'=>intval($_POST['sex']),
		'newsletter'=>intval($_POST['newsletter']),
	);
	$oContent->db->insert($oClass->prefix.'member',$arr);
	$login = $oClass->login($_POST['username'],$_POST['password']);
	$result = json_encode(array('error'=>false, 'code'=> 0));
	die($result);
	
	
}
if(isset($_SESSION["member"])) $hook->redirect($this->project);
$tpl->setfile(array(
	'body'=>'user.register.tpl',
));


for($i = 1; $i<= 31; $i++){
	$tpl->assign(array('value'=>$i,'name'=>$i),'list_date');
}

for($i = 1; $i<= 12; $i++){
	$tpl->assign(array('value'=>$i,'name'=>$i),'list_month');
}


