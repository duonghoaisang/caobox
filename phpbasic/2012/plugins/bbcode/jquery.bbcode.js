// JavaScript Document

(function($){
	$.fn.bbcode(settings){
		var _cfg = {
			handle: 'a',
			dir: 'images/'
		}
		if(settings)$.extend(_cfg,settings);
		
		$(this).find('span.bold').click(function(){
			//insert_text_to_area(cls,'[b]','[/b]','Bold');
			alert('Bold');
			return false;
		});	
	}		  
})(jQuery)