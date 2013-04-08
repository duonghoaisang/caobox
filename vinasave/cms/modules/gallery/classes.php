<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends Model{
	function ClassModel(){
		parent::__construct();
	}
	
	function get($id = 0){
		return $this->db->query("SELECT * FROM ".$this->prefix."gallery WHERE id = ".intval($id));
	}
	
	
}
?>