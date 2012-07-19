<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><a href="{http_referer}">Back</a></div>
<div class="form"><form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list">
    <tr class="hide" {display_name}>
      <td>Title</td>
      <td><input name="name" type="text" id="title" value="{name}">&nbsp;</td>
    </tr>
    <tr class="hide" {display_content}>
      <td>Content</td>
      <td><textarea name="content" rows="5" class="tinymce">{content}</textarea></td>
    </tr>
    <tr class="hide" {display_icon}>
      <td width="16%">Icon</td>
      <td width="84%"><input name="icon" type="file" id="icon" class="no_width">
        <input name="current_icon" type="hidden" title="{icon}" value="{icon}" />
        {size_icon}
		<p>{icon} 
	    <input type="checkbox" name="checkbox" class="no_width" value="checkbox"  onclick="deleteImage('current_icon');" /> Delete		</p></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><input name="image" type="file" id="image" class="no_width"><input name="current_image" type="hidden" title="{image}" value="{image}" />
        {size_image}
		<p><a href="../upload/{image}" class="mb">{image}</a> <input type="checkbox" name="checkbox" class="no_width" value="checkbox" onClick="deleteImage('current_image');" /> Delete</p></td>
    </tr>
  </table>
  <div class="table_list" align="right">
    <input type="submit" class="btn" name="Submit" value="&nbsp;">
  </div>
</form></div>
