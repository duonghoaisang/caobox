<h4>Contact Page </h4>
<form name="form1" method="post" action="" id="fContact">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="14%">Fullname</td>
      <td width="86%"><input type="text" name="fullname"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="address"></td>
    </tr>
    <tr>
      <td>Tel</td>
      <td><input type="text" name="tel"></td>
    </tr>
    <tr>
      <td>Message</td>
      <td><textarea name="message"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span id="sending"></span><input type="submit" name="Submit" value="Submit"></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
function isEmail(s)
{if(s=="") return false;
if(s.indexOf(" ")>0) return false;
if(s.indexOf("@")==-1)return false;
var i=1; var sLength=s.length;
if(s.indexOf(".")==-1) return false;
if(s.indexOf("..")!=-1)return false;
if(s.indexOf("@")!=s.lastIndexOf("@")) return false;
if(s.lastIndexOf(".")==s.length-1)return false;
var str="abcdefghikjlmnopqrstuvwxyz-@._0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
for(var j=0;j<s.length;j++)
if(str.indexOf(s.charAt(j))==-1)
return false;return true;
}
$('#fContact').submit(function(){
	var fullname = $(this).find('input[name="fullname"]');
	var email = $(this).find('input[name="email"]');
	var tel = $(this).find('input[name="tel"]');
	var address = $(this).find('input[name="address"]');
	var message = $(this).find('textarea[name="message"]');
	
	
	
	
	if(fullname.val()==''){alert('Vui lòng nhập họ tên');fullname.focus();return false;}
	if(!isEmail(email.val())){alert('Vui lòng nhập email');email.focus();return false;}
	if(tel.val()==''){alert('Vui lòng nhập điện thoại');tel.focus();return false;}
	if(address.val()==''){alert('Vui lòng nhập Địa chỉ');company.focus();return false;}
	if(message.val()==''){alert('Vui lòng nhập Nội dung cần gửi');message.focus();return false;}
	
	var args = {
		'fullname': fullname.val(),
		'email': email.val(),
		'tel': tel.val(),
		'address': address.val(),
		'message': message.val()
	}
	$('#sending').html('Sending...');
	$(this).find('input[type="submit"]').attr({'disabled': 'disabled'});
	$.post('{root_dir}contact/',args,function(data){
		$('#sending').html('');
		$('#fContact').html('<p class="email_msg">'+data+'</p>');
	});
	return false;
});
</script>

