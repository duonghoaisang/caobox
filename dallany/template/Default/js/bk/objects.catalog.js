// JavaScript Document
var catalog = {sel: '#catalog', logoTop: 300, smallTop: 0}
catalog.main = function(w,h){
	//setperformance(0);
	var sel = this.sel;
	var smallTop = this.smallTop;
	var logoTop = this.logoTop;
	$(sel).find('.swf').hide();	
	$(sel).show().find('.logo').removeClass('logosmall').css({marginTop: logoTop}).delay(1000).animate({marginTop: smallTop}).fadeOut('slow',function(){
																																					  	$(this).addClass('logosmall');
	$(sel).find('.swf').show();																																			  }).fadeIn('slow',function(){
	setperformance(1);	
	});
}

catalog.call_again = function(){
	common.clear();
	$(this.sel).html('<div class="logo"></div><object class="swf" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="1024" height="500" align="middle" processed="true"><param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="template/Default/swf/imageflow.swf?act=catalog" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#FFFFFF" /><embed src="template/Default/swf/imageflow.swf?act=catalog" quality="high" wmode="transparent" bgcolor="#FFFFFF" width="1024" height="500" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>');
	
}