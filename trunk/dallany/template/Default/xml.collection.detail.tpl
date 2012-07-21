<div class="close">
	<a href="#" onclick="collection.closeinfo();"></a>
</div>
<div class="productinfo">
	<div class="col1">
		<p class="title">{detail.name}</p>
		<div class="desc">{detail.content}</div>
		
		<div class="category">
			Collection /
			<ul>
				<!--BASIC list--><li><a href="#/collection/{list.id}" rel="li{list.stt}" class="listcat cat{list.id} {list.active}" onclick="collection.changecat(this);">{list.name}</a></li><!--BASIC list-->
			</ul>
		</div>
	</div>
	
	<div class="col2">
		<div class="imgdetail">
		<img class="images img{detail.id} active" src="{_UPLOAD}{detail.image}" height="{detail.imgh}" />
		<!--BASIC other--><img class="images img{other.id}" height="{other.imgh}" src="{_UPLOAD}{other.image}" style="display:none;" /><!--BASIC other-->
		</div>
		<div class="viewer">
			<div class="slide">
			
				<a href="#/collection/detail/{detail.id}" class="slide{detail.id} active" onclick="collection.other_info(this);"><img src="{_UPLOAD}{detail.icon}" height="{detail.h}" /></a>
				<img src="{_UPLOAD}{detail.image}" style="display:none;" />
			
				<!--BASIC other--><a href="#/collection/detail/{other.id}" class="slide{other.id}" onclick="collection.other_info(this);"><img src="{_UPLOAD}{other.icon}" height="{other.h}" /></a>
				<!--BASIC other-->
			</div>
		</div>
	</div>
</div>