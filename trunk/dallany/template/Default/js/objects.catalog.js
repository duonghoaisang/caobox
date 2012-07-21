// JavaScript Document
var catalog = {sel: '#catalog', list: 'data.php?mod=xml&act=catalog', logoTop: 300, smallTop: 0, bgafter: 'bg-catalog-after.jpg'}
catalog.main = function(w,h){
	//setperformance(0);
	var sel = this.sel;
	var list = this.list;
	//var smallTop = this.smallTop;
	//var logoTop = this.logoTop;
	var img = new Image;

	img.onload = function(){
		
		$.post(list,{},function(data){
			
			$('#background img.bgbefore').fadeOut(2000);
			$('#background img.bgadvance').fadeIn(2000,function(){
				$(sel).show();
				$(sel).html('<object class="swf" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="1024" height="500" align="middle" processed="true"><param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="template/Default/swf/imageflow.swf?act=catalog" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#FFFFFF" /><embed src="template/Default/swf/imageflow.swf?act=catalog" quality="high" wmode="transparent" bgcolor="#FFFFFF" width="1024" height="500" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>');
				//$(sel).find('.list').css({right: w - (offset.left + 1024)});
				//$(sel).find('.copy').css({height: listH}).jScrollPane({showArrows:true});
				setperformance(1);
				
			});
		});
		current_bg = this.src;
		img.onload = function(){};
	}
	img.src = 'template/Default/images/'+this.bgafter;

/*$(sel).find('.swf').hide();	
	$(sel).show().find('.logo').removeClass('logosmall').css({marginTop: logoTop}).delay(1000).animate({marginTop: smallTop}).fadeOut('slow',function(){
																																					  	$(this).addClass('logosmall');
	$(sel).find('.swf').show();																																			  }).fadeIn('slow',function(){
	setperformance(1);	
});
*/}

catalog.call_again = function(w,h){
	common.clear();
	var marginTop  =  -1*Math.round(h/2);
	var marginLeft =  -1* Math.round(w/2);
	$('#background .images').append('<img src="template/Default/images/'+this.bgafter+'" width="'+w+'" class="bgadvance" style="display: none;margin-top: '+marginTop+'px;margin-left: '+marginLeft+'px;" />');
	
	//$(this.sel).html('<div class="logo"></div><object class="swf" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="1024" height="500" align="middle" processed="true"><param name="allowScriptAccess" value="sameDomain" /><param name="movie" value="template/Default/swf/imageflow.swf?act=catalog" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#FFFFFF" /><embed src="template/Default/swf/imageflow.swf?act=catalog" quality="high" wmode="transparent" bgcolor="#FFFFFF" width="1024" height="500" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>');
	
}