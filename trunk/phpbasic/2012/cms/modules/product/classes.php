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
	
	function product($type=0,$catid = 0){
		return $this->db->query("SELECT * FROM ".$this->prefix."product p,".$this->prefix."product_ln ln WHERE p.id = ln.id AND ln.ln = '".$this->lang."' AND p.type = ".intval($type)." AND p.catid = ".intval($catid)." ORDER BY order_id");
	}
	
	function get($id = 0){
		return $this->db->query("SELECT * FROM ".$this->prefix."product WHERE id = ".intval($id));
	}

	function get_ln($id){
		$result =  $this->db->query("SELECT ln.* FROM ".$this->prefix."product_ln ln,".$this->prefix."language l WHERE l.active = 1 AND ln.ln = l.ln AND ln.id = ".intval($id)." ORDER BY l.is_default DESC,l.order_id");
		$data = NULL;
		while($rs = $result->fetch()){
			$data[$rs['ln']] = $rs;
		}
		return $data;
	}
	function insert($data){
		$result = $this->db->insert($this->prefix.'product',$data);
		return $result->insert_id();
		
	}
	function update_ln($id,$ln,$data){
		$data['id'] = intval($id);
		$data['ln'] = $ln;
		return $this->db->replace($this->prefix.'product_ln',$data);
	}
	function update($id,$data){
		return $this->db->update($this->prefix.'product',$data," id = ".intval($id));
	}
	
	function delete($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."product WHERE id = ".intval($id));
		$product = $result->fetch();
		if($product){
			@unlink(_UPLOAD.$product['icon']);
			@unlink(_UPLOAD.$product['image']);
			@unlink(_UPLOAD.'thumb/'.$product['image']);
			$this->db->delete($this->prefix."product","id = ".intval($id));
			$this->db->delete($this->prefix."product_ln","id = ".intval($id));
		}
	}
	
}
?>