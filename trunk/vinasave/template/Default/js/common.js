var $ = jQuery;
function redirectUrl(url){
	window.location.href=url;
	return;
}
$(document).ready(function(){
	// location
	$('.location').click(function(){
		//$('#header .location  ul').toggle();
		$('#location_list').slideToggle();
		
	});
	
	$('#location_list  li a').click(function(){
		var text = $(this).text();
		var rel = $(this).attr('rel');
		$('#location_value').html(text).attr('rel',rel);
		$('#location_list').slideToggle();
		
	});
	
	/// product hover
	$('.box_product').hover(function(){
		$(this).find('.desc_hover').animate({'top':0},100);
	},function(){
		$(this).find('.desc_hover').animate({'top':-177},100);
	});
	
	$('.desc_hover').click(function(){
		var product_url = $(this).parents('.box_product').data('url');
		redirectUrl(product_url);
	});
	
	$('.go_top').click(function(){window.scrollTo(0,0);return false;})
	
	function scroll_to(obj){
		var x = $('.submenu li').index(obj);
		if(x > 0){
			x = (x-1) * $(obj).outerWidth() + $('.submenu li:first').outerWidth();
		}
		$('.submenu li.on').addClass('current');
		$('.submenu li').removeClass('on');
		
		$('.submenu_current').animate({'left': x},200,function(){
			$('.submenu li').removeClass('white');
			$(obj).addClass('white');
		});
	}
	$('.submenu li').hover(function(){
		scroll_to(this);
	});
	$('.submenu').hover(function(){},function(){scroll_to($('.submenu li.current'));})
	scroll_to($('.submenu li.on'));
	
	
	var scroll_default  = $('#scroll_site').offset().top;
	var de = document.documentElement;
	var body_content = $('#body .content').offset().left + $('#body .content').outerWidth() + 10;
	$('.right_logo').css('left',body_content);
	$('.go_top').css('left',body_content + 24);
	$(window).scroll(function(o){
		var y = window.pageYOffset || self.pageYOffset || (de&&de.scrollTop) || document.body.scrollTop;
		
		if (y >= scroll_default){
			$('#scroll_site').addClass('scroll_site');
			
		}else{
			$('#scroll_site').removeClass('scroll_site');
		}
		
		if(y > 10){
			$('.right_logo,.go_top').show();
		}else{
			$('.right_logo,.go_top').hide();
		}
	});
	
	$('.remain_time').each(function(){
		var remain_time = $(this).data('time');
		$(this).countdown({until: remain_time, compact: true, 
		    layout: 'Còn <span class="blue">{dn} </span>  ngày   <span class="blue">{hnn}:{mnn}:{snn}</span>', 
		    onExpiry:function(){location.reload();}
		});
	});
	$('.banner > div.right_menu > div').hover(function(){
		$(this).addClass('on');
	},function(){
		$(this).removeClass('on');
	});
	
	
});