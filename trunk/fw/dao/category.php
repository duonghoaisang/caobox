<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class CategoryDAO extends Model{
	var $configure_mod = array();
	function CategoryDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
		
	}
	
	

	function view($type= 0,$parentid = -1,$cond = 1,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['catsort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		if($type>=0) $cond .=" AND c.type = ".intval($type);
		if($parentid>=0) $cond .= " AND c.parentid = ".intval($parentid);
		return $this->query("SELECT * FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.draft = 0 AND c.active = 1 AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order");
	}
	
	function get($id){
		$info = $this->info($id);
		$result = $this->db->query("SELECT * FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.draft = 0 AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$info['type'],$this->configure_mod)."' AND c.id = ".intval($id));
		$data = $result->fetch();
		$result->cache();
		return $data;
	}
	
	function info($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."category c WHERE c.id = ".intval($id)." AND c.draft = 0");
		return $result->fetch();
	}
	
}

?>