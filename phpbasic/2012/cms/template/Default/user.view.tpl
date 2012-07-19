
<div class="table_list toolbar"><a href="?mod=user&act=update&do=new"><img src="images/new_record.png" width="16" height="16" /> New</a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">
  <tr>
    <th width="38%">Full Name </th>
    <th width="50%">Username</th>
    <th width="12%">Actions</th>
  </tr>
  <!--BASIC user-->
  <tr>
    <td>{user.fullname}</td>
    <td align="center">{user.username}</td>
    <td align="center"><span><a href="?mod=user&act=update&id={user.id}"><img src="images/edit.png" width="16" height="16" /></a></span> <span class="hide" {user.delete}><a href="?mod=user&act=delete&id={user.id}" onClick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" /></a></span></td>
  </tr>
  <!--BASIC user-->
</table>
