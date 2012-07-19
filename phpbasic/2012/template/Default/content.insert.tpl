<div class="bbcode">
<form method="post" name="bbcode_newcontent" action="./?mod=content&act=insert"><a href="#" class="hide">x</a>
<label for="author">{lang.article_name}</label><input name="title" type="text" class="form_name" value="{title}" /><br />
{include:tpl=bbcode}
<textarea name="content" class="form_content">{content}</textarea><br />
  <label for="author">{lang.author}</label><input name="author" type="text" class="form_author" value="{author}" {readonly} />
  <br />
<input name="author_id" type="hidden" value="{author_id}" />
<input type="submit" class="button" name="Submit" value="{lang.submit}" />
<input type="reset" class="button" name="button2" id="button2" value="{lang.reset}" />
</form>
</div>
