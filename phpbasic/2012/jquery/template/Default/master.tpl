<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="google-site-verification" content="yJE1jh0gSWAaZjht2gC5DYFt_Ob8WS3PMiDGFzRnRRk" />
<title>{app_title}</title>
<base href="http://jquery.phpbasic.com/" />
<meta name="keywords" content="{app_keyword}" />
<meta name="description" content="{app_description}" />
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jquery.ui.draggable.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>

    <div id="page-wrap" style="position: relative;">
    <p style=" position: absolute; top: 265px; margin-right: 0px; right: 50px; font-style: italic; color: grey;">
	<a href="http://www.facebook.com/share.php?u=jquery.phpbasic.com/{project}" title="Facebook Share"><img src="images/facebook.gif" align="facebook share" /> </a> <a href="http://twitter.com/home?status={app_title} http://jquery.phpbasic.com/{project}" title="Twitter Share"><img src="images/twitter.gif" align="Twitter Share" /> </a>
	</p>
        <img src="images/logo.png" alt="jquery multibox" id="pic" />
		
    <p style=" margin-bottom: 10px;"><a href="/">Home</a> <a href="/license">Licenses</a> <a href="/contact">Contact</a> <g:plusone></g:plusone></p>
       <div id="contact-info" class="vcard">
           <h1 class="fn">{app_name}</h1>
			<p><script type="text/javascript">
google_ad_client = "pub-1823237824396673";
google_ad_slot = "8123576453";
google_ad_width = 468;
google_ad_height = 60;
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></p>
        </div>
           
    {include:tpl=body}
    </div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1324526-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><script type="text/javascript" src="js/fixPNG.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</body>

</html>