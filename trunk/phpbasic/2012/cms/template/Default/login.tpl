<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<script>
	window.onload = function(){
		document.form1.username.focus();
	}
</script>
</head>

<body>
<div id="login_form">
<p>CMS</p>
<form id="form1" name="form1" method="post" action="">
<label>Username</label><input name="username" type="text" id="username" />
<br />
<label>Password</label><input name="password" type="password" id="password" />
<br />
<label>&nbsp;</label><input type="submit" class="button" name="Submit" value="Login" />
</form>
</div>
</body>
</html>
