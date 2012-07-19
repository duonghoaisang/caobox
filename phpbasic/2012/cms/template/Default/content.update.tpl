<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><a href="{http_referer}">Back</a></div>
<div class="form"><form action="" method="post" enctype="multipart/form-data" name="form1">
  <p class="error">{msg}</p>
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list">
<!--BASIC language-->

    <tr class="hide" {display_name}>
      <td width="16%">Name {language.ln}</td>
      <td width="84%"><input type="text" name="name[{language.ln}]" value="{language.name}"></td>
    </tr>
    <tr class="hide" {display_intro}>
      <td>Intro {language.ln}</td>
      <td><textarea name="intro[{language.ln}]" rows="5">{language.intro}</textarea></td>
    </tr>
<!--BASIC language-->
  </table>

<br>
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list">
    <tr class="hide" {display_price}>
      <td>Price</td>
      <td><input name="price" type="text" id="price" value="{price}"></td>
    </tr>
    <tr class="hide" {display_icon}>
      <td width="16%">Icon</td>
      <td width="84%"><input name="icon" class="no_width" type="file" id="icon">
        <input name="current_icon" type="hidden" value="{icon}" title="{icon}" />
        {size_icon}
		<p class="hide" {display_update}><a href="../upload/{icon}" class="mb">{icon}</a>
	    <input type="checkbox" name="checkbox_icon" class="no_width" value="checkbox" onclick="deleteImage('current_icon');" /> Delete		</p></td>
    </tr>
    <tr class="hide" {display_image}>
      <td>Image</td>
      <td><input name="image" type="file" id="image" class="no_width"><input name="current_image" type="hidden" title="{image}" value="{image}" />
        {size_image}
		<p class="hide" {display_update}><a href="../upload/{image}" class="mb">{image}</a> <input type="checkbox" name="checkbox_img" class="no_width" value="checkbox" onclick="deleteImage('current_image');"  /> Delete</p></td>
    </tr>
    <tr class="hide" {display_gallery}>
      <td valign="top">Gallery <br /> 
        {size_gallery}</td>
      <td><table width="100%" border="0" cellspacing="2" id="table-gallery" cellpadding="2">
	  <tbody class="gallery">
	  <!--BASIC gallery-->
        <tr id="{gallery.id}">
          <td width="3%" align="center"><img src="images/view.gif" width="21" height="21" /></td>
          <td width="89%">{gallery.name}{gallery.image}</td>
          <td width="8%" align="center"><a href="?mod=gallery&act=update&p={module}&pid={id}&parentid={parentid}&type={type}&id={gallery.id}"><img src="images/edit.png" width="16" height="16" border="0" /></a><a href="?mod=gallery&act=delete&p={module}&pid={id}&parentid={parentid}&type={type}&id={gallery.id}" onclick="deleteConfirm(this); return false;"><img src="images/delete.png" width="16" height="16" border="0" /></a></td>
        </tr>
		<!--BASIC gallery-->
	</tbody>
      </table><p id="add_gallery"></p>
	  
	  <p><span class="hide" {display_gallery_name}>Title <input name="name_gallery0" type="text" value="" title="" /><br /></span><span class="hide" {display_gallery_icon}>Icon <input type="file" name="icon_gallery0" class="no_width" /> </span>Image <input type="file" name="image_gallery0" class="no_width" /></p>
	  
<a href="#" onclick="add_gallery('#add_gallery','{is_gallery_name}','{is_gallery_icon}');return false"><img src="images/plus.jpg" align="absmiddle" /> Insert more</a>
	  </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div class="table_list">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="89%" align="right"><select name="back" id="back">
        <option value="1" {back_list_1}>Go back to list</option>
        <option value="0" {back_list_0}>Keep here</option>
        </select></td>
        <td width="11%" align="right"><input type="submit" class="btn" name="Submit" value="&nbsp;"></td>
      </tr>
    </table>
    
  </div>
</form></div>
<script type="text/javascript">
	var begin = null;
	$('#table-gallery tbody.gallery').tableDnD({
		onDragClass: "ondrag-list",
		onDragStart: function(table, row) {
			begin = $.tableDnD.serialize();
		},
		onDrop: function(table, row) {
			var after = $.tableDnD.serialize();
			if(begin != after){
				$.post('?mod=gallery&act=order',{'data': after});
			}
		}
    });
	$('a.mb').divbox();
</script>