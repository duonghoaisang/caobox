// JavaScript Document
var bridal = {sel: '#bridal', logoTop: 231,bgafter: 'bg-bridal-after.jpg'}
bridal.main = function(w,h){
	var sel = this.sel;
	var logoTop = this.logoTop;
	$('#background img.bgbefore').fadeOut(2000);
	$('#background img.bgadvance').fadeIn(2000,function(){
		$(sel).show().find('.swf').show();	
		setperformance(1);
		
	});
	
}

bridal.call_again = function(w,h){
	common.clear();
	var marginTop  =  -1*Math.round(h/2);
	var marginLeft =  -1* Math.round(w/2);
	$('.header .menu').addClass('menu_bridal_page');
	$('#background .images').append('<img src="template/Default/images/'+this.bgafter+'" width="'+w+'" class="bgadvance" style="display: none;margin-top: '+marginTop+'px;margin-left: '+marginLeft+'px;" />');
	$(this.sel).html('<object class="swf" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="1024" height="500" align="middle" processed="true"><param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="template/Default/swf/imageflow.swf?act=bridal" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#FFFFFF" /><embed src="template/Default/swf/imageflow.swf?act=bridal" quality="high" wmode="transparent" bgcolor="#FFFFFF" width="1024" height="500" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>');
	
}