<div class="top_callFunc">
	<a href="?mod=user" class="btn r">&lt; {lang.back}</a>
</div>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="fuser">
<h3>{lang.username}: {username}</h3>
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1">
    <tr>
      <td class="textLabel">{lang.name} <span class="red">*</span></td>
      <td><input name="fullname" type="text" id="title" value="{fullname}" title="Please enter your full name">&nbsp;</td>
    </tr>
    <tr>
      <td class="textLabel">{lang.skin}</td>
      <td><select name="skin" id="skin">
	  <!--BASIC skin-->
        <option value="{skin.value}" {skin.selected}>{skin.name}</option><!--BASIC skin-->
      </select>      </td>
    </tr>
	<tr>
	  <td class="textLabel">{lang.icon}</td>
	  <td><select name="icon" id="icon">
        <!--BASIC icon-->
        <option value="{icon.value}" {icon.selected}>{icon.name}</option>
        <!--BASIC icon-->
      </select></td>
    </tr>
    <!--BOX block_ip-->
    <tr>
	  <td class="textLabel">Your IP</td>
	  <td>{my_ip}</td>
    </tr>
    <tr>
	  <td class="textLabel">
	   Only allow IPs <a href="#" title="User can login only from these IPs, leave blank to accept from any IP">?</a>
	  </td>
	  <td>
	  <textarea  name="ip_allow">{ip_allow}</textarea>
	  <br />Ex: 118.1.3.10,210.2.7.23,...
	  </td>
    </tr>
    <tr>
	  <td class="textLabel">
	   Deny IPs <a href="#" title="User cannot login  from these IPs, leave blank to accept from any IP">?</a>
	  </td>
	  <td>
	  <textarea  name="ip_deny">{ip_deny}</textarea>
	  <br />Ex: 118.1.3.10,210.2.7.23,...
	  </td>
    </tr>
    <!--BOX block_ip-->
	<tr>
      <td class="textLabel">&nbsp;</td>
      <td align="right"><br />
	  	<input type="submit" class="btn" name="Submit" value="{lang.save}">
	  <input type="button" class="btn btn_cancel" value="{lang.cancel}" onclick="location.href='{http_referer}';">      </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
var opt = {
		required: ['fullname'],
		lang: 'vn'
	};
	$('form#fuser').validate(opt);
</script>