<div class="table_list toolbar"><a href="{BACK}">Back</a></div>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">
  <tr>
    <th width="2%">Status</th>
    <th width="66%">Comment</th>
    <th width="11%">Poster</th>
    <th width="14%">Date</th>
    <th width="7%">Actions</th>
  </tr>
  <!--BASIC comment-->
  <tr>
    <td align="center"><a href="{LINK}&act=active&id={comment.id}"><img src="images/status{comment.active}.gif" width="10" height="10" border="0"></a></td>
    <td>{comment.content}</td>
    <td align="center">{comment.mem}</td>
    <td align="center">{comment.timestamp}</td>
    <td align="center"><span class="hide" {action_delete}><a href="{LINK}&act=delete&id={comment.id}" onClick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" /></a></span></td>
  </tr>
  <!--BASIC comment-->
</table>
