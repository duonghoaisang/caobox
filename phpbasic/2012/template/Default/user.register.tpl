<div class="form">
<form action="" method="post">
<h2>Register</h2>
<p class="msg">{msg}</p>
  <label for="username">Username  </label><input type="text" name="username" id="username" value="{username}" {onfocus} onblur="if(this.value=='') this.value = this.defaultValue;"><span class="require">*</span><br>
  <label for="password">Password </label>
  <input type="password"  name="password" id="password"><span class="require">*</span>
<br>
  <label for="reptype">Retype-pass  </label>
  <input type="password"  name="retype" id="retype"><span class="require">*</span>
  <br>
  <label for="email">Email  </label>
  <input type="text" name="email" id="email" value="{email}"><span class="require">*</span>
  <br>
  <label for="user_display">Display name  </label>
  <input type="text" name="user_display" id="user_display" value="{user_display}">
  <br>
<label>&nbsp;</label><input type="submit" value="Gửi đi" name="Submit" class="btn">
<input type="reset" value="Nhập lại"  class="btn"><br>
  <label>&nbsp;</label>* username/password chỉ chứa ký tự chữ(a-z) hoặc số(0-9)<br>
  <label>&nbsp;</label>* không phân biệt chữ hoa/chữ thường<br>
</form>
</div>