<div class="form"><form id="formName" name="formName" method="post">
<h2>Profile</h2>
<p class="msg">{msg}</p>
  <label for="email">Email </label>
  <input name="email" type="text" class="form_text" id="email" value="{email}" /><span class="require">*</span>
  <br />
  <label for="user_display">Display Name  </label>
  <input name="isdisplay" type="text"  id="isdisplay" value="{isdisplay}"  />
  <br />
  <legend style="width: 500px;">Your Signature</legend><br />

  <label for="user_signature">Text:</label>
   <textarea name="signature"   id="signature">{signature}</textarea>
   <br />
  <label for="user_website">Website</label>
<input name="website" type="text" id="website" value="{website}" />
  <br />
<label>&nbsp;</label><input type="submit" class="btn" name="Submit" value="{lang.submit}" id="submit" />
<input type="reset" class="btn" name="button2" id="button2" value="{lang.reset}" /><br />
  <label>&nbsp;</label>* username/password chỉ chứa ký tự chữ(a-z) hoặc số(0-9)<br />
  <label>&nbsp;</label>* không phân biệt chữ hoa/chữ thường<br />
</form>
</div>