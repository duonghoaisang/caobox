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
	
	function active($id){
		return $this->db->query("UPDATE ".$this->prefix."comment SET active = ABS(active - 1) WHERE id =".intval($id));
	}
	
	function delete($id){
		$this->db->delete($this->prefix."comment","id = ".intval($id));
	}
}
?>