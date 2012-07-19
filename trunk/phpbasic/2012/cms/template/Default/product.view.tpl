<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><span class="hide" {action_newcat}><img src="images/new.gif" width="16" height="16" align="absmiddle" /> <a href="?mod=category&amp;p={module}&amp;act=update&amp;parentid={parentid}&amp;type={type}&amp;do=new">New Category</a></span> <span class="hide" {action_new}><img src="images/new_record.png" width="16" height="16" align="absmiddle" /> <a href="?mod={module}&amp;act=update&amp;parentid={parentid}&amp;type={type}&amp;do=new">New Product</a></span></div>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list" id="table-list">
  <tr>
    <th width="80%">Name</th>
    <th width="16%">Actions</th>
  </tr>
  <tbody class="cat">
  <!--BASIC category-->
  <tr id="{category.id}cat">
    <td><a href="./?mod={module}&amp;parentid={category.id}&type={type}"><img src="images/folder.gif" width="16" height="16" border="0" align="absmiddle" /></a> {category.name}</td>
    <td align="center"><span class="hide" {action_update}><a href="?mod=category&amp;p={module}&amp;act=update&amp;id={category.id}&amp;parentid={parentid}&amp;type={type}"><img src="images/edit.png" width="16" height="16" border="0" /></a></span> <span class="hide" {action_delete}><a href="?mod=category&amp;p={module}&amp;act=delete&amp;id={category.id}&amp;parentid={parentid}&amp;type={type}" onclick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" /></a></span></td>
  </tr>
  <!--BASIC category-->
  </tbody>
  <tbody class="pro">
  <!--BASIC product-->
  <tr id="{product.id}pro">
    <td><span class="hide" {action_comment}><a href="?mod=comment&amp;p={module}&amp;pid={product.id}&amp;parentid={parentid}&amp;type={type}"><img src="images/file.gif" width="16" height="16" border="0" align="absmiddle" /></a> </span>{product.name}</td>
    <td align="center"><span class="hide" {action_update}><a href="?mod={module}&amp;act=update&amp;id={product.id}&amp;parentid={parentid}&amp;type={type}"><img src="images/edit.png" width="16" height="16" border="0" /></a></span> <span class="hide" {action_delete}><a href="?mod={module}&amp;act=delete&amp;id={product.id}&amp;parentid={parentid}&amp;type={type}" onclick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" /></a></span></td>
  </tr>
  <!--BASIC product-->
  </tbody>
</table>
<script type="text/javascript">
	var begin = null;
	$('#table-list tbody.cat').tableDnD({
		onDragClass: "ondrag-cat",
		onDragStart: function(table, row) {
			begin = $.tableDnD.serialize();
		},
		onDrop: function(table, row) {
			var after = $.tableDnD.serialize();
			if(begin != after){
				$.post('?mod=category&act=order',{'data': after});
			}
		}
    });
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
</script>
