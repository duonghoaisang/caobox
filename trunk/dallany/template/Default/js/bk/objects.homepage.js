// JavaScript Document
var homepage = {sel: '#homepage', defaultTop: 400, introTop: 50, introH: 360, ourStoryTop: 50, ourStoryH: 420}
homepage.main = function(w,h){
	//setperformance(0);
	var sel = this.sel;
	var defaultTop = this.defaultTop;
	var introTop = this.introTop;
	var introH = this.introH;
	var offset = $('.header .menu').offset();
	$(sel).css({left: offset.left + 30});
	$(sel).fadeIn().find('.intro').show().find('.copy').css({height: introH});
	$(sel).find('.intro').css({marginTop: defaultTop,height: 0,width: '100%'}).delay(2000).animate({marginTop: introTop},'slow',function(){
		$(this).animate({height: introH + 30},'slow').find('.copy').jScrollPane();
		setperformance(1);
		//$(this).find('.copy').jScrollPane();
	});

}


homepage.ourstory = function(){
	setperformance(0);
	var sel = this.sel;
	var defaultTop = this.defaultTop;
	var ourStoryTop = this.ourStoryTop;
	var ourStoryH = this.ourStoryH ;
	$(sel).find('.copy').css({height: ourStoryH});
	$(sel).find('.intro').animate({ width: 0},'fast',function(){
		$(this).hide();
		$(sel).find('.ourstory').css({marginTop: defaultTop, height: 35}).fadeIn().animate({marginTop: ourStoryTop},'slow',function(){
			$(this).animate({height: ourStoryH + 30},'slow').find('.copy').jScrollPane();
			setperformance(1);
		});	

	});
}

homepage.call_again = function(){
	common.clear();	
	$(this.sel).find('.ourstory').hide();

}