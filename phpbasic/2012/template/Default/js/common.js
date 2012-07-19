//Copyright@ phpbasic.com
//Contact: admin@phpbasic.com
$(document).ready(function(){
	var configure = {
		loading: 'Loading....'
	}
	
	/* Add my plugins */
	// imgloading
	//$('.comment').imgloading();
	
	// emotions toogle; note emotions just above // comment
	var opt = {
		handle: '.content_toolbar .emotion',
		dir: 'plugins/emotions/images/',
		label: 'Emotion',
		style: '',
		css: 'emotion_off'
	}
	$('.comment').emotions(opt);
	
	
	
	/* End my plugins*/
	
	var _opt = {
		loading: configure.loading,
		validate: {
			'title': 'You just  fill field Name',
			'content':'You just fill field Content',
			'author': 'You just fill field Author'
		}
	}
	$('.toolbar a').content(_opt,function(obj,data){
		$(obj).parent().append(data);
	},function(obj,data){
		$(obj).parent().append(data);
	});
	
	
	$('.content_toolbar a.update').content(_opt,function(obj,data){
		$(obj).parent().append(data);
	},function(obj,data){
		$('.box div.content').html(data);
	});
	
	var _opt = {
		msg: 'Are you sure you want to delete this content?'
	}
	$('.content_toolbar a.delete')._delete(_opt,function(obj,data){
		if(data=='1'){
			alert('Delete successfull!');	
			window.location.href = './';
		}else{
			alert(data);
		}
	});
	
	
	var _opt = {
		loading: configure.loading,
		validate: {
			'author': 'You just fill field Author',
			'content':'You just fill field Content'
		},
	
	}
	$('#comments p.reply a.insert').content(_opt,function(obj,data){
		$(obj).parent().append(data);
	},function(obj,data){
		$('#comments a[name="bottom"]').after(data);
		var cpost = $('.box .comment.posts').html();
		$('.box .comment.posts').html(Number(cpost)+1);
	});
	
	$('#comments p.reply a.update').content(_opt,function(obj,data){
		$(obj).parent().append(data);
	},function(obj,data){
		$('#comments div.id'+obj.href.split('id=')[1]).html(data);
	});

	var _opt = {
		msg: 'Are you sure you want to delete this comment?'
	}
	$('#comments p.reply a.delete')._delete(_opt,function(obj,data){
		if(data=='1'){
			$('#comments div.id'+obj.href.split('id=')[1]).parent().remove();
			var cpost = $('.box .comment.posts').html();
			$('.box .comment.posts').html(Number(cpost)-1);
		}else{
			alert(data);
		}
	});

	// favorite
	$('.favorite').click(function(){
		var obj = this;
		$.post(this.href,{},function(data){
			//var cls = 'favorite';
			//if(obj.className=='favorite') cls = 'favorite favorited';
			//$(obj).attr({'class':cls});
			if(data == '-1'){
				alert('Please login to add this article to favorite list');
				return false;
			}else{
				var cls = 'favorite';
				if(data=='1') cls = 'favorite favorited';	
				$(obj).attr({'class':cls});
			}
		});
		return false;
	});	
	
	
	// viewlist/ viewsummary
	$('.viewtype').click(function(){
		$.post('./?mod=home&act=viewtype&val='+this.className.split(' ')[1],{},function(){
			window.location.reload();
		});
		return false;
	});
 	
	

});

function checkFormSearch(doc){
	if(doc.q.value=='') return false;
	return true;
}



/*google.load("feeds", "1");
function rss_feed(url,title) {
	var feed = new google.feeds.Feed(url);
	feed.setNumEntries(5);
	feed.load(function(result) {
	if (!result.error) {
		var container = document.getElementById("feed");
		var html = '';
		html += '<p>'+title+'</p>';
		for (var i = 0; i < result.feed.entries.length; i++){
			var entry = result.feed.entries[i];
			html += '- <a target="_blank" href="'+entry.link+'">'+entry.title+'</a><br />';//<p>'+entry.contentSnippet+'</p>
		}
		container.innerHTML += html;
		}
	});
}
*/