<script type="text/javascript" src="mscroller.js"></script>
<link type="text/css" rel="stylesheet" href="{a}css/mscroller.css" />

<p>Circle</p>
<div  id="circle_horz" class="mscroller_horz">
	<ul class="scroller">
	<li>1AAA AAA AAA</li>
	<li>BB  BBB B</li>
	<li>CC C C</li>
	</ul>
</div>
<div  id="circle_vert" class="mscroller_vert">
	<ul class="scroller">
	<li>UU U UU  </li>
	<li>ZZ Z Z </li>
	<li>WW WW</li>
	</ul>
</div>
<p>Scroll</p>
<div  id="scroll_horz" class="mscroller_horz">
	<ul class="scroller">
	<li>UU U UU U </li>
	<li>ZZ Z Z Z</li>
	<li>WW WW W W</li>
	</ul>
</div>

<div  id="scroll_vert" class="mscroller_vert">
	<ul class="scroller">
	<li>UU U UU  </li>
	<li>ZZ Z Z </li>
	<li>WW WW</li>
	</ul>
</div>
<p>Alternate</p>
<div  id="alternate_horz" class="mscroller_horz">
	<ul class="scroller">
	<li>UU U UU U </li>
	<li>ZZ Z Z Z</li>
	<li>WW WW W W</li>
	</ul>
</div>

<div  id="alternate_vert" class="mscroller_vert">
	<ul class="scroller">
	<li>UU U UU U </li>
	<li>ZZ Z Z Z</li>
	<li>WW WW W</li>
	</ul>
</div>
<p>Slide</p>
<div  id="slide_horz" class="mscroller_horz">
	<ul class="scroller">
	<li>UU U UU U </li>
	<li>ZZ Z Z Z</li>
	<li>WW WW W W</li>
	</ul>
</div>

<div  id="slide_vert" class="mscroller_vert">
	<ul class="scroller">
	<li>UU U UU U </li>
	<li>ZZ Z Z Z</li>
	<li>WW WW W</li>
	</ul>
</div>

<script type="text/javascript">
$(document).ready(function(){
var opt = {
	behavior: 'circle',
	mouseover: function(o){
		o.stop();
		o.css({cursor: 'pointer'});
	},
	mouseout: function(o){
		o.start();
	}
}
	$('#circle_horz').mscroller(opt);
	$('#circle_vert').mscroller({behavior: 'circle',direction: 'up'});
	$('#scroll_horz').mscroller({behavior: 'scroll',direction: 'right',delay: 1000});
	$('#scroll_vert').mscroller({behavior: 'scroll',direction: 'down', delay: 1000});
	$('#alternate_horz').mscroller({behavior: 'alternate'});
	$('#alternate_vert').mscroller({behavior: 'alternate',direction: 'up'});
	$('#slide_horz').mscroller({behavior: 'slide'});
	$('#slide_vert').mscroller({behavior: 'slide',direction: 'up'});
});
</script>			
