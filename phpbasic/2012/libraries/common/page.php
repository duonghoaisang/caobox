<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
//defined('_ROOT') or die(__FILE__);

class page extends Controller{
	var $first_text = 'First';
	var $last_text = 'Last';
	var $prev_text = 'Prev';
	var $next_text = 'Next';
	var $style = 'simple';
	var $get_page = 'p';
	var $npage = 0;
	var $last_page = 0;
	var $total = 0;
	var $onclick;
	var $attributes;
	var $url;
	var $root = './';
	
	
	var $default_page = 0;
	function __construct(){
		// load url
		$get  = isset($_GET)?$_GET:array();
		if(isset($_GET[$this->get_page])) unset($get[$this->get_page]);
		$url = http_build_query($get);
		$this->url = $url?"?$url":"";
	}
	
	function parse($total=0,$limit,$div = 0){
		if(!$limit) return NULL;
		// check page style		
		if(!method_exists($this,'page_'.$this->style)){
			$this->getError("<strong>$this->style</strong> is not suppport!");
		}
		//calculate argurments
		
		$this->npage = ceil($total/$limit);
		if($this->npage) $this->last_page = $this->npage - 1;
		$this->total = $total;
		$cpage = isset($_GET[$this->get_page])?intval($_GET[$this->get_page]):-1;
		
		// call method with page style
		return call_user_method('page_'.$this->style,$this,$this->npage,$cpage);
		
	}
	
	function link_page($page,$cpage){
		if($page==$cpage) return "<strong>".($page+1)."</strong> ";
		if($page == $this->default_page) $url = $this->url?"{$this->root}{$this->url}":$this->root;
		else $url = $this->url?"{$this->root}{$this->url}&amp;{$this->get_page}=$page":"{$this->root}?{$this->get_page}=$page";
		return '<a href="'.$url.'">'.($page+1).'</a>   ';
	}
	
	
	// page style
	
	
	function page_simple($npage,$cpage){
		$this->default_page = 0;
		$spage = '';
		for($i=0;$i<$npage;$i++) $spage .= $this->link_page($i,$cpage);
		return $spage;	
	}
	
	function page_last($npage,$cpage){
		$this->default_page = $npage;
		$spage = '';
		for($i=0;$i<$npage;$i++) $spage .= $this->link_page($i,$cpage>=0?$cpage:$this->last_page);
		return $spage;	
	}
	
	
}
//$page = new page;
//echo $page->parse(100,10);
?>