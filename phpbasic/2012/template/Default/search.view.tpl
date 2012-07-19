<!--BOX stinky-->
<!--BOX stinky-->

<!--BOX newest-->

<div class="box">
	
	<h1 class="header">Search result</h1>
        <ul>
		<!--BASIC list-->
		
		<li><h2 class="title"><a class="favorite" href="content/mark/{list.id}.html" title="Add to favorite list">&nbsp;</a> <a title="by: {list.author}" href="{list.c_rewrite}/{list.id}.html">{list.title}</a> <span class="small date">({list.date})</span></h2>
		{list.intro}
	<br /><span class="comment">{list.posts}</span> <span class="small">comment(s)</span>  <span class="author">{list.last_author}</span> <span class="small date">({list.last_date})</span> <a href="{list.c_rewrite}/{list.id}.html#bottom"><img src="images/last_comment.gif" width="11" height="9" alt="lastest_comment" title="Last comment" /></a> 
		</li>
		<!--BASIC list-->
        
        {empty_data}
		</ul>
</div>
<!--BOX newest-->