// JavaScript Document
var diamond = {sel: '#diamond' ,list: 'data.php?mod=xml&act=diamond',detail: 'data.php?mod=xml&act=diamond&id=', listH: 420, bgafter: 'bg-diamond-after.jpg'}
diamond.main = function(w,h){
	var sel = this.sel;
	var img = new Image;
	var list = this.list;
	var listH = this.listH;
	var offset = $('.header .menu').offset();
	
	img.onload = function(){
		
		$.post(list,{},function(data){
			
			$('#background img.bgbefore').fadeOut(2000);
			$('#background img.bgadvance').fadeIn(2000,function(){
				$(sel).append('<div class="overlapItem"></div>').find('.overlapItem').css({top: offset.top, left: offset.left}).show()
				$(sel).show();
				$(sel).html(data);
				$(sel).find('.list').css({right: w - (offset.left + 1024)});
				$(sel).find('.copy').css({height: listH}).jScrollPane({showArrows:true});
				setperformance(1);
				
			});
		});
		current_bg = this.src;
		img.onload = function(){};
	}
	img.src = 'template/Default/images/'+this.bgafter;
}


diamond.showinfo = function(obj){
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
diamond.other_info = function(obj){
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

diamond.closeinfo = function(){
	var sel = this.sel;
	$(sel).find('.overlapItem').fadeOut('slow',function(){$(this).remove();});
}


diamond.call_again = function(w,h){
	common.clear();
	var marginTop  =  -1*Math.round(h/2);
	var marginLeft =  -1* Math.round(w/2);
	$('#background .images').append('<img src="template/Default/images/'+this.bgafter+'" width="'+w+'" class="bgadvance" style="display: none;margin-top: '+marginTop+'px;margin-left: '+marginLeft+'px;" />');
	//$(this.sel).html('<div class="logo"></div><iframe class="swf" style="display: none" border="0" src="data/catalog/" width="1024" height="350" scrolling="no"  ></iframe>');
	
}