// JavaScript Document
var gallery = {sel: '#gallery' ,list: 'data.php?mod=xml&act=gallery',detail: 'data.php?mod=xml&act=gallery&id=', listH: 326, bgafter: 'bg-gallery-after.jpg'}
gallery.main = function(w,h){
	var sel = this.sel;
	var img = new Image;
	var list = this.list;
	var listH = this.listH;
	var offset = $('.header .menu').offset();
	
		
	$.post(list,{},function(data){
		$(sel).show();
		$(sel).html(data);
		$(sel).find('.list').css({left: offset.left + 30});
		$(sel).find('.copy').css({height: listH}).jScrollPane({showArrows:true});
		setperformance(1);
			
	});
}


gallery.showinfo = function(obj){
	var offset = $(obj).offset();
	var href = obj.href.split('#')[1].split('/')[3];
	var h = page[1];
	var sel = this.sel;
	var detail = this.detail;
	$(sel).append('<div class="overlapItem"></div>').find('.overlapItem').css({top: offset.top, left: offset.left}).show().delay(500).animate({top: 0, left: 0, width: '100%', height: h},'slow',function(){
		var o = this;
		$(this).addClass('setlogo').append('<p class="loading"></p>');
		
		$.post(detail+href,{},function(data){
			$(o).html(data).find('.col1,.col2,.close').css({height: h - 110});
			$(o).find('.bgloading').remove();
			$(o).find('.viewer').nicescroll();
			//$('.productinfo .col1,.productinfo .col2').css({height: h - 110});
		});
		
	});
}
gallery.other_info = function(obj){
	var detail = this.detail;
	var href = obj.href.split('#')[1].split('/')[3];
	$.post(detail+href+'&json=1',{},function(data){
		$('.productinfo .title').html(data.name);					 
		$('.productinfo .desc').html(data.content);					 
		//$('.productinfo .image').attr({src: 'data/upload/'+data.image});	
		$('.productinfo img.active').fadeOut(2000,function(){
			$(this).removeClass('active');												   
		});
		$('.productinfo img.img'+data.id).fadeIn(2000,function(){
			$(this).addClass('active');													  
		});
		$('.productinfo .slide a').removeClass('active');
		$('.productinfo .slide a.slide'+href).addClass('active');
	},'json');	
}

gallery.closeinfo = function(){
	var sel = this.sel;
	$(sel).find('.overlapItem').fadeOut('slow',function(){$(this).remove();});
}


gallery.call_again = function(w,h){
	common.clear();
	var marginTop  =  -1*Math.round(h/2);
	var marginLeft =  -1* Math.round(w/2);
	//$(this.sel).html('<div class="logo"></div><iframe class="swf" style="display: none" border="0" src="data/catalog/" width="1024" height="350" scrolling="no"  ></iframe>');
	
}