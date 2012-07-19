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
	
	function get($id = 0){
		return $this->db->query("SELECT * FROM ".$this->prefix."category WHERE id = ".intval($id));
	}
	
	function get_ln($id){
		$result =  $this->db->query("SELECT ln.* FROM ".$this->prefix."category_ln ln,".$this->prefix."language l WHERE l.active = 1 AND ln.ln = l.ln AND ln.id = ".intval($id)." ORDER BY l.is_default DESC,l.order_id");
		$data = NULL;
		while($rs = $result->fetch()){
			$data[$rs['ln']] = $rs;
		}
		return $data;
	}
	
	function update_ln($id,$ln,$data){
		$data['id'] = intval($id);
		$data['ln'] = $ln;
		return $this->db->replace($this->prefix.'category_ln',$data);
	}
	
	function update($id,$data){
		return $this->db->update($this->prefix.'category',$data," id = ".intval($id));
	}
	
	function active($id){
		return $this->db->query("UPDATE ".$this->prefix."category SET active = ABS(active - 1) WHERE id = ".intval($id));
	}
	function insert($data){
		$result = $this->db->insert($this->prefix.'category',$data);
		return $result->insert_id();
		
	}
	
	function delete($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."category WHERE id = ".intval($id));
		if($cat = $result->fetch()){
			$result = $this->db->query("SELECT * FROM ".$this->prefix."product WHERE catid = ".intval($id));
			while($rs = $result->fetch()){
				$this->db->delete($this->prefix."product","id = ".$rs['id']);
				$this->db->delete($this->prefix."product_ln","id = ".$rs['id']);
				@unlink(_UPLOAD.$rs['icon']);
				@unlink(_UPLOAD.$rs['image']);
				@unlink(_UPLOAD.'thumb/'.$rs['image']);
			}
			$this->db->delete($this->prefix."category","id = ".intval($id));
			$this->db->delete($this->prefix."category_ln","id = ".intval($id));
			@unlink(_UPLOAD.$cat['icon']);
			@unlink(_UPLOAD.$cat['image']);
			@unlink(_UPLOAD.'thumb/'.$cat['image']);
		}
	}
	
}
?>