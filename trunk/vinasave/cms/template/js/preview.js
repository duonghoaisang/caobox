// JavaScript Document

(function($){
	$.fn.preview = function(opt){
		var cfg = {
			btn_preview_name: 'btn_preview',
			iframe_preview:'iframe_preview_site'
		}
		if(opt) $.extend(cfg,opt);
		$('body').append('<div style="display:none;"><iframe src="about:blank" name="'+cfg.iframe_preview+'" id="'+cfg.iframe_preview+'" style="width:400px;border: 1px solid #000;"></iframe></div>');
		var obj  = this; 
		$(this).find('input[type="submit"]').click(function(){
			if($(this).attr('name') == 'btn_preview'){
				$(obj).attr('target',cfg.iframe_preview);
				$('#'+cfg.iframe_preview).load(function(){
					var str = $(this).contents().find('body').html();
					$('.cms_overlay').hide();
					var obj = str.split(':');
					var newid = obj[obj.length - 1];
					obj.pop();
					document.fcontent.draft_id.value = newid;
					window.open(obj.join(':'),'window_preview')
					
				});
			}else{
				$(obj).attr('target','_self');
			}
		})
		
		
	}  
})(jQuery)

