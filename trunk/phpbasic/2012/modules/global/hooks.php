<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

/*
// list functions can hook ( functions were defined in core/hooks.php)
	function web_header() // load first
	function web_footer() // load last
	function module_before() //load before module run
	function module_after() // load after modul run
	function url($arr_parametters = NULL)
	function redirect($url = NULL)
	function dateformat($date = NULL,$format = 'd/m/Y')
	function output($string = NULL,$html  = 1)
	function encrypt($string) // current we are  using md5
	function cookie($name,$value,$path,$domain)
	function outedit($string)
*/

/* Function's user hook*/
function html($string=NULL,$len = NULL){
	if($len){
		$string = htmlentities(stripslashes($string),NULL,'utf-8');
		if(strlen($string)<=$len) return $string;
		$string = substr($string,0,$len);
		return substr($string,0,strrpos($string,' '));
	}
	return nl2br(htmlspecialchars(stripslashes($string),NULL,'utf-8'));
}

function format($str,$html = false){
	$str = highlight_php($str);
	$str = bbcode($str);
	return $str;
}


function outedit($string){
	return htmlspecialchars(stripslashes($string),NULL,'utf-8');
}

/* Function's user define*/

function highlight_php(&$str,$return = true){
	$str = stripslashes($str);
	$str = (preg_match('/<\?[php]?\s?(.*)\s?\?>/si',$str))?highlight_string($str,$return):htmlspecialchars($str,0,'UTF-8');
	$str = str_replace(array("  ","&nbsp;","<br>","\n"),array("<br>"," ","&nbsp;&nbsp;","<br />"),$str);
	return $str;

}

function bbcode($str){
	$url = "a-z0-9\:\/\-\?\&\&amp;\.=_\~\#\'\%";
	$str = preg_replace('#\[url=\"(.*?)\"\](.*?)\[/url\]#si','<a href="\\1">\\2</a>',$str);
	$str = preg_replace('#\[url=&quot;(.*?)&quot;\](.*?)\[/url\]#si','<a href="\\1">\\2</a>',$str);
	$str = preg_replace("/\[url\]([$url]*)\[\/url\]/i", '<a href="$1">$1</a>', $str);
	$str = preg_replace("(\[url=&quot;www\.($url)*&quot;\](.+?)\[/url\])",'<a href="http://$1">$2</a>', $str);
	$str = preg_replace("(\[url=&quot;($url)*&quot;\](.*)\[/url\])",'<a href="$1">$2</a>', $str);
	$str = preg_replace("(\[url=\"www\.($url)*\"\](.+?)\[/url\])",'<a href="http://$1">$2</a>', $str);
	$str = preg_replace("(\[url=\"($url)*\"\](.+?)\[/url\])",'<a href="$1">$2</a>', $str);
	$str = preg_replace('#\[img\](.*?)\[/img\]#i','<img src="\\1" alt="\\1" />',$str);
	$str = preg_replace('#\[img="(.*?)"\]\[/img\]#i','<img src="\\1" alt="\\1" />',$str);
	$str = preg_replace('#\[img="(.*?)"\]#i','<img src="\\1" alt="\\1" />',$str);
	$str = preg_replace('#\[img=\&quot;(.*?)\&quot;\]#i','<img src="\\1" alt="\\1" />',$str);
	$str = preg_replace('#\[b\](.*?)\[/b\]#si','<strong>\\1</strong>',$str);
	$str = preg_replace('#\[em\](.*?)\[/em\]#si','<i>\\1</i>',$str);
	$str = preg_replace('#\[i\](.*?)\[/i\]#si','<i>\\1</i>',$str);
	$str = preg_replace('#\[u\](.*?)\[/u\]#si','<u>\\1</u>',$str);
	$str = preg_replace('#\[color="(.*?)"\](.*?)\[/color\]#i','<font color="\\1">\\2</font>',$str);
	$str = preg_replace('#\[color=&quot;(.*?)&quot;\](.*?)\[/color\]#i','<font color="\\1">\\2</font>',$str);
	$str = preg_replace('/\[size="(.*?)"\](.*)\[\/size\]/si','<font size="\\1">\\2</font>',$str);
	$str = preg_replace('#\[quote\](.*?)\[/quote\]#si','<div class="quote">\\1</div>',$str);
	$str = preg_replace('#\[pre\](.*?)\[/pre\]#si','<pre>\\1</pre>',$str);
	return $str;
}

/*function web_footer(){
	
	$content = ob_get_contents();
	ob_end_clean();
	$content = preg_replace('/\.\/\?mod=[a-z0-9]*?&act=[a-z0-9]*?&id=([a-z0-9]*?)&cat=([a-z0-9]*?)/i',"/\\1/\\2.html",$content);
	echo $content;
}
*/?>