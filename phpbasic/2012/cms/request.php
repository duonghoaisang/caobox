<?php

$url = str_replace('[]','data[]',$_POST['data']);
parse_str($url,$result);
print_r($result['data']);
?>