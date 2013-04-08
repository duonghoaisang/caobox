<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class HtmlDAO extends Model{
	var $configure_mod;
	function HtmlDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	
	function get($id=0){
		$result =  $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."html c, ".$this->prefix."html_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('html',$id,$this->configure_mod)."' AND c.id = ".intval($id));
		$data  = $result->fetch();
		$result->cache();
		return $data;
	}
	
	
	
	

}

?>