<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><img src="images/new.gif" width="16" height="16" align="absmiddle" /> <a href="?mod=category&amp;p={module}&amp;act=update&amp;parentid={parentid}&amp;type={type}&do=new">New Category</a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">
  <tr>
    <th width="80%">Name</th>
    <th width="16%">Actions</th>
  </tr>
  <!--BASIC category-->
  <tr>
    <td><a href="./?mod={module}&amp;parentid={category.id}&type={type}"><img src="images/folder.gif" width="16" height="16" border="0" align="absmiddle" /></a> {category.name}</td>
    <td align="center"><img src="images/folder.gif" width="16" height="16" border="0" align="absmiddle" /> <a href="?mod=category&amp;p={module}&amp;act=update&amp;id={category.id}&amp;parentid={parentid}&amp;type={type}"><img src="images/edit.png" width="16" height="16" border="0" /></a> <a href="?mod=category&amp;p={module}&amp;act=delete&amp;id={category.id}&amp;parentid={parentid}&amp;type={type}" onclick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" /></a></td>
  </tr>
  <!--BASIC category-->
</table>
