<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><span class="hide" {action_nlevel}><span class="hide" {action_newcat}><img src="images/new.gif" width="16" height="16" align="absmiddle" /> <a href="?mod=category&amp;p={module}&amp;act=update&amp;parentid={parentid}&amp;type={type}&amp;do=new" title="New category">New Category</a></span></span> <span class="hide" {action_rootnew}><span class="hide" {action_new}><img src="images/new_record.png" width="16" height="16" align="absmiddle" /> <a href="?mod={module}&amp;act=update&amp;parentid={parentid}&amp;type={type}&amp;do=new" title="New">New</a></span></span></div>
<div class="table_list">
  <form id="form1" name="form1" method="get" action="">Search
    <input name="mod" type="hidden" id="mod" value="content" />
    <input name="type" type="hidden" id="type" value="{type}" />
	<input name="parentid" type="hidden" id="parentid" value="{parentid}" />
    <input name="q" type="text" id="q" value="{q}" />
    <input name="cmd" type="submit" class="no_width" id="cmd" value="Search" />
  {search_result}
  </form>
</div><br />
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list" id="table-list">
  <tr>
    <th width="3%" class="hide" {action_top}>Top</th>
    <th width="82%">Name</th>
    <th width="5%">Status</th>
    <th width="10%">Actions</th>
  </tr>
  <tbody class="cat">
  <!--BASIC category-->
  <tr id="{category.id}cat">
    <td class="hide" {action_top}>&nbsp;</td>
    <td><span class="hide" {action_viewcat}><a href="./?mod={module}&amp;parentid={category.id}&type={type}" title="View list detail"><img src="images/folder.gif" width="16" height="16" border="0" align="absmiddle" /></a> </span>{category.name}</td>
    <td align="center"><a href="?mod=category&amp;p={module}&amp;act=active&amp;id={category.id}&amp;parentid={parentid}&amp;type={type}" title="Update satatus"><img src="images/status{category.active}.gif"  /></a></td>
    <td align="center"><span class="hide" {action_updatecat}><a href="?mod=category&amp;p={module}&amp;act=update&amp;id={category.id}&amp;parentid={parentid}&amp;type={type}" title="Edit"><img src="images/edit.png" width="16" height="16" border="0" /></a></span> <span class="hide" {action_deletecat}><a href="?mod=category&amp;p={module}&amp;act=delete&amp;id={category.id}&amp;parentid={parentid}&amp;type={type}" title="Delete" onclick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" /></a></span></td>
  </tr>
  <!--BASIC category-->
  </tbody>
  <tbody class="pro">
  <!--BASIC product-->
  <tr id="{product.id}pro">
    <td align="center" class="hide" {action_top}><a href="?mod={module}&amp;act=top&amp;id={product.id}&amp;parentid={parentid}&amp;type={type}" title="Add to top"><img src="images/status{product.top}" /></a></td>
    <td>{product.name}
	</td>
    <td align="center"><a href="?mod={module}&amp;act=active&amp;id={product.id}&amp;parentid={parentid}&amp;type={type}" title="Update status"><img src="images/status{product.active}" /></a></td>
    <td align="center"><span class="hide" {action_comment}><a href="?mod=comment&amp;p={module}&amp;pid={product.id}&amp;parentid={parentid}&amp;type={type}" title="Manage comments"><img src="images/msg.png" width="16" height="16" border="0" /></a></span> <span class="hide" {action_move}><a href="?mod={module}&amp;act=move&amp;id={product.id}&amp;parentid={parentid}&amp;type={type}" title="Move to category"><img src="images/move.png" width="16" height="16" border="0" /></a></span> <span class="hide" {action_update}><a href="?mod={module}&amp;act=update&amp;id={product.id}&amp;parentid={parentid}&amp;type={type}" title="Edit"><img src="images/edit.png" width="16" height="16" border="0" /></a></span> <span class="hide" {action_delete}><a href="?mod={module}&amp;act=delete&amp;id={product.id}&amp;parentid={parentid}&amp;type={type}" onclick="deleteConfirm(this); return false;" title="Delete"><img src="images/delete.png" width="16" height="16" /></a></span></td>
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
