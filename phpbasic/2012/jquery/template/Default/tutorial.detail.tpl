<div class="box noborder">
  <!--BOX content-->
  <h2 class="title detail"><a title="by: {author}" class="title" href="{module}/{id}.html">{title} <em>({date})</em></a></h2>
  
	<div class="content">	{content}</div> 
  
	<p> Tra loi <span class="comment posts">{posts}</span> <span class="small">comment(s)</span>  <span class="author">{author}</span> <span class="small date">{date}</span>	  
  </p>
  <!--BOX content-->
</div><!--BOX comment-->
<div id="comments">
<!--BASIC comment-->
	<div class="comment"><h3 class="author">{comment.author} <span class="small date">{comment.date}</span></h3> 
		<div class="id{comment.id}">{comment.content}</div>
		<p class="reply id{comment.id}"><a href="comment/insert/{id}/{comment.author}" class="insert">Tra loi</a> </p>
	</div>
<!--BASIC comment--> 
	

	<a name="bottom"></a>
	<p class="reply"><a href="comment/insert/{id}" class="insert">Y kien</a></p>
</div><!--BOX comment-->