<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class ContentDao extends Model{
	var $configure_mod;
	function ContentDao($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	
	/*
		@type: type of content
		@cond: condition for mysql query
		@start: the start record of query
		@limit: the limit result of query
		@orderby: the ORDER BY for query
		return mysql object
	*/
	function view($type = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['sort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		$cond_type = 1;
		if(is_array($type)) $cond_type = " c.type IN (".implode(',',$type).")"; 
		elseif($type>=0) $cond_type = " c.type = ".intval($type);
		return $this->query("SELECT c.*,ln.* FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.active = 1 AND $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":""));
	}	

	function get($id  = 0){
		$info = $this->info($id);
		$result =  $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.active = 1  AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$info['type'],$this->configure_mod)."' AND c.id = ".intval($id));
		$data =  $result->fetch();
		$result->cache();
		return $data;
	}	
	
	function info($id  = 0){
		$result =  $this->db->query("SELECT c.* FROM ".$this->prefix."content c WHERE c.id = ".intval($id));
		return $result->fetch();
	}	
	
	
	function options($content_id = 0, $options_type = 0){
		$cond = 1;
		if($content_id) $cond .= " AND content_id = ".intval($content_id);
		if($options_type) $cond .= " AND options_type = ".intval($options_type);
		$result = $this->query("SELECT * FROM ".$this->prefix."content_options WHERE $cond");
		return $result;
	}
	
	
	

}

?>