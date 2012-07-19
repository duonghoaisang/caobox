<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><span class="hide" {action_new}><img src="images/new_record.png" width="16" height="16" align="absmiddle" /> <a href="?mod={module}&amp;act=update&amp;p={p}&amp;do=new" title="New">New</a></span></div>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list" id="table-list">
  <tr>
    <th width="80%">Name</th>
    <th width="16%">Actions</th>
  </tr>
  <tbody class="pro">
  <!--BASIC gallery-->
  <tr id="{gallery.id}pro">
    <td><span class="hide" {action_comment}><a href="?mod=comment&amp;p=gallery&gp={p}&amp;pid={gallery.id}" title="Manage comments"><img src="images/msg.png" border="0" align="absmiddle" /></a> </span><a href="../upload/{gallery.image}" class="mb">{gallery.image}</a></td>
    <td align="center"><span class="hide" {action_update}><a href="?mod={module}&amp;act=update&amp;id={gallery.id}&amp;p={p}"><img src="images/edit.png" width="16" height="16" border="0" /></a></span> <span class="hide" {action_delete}><a href="?mod={module}&amp;act=delete&amp;id={gallery.id}&amp;p={p}" onClick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" /></a></span></td>
  </tr>
  <!--BASIC gallery-->
  </tbody>
</table>
<script type="text/javascript">
	var begin = null;
	$('#table-list tbody.pro').tableDnD({
		onDragClass: "ondrag-list",
		onDragStart: function(table, row) {
			begin = $.tableDnD.serialize();
		},
		onDrop: function(table, row) {
			var after = $.tableDnD.serialize();
			if(begin != after){
				$.post('?mod={module}&act=order', {'data':after})
			}
		}
    });
	$('a.mb').divbox();
</script>
