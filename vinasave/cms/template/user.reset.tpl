<div class="top_callFunc">
	<a href="{http_referer}" class="btn r">< Back</a>
</div>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="freset">
<div class="error">{msg}</div>

  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1">
  <tr>
      <td class="textLabel">{lang.current_password} <span class="red">*</span></td>
      <td><input name="current_password" type="password" title="Please enter your current password" id="title"></td>
    </tr>
    <tr>
      <td class="textLabel">{lang.new_password} <span class="red">*</span></td>
      <td><input name="password" type="password" title="Please enter your password" id="title"></td>
    </tr>
    <tr>
      <td class="textLabel">{lang.confirm_password} <span class="red">*</span></td>
      <td><input name="confirm" type="password" title="Confirm password must same with password"  id="confirm"></td>
    </tr>
	<tr>
      <td class="textLabel">&nbsp;</td>
      <td><br />
		  <input type="submit" class="btn" name="Submit" value="{lang.save}">
		  <input type="button" class="btn btn_cancel" value="{lang.cancel}" onclick="location.href='{http_referer}';">	  
	  </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
var opt = {
		required: ['current_password','password','confirm'],
		lang: 'vn'
	};
	$('form#freset').validate(opt);
</script>