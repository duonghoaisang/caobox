$(document).ready(function(){	
	$('a.mb').divbox({path: '../plugins/divbox/players/'});
	$('.error,.breadcrumb_cat').each(function(){
		if($(this).html() != '') $(this).show();						  
	});
	$('input.box_delete_file').each(function(){
		 if($(this).val() != '') $(this).parent().show();
	});
	
	$('a').each(function(){
		var idx = this.href.indexOf('?');
		//var jshref = this.href.search('javascript');
		if(this.href.search('javascript')) this.href += idx>-1?'&token='+token:'?token='+token;
	});
	var datepicker_obj = {
			showOn:"button",
			buttonImage:plugins_dir+'plugins/dateinput/date.png',
			buttonImageOnly:true,
			stepMinutes:1,
			stepHours:1,
			showSecond:true,
			showTimepicker:true,
			showButtonPanel:true,
			dateFormat:"yy-mm-dd",
			timeFormat:"hh:mm:ss"	
		}
	$('.datepicker').datepicker(datepicker_obj);
	$('.datetimepicker').datetimepicker(datepicker_obj);
})


function checkAll(selects,obj,input_name){
	var st = obj.checked;
	if(input_name == '') input_name = 'pro';
	$(selects+ ' input[name="'+input_name+'\\[\\]"]').each(function(){
		this.checked = st;
	});
}

// function deleteConfirm 
function deleteConfirm(o,msg){
	if(window.confirm(msg?msg:'Do you really want to delete the selected row(s) ?')){
		if(access_delete) location.href=o.href+'&c=1';
		else{alert('You have no access to do this action.');return false;}
	}
	return false;
}


function add_gallery(selector,is_gallery_name,is_gallery_icon){
	var len = $(selector+ ' input[type="file"]').length+1;	
	$(selector).append('<div class="gallery-inputFile">'+
					'<p class="hide '+(is_gallery_name?'show':'')+'"><label>Title</label> <input name="name_gallery'+len+'" type="text" value="" title="" /></p>'+
					'<p class="hide '+(is_gallery_icon?'show':'')+'"><label>Upload Icon</label> <input type="file" name="icon_gallery'+len+'" size="25" /></p>'+
					'<p><label>Upload Image</label> <input type="file" name="image_gallery'+len+'" size="25" /></p>'+
				'</div>');
}

function  deleteGallery(selects,type){
	if(window.confirm('Are you really  want to delete selected image(s)?')){
		if(access_delete){
			$(selects+' input[name="del_gallery\\[\\]"]').each(function(){
				var id = this.value;
				if(this.checked) $.post('?mod=gallery&act=delete&p=content&c=1&echo=1&type='+type+'&id='+id,{},function(data){
					if(data=='1') $(selects+ ' #'+id).remove();
				});
			});
		}else{
			alert('You have no access to do this action');	
		}
	}
}



function checkSubmitAction(doc){
	if(doc.content_action.value==''){ alert('Please chose the action!');doc.content_action.focus();return false;}
	if(doc.content_action.value == 'delete'){
		if(window.confirm('Are you sure you want to delete  selected items ?')){
			if(access_delete) return true;
			alert('You have no access to do this action');
			return false;
		}
		return false;
	}
	overlay();
	return true;
}
function stripUnicode(str){
	if(!str) return '';
	var unicode_arr = [];
	unicode_arr['a'] = ['á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'];
	unicode_arr['A'] = ['Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'];
	unicode_arr['d'] = ['đ'];
	unicode_arr['D'] = ['Đ'];
	unicode_arr['e'] = ['é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'];
	unicode_arr['E'] = ['É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'];
	unicode_arr['i'] = ['í','ì','ỉ','ĩ','ị'];
	unicode_arr['I'] = ['Í','Ì','Ỉ','Ĩ','Ị'];
	unicode_arr['o'] = ['ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'];
	unicode_arr['0'] = ['Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'];
	unicode_arr['u'] = ['ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'];
	unicode_arr['U'] = ['Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'];
	unicode_arr['y'] = ['ý','ỳ','ỷ','ỹ','ỵ'];
	unicode_arr['Y'] = ['Ý','Ỳ','Ỷ','Ỹ','Ỵ'];
	
	for(var chr in unicode_arr){
		var regexp = new RegExp(unicode_arr[chr].join('|'),'ig');
		str = str.replace(regexp,chr)
	}
	return str;
}
function str2sef(str,sel){
	str = stripUnicode(str);
	str = str.toLowerCase();
	str = str.replace(/\-/ig,' ');
	str = str.replace(/^\s+|\s+$/g,"");
	str = str.replace(/\s+/ig,'-');
	$(sel).val(str);	
}


function showLangTab(ln,o){
	$('div.language_tab a').removeClass('active');
	$(o).addClass('active');
	$('table.table-Form1 tbody.tab_language').addClass('hide');
	$('table.table-Form1 tbody#tab_'+ln).removeClass('hide');
}

function overlay(){
	var pH = window.innerHeight+window.scrollMaxY || document.body.scrollHeight || document.body.offsetHeight;
	$('.cms_overlay').css({height: pH}).show();
}

function missing_field(name){
	alert('Field: "'+name+'" is missing, please contact webadmin to fix it');	
}

function save_status_menu(menuid,val){
	$.post('?mod=user&act=menu',{'menuid': menuid,'status': (val == 'none'?1:0)},function(data){});
}

function addOptions(typeid,js_string,obj){
	var label = window.prompt('Name');
	if(label){
		$(obj).html('Waiting...');
		$.post('?mod=options&act=update',{'savequick': true, 'typeid': typeid, 'lang': lang, 'name': label},function(data){
			var value = parseInt(data);
			if(value > 0){
				js_string = js_string.replace('%value',value);
				js_string = js_string.replace('%label',label);
				$('#opt'+typeid).append(js_string);
			}else{
				alert(data);
			}
			$(obj).html('New');
		});
	}
	
	return false;
}

function resize_toggle_advance(o){
	$(o).parent().find('table').toggle();
	return false;
}

function sitePreview(form,value){
	$('form#fcontent').attr('target',value);
	$('#iframe_preview_site').load(function(){
		var str = $(this).contents().find('body').html();
		$('.cms_overlay').hide();
		var obj = str.split(':');
		var newid = obj[obj.length - 1];
		obj.pop();
		document.fcontent.draft_id.value = newid;
		window.open(obj.join(':'),'window_preview')
		
	});
}

