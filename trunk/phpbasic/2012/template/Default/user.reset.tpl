<div class="form">
<form method="post"name="formName" id="formName">
<h2>Reset password</h2>
<p class="msg">{msg}</p>
  <label for="email">Current Password  </label>
  <input type="text" id="currentpsw" onfocus="this.type='password';if(this.value==this.defaultValue) this.value='';" value="Enter current password"  name="currentpsw">
  <br />
  <label for="email"> New Password  </label>
  <input type="password" id="newpsw"  name="newpsw">
  <span class="error">*</span><br />
  <label for="user_display">Retype-pass  </label>
  <input type="password"  id="repsw"  name="repsw">
  <span class="error">*</span><br />
<label>&nbsp;</label><input type="submit" id="submit" value="Gửi đi" name="Submit" class="btn">
<input type="reset" value="Nhập lại" id="button2" name="button2" class="btn"><br />
  <label>&nbsp;</label>
  * password chỉ chứa ký tự chữ(a-z) hoặc số(0-9)<br />
  <label>&nbsp;</label>* không phân biệt chữ hoa/chữ thường<br />
</form></div>