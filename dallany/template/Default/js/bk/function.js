// JavaScript Document
//local store
var localStorage = {bgsound_volume: 0,bgsound_position:0 }
if(!localStorage.bgsound_volume) localStorage.bgsound_volume = 50;
if(!localStorage.bgsound_position) localStorage.bgsound_position = 0;
var menuhover = 0;
var current_bg = null;
function pageSize(){
	var de = document.documentElement;
	var winW = window.innerWidth || self.innerWidth || (de&&de.clientWidth) || document.body.clientWidth;
	var winH = window.innerHeight || self.innerHeight || (de&&de.clientHeight) || document.body.clientHeight;
	return [winW,winH];
}

function setBackGround(obj,img,fn,immediateFn){
	if(checkperformance() == '0') return false;
	setperformance(0);
	var img = 'template/Default/'+img;
	$(obj).parent().find('a').removeClass('active');
	$('.loading').show();
	$(obj).addClass('active');
	var w = page[0];
	var h = page[1];
	var space = 60;
	var marginTop  =  -1*Math.round(h/2);
	var marginLeft =  -1* Math.round(w/2);
	//alert(marginLeft);
	
	if(current_bg!=null){
		$('#background .images').html('<img src="'+img+'" width="'+w+'" class="bgbefore" style="display: none;margin-top: '+marginTop+'px;margin-left: '+marginLeft+'px;" /><img width="'+w+'" src="'+current_bg+'" class="bgafter" style="display: inline;margin-top: '+marginTop+'px;margin-left: '+marginLeft+'px;" />');
		
	}else{
		$('#background .images').html('<img src="'+img+'" width="'+w+'" class="bgbefore" style="display: none;margin-top: '+marginTop+'px;margin-left: '+marginLeft+'px;" />');
	}
	current_bg = img;
	
	if(typeof(immediateFn)=='function') immediateFn(w,h);
	var Img = new Image();
	
	Img.onload = function(){
		var src = this.src;
		$('#background').css({width: w, height: h});//.find('img').css({width: w,marginTop: -1*Math.round(h/2), marginLeft: -1* Math.round((w)/2)});
/*		var tmp = $('#background img.bgafter').attr('src');
		$('#background img.bgafter').fadeOut(2000)
		$('#background img.bgbefore').attr({src: img}).fadeIn(2000,function(){
			$('#background img.bgafter').attr({ src: img});												
		});
*/		
/*		$('#background img').animate({opacity: 0,width: w+space, marginLeft: -1*Math.round((w+space)/2)},2000,function(){
			$(this).attr({'src': src});
		}).delay(200).animate({opacity: 1,marginLeft: -1*Math.round(w/2), width: w},2000,function(){
			$('.loading').fadeOut('slow',function(){
				if(typeof(fn) == 'function') fn(w,h);
				if(menuhover == 0) toggleMenu('hide',h);
			});
		});		
*/	

		$('#background img.bgafter').fadeOut(2000);
		$('#background img.bgbefore').css({width: w+space,marginLeft: -1*Math.round((w+space)/2)}).fadeIn(2000).animate({marginLeft: -1*Math.round(w/2), width: w},2000,function(){
			$('.loading').fadeOut('slow');
			if(typeof(fn) == 'function') fn(w,h);
			if(menuhover == 0) toggleMenu('hide',h);
 		});
		$('.main').css({height: h});
		Img.onload = function(){};
	}
	Img.src = img;
}


function toggleMenu(t,h){
	if(t=='hide'){
		$('.footer .menu').animate({bottom: -26});
		$('.header .menu').animate({top: -60});
		$('.body').css({top: 0,height: h});
		$('.footer .menu .col1 ul.sub').hide();
		//document.title = 'Hide';
	}else{
		$('.footer .menu').animate({bottom: 0});
		$('.header .menu').animate({top: 0});
		//$('.body').css({height: h - 60,top: 40});
		//document.title = 'Show';
		
	}
}

function setBgSound(obj){
	$('.footer .menu .col1 ul.sub').toggle();	
}
function ready(w,h){
	$('.body').css({height: h - 60 - 26 -2}).hover(function(){
		toggleMenu('hide',h);
	},function(){
		toggleMenu('show',h);
	});


/*	$(document).mousemove(function(e){
		if(e.pageY > 40 && e.pageY < bodyH + 40) {
			toggleMenu('hide',h);
		}else{
			toggleMenu('show',h);
		}
		//document.title = e.pageX +', '+ e.pageY;
	}); 
*/

}


(function($){
	$.fn.nicescroll = function(){
		var sourceW = 0;
		var obj = this;
		var left = $(this).offset().left;
		var viewerW = $(this).width();
		$(this).find('.slide a').each(function(){
			sourceW += $(this).outerWidth(true);
		});
		$(this).find('.slide').css({width: sourceW});
		$(this).hover(function(e){
			
			var l = -1* Math.round((e.pageX - left) * (sourceW - viewerW)/ viewerW);
			$(this).find('.slide').animate({left: l},'slow',function(){
				$(obj).bind('mousemove',function(e){
					var l = -1* Math.round((e.pageX - left) * (sourceW - viewerW)/ viewerW);
					$(obj).find('.slide').css({left: l});
				});
			});
			
		
		},function(){
			$(obj).unbind('mousemove');
		
		});
	}
})(jQuery);

function jwplayer_setVolume(n){
	var v = jwplayer().getVolume() + n;
	if(v>=0 && v<=100) jwplayer().setVolume(v);
	localStorage.bgsound_volume = v;
	
}

function checkperformance(){
	return document.webpeformance.avalible.value;
}
function setperformance(v){
	document.webpeformance.avalible.value = v;
}
$(document).ready(function(){
	setperformance(1);
	setBackGround(null,'images/bg-home.jpg',function(w,h){ ready(w,h);homepage.main(w,h);});
	//$.post('data.php?mod=xml&act=catalog');
	//$.post('data.php?mod=xml&act=bridal');
	jwplayer("mediaplayer").setup({
		flashplayer: "plugins/jwplayer/player.swf",
		autostart: true, 
		volume: localStorage.bgsound_volume,
		playlist: bgsound_list,
/*		events:{
			onTime: function(e){
				//duration,offset,position
				//localStorage.bgsound_position = e.position;
			}	
		},
*/		repeat: 'always'
	});
	
						  
});


