<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><a href="{http_referer}">Back</a></div>
<div class="form"><form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list">
<!--BASIC language-->

    <tr class="hide" {display_name}>
      <td width="16%">Name {language.ln}</td>
      <td width="84%"><input type="text" name="name[{language.ln}]" value="{language.name}"></td>
    </tr>
    <tr class="hide" {display_intro}>
      <td>Intro {language.ln}</td>
      <td><textarea name="intro[{language.ln}]" class="tinymce" rows="5">{language.intro}</textarea></td>
    </tr>
<!--BASIC language-->
  </table>

<br>
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table_list">
    <tr class="hide" {display_icon}>
      <td width="16%">Icon</td>
      <td width="84%"><input name="icon" type="file" id="icon" class="no_width">
        <input name="current_icon" type="hidden" title="{icon}" value="{icon}" />
        {size_icon}
		<p>{icon} 
	    <input type="checkbox" name="checkbox" class="no_width" value="checkbox"  onclick="deleteImage('current_icon');" /> Delete		</p></td>
    </tr>
    <tr class="hide" {display_image}>
      <td>Image</td>
      <td><input name="image" type="file" id="image" class="no_width"><input name="current_image" type="hidden" title="{image}" value="{image}" />
        {size_image}
		<p>{image} <input type="checkbox" name="checkbox" class="no_width" value="checkbox" onclick="deleteImage('current_image');" /> Delete</p></td>
    </tr>
  </table>
  <div class="table_list" align="right">
    <input type="submit" class="btn" name="Submit" value="&nbsp;">
  </div>
</form></div>
