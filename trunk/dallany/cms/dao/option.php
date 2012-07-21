<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class OptionDAO extends Model{
	function OptionDAO(){
		parent::__construct();
	}
	
	function view($type=0){
		return $this->db->query("SELECT * FROM ".$this->prefix."options c,".$this->prefix."options_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->lang."' AND c.type = ".intval($type));
	}
	

}

?>