// Copyright (C) 2010 - www.phpbasic.com
(function($){
	$.fn.content = function(settings,afterload,afterpost){
		var _cfg = {
			toolbar: 'self', // self or parent
			validate: {},
			loading: 'data loading...'
		}
		if(typeof afterload == 'function') _cfg['afterload'] = afterload;
		if(typeof afterpost == 'function') _cfg['afterpost'] = afterpost;
		if(settings) $.extend(_cfg,settings);
		var action = function(){
			var obj = this; 
			if(!obj.href){ alert("You're must DOM select on hyperlink (<a>)!"); return false;}
			var tbar = $(obj).parent();
			tbar.append('<p class="loading">'+_cfg.loading+'</p>');
			$.post(obj.href,{'load':true},function(data){
				$(obj).hide();
				tbar.find('p.loading').remove();
				if(_cfg.afterload) _cfg.afterload(obj,data);
				$.bbcode(tbar);
				tbar.find('input:first').focus();
				tbar.find('a.hide').click(function(){
					$(obj).show();
					tbar.find('.bbcode').remove();
				});
				tbar.find('form').submit(function(){
					var args = {'submit':true,'error':0}
					if(_cfg.validate) $.each(_cfg.validate,function(key,val){
						var t = tbar.find('form *[name="'+key+'"]');
						if(t.val()==''){args['error'] = 1; alert(val);t.focus(); return false;}
						args[key] = t.val();
					});
					if(args['error']==0) $.post(obj.href,args,function(data){
						$(obj).show();
						tbar.find('.bbcode').remove();
						if(_cfg.afterpost) _cfg.afterpost(obj,data);
					});
					return false;
				});
			});
			return false;
		}
		$(this).live('click',action);
	
	}		  
	$.fn._delete = function(settings,afterpost){
		var _cfg = {
			msg: 'Are you sure you want delete this items?'
		}
		if(typeof afterpost == 'function') _cfg['afterpost'] = afterpost;
		if(settings) $.extend(_cfg,settings);
		var action = function(){
			if(window.confirm(_cfg.msg)){
				var obj = this;
				$.post(obj.href,{'submit':1},function(data){
					if(_cfg.afterpost) _cfg.afterpost(obj,data);
				});
			}
			return false;
		}
		$(this).live('click',action);
		
	}		  
})(jQuery)


