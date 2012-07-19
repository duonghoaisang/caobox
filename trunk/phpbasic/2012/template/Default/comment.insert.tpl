<!--BOX form-->
<div class="bbcode">
<form method="post" name="bbcode_newcomment{cls_id}" action=""><a href="#" class="hide">x</a>
  <label for="author">{lang.author}</label><input name="author" type="text" class="form_author" value="{author}" {readonly} /><br />
{include:tpl=bbcode}
<textarea name="content" class="form_content">{content}</textarea><br />
<input type="submit" class="button" name="Submit" value="{lang.submit}" />
<input type="reset" class="button" name="button2" id="button2" value="{lang.reset}" />
</form>
</div>
<!--BOX form-->

<!--BOX data-->
	<div class="comment"><h3 class="author">{author} <span class="small date">{date}</span></h3> 
		<div class="id{commentId}">{content}</div>
		<p class="reply id{comment.id}"><a class="insert" href="./?mod=comment&act=insert&id={id}&auth={author}">Tra loi</a> <a class="update" href="./?mod=comment&act=update&id={commentId}">Edit</a> <a class="delete" href="./?mod=comment&act=delete&id={commentId}">Remove</a></p>
	</div>
<!--BOX data-->