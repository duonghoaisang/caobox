<form action="" method="post"  name="fcontent" id="fcontent" enctype="multipart/form-data" >
<div class="top_callFunc">
	<div class="hide breadcrumb_cat">{xpath}</div>	
	<a href="{http_referer}" class="btn r">&lt; {lang.back}</a>
	<input type="hidden" name="draft_id" value="{draft_id}" />
	<input type="hidden" name="draft" value="{draft}" />
</div>


<!--BOX language_tab-->
<div class="language_tab {hide_no_html_record}">
	<!--BASIC language-->
		<a href="#" onclick="showLangTab('{language.ln}',this);" {language.tab_default}>{language.ln_name}</a>
	<!--BASIC language-->
</div>
<!--BOX language_tab-->

  <div class="error">{msg}</div>
  
<table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1">
<!--BASIC language-->
<tbody class="{language.default_ln} tab_language" id="tab_{language.ln}">
	<tr>
		<td class="td1">&nbsp;</td>
		<td class="td2">&nbsp;</td>
	</tr>
    <!--<tr class="hide {display_name}">
      <td class="textLabel">Name {language.ln_alias}</td>
      <td><input type="text" name="name[{language.ln}]" value="{language.name}" onkeyup="str2sef(this.value,'#sef_name_{language.ln}');" title="Vui long nhap Name" ></td>
    </tr>-->
	{language.ln_fields}
	{language.ln_fields_extra}
    <tr class="hide">
      <td class="textLabel">SEF URL </td>
      <td><input type="text" name="sef_name[{language.ln}]" value="{language.sef_name}" id="sef_name_{language.ln}" title="Vui long nhap Sef Name"></td>
    </tr>
    <tr class="hide {display_ln_icon}">
      <td class="textLabel">{ln_field_icon} {language.ln_alias} </td>
      <td><input name="ln_icon[{language.ln}]" class="no_width" type="file" id="ln_icon">
        
        {size_ln_icon}
		<p class="hide"><a href="{_UPLOAD}{language.ln_icon}" class="mb">{language.ln_icon}</a>
	    <input type="checkbox" name="delete_ln_icon[{language.ln}]" class="no_width" value="1" /> 
		<input name="current_ln_icon[{language.ln}]" type="hidden" value="{language.ln_icon}" title="{language.ln_icon}" class="box_delete_file" />
	    {lang.delete}		</p></td>
    </tr>
     <tr class="hide {display_ln_image}">
      <td class="textLabel">{ln_field_image} {language.ln_alias} </td>
      <td><input name="ln_image[{language.ln}]" class="no_width" type="file" id="ln_image">
        
        {size_ln_image}
		<p class="hide"><a href="{_UPLOAD}{language.ln_image}" class="mb">{language.ln_image}</a>
	    <input type="checkbox" name="delete_ln_image[{language.ln}]" class="no_width" value="1" /> 
		<input name="current_ln_image[{language.ln}]" type="hidden" value="{language.ln_image}" title="{language.ln_image}" class="box_delete_file" />
	    {lang.delete}		</p></td>
    </tr>
   <tr class="sep">
      <td></td>
      <td></td>
    </tr>
	</tbody>
<!--BASIC language-->
  </table>
  <hr />
  <table width="100%" border="0" cellspacing="0" cellpadding="0"class="table-Form1">
	<tr>
		<td class="td1">&nbsp;</td>
		<td class="td2">&nbsp;</td>
	</tr>
<!--BASIC options-->

    <tr>
      <td  valign="top" class="textLabel">{options.name}</td>
      <td>{options.values}
        <a href="#" onclick="return addOptions({options.typeid},'{options.js_string}',this);">New</a></td>
    </tr>
<!--BASIC options-->
  </table>
<br />
  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="table-Form1 {hide_no_languages}">
	<tr>
		<td class="td1">&nbsp;</td>
		<td class="td2">&nbsp;</td>
	</tr>
	{main_fields}
    <tr class="hide {display_icon}">
      <td class="textLabel">{field_icon}</td>
      <td><input name="icon" class="no_width" type="file" id="icon">
        
        {size_icon}
		<p class="hide"><a href="{_UPLOAD}{icon}" class="mb">{icon}</a>
	    <input type="checkbox" name="delete_icon" class="no_width" value="1" /> 
		<input name="current_icon" type="hidden" value="{icon}" title="{icon}" class="box_delete_file" />
	    {lang.delete}		</p></td>
    </tr>
    <tr class="hide {display_image}">
      <td class="textLabel">{field_image}</td>
      <td><input name="image" type="file" id="image" class="no_width">
        {size_image}
		<p class="hide"><a href="{_UPLOAD}{image}" class="mb">{image}</a> <input type="checkbox" name="delete_image" class="no_width" value="1"  /> 
		<input name="current_image" type="hidden" title="{image}" value="{image}" class="box_delete_file" />
		  {lang.delete} </p></td>
    </tr>
	<!--BASIC file_extra-->
	<tr>
		<td class="textLabel"><label>{file_extra.name}</label></td>
		<td><input name="file_extra{file_extra.stt}" type="file" id="image" class="no_width">
			<input name="file_extra_type[{file_extra.stt}]" type="hidden" value="{file_extra.type}" />
			<input name="file_extra_code[{file_extra.stt}]" type="hidden" value="{file_extra.code}" />
			{file_extra.note}  
			<p class="hide">
			<input name="current_file_extra{file_extra.stt}" type="hidden" title="{file_extra.file}" value="{file_extra.file}" class="box_delete_file" />
			<a href="{_UPLOAD}{file_extra.file}" class="mb">{file_extra.file}</a>
				<input type="checkbox" name="delete_file_extra{file_extra.stt}" class="no_width" value="1" />
				{lang.delete}			</p>				</td>
	</tr><!--BASIC file_extra-->
	<!--BASIC fields_extra-->
	<tr>
		<td class="textLabel"><label>{fields_extra.name}</label></td>
		<td>{fields_extra.value}</td>
	</tr><!--BASIC fields_extra-->
	
	<!--BASIC status_fields-->
	<tr>
		<td class="textLabel"><label>{status_fields.name}</label></td>
		<td>{status_fields.value}		</td>
	</tr><!--BASIC status_fields-->
    <tr class="hide {display_enable_date}">
      <td class="textLabel">{lang.date}</td>
      <td class="input_date">
      <input type="text" name="date" value="{date}" class="{enable_date_type}picker" />
      </td>
    </tr>
    <tr class="hide {display_gallery}">
      <td class="textLabel">{field_gallery_name} <br /> 
        {size_gallery}</td>
      <td><table width="75%" border="0" cellspacing="2" id="table-gallery" cellpadding="2" class="table_list list table-Form1 marginTop5">
	   <tr>
	     <th    class="th-checkbox firstColumn"><input title="Select all" type="checkbox" name="checkbox" onclick="checkAll('tbody.gallery',this,'del_gallery');" value="checkbox" /></th>
          <th width="76%"   class="th-name">{lang.name}</th>
          <th width="9%" align="center" class="th-status">{lang.status}</th>
          <th width="11%" align="center" class="th-status lastColumn">{lang.actions}</th>
        </tr>
	  <tbody class="gallery">
	 
       
		 <!--BASIC gallery-->
        <tr id="{gallery.id}">
          <td class="th-checkbox"><input type="checkbox" name="del_gallery[]" value="{gallery.id}" /></td>
          <td> {gallery.name}<a href="{_UPLOAD}{gallery.image}" class="mb">{gallery.image}</a></td>
          <td  align="center"><a href="?mod=gallery&act=active&p={module}&pid={id}&parentid={parentid}&type={type}&id={gallery.id}"><img src="images/icons_default/status{gallery.active}.gif" alt="Status"  /></a></td>
          <td align="center"><a href="?mod=gallery&act=update&p={module}&pid={id}&parentid={parentid}&type={type}&id={gallery.id}"><img src="images/icons_default/edit{ucp.new}.png" border="0" /></a> <a href="?mod=gallery&act=delete&p={module}&pid={id}&parentid={parentid}&type={type}&id={gallery.id}" onclick="deleteConfirm(this); return false;"><img src="images/icons_default/delete{ucp.delete}.png" border="0" /></a></td>
        </tr>
		<!--BASIC gallery-->
	</tbody>
      </table>
<div >
  <input type="button" name="Submit2" value="{lang.delete_selected_image}" class="btn" onclick="deleteGallery('#table-gallery',{type})" />
</div>
<p>&nbsp;</p>
<p class="link-addMore"><a href="#" onclick="add_gallery('#add_gallery','{is_gallery_name}','{is_gallery_icon}');return false">{lang.insert_more}</a></p>
	<div class="gallery-inputFile">
		<p class="hide {display_gallery_name}">
			<label>{lang.title}</label>
			<input name="name_gallery0" type="text" value="" title="" />						
		</p>
		<p class="hide {display_gallery_icon}">
			<label>{lang.icon}</label>
			<input type="file" name="icon_gallery0" size="25" />
		</p>
		<p>
			<label>Upload Image</label>
			<input type="file" name="image_gallery0" size="25" />
			<!--multiple-->
		</p>
	</div>
      <p id="add_gallery"></p>
	  
	  <!--<p>
	  	<span class="hide" {display_gallery_name}>Title <input name="name_gallery0" type="text" value="" title="" /><br /></span><span class="hide" {display_gallery_icon}>Icon <input type="file" name="icon_gallery0" class="no_width" /> </span>Image <input type="file" name="image_gallery0" class="no_width" /></p>
	  
<a href="#" onclick="add_gallery('#add_gallery','{is_gallery_name}','{is_gallery_icon}');return false"><img src="images/plus.jpg" align="absmiddle" /> Insert more</a>-->

		
			</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div class="table_Form1 {hide_no_languages}">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-Form1">
      <tr>
        <td class="textLabel">&nbsp;</td>
		
		<td>		
			<div class="l">
				<span class="hide  {display_update}">	
					<select name="back" id="back" class="submit_action">
						<option value="1" {back_list_1}>{lang.back_to_list}</option>
						<option value="0" {back_list_0}>{lang.keep_me_here}</option>
					</select>
				</span>
			</div>
			<input type="submit" class="btn" name="submit" value="{lang.save}" >
			<!--BOX btn_preview--><input type="submit" class="btn btn_preview"  name="btn_preview" value="{lang.btn_preview}"><!--BOX btn_preview-->
			<input type="button" class="btn btn_cancel" id="reset" onclick="location.href='{http_referer}';" value="{lang.cancel}">
			
		</td>
      </tr>
    </table>
    
  </div>
</form>
<script type="text/javascript">
	<!--BOX drapdrop_gallery-->
	var begin = null;
	$('#table-gallery tbody.gallery').tableDnD({
		onDragClass: "ondrag-list",
		onDragStart: function(table, row) {
			begin = $.tableDnD.serialize();
		},
		onDrop: function(table, row) {
			var after = $.tableDnD.serialize();
			if(begin != after){
				$.post('?mod=gallery&act=order&p=content',{'data': after});
			}
		}
    });
	<!--BOX drapdrop_gallery-->
	
	var opt = {
		required: [{required_fields}],
		required_lang: [{required_ln_fields}],
		lang: '{language}'
		
	};
	if({access_action} == '') opt['disabled'] = '{lang.user_no_access}';
	
	$('form#fcontent').preview();
	$('form#fcontent').validate(opt);
</script>