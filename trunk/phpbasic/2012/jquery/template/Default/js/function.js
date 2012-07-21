function isEmail(s){if(s=="") return false;
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
function checkPostComment(doc){
	if(doc.name.value==''){alert('Please enter Fullname');doc.name.focus();return false;}
	if(doc.email.value != '' && !isEmail(doc.email.value)){alert('Please enter a valid Email');doc.email.focus();return false;}
	if(doc.message.value==''){alert('Please enter Message');doc.message.focus();return false;}
	$.post('/divbox',{'fullname': doc.name.value,'email': doc.email.value,'message': doc.message.value},function(data){
		if(data == '1'){
			$('.col2 div.message').prepend('<p><span>'+doc.name.value+'</span>'+doc.message.value.replace("\n",'<br />')+'</p>');
			$(doc).html('Your comment has been submitted. Thank you!');
		}
	});
	return false;
}