<script type="text/javascript" src="divbox.js"></script>
<link type="text/css" rel="stylesheet" href="{a}css/divbox.css" />
<div id="objective">
<p>
                <a  href="http://code.google.com/p/divbox/downloads/list"><img border="0" title="download new version" src="images/download.jpeg" align="left" style="margin-right: 5px;" alt="download jquery multibox" /></a><strong>DivBox</strong>  is simple, easy style format, no need extra markup and is used to overlay images on the current page through the power and flexibility of <a href="http://jquery.com" target="_blank">jQuery</a>´s selector. DivBox is a plugin for <a href="http://jquery.com" target="_blank">jQuery</a>. It was inspired in Multibox by <a href="http://phatfusion.net/multibox/" target="_blank">http://phatfusion.net/multibox/</a>.            </p>
        </div>
		
		
        
        <div class="clear"></div>
		
		<div><h2>Lastest code update:</h2>
		<p class="quote">svn checkout http://divbox.googlecode.com/svn/trunk/</p></div>	
		<script>
		function toggle(sel){
			$(sel).show();
		}
		</script>

		<div class="col1"><a name="example"></a>
		<h2><a href="/divbox#example">Example</a> | <a href="/divbox#features">Features</a> | <a href="/divbox#usage" onclick="toggle('div.how_to_use');">How to use</a> | <a href="/divbox#options" onclick="toggle('div.options');">Options</a></h2>
			<h6> Gallery</h6>
			<p>
				<a href="photos/image1.jpg" title="Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 Title 1 " class="lightbox1"><img src="photos/thumb_image1.jpg" /></a>
				<a href="photos/image2.jpg" title="Title 2" class="lightbox1"><img src="photos/thumb_image2.jpg" /></a>
				<a href="photos/image3.jpg" title="Title 3" class="lightbox1"><img src="photos/thumb_image3.jpg" /></a>
				<a href="photos/image4.jpg" title="Title 4" class="lightbox1"><img src="photos/thumb_image4.jpg" /></a>
				<a href="photos/image5.jpg" title="Title 5" class="lightbox1"><img src="photos/thumb_image5.jpg" /></a>
		  </p>
				<script type="text/javascript">
				$('a.lightbox1').divbox();
				</script>
		    <div style="float: left; width: 200px;">
				<h6>Single</h6>
				<a href="photos/image1.jpg" title="Title 1" class="lightbox2"><img src="photos/thumb_image1.jpg" /></a>
				<a href="photos/image2.jpg" title="Title 2" class="lightbox2"><img src="photos/thumb_image2.jpg" /></a>
			</div>
			
			<div style="float: left; width: 200px;">
				<h6>HTML descriptions</h6>
				<a href="photos/image1.jpg" title="Title 1" class="lightbox3" rel="descript_1"><img src="photos/thumb_image1.jpg" /></a>
				<a href="photos/image2.jpg" title="Title 2" class="lightbox3" rel="descript_2"><img src="photos/thumb_image2.jpg" /></a>
				<p style="display: none;" id="descript_1">HTML <strong>Description</strong> <a target="_blank" href="http://jquery.phpbasic.com"><img src="images/cart.gif"  border="0" /></a></p>
				<p style="display: none;" id="descript_2">HTML <em>Description</em> 2</p>
			</div>
				<script type="text/javascript">
				$('a.lightbox2').divbox({caption: true, caption_control: false});
				var opt = {
					caption: function(obj){
						return $('#'+$(obj).attr('rel')).html();
					}
				}
				$('a.lightbox3').divbox(opt);
				</script>
		 	 <div class="clear"></div>	
		 		<div style="float: left; width: 200px;">
				<h6>Media types</h6>
				  <a href="photos/video.flv" class="lightbox">flv example</a><br />
				  <a href="photos/music.mp3" class="lightbox">mp3 example</a><br />
                  <a href="photos/video.mp4" class="lightbox">mp4 example</a><br />
				  <a href="photos/media.wmv" class="lightbox">wmv example</a><br />
				  <a href="photos/media.mov" class="lightbox">mov example</a><br />
				  <a href="photos/flash.swf" class="lightbox">swf example</a><br />
				  <a href="http://www.youtube.com/watch?v=zKAW96N-Vms" class="lightbox">Youtube video</a>
				</div>
				<div style="float: left; width: 300px;">
				<h6>More...</h6>
				<a href="photos/download.zip" class="lightbox">Download link</a><br />
				<a href="http://google.com" class="lightbox">External link(Iframe)</a><br />
				<a href="#" class="popup" rel="box_id">HTML Element</a><br />
				<a href="ajax.php" class="ajax">Ajax</a><br />
				<a href="photos/image2.jpg" class="api" title="API functions">API functions</a><br />
				<a href="photos/image2.jpg" class="lang" title="Define languages (mouse hover on close, next, prev buttons to see the changes)">Define languages </a>
				
		 		</div>
				<div id="box_id" style=" display: none;">
					<ul>
						<li>Here the text</li>
						<li>Here the text</li>
						<li>Here the text</li>
						<li>Here the text</li>
						<li>Here the text</li>
					</ul>
				</div>
				
				<script type="text/javascript">
				$('.lightbox').divbox({caption: false});
				$('.popup').divbox({type: 'element',caption: false});
				$('.ajax').divbox({type: 'ajax',caption: false});
				var opt = {};
				opt.api = {
					start: function(obj){alert('Start...');},
					beginLoad: function(obj){alert('Begin to load ...');},
					afterLoad: function(obj){alert('Load success...');},
					closed: function(obj){alert('Closed...');}
				}
				$('.api').divbox(opt);
				
				var opt = {};
				opt.languages = {
					btn_close: 'Dong',
					btn_next: 'Sau',
					btn_prev: 'Truoc',
					click_full_image: 'Xem hinh lon',
					error_not_youtube: 'Day khong phai la link youtube',
					error_cannot_load: "Khong the load trang nay\nMa loi: "
				}
				$('.lang').divbox(opt);
				 </script>
			
        </div>
		<div class="col2">
			<p class="title"><h2>Your comment</h2></p>
			<div class="message">
			<!--BASIC comments-->
			<p><span>{comments.fullname} <span class="date">({comments.timestamp})</span></span>{comments.message}</p><!--BASIC comments-->
			</div>
			<div class="form">
			  <form id="fcomment" name="fcomment" method="post" action="" onsubmit="return checkPostComment(this);">
			  <p class="note">* if you have a request, please keep your email, i'll reply email when I have update. Thanks!</p>
			    <label id="name"><span>Fullname: <span class="r">*</span></span><input type="text" name="name" id="name" /></label>
                <label id="email"><span>Email:</span><input type="text" name="email" id="email" /></label>
			    <label id="message"><span>Message:<span class="r">*</span></span><textarea name="message" id="message"></textarea></label>
			    <label><span>&nbsp;</span><input class="btn" type="submit" name="Submit" value="Submit" />
			                              <input class="btn" type="reset" name="Submit2" value="Reset" /></label>
			  </form>
			  
			 
			</div>
		</div>
		 <div class="clear">&nbsp;</div>

		<div><a name="features"></a>
		
		<h2>Features <a href="/divbox#" title="Go to top"><img src="images/top.gif" alt="Top" /></a></h2>
		
          <ul>
            <li>supports a range of multimedia formats and youtube video </li>
            <li>auto detects formats or or you can specify the format, useful if your passing a querystring!</li>
			<li>define languages display </li>
            <li>support basic APIs  </li>
			<li>html descriptions</li>
		  	<li>easy to re-format template</li>
            <li>support draggable (if <a href="http://jquery.phpbasic.com/jquery.ui.draggable.js">jquery.ui.draggable.js</a> has been included)</li>
          </ul>
        </div>
		

		        


<div class=" how_to_use"><a name="usage"></a>
		<h2>How to use <a href="/divbox#" title="Go to top"><img src="images/top.gif" alt="Top" /></a></h2>
		
          <ul>
            <li><span class="step_title">Step 1 - Setup</span><hr />

                - Include just these two javascript files in your header.

	<p class="quote"><code>&lt;script type=&quot;text/javascript&quot; src=&quot;js/jquery.js&quot;&gt;&lt;/script&gt;  <br />
			  &lt;script type=&quot;text/javascript&quot; src=&quot;js/divbox.js&quot;&gt;&lt;/script&gt;</code></p>
			
			- Include the CSS file responsible to style the DivBox:
			<p class="quote"><code>&lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;css/divbox.css&quot; media=&quot;screen&quot; /&gt;</code></p>
            </li>
            <li><span class="step_title">Step 2 - Activate</span><hr />
			  - The only necessity is to have a HTML markup likes it:</p>
			  <p class="quote"><code>&lt;<strong>a</strong> href=&quot;image1.jpg&quot; class=&quot;<strong>divbox</strong>&quot; &gt;&lt;img src=&quot;thumb_image1.jpg&quot; width=&quot;72&quot; height=&quot;72&quot; alt=&quot;&quot; /&gt;&lt;/a&gt;</code></p>
			- After it, select the links and call the <strong><a href="http://jquery.phpbasic.com/divbox">DivBox</a></strong>. See some examples:
			<p class="quote"><code>&lt;script type=&quot;text/javascript&quot;&gt;<br />
		    var opt = {<br />
caption: true,<br />
caption_control: true //Note: don't put  comma (,) after the last property<br />
}<br />
$('<strong>a</strong>.<strong>divbox</strong>).divbox(opt);<br />
&lt;/script&gt;</code><br />
              <a href="/divbox#options">View full options</a></p>
           *  <em>Note</em>: To enable drag-drop feauture, you need include <br />
<p class="quote"><code>&lt;script type=&quot;text/javascript&quot; src=&quot;<a href="http://jquery.phpbasic.com/jquery.ui.draggable.js">js/jquery.ui.draggable.js</a>&quot;&gt;&lt;/script&gt; </code></p> 
Also, if you have problem with close,previous,next button on IE 6, please change the image buttons to absolute path in divbox.css on lines below:
<p class="quote"><code>*html #divbox_frame .closed{<br />
background-image: none;<br />
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<strong>http://domain.com/absolute_path/images/close.png</strong>);<br />
}<br />
*html #divbox_frame .prev{<br />
background-image: none;<br />
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<strong>http://domain.com/absolute_path/images/left.png</strong>);<br />
}<br />
*html #divbox_frame .prevDisabled{<br />
background-image: none;<br />
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<strong>http://domain.com/absolute_path/images/leftDisabled.png</strong>);<br />
}<br />
*html #divbox_frame .next{<br />
background-image: none;<br />
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<strong>http://domain.com/absolute_path/images/right.png</strong>);<br />
}<br />
*html #divbox_frame .nextDisabled{<br />
background-image: none;<br />
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=<strong>http://domain.com/absolute_path/images/rightDisabled.png</strong>);<br />
}<br />
</code></p>
            </li>
          </ul>
</div>
<a name="options"></a>
<div class=" options">
		<h2>Options  <a href="/divbox#" title="Go to top"><img src="images/top.gif" alt="Top" /></a></h2>
		
        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="options">
          <tr>
            <th width="14%">Option</th>
            <th width="15%">Default</th>
          <th width="71%">Description</thtd>          </tr>
          <tr>
            <td valign="top">width</td>
            <td valign="top">null</td>
            <td valign="top">The width of the box if it's not null, else the width will be auto. </td>
          </tr>
          <tr>
            <td valign="top">height</td>
            <td valign="top">null</td>
            <td valign="top">The height of the box if it's not null, else the height will be auto. </td>
          </tr>
          <tr>
            <td valign="top">speed</td>
            <td valign="top">500</td>
            <td valign="top">The speed of each the animation as string in jQuery terms ("slow" or "fast") or milliseconds as integer  </td>
          </tr>
          <tr>
            <td valign="top">left</td>
            <td valign="top">null</td>
            <td valign="top">The value from the left that the box should open to. If left is null, the left will be auto. </td>
          </tr>
          <tr>
            <td valign="top">top</td>
            <td valign="top">null</td>
            <td valign="top">The value from the top that the box should open to. If top is null, the top will be auto. </td>
          </tr>
          <tr>
            <td valign="top">type</td>
            <td valign="top">null</td>
            <td valign="top">The  specify the format that you want assign to. If type is null, the format will be auto. Divbox support formats: 
			  <p class="quote"><code>Image(jpg,jpeg,image,png),Media(mp3, mp4, flv, swf, wmv),element, ajax, youtube or any string (show in a iframe)
			</code></p>
			
			Example: 
			<p class="quote"><code>
			<u>HTML</u>:<br />
			&lt;a href=&quot;http://google.com&quot; class=&quot;lightbox&quot;&gt;External link(Iframe)&lt;/a&gt;<br />
&lt;a href=&quot;#&quot; class=&quot;popup&quot; rel=&quot;box_id&quot;&gt;HTML Element&lt;/a&gt;<br />
&lt;a href=&quot;ajax.php&quot; class=&quot;ajax&quot;&gt;Ajax&lt;/a&gt;<br />
<u>JS</u>:<br />
&lt;script type=&quot;text/javascript&quot;&gt;<br />
$('.lightbox').divbox({caption: false});<br />
$('.popup').divbox({type: 'element',caption: false});<br />
$('.ajax').divbox({type: 'ajax',caption: false});<br />
&lt;/script&gt;</code></p>
			</td>
          </tr>
          <tr>
            <td valign="top">src</td>
            <td valign="top">href</td>
            <td valign="top">The specify attribute that the value is a source to show on the box. </td>
          </tr>
          <tr>
            <td valign="top">scrollbar</td>
            <td valign="top">auto</td>
            <td valign="top">Set value of atrribute scrolling in iframe <p class="quote"><code>&lt;iframe scrolling=&quot;scrollbar option&quot; ..... 
			</code>&gt;&lt;/iframe&gt;</p></td>
          </tr>
          <tr>
            <td valign="top">btn_closed</td>
            <td valign="top">#divbox_frame .closed</td>
            <td valign="top">The jquery selector of element that is close button </td>
          </tr>
          <tr>
            <td valign="top">btn_prev</td>
            <td valign="top">#divbox_frame .prev</td>
            <td valign="top">The jquery selector of element that is previous button </td>
          </tr>
          <tr>
            <td valign="top">btn_next</td>
            <td valign="top">#divbox_frame .next</td>
            <td valign="top">The jquery selector of element that is next button </td>
          </tr>
          <tr>
            <td valign="top">btn_number</td>
            <td valign="top">#divbox_frame .number</td>
            <td valign="top">The jquery selector of element that show the current items per total items </td>
          </tr>
          <tr>
            <td valign="top">path</td>
            <td valign="top">players/</td>
            <td valign="top">The folder that includes players. </td>
          </tr>
          <tr>
            <td valign="top">resize_large_image</td>
            <td valign="top">true</td>
            <td valign="top">Allow  resize image auto if the demension size is so large and else. </td>
          </tr>
          <tr>
            <td valign="top">click_full_image</td>
            <td valign="top">true</td>
            <td valign="top">Allow click on image to view full image if the image has been auto resize. </td>
          </tr>
          <tr>
            <td valign="top">overlay</td>
            <td valign="top">true</td>
            <td valign="top">Allow use a semi-transparent background. </td>
          </tr>
          <tr>
            <td valign="top">caption</td>
            <td valign="top">true</td>
            <td valign="top">Allow show the caption:<br />
              - false: hide the caption <br />
              - true: the title of the element will show on caption<br />
              if caption is a function, the value return will show on caption, this is useful to show caption with HTML description. 
              <br />
Example: <br />
<p class="quote"><code><u>HTML</u>:<br />
  &lt;a href=&quot;photos/image1.jpg&quot; title=&quot;Title 1&quot; class=&quot;lightbox3&quot; rel=&quot;descript_1&quot;&gt;&lt;img src=&quot;photos/thumb_image1.jpg&quot; /&gt;&lt;/a&gt;<br />
&lt;a href=&quot;photos/image2.jpg&quot; title=&quot;Title 2&quot; class=&quot;lightbox3&quot; rel=&quot;descript_2&quot;&gt;&lt;img src=&quot;photos/thumb_image2.jpg&quot; /&gt;&lt;/a&gt;<br />
<br />
&lt;p style=&quot;display: none;&quot; id=&quot;descript_1&quot;&gt;HTML &lt;strong&gt;Description&lt;/strong&gt; &lt;a target=&quot;_blank&quot; href=&quot;http://jquery.phpbasic.com&quot;&gt;&lt;img src=&quot;images/cart.gif&quot;  border=&quot;0&quot; /&gt;&lt;/a&gt;&lt;/p&gt;<br />
&lt;p style=&quot;display: none;&quot; id=&quot;descript_2&quot;&gt;HTML &lt;em&gt;Description&lt;/em&gt; 2&lt;/p&gt;<br />
<br />
<u>JS</u>:<br />&lt;script type=&quot;text/javascript&quot;&gt;<br />
var opt = {<br />
caption: function(obj){<br />
return $('#'+$(obj).attr('rel')).html();<br />
}<br />
}<br />
$('a.lightbox3').divbox(opt);<br />
&lt;/script&gt;<br />
<br />
</code></p></td>
          </tr>
          <tr>
            <td valign="top">caption_control</td>
            <td valign="top">true</td>
            <td valign="top">Allow show the caption control ( includes next and previous buttons) </td>
          </tr>
          <tr>
            <td valign="top">caption_number</td>
            <td valign="top">true</td>
            <td valign="top">Allow show the current item per total items </td>
          </tr>
          <tr>
            <td valign="top">event</td>
            <td valign="top">click</td>
            <td valign="top">The mouse event on the HTML element to show box. </td>
          </tr>
          <tr>
            <td valign="top">container</td>
            <td valign="top">document.body</td>
            <td valign="top">The containing element for the overlay if used.</td>
          </tr>
          <tr>
            <td valign="top">download_able</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">The extentions file that will go direct to link ( don't show box). Default defined:
            <p class="quote"><code>download_able: ['pdf', 'zip', 'gz', 'rar', 'doc', 'docx', 'xls', 'xslx', 'ppt', 'pptx', 'csv']</code></p> Example:
			<p class="quote"><code> <u>HTML</u>:<br />
  &lt;a href=&quot;photos/download.zip&quot; class=&quot;lightbox&quot;&gt;Download link&lt;/a&gt;  <br />
  <u>JS</u>:<br />
  &lt;script type=&quot;text/javascript&quot;&gt;<br />
			  $('.lightbox').divbox({caption: false});
			  <br />
  &lt;/script&gt;</code></p>			</td>
          </tr>
          <tr>
            <td valign="top">languages</td>
            <td valign="top"></td>
            <td valign="top">Defines text string show on box. Default defined:<p class="quote"><code>languages:{<br />
              btn_close: 'Close',<br />
              btn_next: 'Next',<br />
              btn_prev: 'Prev',<br />
              click_full_image: 'Click on here to view full image',<br />
              error_not_youtube: 'This is not a youtube link',<br />
              error_cannot_load: &quot;We can't load this page\nError: &quot;;<br />
            }</code></p>
			
			Example:
			<p class="quote"><code> <u>HTML</u>:<br />
			  &lt;a href=&quot;photos/image2.jpg&quot; class=&quot;lang&quot; title=&quot;Define languages (mouse hover on close, next, prev buttons to see the changes)&quot;&gt;Define languages &lt;/a&gt;		    <br />
  <u>JS</u>:<br />
  &lt;script type=&quot;text/javascript&quot;&gt;<br />
var opt = {};<br />
opt.languages = {<br />
btn_close: 'Dong',<br />
btn_next: 'Sau',<br />
btn_prev: 'Truoc',<br />
click_full_image: 'Xem hinh lon',<br />
error_not_youtube: 'Day khong phai la link youtube',<br />
error_cannot_load: &quot;Khong the load trang nay\nMa loi: &quot;<br />
}<br />
$('.lang').divbox(opt);<br />
&lt;/script&gt;</code></p></td>
          </tr>
          <tr>
            <td valign="top">api</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">Callback functions  <p class="quote"><code>api:{<br />
start: function(){ /* do some thing before Divbox begin /*},<br />
beginLoad: function(){ /* do some thing before Divbox load the content /*},<br />
afterLoad: function(){ /* do some thing after Divbox load the content /*},<br />
closed: function(){ /* do some thing after Divbox closed /*}<br />
}</code></p>

Example:
<p class="quote"><code> <u>HTML</u>:<br />
  &lt;a href=&quot;photos/image2.jpg&quot; class=&quot;api&quot; title=&quot;API functions&quot;&gt;API functions&lt;/a&gt;  <br />
  <u>JS</u>:<br />
  &lt;script type=&quot;text/javascript&quot;&gt;<br />
var opt = {};<br />
opt.api = {<br />
start: function(obj){alert('Start...');},<br />
beginLoad: function(obj){alert('Begin to load ...');},<br />
afterLoad: function(obj){alert('Load success...');},<br />
closed: function(obj){alert('Closed...');}<br />
}<br />
$('.api').divbox(opt);<br />
&lt;/script&gt;</code></p></td>
          </tr>
        </table>
</div>
<p>&nbsp;</p>
<script type="text/javascript"><!--
google_ad_client = "pub-1823237824396673";
google_ad_slot = "6379102574";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
 <a href="/divbox#" title="Go to top"><img src="images/top.gif" alt="Top" /></a>
