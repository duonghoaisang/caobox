<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{web_title} - www.phpbasic.com</title>
<meta http-equiv="keywords" content="{web_keyword}" />
<meta http-equiv="description" content="{web_desc}" />
<meta name="google-site-verification" content="yJE1jh0gSWAaZjht2gC5DYFt_Ob8WS3PMiDGFzRnRRk" />
<meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW" />
<base href="{domain}" />
<link type="text/css" rel="stylesheet" href="css/reset.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link type="text/css" rel="stylesheet" href="css/bbcode.css" />
<link rel="alternate" type="application/rss+xml" title="phpbasic feeds" href="/home/sitemap/" />

</head><body>
<div id="banner" >
  <a href="./"><img src="images/logo.gif" alt="logo"   border="0" /></a></div>
<div id="nav">
<ul>
	<!--BASIC category-->
	<li> <a href="{category.rewrite}" class="{category.active}">{category.name}</a> </li>
	<!--BASIC category-->
</ul>
<form method="get" action="/search/" onsubmit="return checkFormSearch(this);">Search: 
<!--	<input type="hidden" name="cx" value="partner-pub-1823237824396673:wfgepbmfjje" />
	<input type="hidden" name="cof" value="FORID:10" />
	<input type="hidden" name="ie" value="UTF-8" />
-->	<input name="q" type="text" value="Enter kewords" onfocus="if(this.value==this.defaultValue) this.value = '';" onblur="if(this.value=='') this.value = this.defaultValue;" />
	<input name="cmd" type="submit" class="button" id="cms" value="Search" />
</form>

</div>
<div id="maincontent">
<div id="content">
<span style="float: right;"><g:plusone></g:plusone></span>
	<div class="toolbar"><a href="content/insert" title="New Content">Add topics</a></div>
	<!--Plugin here-->
	
	{include:tpl=body}
</div>
<div id="right">
	<div class="box_user">
	<!--BOX user-->
	Chao {fullname} | <a href="user/profile">Tai khoan</a> | <a href="user/logout">Logout</a><br />
	<a href="user/reset">Doi mat khau</a>| <a href="user/favorite">Favorite list</a> | <a href="user/posted">My Posts</a> | <a href="user/docs">My Document</a>  | <a href="user/links">My Links</a> 
	<!--BOX user-->
	
	<!--BOX login-->
	<a href="user/login">Login</a> | <a href="user/register">Register</a>
	<!--BOX login-->
	</div>
	
	<br clear="all" />
	<div class="box">
		<h1 class="header">jquery plugins</h1>
        <a target="_blank" href="http://jquery.phpbasic.com/divbox" title="Divbox - a lightbox for jQuery">Divbox - a lightbox same with Multibox</a><br />
		<a target="_blank" href="http://jquery.phpbasic.com/jemotion" title="jEmotion - show/hide emotion icons on your web">jEmotion -  show/hide emotion icons</a>
		</div>
	<div class="box">
		<h1 class="header">Links</h1>
		
        <a target="_blank" href="http://www.w3seo.com" title="W3 Search Engine Optimization">W3 Search Engine Optimization</a><br />
		
		<p><br /><a href="http://www.starfishshop.com" target="_blank"><img src="images/starfish.gif" title="StarFish" /></a></p>
		<p><br /><a href="http://lyluantreueh.com/" target="_blank"><img src="images/llt.jpg" title="Ly Luan Tre" width="235" /></a></p>
	</div>
	<div class="box">
		<h1 class="header">News Reader</h1>
    	<div id="feed"></div>
	</div>
	<div class="box">
		<h1 class="header">History</h1>
<!--BASIC history-->
		- <a href="general/{history.id}">{history.title}</a> <br />
<!--BASIC history-->
	</div>
	
	
</div>
<br clear="all" />
<script type="text/javascript"><!--
google_ad_client = "pub-1823237824396673";
google_ad_slot = "6379102574";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>

</div>
<div id="footer">&copy; 2007 - www.phpbasic.com</div>
<!--<script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAiP9SsmD1Hmn12x_gRDQXWBRvpICpocykO7frMn9SpPjjPanb_hRf71A7CU_IzMWIuiKy52JFgksqWA"></script>
--><script src="plugins/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="plugins/javascript.js" type="text/javascript"></script>
<script src="js/bbcode.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script type="text/javascript" src="plugins/emotions/jquery.emotions.js"></script>
<script type="text/javascript" src="js/jquery.content.js"></script>
<script type="text/javascript" src="plugins/avim/avim.js"></script>
<script src="js/fixPNG.js" type="text/javascript"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1324526-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<!--<script type="text/javascript">
	var feeds = [{"url":"http:\/\/vnexpress.net\/rss\/gl\/trang-chu.rss","title":"VnExpress"}];
	for(var i in feeds){
		rss_feed(feeds[i].url,feeds[i].title);
	}
</script>
-->
</body>
</html>
