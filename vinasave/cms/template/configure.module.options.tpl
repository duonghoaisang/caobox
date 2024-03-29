<div class="table_list toolbar"><a href="{http_referer}">Back</a></div>
<div class="form">
<form name="form1" method="post" action="">
<p>Mode: Options <br>
  Id: #{page_or_id}</p>
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="table-Form1 table_list">
      <tr>
        <td width="21%">Name</td>
        <td width="79%"><input name="name" class="no_width" type="text" id="name" value="{name}" /></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><textarea name="content" rows="3" class="no_width">{content}</textarea></td>
      </tr>
      <tr>
        <td>Languages</td>
        <td><select name="languages">
          <option value="0">All</option>
		  <option value="1" {selected_languages_1}>Default language</option>
        </select>        </td>
      </tr>
    <tr>
      <td><h4>Text Editor </h4></td>
      <td><input name="act[]" type="checkbox" id="act[]" value="enable_editor"  {enable_editor_checked} class="no_width" /> 
         Enable TinyMCE </td>
    </tr>
      <tr>
        <td>Template view </td>
        <td><input name="tpl_view" type="text" id="tpl_view" value="{tpl_view}" /></td>
      </tr>
      <tr>
        <td>Template update </td>
        <td><input name="tpl_update" type="text" id="tpl_update" value="{tpl_update}" /></td>
      </tr>
	  <tr>
    <td valign="top">Default sort </td>
    <td>by 
      <select name="sort_default" id="sort_default">
      <option value="order_id" {sort_default_order_id}>Order Id</option>
      <option value="name" {sort_default_name}>Name</option>
      <option value="date" {sort_default_date}>Date</option>
      <option value="status" {sort_default_status}>Status</option>
    </select>
      <input name="sort_default_order" type="text" id="sort_default_order" value="{sort_default_order}" /></td>
  </tr>
	   <tr>
      <td>Search function </td>
      <td><input name="act[]" type="checkbox" id="act[]" value="enable_search"  {enable_search_checked} class="no_width" /> 
      Enable search function </td>
    </tr>
    <tr>
      <td valign="top">Labels <a href="#" onclick="add_buttons();">[+]</a> </td>
      <td><table width="100%" border="0" cellspacing="1" cellpadding="1" id="add_button" class="hide" >
        <tr>
          <td width="21%">Root</td>
          <td width="79%"><input name="button[root]" type="text" id="button[root]" value="{button.root}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Name </td>
          <td><input name="button[header_name]" type="text" id="button[header_name]" value="{button.header_name}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Date </td>
          <td><input name="button[header_date]" type="text" id="button[header_date]" value="{button.header_date}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Order </td>
          <td><input name="button[header_order]" type="text" id="button[header_order]" value="{button.header_order}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Status </td>
          <td><input name="button[header_status]" type="text" id="button[header_status]" value="{button.header_status}" /></td>
        </tr>
        <tr>
          <td>Header &gt; Actions</td>
          <td><input name="button[header_actions]" type="text" id="button[header_actions]" value="{button.header_actions}" /></td>
        </tr>
        <tr>
          <td>Tools text(with selected) </td>
          <td><input name="button[tools_copy]" type="text" id="button[tools_copy]" value="{button.tools_copy}" /></td>
        </tr>
        <tr>
          <td bgcolor="#eeeeee"><strong>Items</strong></td>
          <td bgcolor="#eeeeee">&nbsp;</td>
        </tr>
        <tr>
          <td width="21%">Add new item</td>
          <td width="79%"><input name="button[new_item]" type="text" id="button[new_item]" value="{button.new_item}" /></td>
        </tr>
        <tr>
          <td>Edit item </td>
          <td><input name="button[edit_item]" type="text" id="button[edit_item]" value="{button.edit_item}" /></td>
        </tr>
        <tr>
          <td>Delete item </td>
          <td><input name="button[delete_item]" type="text" id="button[delete_item]" value="{button.delete_item}" /></td>
        </tr>
        <tr>
          <td>Activate item </td>
          <td><input name="button[active_item]" type="text" id="button[active_item]" value="{button.active_item}" /></td>
        </tr>
        <tr>
          <td>inActivate item </td>
          <td><input name="button[inactive_item]" type="text" id="button[inactive_item]" value="{button.inactive_item}" /></td>
        </tr>
        <tr>
          <td>Status  item hover </td>
          <td><input name="button[status_hover_item]" type="text" id="button[status_hover_item]" value="{button.status_hover_item}" /></td>
        </tr>
      </table></td>
    </tr>
    </table>
    <h2 class="cfg_title">Configure Options </h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="2" class="table-Form1 table_list">
      <tr>
        <td>Enable input date </td>
        <td>
        <input name="act[]" type="checkbox" class="no_width" id="act[]" value="enable_date" {enable_date_checked} />
        <select name="enable_date_type">
          <option value="date">Date (yyyy-mm-dd)</option>
		  <option value="datetime" {selected_enable_date_type_datetime}>Date Time(yyyy-mm-dd h:i:s)</option>
        </select> 
        </td>
      </tr>
	  <tr>
        <td>Extra Files </td>
        <td><table width="666" border="0" cellpadding="1" cellspacing="1" id="file_extra">
          <tr>
            <td width="144" bgcolor="#eeeeee">Name <a href="#" title="Leave a blank for any extension ">?</a></td>
            <td width="39" bgcolor="#eeeeee">Code</td>
            <td width="249" bgcolor="#eeeeee">File type <a href="#" title="Leave a blank for any extension ">?</a> </td>
            <td width="221" bgcolor="#eeeeee">Note</td>
          </tr>
		  <!--BASIC file_extra-->
          <tr>
            <td><input type="text" name="file_extra[name][]" value="{file_extra.name}" /></td>
            <td><input name="file_extra[code][]" type="text" id="file_extra[code][]" value="{file_extra.code}" size="5" /></td>
            <td><input type="text" name="file_extra[type][]" value="{file_extra.type}" /></td>
            <td><input type="text" name="file_extra[note][]" value="{file_extra.note}" /><a href="#" onclick="delete_row(this);return false;"> x </a></td>
          </tr>
          <!--BASIC file_extra-->
        </table>
		<a href="#" onclick="add_file_extra('#file_extra','file_extra'); return false;">Add</a>		</td>
      </tr>
   <tr>
    <td valign="top">Show main fields </td>
    <td>
		<p><a href="?mod=configure&act=addfield&tbl=options" class="divbox">New field</a></p>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="17%" bgcolor="#eeeeee">Field</td>
        <td width="6%" bgcolor="#eeeeee">Name</td>
        <td width="14%" bgcolor="#eeeeee">Type</td>
        <td width="7%" bgcolor="#eeeeee">Require</td>
        <td width="13%" bgcolor="#eeeeee">Description</td>
        <td width="37%" bgcolor="#eeeeee">Require message </td>
        <td width="37%" bgcolor="#eeeeee">Sort order </td>
      </tr>
	  <!--BASIC main_field-->
      <tr>
        <td><input type="checkbox" name="main_fields[{main_field.code}][chose]" {main_field.chose_checked} value="1" />
          {main_field.code}</td>
        <td><input name="main_fields[{main_field.code}][name]" type="text" size="8" value="{main_field.name}"/></td>
        <td>{main_field.type}      </td>
        <td><input type="checkbox" name="main_fields[{main_field.code}][require]" value="1" {main_field.require_checked} /></td>
        <td><input name="main_fields[{main_field.code}][description]" type="text" size="8" value="{main_field.description}" /></td>
        <td><input name="main_fields[{main_field.code}][require_msg]" type="text" size="10" value="{main_field.require_msg}" /></td>
        <td><input name="main_fields[{main_field.code}][sortorder]" type="text" size="10" value="{main_field.sortorder}" /></td>
      </tr><!--BASIC main_field-->
    </table></td>
  </tr>
  <tr>
    <td valign="top">Show language fields </td>
    <td>
		<p><a href="?mod=configure&act=addfield&tbl=options_ln" class="divbox">New field</a></p>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="17%" bgcolor="#eeeeee">Field</td>
        <td width="6%" bgcolor="#eeeeee">Name</td>
        <td width="14%" bgcolor="#eeeeee">Type</td>
        <td width="7%" bgcolor="#eeeeee">Require</td>
        <td width="13%" bgcolor="#eeeeee">Description</td>
        <td width="37%" bgcolor="#eeeeee">Require message </td>
        <td width="37%" bgcolor="#eeeeee">Sort order </td>
      </tr>
	  <!--BASIC ln_field-->
      <tr>
        <td><input type="checkbox" name="ln_fields[{ln_field.code}][chose]" {ln_field.chose_checked} value="1" />
          {ln_field.code}</td>
        <td><input name="ln_fields[{ln_field.code}][name]" type="text" size="8" value="{ln_field.name}"/></td>
        <td>{ln_field.type}      </td>
        <td><input type="checkbox" name="ln_fields[{ln_field.code}][require]" value="1" {ln_field.require_checked} /></td>
        <td><input name="ln_fields[{ln_field.code}][description]" type="text" size="8" value="{ln_field.description}" /></td>
        <td><input name="ln_fields[{ln_field.code}][require_msg]" type="text" size="10" value="{ln_field.require_msg}" /></td>
        <td><input name="ln_fields[{ln_field.code}][sortorder]" type="text" size="10" value="{ln_field.sortorder}" /></td>
      </tr><!--BASIC ln_field-->
    </table>
     </td>
  </tr>

  <tr>
    <td valign="top">Required field </td>
    <td><input name="required_fields" type="text" id="required_fields" value="{required_fields}" /></td>
  </tr>
  <tr>
    <td valign="top">Fields on list </td>
    <td><input name="list_field" type="text" id="list_field" value="{list_field}" />&nbsp;</td>
  </tr>

    <tr>
    <td valign="top">Sort Order </td>
    <td><input name="sort_order" type="text" id="sort_order" value="{sort_order}" /></td>
  </tr>

    <tr>
      <td valign="top">&nbsp;</td>
      <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="drapdrop_content" {drapdrop_content_checked} />
      Enable drap-n-drop content &nbsp;</td>
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
      
      <input name="main_icon[h]" type="text" class="no_width" id="main_icon[h]" size="2" maxlength="3" value="{main_icon_h}">
	  Field name: <input name="main_icon[name]" type="text" class="no_width" id="main_icon[name]"  value="{main_icon_name}"><div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="main_icon[force_resize]" type="radio" value="true" {main_icon_force_resize_true} />
Force resize
  <input name="main_icon[force_resize]" type="radio" value="false" {main_icon_force_resize_false} />
Flexible  </td>
    <td><input name="main_icon[specify]" type="radio" value="none"  {main_icon_specify_none} />
      None
      <input name="main_icon[specify]" type="radio" value="min" {main_icon_specify_min} />
Min 
  <input name="main_icon[specify]" type="radio" value="max"  {main_icon_specify_max} />
Max </td>
    <td><input name="main_icon[orginal]" type="radio" value="0" {main_icon_orginal_0} />
No 
  <input name="main_icon[orginal]" type="radio" value="1" {main_icon_orginal_1} /> 
  Yes</td>
    </tr>
</table>
	  </div>	  </td>
  </tr>
  <tr>
    <td><input name="main_img[chose]" type="checkbox" class="no_width" id="main_img[chose]" value="1" {main_img_chose}>
      Image</td>
    <td>Resize 
      <input name="main_img[w]" type="text" class="no_width" id="main_img[w]" size="2" maxlength="3" value="{main_img_w}">
      x
      <input name="main_img[h]" type="text" class="no_width" id="main_img[h]" size="2" maxlength="3" value="{main_img_h}">
	  Field name: <input name="main_img[name]" type="text" class="no_width" id="main_img[name]"  value="{main_img_name}">	
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="main_img[force_resize]" type="radio" value="true" {main_img_force_resize_true} />
Force resize
  <input name="main_img[force_resize]" type="radio" value="false" {main_img_force_resize_false} />
Flexible  </td>
    <td><input name="main_img[specify]" type="radio" value="none"  {main_img_specify_none} />
      None
      <input name="main_img[specify]" type="radio" value="min" {main_img_specify_min} />
Min 
  <input name="main_img[specify]" type="radio" value="max"  {main_img_specify_max} />
Max </td>
    <td><input name="main_img[orginal]" type="radio" value="0" {main_img_orginal_0} />
No 
  <input name="main_img[orginal]" type="radio" value="1" {main_img_orginal_1} /> 
  Yes</td>
    </tr>
</table>

</div>  </td>
  </tr>
  <tr>
    <td><input name="main_thumb[chose]" type="checkbox" class="no_width" id="main_thumb[chose]" value="1" {main_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="main_thumb[w]" type="text" class="no_width" id="main_thumb[w]" size="2" maxlength="3" value="{main_thumb_w}">
      x
      <input name="main_thumb[h]" type="text" class="no_width" id="main_thumb[h]" size="2" maxlength="3" value="{main_thumb_h}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#eeeeee">Method</td>
    <td width="40%" bgcolor="#eeeeee">Specify</td>
    <td width="19%" bgcolor="#eeeeee">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="main_thumb[force_resize]" type="radio" value="true" {main_thumb_force_resize_true} />
Force resize
  <input name="main_thumb[force_resize]" type="radio" value="false" {main_thumb_force_resize_false} />
Flexible  </td>
    <td><input name="main_thumb[specify]" type="radio" value="none"  {main_thumb_specify_none} />
      None
      <input name="main_thumb[specify]" type="radio" value="min" {main_thumb_specify_min} />
Min 
  <input name="main_thumb[specify]" type="radio" value="max"  {main_thumb_specify_max} />
Max </td>
    <td>&nbsp;</td>
  </tr>
</table>
</div></td>
  </tr>
  <tr>
    <td valign="top"><h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="ln_image" {ln_image_checked}> 
      Languages Image</h4></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="200"><input name="ln_main_icon[chose]" type="checkbox" class="no_width" id="ln_main_icon[chose]" value="1" {ln_main_icon_chose}>
      Icon</td>
    <td>Resize 
      <input name="ln_main_icon[w]" type="text" class="no_width" id="ln_main_icon[w]" size="2" maxlength="3" value="{ln_main_icon_w}">
      x
      
      <input name="ln_main_icon[h]" type="text" class="no_width" id="ln_main_icon[h]" size="2" maxlength="3" value="{ln_main_icon_h}">
	  Field name: <input name="ln_main_icon[name]" type="text" class="no_width" id="ln_main_icon[name]"  value="{ln_main_icon_name}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="ln_main_icon[force_resize]" type="radio" value="true" {ln_main_icon_force_resize_true} />
Force resize
  <input name="ln_main_icon[force_resize]" type="radio" value="false" {ln_main_icon_force_resize_false} />
Flexible  </td>
    <td><input name="ln_main_icon[specify]" type="radio" value="none"  {ln_main_icon_specify_none} />
      None
      <input name="ln_main_icon[specify]" type="radio" value="min" {ln_main_icon_specify_min} />
Min 
  <input name="ln_main_icon[specify]" type="radio" value="max"  {ln_main_icon_specify_max} />
Max </td>
    <td><input name="ln_main_icon[orginal]" type="radio" value="0" {ln_main_icon_orginal_0} />
No 
  <input name="ln_main_icon[orginal]" type="radio" value="1" {ln_main_icon_orginal_1} /> 
  Yes</td>
    </tr>
</table>
</div>	  </td>
  </tr>
  <tr>
    <td><input name="ln_main_img[chose]" type="checkbox" class="no_width" id="ln_main_img[chose]" value="1" {ln_main_img_chose}>
      Image</td>
    <td>Resize 
      <input name="ln_main_img[w]" type="text" class="no_width" id="ln_main_img[w]" size="2" maxlength="3" value="{ln_main_img_w}">
      x
      <input name="ln_main_img[h]" type="text" class="no_width" id="ln_main_img[h]" size="2" maxlength="3" value="{ln_main_img_h}">
	  Field name: <input name="ln_main_img[name]" type="text" class="no_width" id="ln_main_img[name]"  value="{ln_main_img_name}">
	  
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="ln_main_img[force_resize]" type="radio" value="true" {ln_main_img_force_resize_true} />
Force resize
  <input name="ln_main_img[force_resize]" type="radio" value="false" {ln_main_img_force_resize_false} />
Flexible  </td>
    <td><input name="ln_main_img[specify]" type="radio" value="none"  {ln_main_img_specify_none} />
      None
      <input name="ln_main_img[specify]" type="radio" value="min" {ln_main_img_specify_min} />
Min 
  <input name="ln_main_img[specify]" type="radio" value="max"  {ln_main_img_specify_max} />
Max </td>
    <td><input name="ln_main_img[orginal]" type="radio" value="0" {ln_main_img_orginal_0} />
No 
  <input name="ln_main_img[orginal]" type="radio" value="1" {ln_main_img_orginal_1} /> 
  Yes</td>
    </tr>
</table>
</div>	  </td>
  </tr>
  <tr>
    <td><input name="ln_main_thumb[chose]" type="checkbox" class="no_width" id="ln_main_thumb[chose]" value="1" {ln_main_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="ln_main_thumb[w]" type="text" class="no_width" id="ln_main_thumb[w]" size="2" maxlength="3" value="{ln_main_thumb_w}">
      x
      <input name="ln_main_thumb[h]" type="text" class="no_width" id="ln_main_thumb[h]" size="2" maxlength="3" value="{ln_main_thumb_h}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#eeeeee">Method</td>
    <td width="40%" bgcolor="#eeeeee">Specify</td>
    <td width="19%" bgcolor="#eeeeee">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="ln_main_thumb[force_resize]" type="radio" value="true" {ln_main_thumb_force_resize_true} />
Force resize
  <input name="ln_main_thumb[force_resize]" type="radio" value="false" {ln_main_thumb_force_resize_false} />
Flexible  </td>
    <td><input name="ln_main_thumb[specify]" type="radio" value="none"  {ln_main_thumb_specify_none} />
      None
      <input name="ln_main_thumb[specify]" type="radio" value="min" {ln_main_thumb_specify_min} />
Min 
  <input name="ln_main_thumb[specify]" type="radio" value="max"  {ln_main_thumb_specify_max} />
Max </td>
    <td>&nbsp;</td>
  </tr>
</table>
	</div></td>
  </tr>
  <tr>
    <td> <h4><input name="act[]" type="checkbox" class="no_width" id="act[]" value="gallery" {gallery_checked}> 
      Gallery Image </h4></td>
    <td><input name="act[]" type="checkbox" class="no_width" id="act[]" value="drapdrop_gallery" {drapdrop_gallery_checked} /> Enable drap-n-drop gallery&nbsp;<br />
	<input name="act[]" type="checkbox" class="no_width" id="act[]" value="multiselect_file_gallery" {multiselect_file_gallery_checked} /> Multi select file (only Firefox, also only enable this option when gallery is not include title or icon)<br />
      Gallery name: 
      <input name="gallery_name" type="text" id="gallery_name" value="{gallery_name}" /></td>
  </tr>
  <tr>
    <td>Order by </td>
    <td>order_id AND      
      <select name="gallery_sort" id="gallery_sort">
        <option value="id ASC">Id ASC</option>
        <option value="id DESC">Id DESC</option>
      </select></td>
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
      
      <input name="gallery_icon[h]" type="text" class="no_width" id="gallery_icon[h]" size="2" maxlength="3" value="{gallery_icon_h}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="gallery_icon[force_resize]" type="radio" value="true" {gallery_icon_force_resize_true} />
Force resize
  <input name="gallery_icon[force_resize]" type="radio" value="false" {gallery_icon_force_resize_false} />
Flexible  </td>
    <td><input name="gallery_icon[specify]" type="radio" value="none"  {gallery_icon_specify_none} />
      None
      <input name="gallery_icon[specify]" type="radio" value="min" {gallery_icon_specify_min} />
Min 
  <input name="gallery_icon[specify]" type="radio" value="max"  {gallery_icon_specify_max} />
Max </td>
    <td><input name="gallery_icon[orginal]" type="radio" value="0" {gallery_icon_orginal_0} />
No 
  <input name="gallery_icon[orginal]" type="radio" value="1" {gallery_icon_orginal_1} /> 
  Yes</td>
    </tr>
</table>
	</div></td>
  </tr>
  <tr>
    <td><input name="gallery_img[chose]" type="checkbox" class="no_width" id="gallery_img[chose]" value="1" checked="checked" style="display: none;">
      Image</td>
    <td>Resize 
      <input name="gallery_img[w]" type="text" class="no_width" id="gallery_img[w]" size="2" maxlength="3" value="{gallery_img_w}">
      x
      <input name="gallery_img[h]" type="text" class="no_width" id="gallery_img[h]" size="2" maxlength="3" value="{gallery_img_h}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#eeeeee">Method</td>
    <td width="29%" bgcolor="#eeeeee">Specify</td>
    <td width="21%" bgcolor="#eeeeee">Keep orginal image </td>
    </tr>
  <tr>
    <td><input name="gallery_img[force_resize]" type="radio" value="true" {gallery_img_force_resize_true} />
Force resize
  <input name="gallery_img[force_resize]" type="radio" value="false" {gallery_img_force_resize_false} />
Flexible  </td>
    <td><input name="gallery_img[specify]" type="radio" value="none"  {gallery_img_specify_none} />
      None
      <input name="gallery_img[specify]" type="radio" value="min" {gallery_img_specify_min} />
Min 
  <input name="gallery_img[specify]" type="radio" value="max"  {gallery_img_specify_max} />
Max </td>
    <td><input name="gallery_img[orginal]" type="radio" value="0" {gallery_img_orginal_0} />
No 
  <input name="gallery_img[orginal]" type="radio" value="1" {gallery_img_orginal_1} /> 
  Yes</td>
    </tr>
</table>
		</div></td>
  </tr>
  <tr>
    <td><input name="gallery_thumb[chose]" type="checkbox" class="no_width" id="gallery_thumb[chose]" value="1" {gallery_thumb_chose}>
      Image Thumb </td>
    <td>Resize 
      <input name="gallery_thumb[w]" type="text" class="no_width" id="gallery_thumb[w]" size="2" maxlength="3" value="{gallery_thumb_w}">
      x
      <input name="gallery_thumb[h]" type="text" class="no_width" id="gallery_thumb[h]" size="2" maxlength="3" value="{gallery_thumb_h}">
	  
	  <div class="resize_toggle_advance"><a href="#" onclick="return resize_toggle_advance(this);">Advandce</a>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" bgcolor="#eeeeee">Method</td>
    <td width="40%" bgcolor="#eeeeee">Specify</td>
    <td width="19%" bgcolor="#eeeeee">&nbsp;</td>
  </tr>
  <tr>
    <td><input name="gallery_thumb[force_resize]" type="radio" value="true" {gallery_thumb_force_resize_true} />
Force resize
  <input name="gallery_thumb[force_resize]" type="radio" value="false" {gallery_thumb_force_resize_false} />
Flexible  </td>
    <td><input name="gallery_thumb[specify]" type="radio" value="none"  {gallery_thumb_specify_none} />
      None
      <input name="gallery_thumb[specify]" type="radio" value="min" {gallery_thumb_specify_min} />
Min 
  <input name="gallery_thumb[specify]" type="radio" value="max"  {gallery_thumb_specify_max} />
Max </td>
    <td>&nbsp;</td>
  </tr>
</table>
		</div></td>
  </tr>
  
  
    </table>  
<script type="text/javascript">
$('a.divbox').divbox({width: 520, height: 80});
</script>


    <div class="table_list" align="right">
    <input type="submit" class="btn" name="Submit" value="Save">
  </div>
</form></div>
