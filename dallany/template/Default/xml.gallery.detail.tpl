<div class="close">
	<a href="#" onclick="gallery.closeinfo();"></a>
</div>
<div class="productinfo">
	<div class="col1">
		<p class="title">{detail.name}</p>
		<div class="desc">{detail.content}</div>
		
		<div class="category">
		</div>
	</div>
	
	<div class="col2">
		<div class="imgdetail">
		<img class="images img{detail.id} active" src="{_UPLOAD}{detail.image}" height="{detail.imgh}" />
		<!--BASIC other--><img class="images img{other.id}" src="{_UPLOAD}{other.image}" height="{other.imgh}" style="display:none;" /><!--BASIC other-->
		</div>
		<div class="viewer">
			<div class="slide">
			
				<a href="#/gallery/detail/{detail.id}" class="slide{detail.id} active" onclick="gallery.other_info(this);"><img src="{_UPLOAD}{detail.icon}" height="{detail.h}" /></a>
				<img src="{_UPLOAD}{detail.image}" style="display:none;" />
			
				<!--BASIC other--><a href="#/gallery/detail/{other.id}" class="slide{other.id}" onclick="gallery.other_info(this);"><img src="{_UPLOAD}{other.icon}" height="{other.h}" /></a>
				<!--BASIC other-->
			</div>
		</div>
	</div>
</div>