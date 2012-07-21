<?php
class paging{
	var $label = array('First','Prev','Next','Last');
	var $current = '<strong>%d</strong>';
	var $sep = '  ';
	var $info = array();
	var $url;
	function __construct($url = NULL, $total = 0, $limit = 0){
		if(!$total || !$limit || $total <= $limit) return false;
		$this->info['pnum'] = ceil($total/$limit);
		if($this->info['pnum'] <=1) return false;
		$this->info['page'] = intval($_GET['page']);
		$this->info['url'] = $url;
	}
	
	function build_link($page = 0,$param = NULL,$label  =  NULL){
		$url =  '<a href="'.$this->info['url'];
		$url .= strpos($this->info['url'],'?')?'&page='.$page:'?page='.$page;
		$url .= '" '.($param?str_replace('%d',$page,$param):'').'>'.($label?$label:$page+1).'</a>';
		return $url;
	}	

	function first($label=NULL,$param=NULL){
		if($this->info['page']) return $this->build_link(0,$param,$this->label[0]).$this->sep;
		return NULL;
	}
	
	function prev($label=NULL,$param=NULL){
		if($this->info['page']) return $this->build_link($this->info['page']-1,$param,$this->label[1]).$this->sep;
		return NULL;
	}
	
	function next($label = NULL, $param = NULL){
		if($this->info['pnum'] > 1 && $this->info['page'] < $this->info['pnum'] - 1) return $this->sep.$this->build_link($this->info['page']+1,$param,$this->label[2]);	
		return NULL;
	}
	
	function last($label = NULL, $param = NULL){
		if($this->info['pnum'] > 1 && $this->info['page'] < $this->info['pnum'] - 1) return $this->sep.$this->build_link($this->info['pnum']-1,$param,$this->label[3]);
		return NULL;	
	}
	function parse($div = 0,$param = NULL){
		//if($this->info['pnum']<=1) return false;
		$begin = 0;
		$end = $this->info['pnum'];
		if($div && $div < $end){
			$begin =  max(0, $this->info['page'] - floor($div/2));
			if($begin==0) $end = $div;
			else $end = min($this->info['page'] + ceil($div/2),$this->info['pnum']);
		}
		$aP = array();
		for($i=$begin;$i<$end;$i++){
			if($i==$this->info['page']) $aP[] =  str_replace('%d',$i+1,$this->current);
			else $aP[] = $this->build_link($i,$param);
		}
		$p = implode($this->sep,$aP);
		return $p;
	}
	
	//// paging formats
	function simple($div = 0,$param = NULL){
		$p =  $this->first(NULL,$param);
		$p .= $this->prev(NULL,$param);
		$p .= $this->parse($div,$param);
		$p .= $this->next(NULL,$param);
		$p .= $this->last(NULL,$param);
		return $p;
	}
}
?>