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
	
	function view($type=0,$q = NULL,$where = 1,$start = 0,$limit = 0,$sorted_by = "c.timestamp",$sorted_order = "DESC"){
		$order = "";
		if($sorted_by && $sorted_order) $order = ",$sorted_by $sorted_order";
		$cond = "c.type = ".intval($type);
		if($q) $where .= " AND ln.name LIKE '%".addslashes($q)."%'";
		return $this->db->query("SELECT * FROM ".$this->prefix."module c,".$this->prefix."module_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->lang."'");
	}
	
	function get($id = 0){
		return $this->db->query("SELECT * FROM ".$this->prefix."module WHERE id = ".intval($id));
	}

	function get_ln($id){
		$result =  $this->db->query("SELECT ln.* FROM ".$this->prefix."module_ln ln,".$this->prefix."language l WHERE l.active = 1 AND ln.ln = l.ln AND ln.id = ".intval($id));
		$data = NULL;
		while($rs = $result->fetch()){
			$data[$rs['ln']] = $rs;
		}
		return $data;
	}
	function insert($data){
		$result = $this->db->insert($this->prefix.'module',$data);
		return $this->db->insert_id();
		
	}
	function update_ln($id,$ln,$data){
		$data['id'] = intval($id);
		$data['ln'] = $ln;
		return $this->db->replace($this->prefix.'module_ln',$data);
	}
	function update($id,$data){
		return $this->db->update($this->prefix.'module',$data," id = ".intval($id));
	}
	
	
	function active($id,$val = -1){
		if($val==0) $v = ' 0';
		elseif($val==1) $v = '1';
		else $v = ' ABS(`active` - 1)';
		return $this->db->query("UPDATE ".$this->prefix."module SET active = $v WHERE id = ".intval($id));
	}
	
	

	function delete($id){
		$result = $this->db->query("DELETE FROM ".$this->prefix."module WHERE id = ".intval($id));
		$result = $this->db->query("DELETE FROM ".$this->prefix."module_ln WHERE id = ".intval($id));
	}
	
}
?>