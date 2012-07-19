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
	
	function get_module($module='product',$typeid=0,$page_or_id=''){
		return $this->db->query("SELECT * FROM ".$this->prefix."configure_mod WHERE `module`='".addslashes($module)."' AND typeid = ".intval($typeid)." AND page_or_id = '".addslashes($page_or_id)."'");
	}
	
	
	
	function update_module($module,$typeid,$page_or_id,$data){
		return $this->db->update($this->prefix.'configure_mod',$data," `module`= '".addslashes($module)."' AND typeid = ".intval($typeid)." AND page_or_id = '".addslashes($page_or_id)."'");
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