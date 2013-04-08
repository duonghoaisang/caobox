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
	
	function view($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."user WHERE $cond ORDER BY id");
	}
	
	function get($id){
		return $this->db->query("SELECT * FROM ".$this->prefix."user  WHERE id = ".intval($id));
	}
	
	function insert($data){
		return $this->db->insert($this->prefix."user",$data);
	}
	
	function update($id,$data){
		$this->db->update($this->prefix."user",$data," id = ".intval($id));
	}
	
	function delete($id){
		$this->db->delete($this->prefix."user"," id = ".intval($id));
	}
	
	function active($id){
		$this->db->query("UPDATE ".$this->prefix."user SET `active` = ABS(`active` - 1) WHERE id = ".intval($id));
	}
	
}
?>