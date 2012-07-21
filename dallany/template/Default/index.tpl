<!--Homepage-->
<div class="section"  id="homepage">
	<div class="intro">
		<div class="copy">
			{briefintro.content}
		</div>
		<p class="viewmore" align="right"><a href="#" onClick="homepage.ourstory();return false;">...Our story</a><a style="display:none;" href="#" class="insurance_service" onClick="homepage.insurance();return false;">Insurance Service</a></p>
	</div>
	<div class="ourstory">
		<p class="viewmore">{ourstory.name}</p>
		<div class="copy">
			{ourstory.content}
		</div>
	</div>
	
	<div class="insurance" style="display: none;">
		<p class="viewmore">{insurance.name}</p>
		<div class="copy">
		
{insurance.content}
		</div>
	</div>
	
	

</div>
<!--Collection-->
<div class="section" id="collection">
	<ul class="listcat">
		<!--BASIC category-->
		<li class="li{category.stt}"><a href="#/collection/{category.id}" class="a{category.stt}"><img src="{_UPLOAD}{category.icon}" /></a></li><!--BASIC category-->
	</ul>
	<div class="fullimg">
	<!--BASIC category-->
	<img src="{_UPLOAD}{category.ln_icon}" class="a{category.stt}" />
	<img src="{_UPLOAD}{category.ln_image}" class="a{category.stt}_after" />
	
	<!--BASIC category-->
	</div>
	
</div>
<!--Catalog-->
<div class="section" id="catalog" align="center"></div>
<!--Bridal-->
<div class="section" id="bridal" align="center"></div>
<!--Diamond-->
<div class="section" id="diamond"></div>
<!--Diamond-->
<div class="section" id="special"></div>

<!--Diamond-->
<div class="section" id="gallery"></div>
<!--Diamond-->
<div class="section" id="craftmanship"></div>

<!--Diamond-->
<div class="section" id="timepieces"></div>
<!--Diamond-->
<div class="section" id="timepieces_kind"></div>

<!--Diamond-->
<div class="section" id="contact"></div>