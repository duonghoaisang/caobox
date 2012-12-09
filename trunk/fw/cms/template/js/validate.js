// JavaScript Document

(function($){
	$.fn.validate = function(opt, force_call){
		$(this).find('input,textarea')[0].focus();
		//$(firstfocus).find(':first').focus();
		var cfg = {
			required: [],
			disabled: false,
			lang: 'vn'
		}
		if(opt) $.extend(cfg,opt);
		
		var required = {};
		for(var i in cfg.required_lang) required[cfg.required_lang[i]+'['+cfg.lang+']'] = true;
		for(var i in cfg.required) required[cfg.required[i]] = true;
		var obj  = this; 
		var fn = function(){
			if(cfg.disabled){
				alert(cfg.disabled);
				return false;
			}
			
			
			var r = true;
			$(obj).find('input,textarea,select').each(function(){
				if(required[this.name]===true && this.value == ''){
					alert(this.title?this.title:'Please input '+this.name.toUpperCase()); $(this).focus(); r = false;return false;
				}
			});//
			
			//if(typeof(cfg.fn) == 'function') cfg.fn(obj);
			//$(obj).find('input,textarea,select').attr({'disabled': 'disabled'});
			//$(obj).find('input[type="submit"],input[type="button"]').val('Saving.....').attr({'disabled': 'disabled'});
			if(r){
				var pH = window.innerHeight+window.scrollMaxY || document.body.scrollHeight || document.body.offsetHeight;
				$('.cms_overlay').css({height: pH}).show();
			}
			
			return r;
		}
		$(this).submit(fn);
		$(this).find('input[type="submit"]').click(function(){
			if($(this).attr('name') == 'btn_preview'){
				$(obj).attr('target','iframe_preview_site');
			}else{
				$(obj).attr('target','_self');
			}
		})
		
		
	}  
})(jQuery)

