$(document).ready(function(){
	// Left Menu
	$('#left .submenu h2').toggle(function(){
		$(this).addClass('down');
		$(this).parent().find('a').animate({
			height: 'toggle'
		},500);							   
	},function(){
		$(this).removeClass('down')
		$(this).parent().find('a').animate({
			height: 'toggle'
		},500);	
	})
})


// function deleteConfirm 
function deleteConfirm(o){
	if(window.confirm('Are you sure you want to delete this item ?')) location.href=o.href+'&c=1';
	return false;
}

function deleteImage(name){
	var selector = 'div.form input[name="'+name+'"]';
	var title = $(selector).attr('title');
	var v = $(selector).val();
	if(v) $(selector).val('');
	else $(selector).val(title);
}

function add_gallery(selector,is_gallery_name,is_gallery_icon){
	var len = $(selector+ ' input[type="file"]').length;	
	$(selector).append('<p><span class="hide" '+(is_gallery_name?'style="display: inline;"':'')+'>Title <input name="name_gallery'+len+'" type="text" value="" title="" /><br /></span><span class="hide" '+(is_gallery_icon?'style="display: inline;"':'')+'>Icon <input type="file" name="icon_gallery'+len+'" class="no_width" /> </span>Image <input type="file" name="image_gallery'+len+'" class="no_width" /></p>');
}

(function($){
	$.fn.divbox = function(opt){
		$(this).live('click',function(){
			var obj = this;
			var sizesystem = fetchSize();
			var divboxW =sizesystem[0];
			var divboxH = sizesystem[1]>sizesystem[3]?sizesystem[1]:sizesystem[3];
			var offset = $(this).offset();
			var top = Math.round(offset.top - 200 - 50);
			var left = Math.round(offset.left + $(this).width());
			//alert(sizesystem);
			//alert(offset.top);
			var href = this.href;
			var aExt = href.split('.');
			var ext = aExt[aExt.length-1];
			var str = '';
			switch(ext.toLowerCase()){
				case 'jpg':
				case 'jpeg':
				case 'gif':
				case 'png': str = '<img src="'+href+'" />';
				break;
			}
			
			$('object,embed,select').hide();
			$('body').prepend('<div id="divbox"></div><div id="divbox_content">'+str+'</div>');
			$('#divbox').css({'width': divboxW+'px','height': divboxH+'px','position':'absolute','zIndex':'10001','left':'0','top':'0','backgroundColor':  '#000000' ,'opacity':'.'+ 5+'','filter':'alpha(opacity='+ 5 +')'}).click(function(){$('#divbox,#divbox_content').remove();});
			$('#divbox_content').css({'position':'absolute','backgroundColor':'#ffffff', 'top': top+'px', 'left': left+'px','zIndex':'10002','overflow':'hidden'});
			
			return false;
		});
	}
	function fetchSize(){
		var xScroll,yScroll,value;
		
		if(window.innerHeight&&window.scrollMaxY){
			xScroll=window.innerWidth+window.scrollMaxX;
			yScroll=window.innerHeight+window.scrollMaxY;
		}
		else if(document.body.scrollHeight>document.body.offsetHeight){
			xScroll=document.body.scrollWidth;
			yScroll=document.body.scrollHeight;
			}
			else{
				xScroll=document.body.offsetWidth;
				yScroll=document.body.offsetHeight;
			}
		
		var windowWidth,windowHeight;
		
		if(self.innerHeight){
			if(document.documentElement.clientWidth){
				windowWidth=document.documentElement.clientWidth;
			}
			else{
				windowWidth=self.innerWidth;
			}
			windowHeight=self.innerHeight;
		}
		else if(document.documentElement&&document.documentElement.clientHeight){
				windowWidth=document.documentElement.clientWidth;
				windowHeight=document.documentElement.clientHeight;
			}
			else if(document.body){
				windowWidth=document.body.clientWidth;
				windowHeight=document.body.clientHeight;
			}
		
		if(yScroll<windowHeight){
			pageHeight=windowHeight;
		}
		else{
			pageHeight=yScroll
		}
		
		if(xScroll<windowWidth){
			pageWidth=xScroll
		}
		else{
			pageWidth=windowWidth
		}
		
		arrayPageSize=new Array(pageWidth, pageHeight, windowWidth, windowHeight);
		return arrayPageSize;
	}
})(jQuery)