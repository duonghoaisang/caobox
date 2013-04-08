<?php ''; include 'header.tpl';echo '
hello ';print_r( isset($var)?$var:NULL);echo ' ee

<br />

Chao \\{{ var }}
'; if(count($loop)) {;echo '
'; foreach($loop as $rs) {;echo '
<p>
---------<br />
Div: '; print_r($var / 5);echo '
Multi: '; print_r(($var+1)*$var*5-$var5/10+1);  echo '<br />

Title: ';print_r(isset($rs["name"])?$rs["name"]:NULL);echo '<br />
	'; for($i = 0; $i < 5; $i++) {;echo '
		';print_r( isset($i)?$i:NULL);echo '
	'; };echo '
</p>
'; };echo '
'; }else{;echo '
<br />Lalalla
'; };echo '
'; include 'footer.tpl';echo '

';?>