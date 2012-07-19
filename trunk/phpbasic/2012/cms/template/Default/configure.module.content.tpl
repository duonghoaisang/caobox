<div class="table_list toolbar"><a href="{http_referer}">Back</a></div>
<div class="form">
<form name="form1" method="post" action="">
<p>Type Id: #{typeid}</p>
    <h3>Product</h3>
    <table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">
  <tr>
    <td valign="top" width="200">Actions</td>
    <td>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="new" {new_checked}>
    New <br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="update" {update_checked}>
    Edit <br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="delete" {delete_checked}>
    Delete <br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="comment" {comment_checked}>
    Manage Comment     <br />
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="top:table-cell" {top_checked}>
    Top     <br />
   <input name="act[]" type="checkbox" class="no_width" id="act[]" value="rootproduct" {rootproduct_checked}>
   New product in root<br />
  
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="move" {move_checked}>
   Move to category	</td>
  </tr>
  <tr>
    <td valign="top">Fields</td>
    <td><input name="show_fields" type="text" id="show_fields" value="{show_fields}"></td>
  </tr>
  <tr>
    <td valign="top"><h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="image" {image_checked}> 
      Main Image</h4></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="200"><input name="main_icon[chose]" type="checkbox" class="no_width" id="main_icon[chose]" value="1" {main_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="main_icon[w]" type="text" class="no_width" id="main_icon[w]" size="2" maxlength="3" value="{main_icon_w}">
      x
      
      <input name="main_icon[h]" type="text" class="no_width" id="main_icon[h]" size="2" maxlength="3" value="{main_icon_h}"></td>
  </tr>
  <tr>
    <td><input name="main_img[chose]" type="checkbox" class="no_width" id="main_img[chose]" value="1" {main_img_chose}>
      Image</td>
    <td>Resize 
      <input name="main_img[w]" type="text" class="no_width" id="main_img[w]" size="2" maxlength="3" value="{main_img_w}">
      x
      <input name="main_img[h]" type="text" class="no_width" id="main_img[h]" size="2" maxlength="3" value="{main_img_h}"></td>
  </tr>
  <tr>
    <td><input name="main_thumb[chose]" type="checkbox" class="no_width" id="main_thumb[chose]" value="1" {main_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="main_thumb[w]" type="text" class="no_width" id="main_thumb[w]" size="2" maxlength="3" value="{main_thumb_w}">
      x
      <input name="main_thumb[h]" type="text" class="no_width" id="main_thumb[h]" size="2" maxlength="3" value="{main_thumb_h}"></td>
  </tr>
  <tr>
    <td> <h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="gallery" {gallery_checked}> 
      Gallery Image </h4></td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>Show fields </td>
    <td><input name="gallery_fields" type="text" id="gallery_fields" value="{gallery_fields}" /></td>
  </tr>
  <tr>
    <td width="200"><input name="gallery_icon[chose]" type="checkbox" class="no_width" id="gallery_icon[chose]" value="1" {gallery_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="gallery_icon[w]" type="text" class="no_width" id="gallery_icon[w]" size="2" maxlength="3" value="{gallery_icon_w}">
      x
      
      <input name="gallery_icon[h]" type="text" class="no_width" id="gallery_icon[h]" size="2" maxlength="3" value="{gallery_icon_h}"></td>
  </tr>
  <tr>
    <td><input name="gallery_img[chose]" type="checkbox" class="no_width" id="gallery_img[chose]" value="1" checked="checked" style="display: none;">
      Image</td>
    <td>Resize 
      <input name="gallery_img[w]" type="text" class="no_width" id="gallery_img[w]" size="2" maxlength="3" value="{gallery_img_w}">
      x
      <input name="gallery_img[h]" type="text" class="no_width" id="gallery_img[h]" size="2" maxlength="3" value="{gallery_img_h}"></td>
  </tr>
  <tr>
    <td><input name="gallery_thumb[chose]" type="checkbox" class="no_width" id="gallery_thumb[chose]" value="1" {gallery_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="gallery_thumb[w]" type="text" class="no_width" id="gallery_thumb[w]" size="2" maxlength="3" value="{gallery_thumb_w}">
      x
      <input name="gallery_thumb[h]" type="text" class="no_width" id="gallery_thumb[h]" size="2" maxlength="3" value="{gallery_thumb_h}"></td>
  </tr></table>  

 <h3>Category</h3>
       <table width="100%" border="0" cellspacing="0" cellpadding="2" class="table_list">

  <tr>
    <td width="22%" valign="top">Actions</td>
    <td width="78%">	
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="newcat" {newcat_checked}>
    New<br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="updatecat" {updatecat_checked}>
    Edit<br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="deletecat" {deletecat_checked}>
    Delete<br>
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="viewcat" {viewcat_checked}>
   View product in category<br /></td>
  </tr>
  <tr>
    <td valign="top">Level </td>
    <td> <input name="nlevel" type="text" class="no_width"  value="{nlevel}" size="3"></td>
  </tr>
  <tr>
    <td>Show fields </td>
    <td><input name="category_fields" type="text" id="gallery_fields" value="{category_fields}" /></td>
  </tr>
   <tr>
     <td> <h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="catimg" {catimg_checked}> 
      Image </h4></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
    <td width="200"><input name="catimg_icon[chose]" type="checkbox" class="no_width" id="catimg_icon[chose]" value="1" {catimg_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="catimg_icon[w]" type="text" class="no_width" id="catimg_icon[w]" size="2" maxlength="3" value="{catimg_icon_w}">
      x
      
      <input name="catimg_icon[h]" type="text" class="no_width" id="catimg_icon[h]" size="2" maxlength="3" value="{catimg_icon_h}"></td>
  </tr>
  <tr>
    <td><input name="catimg_img[chose]" type="checkbox" class="no_width" id="catimg_img[chose]" value="1" {catimg_img_chose}>
      Image</td>
    <td>Resize 
      <input name="catimg_img[w]" type="text" class="no_width" id="catimg_img[w]" size="2" maxlength="3" value="{catimg_img_w}">
      x
      <input name="catimg_img[h]" type="text" class="no_width" id="catimg_img[h]" size="2" maxlength="3" value="{catimg_img_h}"></td>
  </tr>
  <tr>
    <td><input name="catimg_thumb[chose]" type="checkbox" class="no_width" id="catimg_thumb[chose]" value="1" {catimg_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="catimg_thumb[w]" type="text" class="no_width" id="catimg_thumb[w]" size="2" maxlength="3" value="{catimg_thumb_w}">
      x
      <input name="catimg_thumb[h]" type="text" class="no_width" id="catimg_thumb[h]" size="2" maxlength="3" value="{catimg_thumb_h}"></td>
  </tr>
</table>
<div class="table_list" align="right">
    <input type="submit" class="btn" name="Submit" value="&nbsp;">
  </div>
</form></div>
