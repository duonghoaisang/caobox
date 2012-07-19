<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends Model{
	function __construct(){
		parent::__construct();
	}
	function view($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."contact WHERE $cond ORDER BY order_id");
	}
	
	function insert($data){
		return $this->db->insert($this->prefix."contact",$data);
	}
	
	function update($id,$data){
		return $this->db->update($this->prefix."contact",$data," id = ".intval($id));
	}
	
	function delete($id){
		return $this->db->delete($this->prefix."contact"," id = ".intval($id));
	}
}
?>