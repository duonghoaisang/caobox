<script src="jemotion.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	var opt = {
		handle: '#etoggle',
		dir: 'emotions/',
		label_on: 'On Emotions',
		label_off: 'Off Emotions',
		style: 'background: #eee',
		css: 'class2'
	}
	$('.emotion').emotions(opt);
});
</script>
<style>
.discuss{
	border: 1px solid #ccc;
	margin-top: 4px;
}
</style>
<div id="objective">
<p>
               <a href="http://code.google.com/p/divbox/downloads/list" target="_blank"><img border="0" align="left" alt="download jquery multibox" style="margin-right: 5px;" src="template/Default/images/download.jpeg" title="download new version"></a> Sometime you need to hide the emotion icons on your web to view exact content. <strong>jEmotion</strong> is a small jquery plugins help you do that by a click and you needn't to reload the page.</p>
</div>
        
        <div class="clear">&nbsp;</div>
		
		<div>
		<h2><a href="/jemotion#">Example</a> | <a href="/jemotion#usage">How to  use</a> | <a href="/jemotion#options">Options</a></h2>
        <div style="padding-left: 40px;"><a href="#" id="etoggle" style="background: #ddd;">Click here to hide emotion icons</a>
        </div>
        <div class="quote emotion">  >:) :)) /:) <):) :)] :) :(( :(  ;;) ;) >:D< :D :-SS #:-S :-? >:P :P (:| :| :-/ :-* =(( ~X( B-) :-S =)) O:-) :-B =; 8-| L-) :-& :-$ [-( :O) 8-} 
<:-P :x =P~ #-o =D> @-) :^o :-w :-< :-O :> :-c X( :-h 8-> </div>
<div>
				
				
			
</div>
		<div>
		<a name="usage"></a>
		<h2>How to use <a href="/jemotion#" title="Go to top"><img src="images/top.gif" alt="Top" /></a></h2>
		
          <ul>
            <li><span class="step_title">Step 1 - Setup</span><hr />
             - Include just these two javascript files in your header.

	<p class="quote"><code>&lt;script type=&quot;text/javascript&quot; src=&quot;js/jquery.js&quot;&gt;&lt;/script&gt;  <br />
			  &lt;script type=&quot;text/javascript&quot; src=&quot;js/jemotion.js&quot;&gt;&lt;/script&gt;</code></p>
            </li>
            <li><span class="step_title">Step 2 - Activate</span><hr />
			  - The only necessity is to have a HTML markup likes it:</p>
			  <p class="quote"><code>&lt;div class=&quot;emotion&quot;&gt;  &gt;:) :)) /:) &lt;):) :)] :) :(( :(  ;;) ;) &gt;:D&lt; :D :-SS #:-S :-? &gt;:P :P (:| :| :-/ :-* =(( ~X( B-) :-S =)) O:-) :-B =; 8-| L-) :-&amp; :-$ [-( :O) 8-} <br />
		      &lt;:-P :x =P~ #-o =D&gt; @-) :^o :-w :-&lt; :-O :&gt; :-c X( :-h 8-&gt; &lt;/div&gt;</code></p>
			- After it, select the links and call the <strong><a href="http://jquery.phpbasic.com/jemotion">Emotions</a></strong>. See some examples:
			<p class="quote"><code>&lt;script type=&quot;text/javascript&quot;&gt;<br />
		    var opt = {<br />
handle: &quot;a#toggle&quot;,<br />
css: null //Note: don't put  comma (,) after the last property<br />
}<br />
$('<strong>a</strong>.emotion).emotion(opt);<br />
&lt;/script&gt;</code><br />
              <a href="/jemotion#options">View full options</a><code><br />
              </code></p>
            </li>
          </ul>
        </div>
		
		
		
		<div><a name="options"></a>
		<h2>Options  <a href="/jemotion#" title="Go to top"><img src="images/top.gif" alt="Top" /></a></h2>
		
        <table width="100%" border="0" cellpadding="0" cellspacing="0" id="options">
          <tr>
            <th width="14%">Option</th>
            <th width="15%">Default</th>
          <th width="71%">Description</thtd>          </tr>
          <tr>
            <td valign="top">handle</td>
            <td valign="top">a#toggle</td>
            <td valign="top">The specified elements that the emotions will on of when you click on. </td>
          </tr>
          <tr>
            <td valign="top">dir</td>
            <td valign="top">emotions/</td>
            <td valign="top">The foleder that includes the emotion icons. </td>
          </tr>
          <tr>
            <td valign="top">label</td>
            <td valign="top">On Emotions</td>
            <td valign="top">The name string show on hadle elements when you click  on first. </td>
          </tr>
          <tr>
            <td valign="top">style</td>
            <td valign="top">null</td>
            <td valign="top">The string of style on handle element when you click  on first. </td>
          </tr>
          <tr>
            <td valign="top">class</td>
            <td valign="top">null</td>
            <td valign="top">The class name that will added to handle element when you click on first. </td>
          </tr>
          <tr>
            <td valign="top">emotions</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">The javascript object  includes syntax of emotion icons. Default emotions:
              <p class="quote">emotions: [<br />
{syntax: '&amp;gt;:)',title: 'Devil',icon: '1.gif'},<br />
{syntax: ':((',title: 'Crying',icon: '2.gif'},<br />
{syntax: ';;)',title: 'batting eyelashes',icon: '3.gif'},<br />
{syntax: '&amp;gt;:D&amp;lt;',title: 'big hug',icon: '4.gif'},<br />
{syntax: '&amp;lt;):)',title: 'cowboy',icon: '5.gif'},<br />
{syntax: ':D',title: 'big grin',icon: '6.gif'},<br />
{syntax: ':-/',title: 'confused',icon: '7.gif'},<br />
{syntax: ':x',title: 'love struck',icon: '8.gif'},<br />
{syntax: '&amp;gt;:P',title: 'phbbbbt',icon: '10.gif'},<br />
{syntax: ':-*',title: 'kiss',icon: '11.gif'},<br />
{syntax: '=((',title: 'broken heart',icon: '12.gif'},<br />
{syntax: ':-O',title: 'surprise',icon: '13.gif'},<br />
{syntax: '~X(',title: 'at wits\' end',icon: '14.gif'},<br />
{syntax: ':&amp;gt;',title: 'smug',icon: '15.gif'},<br />
{syntax: 'B-)',title: 'cool',icon: '16.gif'},<br />
{syntax: ':-SS',title: 'nail biting',icon: '17.gif'},<br />
{syntax: '#:-S',title: 'whew!',icon: '18.gif'},<br />
{syntax: ':))',title: 'laughing',icon: '19.gif'},<br />
{syntax: ':(',title: 'sad',icon: '20.gif'},<br />
{syntax: '/:)',title: 'raised eyebrows',icon:'21.gif'},<br />
{syntax: '(:|',title: 'yawn',icon: '22.gif'},<br />
{syntax: ':)]',title: 'on the phone',icon: '23.gif'},<br />
{syntax: '=))',title: 'rolling on the floor',icon: '24.gif'},<br />
{syntax: 'O:-)',title: 'angel',icon: '25.gif'},<br />
{syntax: ':-B',title: 'nerd',icon: '26.gif'},<br />
{syntax: '=;',title: 'talk to the hand',icon: '27.gif'},<br />
{syntax: '8-|',title: 'rolling eyes',icon: '29.gif'},<br />
{syntax: 'L-)',title: 'loser',icon: '30.gif'},<br />
{syntax: ':-&amp;amp;',title: 'sick',icon: '31.gif'},<br />
{syntax: ':-$',title: 'don\'t tell anyone',icon: '32.gif'},<br />
{syntax: '[-(',title: 'no talking',icon: '33.gif'},<br />
{syntax: ':O)',title: 'clown',icon: '34.gif'},<br />
{syntax: '8-}',title: 'silly',icon: '35.gif'},<br />
{syntax: '&amp;lt;:-P',title: 'party',icon: '36.gif'},<br />
{syntax: ':|',title: 'straight face',icon: '37.gif'},<br />
{syntax: '=P~',title: 'drooling',icon: '38.gif'},<br />
{syntax: ':-?',title: 'thinking',icon: '39.gif'},<br />
{syntax: '#-o',title: 'd\'oh',icon: '40.gif'},<br />
{syntax: '=D&amp;gt;',title: 'applause',icon: '41.gif'},<br />
{syntax: ':-S',title: 'worried',icon: '42.gif'},<br />
{syntax: '@-)',title: 'hypnotized',icon: '43.gif'},<br />
{syntax: ':^o',title: 'liar',icon: '44.gif'},<br />
{syntax: ':-w',title: 'waiting',icon: '45.gif'},<br />
{syntax: ':-&amp;lt;',title: 'sigh',icon: '46.gif'},<br />
{syntax: ':P',title: 'tongue',icon: '47.gif'},<br />
{syntax: ';)',title: 'winking',icon: '48.gif'},<br />
{syntax: ':)',title: 'happy',icon: '100.gif'},<br />
{syntax: ':-c',title: 'call me',icon: '101.gif'},<br />
{syntax: 'X(',title: 'angry',icon: '102.gif'},<br />
{syntax: ':-h',title: 'wave',icon: '103.gif'},<br />
{syntax: '8-&amp;gt;',title: 'day dreaming',icon: '105.gif'}<br />
]</p>			</td>
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
<a href="/jemotion#" title="Go to top"><img src="images/top.gif" alt="Top" /></a>
