<div class="list">
	<div class="info">
	<h2>Dallany Jewellery Designs</h2>
	<div class="location col1">
		
{contact_store2}
	</div>
	<div class="location col2">
{contact_store1}
	</div>
	</div>
	<div class="copy">
	<p class="title">Contact</p>
	
      <form action="data.php?mod=xml&act=contact" onsubmit="return submitForm(this);" method="post" enctype="multipart/form-data" target="ifrUpload" id="form1">
	  <div class="required">* Required fields</div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="col1">&nbsp;</td>
            <td class="col2">*</td>
            <td class="col3"><input name="prefix" class="no_width" type="radio" value="Mr" />
              Mr 
                <input name="prefix" class="no_width" type="radio" value="Mr" />
Mrs <input name="prefix" type="radio" class="no_width" value="Mr" />
Ms</td>
          </tr>
        </table>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tr>
		      <td class="col1">First Name </td>
              <td class="col2">*</td>
              <td class="col3"><input name="firstname" type="text" id="firstname" /></td>
            </tr>
		    <tr>
		      <td class="col1">Last Name </td>
              <td class="col2">*</td>
              <td class="col3"><input name="lastname" type="text" id="lastname" /></td>
            </tr>
		    <tr>
		      <td class="col1">Email</td>
              <td class="col2">*</td>
              <td class="col3"><input name="email" type="text" id="email" /></td>
            </tr>
		    <tr>
		      <td valign="top" class="col1">Address</td>
              <td class="col2">&nbsp;</td>
              <td class="col3"><textarea name="address" rows="2" id="address"></textarea></td>
            </tr>
		    <tr style="display:none;">
		      <td class="col1">City</td>
              <td class="col2">&nbsp;</td>
              <td class="col3"><input name="city" type="text" id="city" /></td>
            </tr>
		    <tr style="display:none;">
		      <td class="col1">Zip Code </td>
              <td class="col2">&nbsp;</td>
              <td class="col3"><input name="zipcode" type="text" id="zipcode" /></td>
            </tr>
		    <tr style="display:none;">
		      <td class="col1">Country</td>
              <td class="col2">*</td>
              <td class="col3"><select name="country" id="country">
                <option value="Canada" selected="selected">Canada</option>
                </select>              </td>
            </tr>
	      </table>
		  <div class="required white">&nbsp;</div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
            <td class="col1">Topic</td>
            <td class="col2">*</td>
            <td class="col3"><input name="subject" type="text" id="subject" /></td>
          </tr>
          <tr>
            <td valign="top" class="col1">Comments</td>
            <td valign="top" class="col2">*</td>
            <td class="col3"><label>
              <textarea name="message" rows="3" id="message"></textarea>
            </label></td>
          </tr>
          <tr>
            <td valign="top" class="col1">Attachment</td>
            <td valign="top" class="col2">&nbsp;</td>
            <td class="col3"><input type="file" name="file" /></td>
          </tr>
        </table>
		<div class="required white">Would you like to stay in touch with Dallany? * </div>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="col1">&nbsp; </td>
              <td class="col2">&nbsp;</td>
              <td class="col3"><input name="touch" class="no_width" type="radio" value="Yes" />
              <span class="col1">Yes</span>
                <input type="radio" name="touch" class="no_width" value="No" />
              No</td>
            </tr>
          </table>
		    <div align="right" class="bottom_send">
				<span style="float:left;" class="error"></span>
		      <input class="btn" type="submit" name="Submit" value="Send" />
	        </div>
      </form>
</div>
	
</div>
