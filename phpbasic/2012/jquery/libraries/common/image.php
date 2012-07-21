<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class image extends Controller{
	var $image;
	var $img;
	function __construct($image){
		if(file_exists($image)) $this->image = $image;
	}	
	
	
	function info(){
		if($this->image){
			return @getimagesize($this->image);
		}
		return false;
	}
	
	function check(){
		if(substr($info['mime'],0,5)=='image') return true;
		return false;
	}
	
	function resize($width = 0,$height = 0,$nFile = NULL){
		$info = $this->info();
		if($info[0] <= $width && $info[1] <= $height) return false;
		if($width <= 0){
			if($height <= 0){ $width = $info[0];$height = $info[1];}
			else $width = round($info[0]*$height/$info[1]);
		}elseif($height<=0){
			$height = round($width*$info[1]/$info[0]);
		}
		$type_file = substr($info['mime'],0,5);
		if($type_file == 'image'){
			switch($info['mime']){
				case 'image/jpeg': $img =  @imagecreatefromjpeg($this->image);
				break;
				case 'image/gif': $img = @imagecreatefromgif($this->image);
				break;
				case 'image/png': $img = @imagecreatefrompng($this->image);
				break;
				default: return false;
			}
		}	
		$oImg=@imagecreatetruecolor($width,$height);
		@imagecopyresampled ( $oImg, $img, 0,0,0,0, $width, $height, $info[0],$info[1]);

		if($type_file == 'image'){
			switch($info['mime']){
				case 'image/jpeg': 
					if($nFile) 	@imagejpeg($oImg,$nFile);
					else{ @header("Content-type: image/jpeg");@imagejpeg($oImg);}
				break;
				case 'image/gif':
					if($nFile) 	@imagegif($oImg,$nFile);
					else{ @header("Content-type: image/gif");@imagegif($oImg);}				
				break;
				case 'image/png':
					if($nFile) 	@imagejpeg($oImg,$nFile);
					else{ @header("Content-type: image/png");@imagepng($oImg);}				
				break;
				default: return false;
			}
		}	
		
		@imagedestroy($oImg);
	}
	
	
	
}

?>