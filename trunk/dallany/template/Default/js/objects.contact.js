// JavaScript Document

var d = document;
var iframe = null;
var toElement = function(){
	var div = document.createElement('div');
	return function(html){
		div.innerHTML = html;
		var el = div.childNodes[0];
		div.removeChild(el);
		return el;
	}
}();

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
function createIframe(){
	var iframe = toElement('<iframe src="javascript:false;" name="ifrUpload" style="display: none;" />');
	iframe.name='ifrUpload';
	iframe.src='about:blank';
	iframe.style.display = 'none';
	d.body.appendChild(iframe);
	return iframe;	
}

function submitForm(frm){
	var prefix = '';
	var error_msg = 'Please complete all required fields';
	for(var i in frm.prefix) if(frm.prefix[i].checked) prefix = frm.prefix[i].value;
	
	if(prefix == ''){
		$('.error').html(error_msg);
		return false;
		
	}
	
	if(frm.firstname.value==''){
		$('.error').html(error_msg);
		frm.firstname.focus();
		return false;
		
	}
	if(frm.lastname.value==''){
		$('.error').html(error_msg);
		frm.lastname.focus();
		return false;
		
	}
	
	if(!isEmail(frm.email.value)){
		$('.error').html(error_msg);
		frm.email.focus();
		return false;
	}
	
	if(frm.subject.value==''){
		$('.error').html(error_msg);
		frm.subject.focus();
		return false;
	}
	
	if(frm.message.value==''){
		$('.error').html(error_msg);
		frm.message.focus();
		return false;
	}
	
	var touch = '';
	for(var i in frm.touch) if(frm.touch[i].checked) touch = frm.touch[i].value;
	
	if(touch == ''){
		$('.error').html(error_msg);
		return false;
	}
	//document.form1.submit();
	$('.error').html('Waiting....');
	$('.btn').attr({'disabled': 'disabled'});
	$(iframe).bind('load',function(e){
		var doc = iframe.contentDocument ? iframe.contentDocument : frames['ifrUpload'].document;
		var response;
							
		// fixing Opera 9.26
		if (doc.readyState && doc.readyState != 'complete'){
			// Opera fires load event multiple times
			// Even when the DOM is not ready yet
			// this fix should not affect other browsers
			return;
		}
		
		// fixing Opera 9.64
		if (doc.body && doc.body.innerHTML == "false"){
			// In Opera 9.64 event was fired second time
			// when body.innerHTML changed from false 
			// to server response approx. after 1 sec
			return;				
		}
		
		
		if (doc.XMLDocument){
			// response is a xml document IE property
			response = doc.XMLDocument;
		} else if (doc.body){
			// response is html document or plain text
			response = doc.body.innerHTML;
			//if (settings.responseType == 'json'){
				//response = window["eval"]("(" + response + ")");
			//}
		} else {
			// response is a xml document
			var response = doc;
		}	
		$(iframe).unbind('load');
		
		if(response == '1'){
			$('.error').html('Your message has been sent, thank you!');	
			frm.reset();
		}else{
			$('.error').html('Currently, mail server cannot send this email, please try again!');	
		}
		$('.btn').removeAttr('disabled');
	});
	
	//alert(response);
}



var contact = {sel: '#contact', list: 'data.php?mod=xml&act=contact', defaultTop: 400, introTop: 50, introH: 360, ourStoryTop: 50, ourStoryH: 420,bgafter: 'bg-contact-after.jpg'}
contact.main = function(w,h){
	var sel = this.sel;
	var list = this.list;
	var defaultTop = this.defaultTop;
	var introTop = this.introTop;
	var introH = this.introH;
	var offset = $('.header .menu').offset();
	$(sel).css({left: offset.left + 30});
	$.post(list,{},function(data){
		$('#background img.bgbefore').fadeOut(2000);
		$('#background img.bgadvance').fadeIn(2000,function(){
			$(sel).show().html(data);
		//$(sel).find('.copy').jScrollPane({showArrows:true});;	
			iframe = createIframe();
			setperformance(1);
		})
	});

}




contact.call_again = function(w,h){
	common.clear();	
	$(this.sel).find('.ourstory').hide();
	var marginTop  =  -1*Math.round(h/2);
	var marginLeft =  -1* Math.round(w/2);
	$('#background .images').append('<img src="template/Default/images/'+this.bgafter+'" width="'+w+'" class="bgadvance" style="display: none;margin-top: '+marginTop+'px;margin-left: '+marginLeft+'px;" />');

}