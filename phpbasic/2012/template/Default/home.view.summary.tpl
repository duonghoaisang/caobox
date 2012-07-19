<div class="content_toolbar"><a href="{URI}" class="viewtype list">Topic list</a> <a href="{URI}" class="viewtype summary">Topic summary</a></div>
<!--BOX stinky-->
<div class="box">
	<h1 class="header">Stinky</h1>
        <ul>
		<!--BASIC stinky-->
		<li><a class="favorite" href="./?mod=content&act=mark&id={stinky.id}">&nbsp;</a> <a href="./?mod=content&act=view&id={stinky.id}&cat={stinky.t_rewrite}">{stinky.title}</a> <span class="small date">({stinky.date})</span> <a href="./?mod=content&act=view&id={stinky.id}#bottom"><img src="images/last_comment.gif" width="11" height="9" alt="lastest_comment" title="Last comment" /></a></li>
		<!--BASIC stinky-->
		</ul>
</div>
<!--BOX stinky-->

<!--BOX newest-->

<div class="box">
	
	<h1 class="header">Newest Summary </h1>
        <ul>
		<!--BASIC list-->
		
		<li><h2 class="title"><a class="favorite" href="./?mod=content&act=mark&id={list.id}" title="Add to favorite list">&nbsp;</a> <a title="by: {list.author}" href="./?mod=content&act=view&id={list.id}&cat={list.t_rewrite}">{list.title}</a> <span class="small date">({list.date})</span></h2>
		{list.intro}
	<br /><span class="comment">{list.posts}</span> <span class="small">comment(s)</span>  <span class="author">{list.last_author}</span> <span class="small date">({list.last_date})</span> <a href="./?mod=content&act=view&id={list.id}#bottom"><img src="images/last_comment.gif" width="11" height="9" alt="lastest_comment" title="Last comment" /></a> 
		</li>
		<!--BASIC list-->
		</ul>
</div>
<!--BOX newest-->
