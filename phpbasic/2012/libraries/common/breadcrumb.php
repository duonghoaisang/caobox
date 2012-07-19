<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class breadcrumb extends Controller{
	var $limit = 0;
	function __construct(){
		if(!$_SESSION['brc']) $_SESSION['brc'] = array();
	}	
	
	function reset(){
		$_SESSION['brc'] = array();
	}
	// array(url, title)
	function assign($url,$title,$remove_last_item = false){
		if($title){
			if($remove_last_item){
				$key = end(array_keys($_SESSION['brc']));
				unset($_SESSION['brc'][$key]);
				if(!$this->limit) $this->limit = count($_SESSION['brc']);
			}
			$_SESSION['brc'][$url.'-'.$title] =  array('url'=>$url,'title'=>$title);
		}
	}
	
	
	function parse(){
		$content = '';
		$n = count($_SESSION['brc']);
		$k = 0;
		foreach($_SESSION['brc'] as $key=>$arr){
			if(!$k && !$arr['url']) $content .= $arr['title'].' &raquo; ';
			elseif($k==$n-1) $content .=  '<span style="color: red;">'.$arr['title'].'</span>';
			else $content .= '<a href="'.$arr['url'].'">'.$arr['title'].'</a> &raquo; ';
			if($this->limit && $k>$this->limit) unset($_SESSION['brc'][$key]);
			$k++;
		}
		return $content;
	}
}

?>