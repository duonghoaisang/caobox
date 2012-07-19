<div class="table_list toolbar"><img src="images/new_record.png" width="16" height="16" align="absmiddle" /> <a href="?mod={module}&amp;act=update&amp;do=new" title="New">New</a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">
  <tr>
    <th width="83%">Name</th>
    <th width="6%">Actions</th>
  </tr>
  <!--BASIC contact-->
  <tr>
    <td>{contact.name}</td>
    <td align="center"><a href="?mod={module}&act=update&id={contact.id}" title="Edit"><img src="images/edit.png" width="16" height="16" /></a> <a href="?mod={module}&amp;act=delete&amp;id={contact.id}" onClick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" /></a></td>
  </tr>
  <!--BASIC contact-->
</table>
