<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"></div>
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
    <tr class="hide" {display_content}>
      <td>Content {language.ln}</td>
      <td><textarea name="content[{language.ln}]" class="tinymce" rows="5">{language.content}</textarea></td>
    </tr>
<!--BASIC language-->
  </table><br />
<br />

  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list">
    <tr class="hide" {display_icon}>
      <td width="16%">Icon</td>
      <td width="84%"><input name="icon" type="file" id="icon" class="no_width">
        <input name="current_icon" type="hidden" title="{icon}" value="{icon}" />
        {size_icon}
		<p><a href="../upload/{icon}" rel="lightbox">{icon}</a>
	    <input type="checkbox" name="checkbox" class="no_width" value="checkbox"  onclick="deleteImage('current_icon');" /> Delete		</p></td>
    </tr>
    <tr class="hide" {display_image}>
      <td>Image</td>
      <td><input name="image" type="file" id="image" class="no_width"><input name="current_image" type="hidden" title="{image}" value="{image}" />
        {size_image}
		<p><a href="../upload/{image}" rel="lightbox">{image}</a> <input type="checkbox" name="checkbox" class="no_width" value="checkbox" onClick="deleteImage('current_image');" /> Delete</p></td>
    </tr>
    <tr class="hide" {display_image}>
      <td valign="top">Gallery<br />
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
	  
	  <p><a href="#" onclick="add_gallery('#add_gallery','{is_gallery_name}','{is_gallery_icon}');return false"><img src="images/plus.jpg" align="absmiddle" /> Insert more</a></p>
</td>
    </tr>
  </table>
  <div class="table_list" align="right">
    <input type="submit" class="btn" name="Submit" value="&nbsp;">
  </div>
</form></div>
