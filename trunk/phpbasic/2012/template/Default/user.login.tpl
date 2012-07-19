<div class="form"><form name="flogin" method="post" action="">
<h2>Login</h2>
{msg}
  <label for="username">Username</label><input type="text" id="username" name="username"><br>
  <label for="password">Password</label><input type="password" name="password" id="password"><br>
  <label>&nbsp;</label><input name="remember" type="checkbox" class="btn" value="1" checked="checked"> 
  Remember password <br />
  <label>&nbsp;</label><input type="submit" name="Submit" class="btn" value="Login"> <br />
  <label>&nbsp;</label><a href="{root_dir}user/forgot">Quên mật khẩu</a> | <a href="{root_dir}user/register">Tạo tài khoản mới</a>
</form><script type="text/javascript">document.flogin.username.focus();</script></div>

