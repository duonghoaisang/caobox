<div class="content_toolbar"><a href="#" class="viewtype list">Topic list</a> <a href="#" class="viewtype summary">Topic summary</a></div>
<!--BOX stinky-->
<div class="box">
	<h1 class="header">Stinky</h1>
        <ul>
		<!--BASIC stinky-->
		<li><a class="favorite{stinky.favorited}" href="content/mark/{stinky.id}.html">&nbsp;</a> <a href="{stinky.c_rewrite}/{stinky.id}/{stinky.title_url}.html">{stinky.title}</a> <span class="small date">({stinky.date})</span> <a href="{stinky.c_rewrite}/{stinky.id}//{stinky.title_url}.html#bottom"><img src="images/last_comment.gif" width="11" height="9" alt="lastest_comment" title="Last comment" /></a></li>
		<!--BASIC stinky-->
		</ul>
</div>
<!--BOX stinky-->

<!--BOX newest-->

<div class="box">
	
	<h1 class="header">Newest List </h1>
        <ul>
		<!--BASIC list-->
		
		<li><h2 class="title"><a class="favorite{list.favorited}" href="content/mark/{list.id}.html" title="Add to favorite list">&nbsp;</a> <a title="by: {list.author}" href="{list.c_rewrite}/{list.id}/{list.title_url}.html">{list.title}</a> <span class="small date">({list.date})</span></h2>
		{list.intro}
	<br /><span class="comment">{list.posts}</span> <span class="small">comment(s)</span>  <span class="author">{list.last_author}</span> <span class="small date">({list.last_date})</span> <a href="{list.c_rewrite}/{list.id}/{list.title_url}.html#bottom"><img src="images/last_comment.gif" width="11" height="9" alt="lastest_comment" title="Last comment" /></a> 
		</li>
		<!--BASIC list-->
		</ul>
</div>
<!--BOX newest-->