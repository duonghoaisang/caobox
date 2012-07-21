// JavaScript Document
var collection = {sel: '#collection', listMarginRight: 12, listNum: 5, timer: null, listStart: 0, list: 'data.php?mod=xml&act=collection&cat=',detail: 'data.php?mod=xml&act=collection&id='}
collection.main = function(w,h){
	var sel = this.sel;
	$('div.section').hide();
	$(sel).show();
	$(sel).find('.fullimg img').hide();
	//$(sel).find('ul').css({opacity: 1}).show().find('li').hide();
	var marginRight = this.listMarginRight;
	var num = this.listNum;
	var itemW = Math.round((w - marginRight*num)/num);
	$(sel).find('li').append('<div class="overlap"></div>').each(function(i,v){
		$(this).css({ width: 0, paddingRight: marginRight}).find('img').css({width: itemW});	
		//$(this).animate({width: itemW},3000).delay(i*3000);
	}).find('div.overlap').css({height: h, left: '100%'})//.animate({left: '100%'},'slow');
	this.listStart = 0;
	this.timer = setInterval('itemScroll("'+sel+'",'+itemW+')',1000);
	$(sel).find('li a').click(function(){
		collection.listcat(this);
		//return false;
	});
	
	//.css({width: itemW}).show();
}


collection.listcat = function(obj){
		setperformance(0);
		var sel = this.sel;
		var cls = obj.className;
		var href = obj.href.split('#')[1].split('/')[2];
		var w = page[0];
		var list = this.list;
		$(sel).find('li div.overlap').show();
		$(obj).parent().find('div.overlap').hide();	
		$(sel).find('.fullimg').show().find('img.'+cls).css({width: w}).fadeIn('fast',function(){
			$(sel).find('li div.overlap').animate({left: 0},'slow');
			$(sel).append('<p class="loading"></div>');
			$.post(list+href,{},function(data){
				$(sel).find('ul').fadeOut('slow');
				$(sel).find('.loading').remove();
				$(sel).append(data);
				var h = $(sel).find('.list').height();
				$(sel).find('.list>ul').css({height: h}).jScrollPane({showArrows:true});
				setperformance(1);
			});
		});
}

collection.changecat = function(obj){
	var sel = this.sel;
	var href = obj.href.split('#')[1].split('/')[2];
	var list = this.list;
	var w = page[0];
	$(sel).find('.list').remove();
	$(sel).find('.fullimg img').hide();
	$(sel).find('.overlapItem').fadeOut('slow',function(){
		$(this).remove();
		$(sel).find('li div.overlap').show();
		$(sel).find('li.'+obj.rel).hide();	
		$(sel).find('ul').show();
		$(sel).find('.fullimg').show().find('img.'+obj.rel.replace('li','a')).css({width: w}).fadeIn('fast',function(){
			$(sel).find('li div.overlap').animate({left: 0},'slow').delay(2000);
			$(sel).append('<p class="loading"></div>');
			$.post(list+href,{},function(data){
				$(sel).find('ul').fadeOut('slow');
				$(sel).find('.loading').remove();
				$(sel).append(data);
				var h = $(sel).find('.list').height();
				$(sel).find('.list>ul').css({height: h}).jScrollPane();
			});
		});
	});
	
}


collection.showinfo = function(obj){
	setperformance(0);
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
			setperformance(1);
		});
		
	});
}


collection.other_info = function(obj){
	setperformance(0);
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
		setperformance(1);
	},'json');	
}

collection.closeinfo = function(){
	var sel = this.sel;
	$(sel).find('.overlapItem').fadeOut('slow',function(){$(this).remove();});
}
function itemScroll(sel,w){
	$(sel).find('li.li'+(collection.listStart++)).css({display: 'block'}).animate({width: w},1000);
	if(collection.listStart==collection.listNum){
		clearTimeout(collection.timer);
		setperformance(1);
	}
}

collection.call_again = function(){
	var sel = this.sel;
	common.clear();
	$(sel).find('.fullimg img').hide();
	$(sel).find('ul').css({opacity: 1}).show().find('li').hide();
	$(sel).find('.list').remove();
	$(sel).find('div.overlap').remove();
	$(sel).find('.overlapItem').fadeOut('fast',function(){
		$(this).remove();													
	});
	
}