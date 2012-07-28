<?php defined('_ROOT') or die('Not Allowed');
$merge_block = 6;
$_tpl = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS Login - '.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').'</title>
<script type="text/javascript" src="template/js/login.js"></script>
<!--
	Website generated by CMS v02
	URL: http://demo.phpbasic.com
	Email: w2ajax@gmail.com
-->
<link rel="stylesheet" type="text/css" href="template/skins/'.(isset($this->merge['cfg']['skin_login'])?$this->merge['cfg']['skin_login']:'').'/css/login.css" />
</head>

<body>

<div class="client">'.(isset($this->_data["."][0]['web_client'])?$this->_data["."][0]['web_client']:'').'\'s Content Management System</div>

<h1>CMS <span>'.(isset($this->merge['lang']['login'])?$this->merge['lang']['login']:'').'</span></h1>
<div id="login">	
	<form id="form1" name="form1" method="post" action="" onsubmit="return checkLogin(this);">
		<p>
			<label>'.(isset($this->merge['lang']['username'])?$this->merge['lang']['username']:'').'<br />
			<input name="username" type="text" id="login-username" class="txf" /></label>
		</p>
		<p>
			<label>'.(isset($this->merge['lang']['password'])?$this->merge['lang']['password']:'').'<br />
			<input name="password" type="password" id="login-password" class="txf" /></label>
	
		</p>
		<p class="login-submit">			
			<input type="submit" class="btn btn-main1" name="Submit" value="'.(isset($this->merge['lang']['login'])?$this->merge['lang']['login']:'').'" />
			<span class="msg-error">'.(isset($this->_data["."][0]['error'])?$this->_data["."][0]['error']:'').'</span>
		</p>
	</form>	
</div>

</body>
</html>
'; ?>