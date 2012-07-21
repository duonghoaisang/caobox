<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class OptionDAO extends Model{
	var $configure_mod;
	function OptionDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	function get($id=0){
		$info = $this->info($id);
		
		$result =  $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."html c, ".$this->prefix."html_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('options',$info['type'],$this->configure_mod)."' AND c.id = ".intval($id));
		$data = $result->fetch();
		$result->cache();
		return $data;
	}
	
	
	function info($id = 0){
		$result =  $this->db->query("SELECT c.* FROM ".$this->prefix."html c WHERE c.id = ".intval($id));
		$data = $result->fetch();
		$result->cache();
		return $data;
	}
	
	
	function view($type = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['options'][$type]['sort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		$result =  $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."html c, ".$this->prefix."html_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('options',$type,$this->configure_mod)."' $sql_order");
		return $result;
	}

}

?>