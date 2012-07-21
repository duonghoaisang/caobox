<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>{cfg.web_title}</title>

<meta http-equiv="description" content="{cfg.web_desc}" />

<meta http-equiv="keywords" content="{cfg.web_keyword}" />

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

<script type="text/javascript" src="js/jquery.mousewheel.js"></script>



<script type="text/javascript" src="js/jScrollPane.js"></script>

<link rel="stylesheet" type="text/css" href="css/jScrollPane.css" />



<script type="text/javascript" src="js/function.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.css" />



<script type="text/javascript" src="js/objects.common.js"></script>



<script type="text/javascript" src="js/objects.homepage.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.homepage.css" />



<script type="text/javascript" src="js/objects.collection.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.collection.css" />



<script type="text/javascript" src="js/objects.catalog.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.catalog.css" />



<script type="text/javascript" src="js/objects.bridal.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.bridal.css" />



<script type="text/javascript" src="js/objects.diamond.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.diamond.css" />



<script type="text/javascript" src="js/objects.special.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.special.css" />



<script type="text/javascript" src="js/objects.gallery.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.gallery.css" />



<script type="text/javascript" src="js/objects.craftmanship.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.craftmanship.css" />



<script type="text/javascript" src="js/objects.timepieces.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.timepieces.css" />



<script type="text/javascript" src="js/objects.contact.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.contact.css" />



<script type="text/javascript" src="js/objects.timepieces_kind.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.timepieces_kind.css" />





<script type="text/javascript" src="plugins/jwplayer/jwplayer.js"></script>



<!--[if IE ]>

<link type="text/css" media="screen,projection" rel="stylesheet" href="css/ie.css" />

<![endif]-->



<script type="text/javascript">

	

</script>

</head>

<body>

<div id="background">

	<p class="loading"></p>

	<div class="images">

		<img class="bgbefore" src="images/bg-home.jpg" />

		<img class="bgafter" src="images/bg-collection.jpg" />

	</div>

	<form name="webpeformance" style="display:none;"><input name="avalible" value="0" /></form>

</div>

<div class="main">

	<!--Header-->

	<div class="header" onmouseover="menuhover=1;" onmouseout="menuhover=0;">

		<div class="menu">

		<a class="active" href="#/home" onclick="setBackGround(this,'images/bg-home.jpg',function(w,h){homepage.main(w,h);},function(){homepage.call_again()});">Home</a>

<a href="#/catalog" onclick="setBackGround(this,'images/bg-catalog.jpg',function(w,h){catalog.main(w,h);},function(w,h){catalog.call_again(w,h);});">Catalog</a>

		<a href="#/bridal" onclick="setBackGround(this,'images/bg-bridal.jpg',function(w,h){bridal.main(w,h);},function(w,h){bridal.call_again(w,h)});">bridal</a>

		<a href="#/collection" onclick="setBackGround(this,'images/bg-collection.jpg',function(w,h){collection.main(w,h);},function(){collection.call_again()});">Collections</a>

		<a href="#/diamond" onclick="setBackGround(this,'images/bg-diamond.jpg',function(w,h){diamond.main(w,h);},function(w,h){diamond.call_again(w,h);});">Designer Brands</a>

		<a href="#/gallery" onclick="setBackGround(this,'images/bg-gallery.jpg',function(w,h){gallery.main(w,h);},function(w,h){gallery.call_again(w,h);});">Insurance</a>

		<hr />

		<a href="#/special" onclick="setBackGround(this,'images/bg-special.jpg',function(w,h){special.main(w,h);},function(w,h){special.call_again(w,h);});">Special Event</a>

		<a href="#/timepieces" onclick="setBackGround(this,'images/bg-timepieces.jpg',function(w,h){timepieces.main(w,h);},function(w,h){timepieces.call_again(w,h);});">Time pieces</a>

		<a href="#/craftmanship" onclick="setBackGround(this,'images/bg-craftmanship.jpg',function(w,h){craftmanship.main(w,h);},function(w,h){craftmanship.call_again(w,h);});">Charity</a>

		<a href="#/contact" onclick="setBackGround(this,'images/bg-contact.jpg',function(w,h){contact.main(w,h);},function(w,h){contact.call_again(w,h)});">Contact</a>

		</div>

		

	</div>

	<!--End Header-->

	<!--Body-->

	<div class="body">

		<div class="ct">

		

			{include:tpl=body}

		</div>

	<br />



	</div>

	<!--End body-->

	<!--Footer-->

	<div class="footer" onmouseover="menuhover=1;" onmouseout="menuhover=0;">

		<div class="menu">

			<div class="col2"><!--<a href="#">sitemap</a>--><a href="#/contact" onclick="setBackGround(this,'images/bg-contact.jpg',function(w,h){contact.main(w,h);},function(){contact.call_again()});">contact</a></div>

			<div class="col1">

				<ul>

					<li><a href="#" onclick="setBgSound(this);return false;">music</a>

						<ul class="sub">

							<li><a href="#" onclick="jwplayer().playlistNext();">next</a></li>

							<li><a href="#" onclick="jwplayer().playlistPrev();">prev</a></li>

							<li><a href="#" onclick="jwplayer().pause();">stop</a></li>

							<li><a href="#" onclick="jwplayer_setVolume(10);">vol up</a></li>

							<li><a href="#" onclick="jwplayer_setVolume(-10);">vol down</a></li>

						</ul>

					</li>

				</ul>

			</div>

		

		</div>

	</div>

	<!--End footer-->

	<script type="text/javascript">

		var page = pageSize();

		var bgsound_list = [{

			'file': '{_UPLOAD}bgsound1.flv' 

		},{ 

			'file': '{_UPLOAD}bgsound2.flv'

		}]

			

	</script>



</div>

<div id="bgsound"><div id="mediaplayer">JW Player</div></div>

<div id="mainswf" style="width: 1004px; height: 709px; margin: 0 auto;">

  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/

shockwave/cabs/flash/swflash.cab#version=7,0,0,0"  width="1004" height="709" id="intro" align="middle">

<param name="allowScriptAccess" value="sameDomain" />

<param name="movie" value="intro.swf" />

<param name="quality" value="high" />

<param name="allowFullScreen" value="true" />

<param name="wmode" value="transparent"/>

<embed src="intro.swf" quality="high"  width="1004" height="709" name="intro"  align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" 

allowfullscreen="true" wmode="transparent"/>

</object>

</div>

</body>

</html>

