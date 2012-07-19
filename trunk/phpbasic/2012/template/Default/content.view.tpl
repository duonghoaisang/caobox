<div class="box noborder"><div class="content_toolbar"><a href="http://facebook.com/share.php?u=www.phpbasic.com/{c_rewrite}/{id}/{title_url}.html"  title="facebook share" target="_blank"><img src="images/facebook.gif" alt="facebox" width="14" height="14" border="0" align="absmiddle" /></a> <a href="http://twitter.com/home?status={title}+http://phpbasic.com/short/c/{id}"  title="tweeter share" target="_blank"><img src="images/twitter.gif" alt="tweeter" width="14" height="14" border="0" align="absmiddle" /></a> <a href="#" class="emotion on">Emotion</a>

</div>
<!--BOX content-->
<h2 class="title detail"><a title="Add to favorite list" class="favorite{favorited}" href="content/mark/{id}.html">&nbsp;</a><a title="by: {author}" class="title" href="{c_rewrite}/{id}/{title_url}.html">{title}</a> <span class="small date">{date}</span></h2>

	<div class="content">	{content}</div> 

	<p> Tra loi <span class="comment posts">{posts}</span> <span class="small">comment(s)</span>  <span class="author">{author}</span> <span class="small date">{date}</span>	  
  </p>
<!--BOX content-->
	</div>

<!--BOX comment-->
<div id="comments">
<!--BASIC comment-->
	<div class="comment"><h3 class="author">{comment.author} <span class="small date">{comment.date}</span></h3> 
		<div class="id{comment.id}">{comment.content}</div>
		<p class="reply id{comment.id}"><a href="comment/insert/{id}/{comment.author}" class="insert reply_to">{lang.reply_to}<strong>{comment.author}</strong></a> </p>
	</div>
<!--BASIC comment--> 
	

	<a name="bottom"></a>
	<p class="reply"><a href="comment/insert/{id}" class="insert btn_reply">{lang.reply}</a></p>
</div><!--BOX comment-->