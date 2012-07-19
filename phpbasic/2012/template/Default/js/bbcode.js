$.bbcode = function(obj){

	$(obj).find('span.bold').click(function(){
		insert_text_to_area(obj,'[b]','[/b]','Bold');
		return false;
	});	
	$(obj).find('span.italic').click(function(){
		insert_text_to_area(obj,'[i]','[/i]','Italic');
		return false;
	});	
	$(obj).find('span.underline').click(function(){
		insert_text_to_area(obj,'[u]','[/u]','Underline');
		return false;
	});	
	$(obj).find('span.image').click(function(){
		var img = window.prompt('Image ULR (http://)');
		if(img) insert_text_to_area(obj,'[img="'+img+'"]','','');
		return false;
	});	
	$(obj).find('span.link').click(function(){
		var url = window.prompt('Link ULR (http://)');
		if(url) insert_text_to_area(obj,'[url="'+url+'"]','[/url]','Click here');
		return false;
	});	

	$(obj).find('span.quote').click(function(){
		insert_text_to_area(obj,'[quote]','[/quote]','Quote');
		return false;
	});	
	$(obj).find('span.resize img.desc').click(function(){
		var h = $(obj).find('.form_content').height();
		if(h>=150){
			h -= 100;
			$(obj).find('.form_content').animate({'height': h+'px'});
		}
	});	
	$(obj).find('span.resize img.asc').click(function(){
		var h = $(obj).find('.form_content').height();
		if(h<=1000){
			h += 100;
			$(obj).find('.form_content').animate({'height': h+'px'});
		}
	});	
}