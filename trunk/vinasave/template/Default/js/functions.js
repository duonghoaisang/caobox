function isEmail(s){
	if(s=="") return false;
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
function registerUser(doc){
	var fullname = doc.fullname.value;
	var email = doc.email.value;
	var username = doc.username.value;
	var password = doc.password.value;
	var repassword = doc.repassword.value;
	var d_dob = doc.d_dob.value;
	var m_dob = doc.m_dob.value;
	var y_dob = doc.y_dob.value;
	var accept_term = doc.accept_term.checked;
	var security_code = doc.security_code.value;
	
	
	if(fullname == ''){
		alert('Vui long nhap ho ten');
		doc.fullname.focus();
		return false;
	}
	
	if(!isEmail(email)){
		alert('Vui long nhap Email');
		doc.email.focus();
		return false;
	}
	
	if(username == ''){
		alert('Vui long nhap username');
		doc.username.focus();
		return false;
	}
	if(password == ''){
		alert('Vui long nhap mat khau');
		doc.password.focus();
		return false;
	}
	if(repassword == '' || repassword != password){
		alert('Vui long nhap xac nhan mat khau');
		doc.repassword.focus();
		return false;
	}
	if(d_dob == 0 || m_dob == 0 || y_dob == ''){
		alert('Chon ngay thang nam sinh');
		return false;
	}
	if(security_code == ''){
		alert('Vui long nhap ma bao ve');
		return false;
	}
	if(accept_term == false){
		alert('Ban fai dong y voi dieu khoan cua chung toi');
		return false;
	}
	
	$.post(root_dir+'user/register',$(doc).serialize(),function(data){
		if(data.error == false){
			alert('Success!')
		}else{
			alert(data.code)
		}
	},'json');
	return false;
}
function loginUser(doc){
	var username = doc.username.value;
	var password = doc.password.value;
	
	if(username == ''){
		alert('Vui long nhap username');
		doc.username.focus();
		return false;
	}
	if(password == ''){
		alert('Vui long nhap mat khau');
		doc.password.focus();
		return false;
	}
	$.post(root_dir+'user/login',$(doc).serialize(),function(data){
		if(data.error == false){
			if(data.redirect_url) location.href = root_dir+data.redirect_url;
			else location.href = root_dir;
		}else{
			alert('Username/password ko dung');
			doc.username.value='';
			doc.password.value='';
		}
	},'json');
	return false;
}
function post_comment(doc){
	if(doc.comment.value==''){
		alert('Vui long nhap comment');
		doc.comment.focus();
		return false;
	}
	$.post(root_dir+'user/comment',$(doc).serialize(),function(data){
		if(data.error == false){
			var comment_row = $('#comment_rows').html();
			comment_row = comment_row.replace('$fullname$',data.fullname);
			comment_row = comment_row.replace('$comment$',data.comment);
			$('#comment_data').append(comment_row);
		}else{
			if(data.code == 'not_login'){
				alert('Ban phai login de dang comment');
				location.href = root_dir+'user/login/&redirect_url='+data.redirect_url;
			}
			
		}
	},'json');
	return false;
}