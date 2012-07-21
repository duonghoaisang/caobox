<?php
//error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
define('_ROOT',rtrim(dirname(__FILE__),'/').'/',true);
include 'defined.php';

$f = addslashes($_GET['file']);
if(!file_exists(_UPLOAD.$f)){
	die('File <strong>'.$f.'</strong> is not exists');
}
$file = _UPLOAD.$f;

$info = getimagesize($file);
if(intval($_GET['width'])){
	$width = intval($_GET['width']);
	$height = round($width*$info[1]/$info[0]);
}else{
	$width = $info[0];
	$height = $info[1];
}

switch($info['mime']){
	case 'image/jpeg': $img =  @imagecreatefromjpeg($file);
	break;
	case 'image/gif': $img =  @imagecreatefromgif($file);
	break;
	case 'image/png': $img =  @imagecreatefrompng($file);
	break;
	default: die('We not support this file ');
	break;
}

$oImg=@imagecreatetruecolor($width,$height);
@imagecopyresampled ( $oImg, $img, 0,0,0,0, $width, $height, $info[0],$info[1]);
switch($info['mime']){
	case 'image/jpeg': 
		@header("Content-type: image/jpeg");@imagejpeg($oImg);
	break;
	case 'image/gif':
		@header("Content-type: image/gif");@imagegif($oImg);
	break;
	case 'image/png':
		@header("Content-type: image/png");@imagepng($oImg);
	break;
	default: return false;
}


exit();
?>