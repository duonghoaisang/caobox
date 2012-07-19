<div class="breadcrumb">{xpath}</div>
<div class="table_list toolbar"><a href="{http_referer}">Back</a></div>
<div class="form"><form name="form1" method="post" action="">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_list">
      <tr>
        <td width="20%">Choose a  category </td>
        <td width="80%"><select name="catid" id="catid">
		 <option value="0">Root</option>
          <!--BASIC category-->
		  <option value="{category.id}" {category.selected}>{category.prefix}{category.name}</option>
		  <!--BASIC category-->
        </select>
        <input type="submit" name="Submit" class="no_width" value="Move" /></td>
      </tr>
    </table>
</form></div>
    