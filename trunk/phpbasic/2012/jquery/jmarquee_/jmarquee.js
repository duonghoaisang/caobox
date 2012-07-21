(function($) {
	$.fn.jscroller = function(opt){
		var _cfg = {
			direction: 'left',
			speed: 25,
			behavior: 'scroll',
			wrap: 'circular',
			mouseover_css: {cursor: 'pointer'},
			mouseover_pause: false
		}
		if(opt) $.extend(_cfg,opt);
		var obj = this;
		var html = $(this).find('>ul').html();
		
		
		var fn = {};
		// left / right
		var mainW = 0;
		$(obj).find('>ul li').each(function(){
			mainW += $(this).outerWidth(true);
		});
		
		//alert(mainW);
		var w = $(obj).width();
		var nW = 1;
		if(mainW < w) nW = Math.ceil(w/mainW);
		
		var loop_right  = 0;
		this.horz_right = function(){
			if(loop_right==0){
				$(obj).find('>ul').css({left: -1*mainW});
				loop_right = mainW;
			}
			$(obj).find('>ul').css({'width': loop_right });
			var sRight = $(obj).find('>ul').css('left');
			if(parseInt(sRight) ==0){
				if(loop_right <= nW* mainW){
					loop_right += mainW;
					$(obj).find('>ul').css({'width': loop_right }).append(html);
				}else{
					$(obj).find('>ul').css({left: -1*mainW});
				}
			}else{
				if(sRight == 'auto') sRight = 0;
				$(obj).find('>ul').css({left: parseInt(sRight) + 1});
			}
		}
		
		var loop_left  = 0;
		this.horz_left = function(){
			if(loop_left==0) loop_left = mainW;
			$(obj).find('>ul').css({'width': loop_left });
			var sLeft = $(obj).find('>ul').css('left');
			if(loop_left  -  Math.abs(parseInt(sLeft)) <= w){
				if(loop_left <= nW*mainW){
					loop_left += mainW;
					$(obj).find('>ul').css({'width': loop_left }).append(html);
				}else{
					$(obj).find('>ul').css({left: -1*nW*mainW +w});
				}
			}else{
				if(sLeft == 'auto') sLeft = 0;
				$(obj).find('>ul').css({left: parseInt(sLeft) - 1});
			}
		}
		
		var mainH = 0;
		$(obj).find('>ul li').each(function(){
			mainH += $(this).outerHeight(true);
		});
		var h = $(obj).height();
		var nH = 1;
		if(mainH < h) nH = Math.ceil(h/mainH);
		

		var loop_up  = 0;
		this.vert_up = function(){
			if(loop_up==0) loop_up = mainH;
			$(obj).find('>ul').css({'height': loop_up });
			var sTop = $(obj).find('>ul').css('top');
			if(loop_up  -  Math.abs(parseInt(sTop)) <= h){
				if(loop_up <= nH*mainH){
					loop_up += mainH;
					$(obj).find('>ul').append(html);
				}else{
					$(obj).find('>ul').css({top: -1*nH*mainH +h});
				}
			}else{
				if(sTop == 'auto') sTop = 0;
				$(obj).find('>ul').css({top: parseInt(sTop) - 1});
			}
		}

		var loop_down  = 0;
		this.vert_down = function(){
			if(loop_down==0){
				$(obj).find('>ul').css({top: -1*mainH});
				loop_down = mainH;
			}
			$(obj).find('>ul').css({'height': loop_down });
			var sTop = $(obj).find('>ul').css('top');
			if(parseInt(sTop) ==0){
				if(loop_down <= nH* mainH){
					loop_down += mainH;
					$(obj).find('>ul').css({'height': loop_down }).append(html);
				}else{
					$(obj).find('>ul').css({top: -1*mainH});
				}
			}else{
				if(sTop == 'auto') sTop = 0;
				$(obj).find('>ul').css({top: parseInt(sTop) + 1});
			}
		}
		
		
		this.slide = function(){
			
			
		}
		
		
		
		function _run(){
			switch(_cfg.direction){
				case 'up': obj.vert_up(); break;
				case 'down': obj.vert_down(); break;
				case 'right': obj.horz_right(); break;
				default: obj.horz_left();break;
			}
		}
		
		
		var MyMar = setInterval(_run,_cfg.speed);
		if(_cfg.mouseover_pause){
			$(this).hover(function(){
				clearInterval(MyMar);
				if(_cfg.mouseover_css) $(this).css(_cfg.mouseover_css);
			},function(){
				MyMar=setInterval(_run,_cfg.speed);
			});
		}
		
	}
})(jQuery)