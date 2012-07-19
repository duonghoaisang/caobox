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
	
	function view($type=0,$catid = 0,$q = NULL){
		$cond = "p.type = ".intval($type);
		if($q) $cond .= " AND ln.name LIKE '%".addslashes($q)."%'";
		else  $cond .= " AND p.catid = ".intval($catid);
		return $this->db->query("SELECT * FROM ".$this->prefix."content p,".$this->prefix."content_ln ln WHERE p.id = ln.id AND ln.ln = '".$this->lang."' AND $cond ORDER BY order_id");
	}
	
	function get($id = 0){
		return $this->db->query("SELECT * FROM ".$this->prefix."content WHERE id = ".intval($id));
	}

	function get_ln($id){
		$result =  $this->db->query("SELECT ln.* FROM ".$this->prefix."content_ln ln,".$this->prefix."language l WHERE l.active = 1 AND ln.ln = l.ln AND ln.id = ".intval($id)." ORDER BY l.is_default DESC,l.order_id");
		$data = NULL;
		while($rs = $result->fetch()){
			$data[$rs['ln']] = $rs;
		}
		return $data;
	}
	function insert($data){
		$result = $this->db->insert($this->prefix.'content',$data);
		return $result->insert_id();
		
	}
	function update_ln($id,$ln,$data){
		$data['id'] = intval($id);
		$data['ln'] = $ln;
		return $this->db->replace($this->prefix.'content_ln',$data);
	}
	function update($id,$data){
		return $this->db->update($this->prefix.'content',$data," id = ".intval($id));
	}
	
	function active($id){
		return $this->db->query("UPDATE ".$this->prefix."content SET active = ABS(active -1) WHERE id = ".intval($id));
	}
	
	function top($id){
		return $this->db->query("UPDATE ".$this->prefix."content SET `top` = ABS(`top` -1) WHERE id = ".intval($id));
	}

	function delete($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."content WHERE id = ".intval($id));
		$content = $result->fetch();
		if($content){
			@unlink(_UPLOAD.$content['icon']);
			@unlink(_UPLOAD.$content['image']);
			@unlink(_UPLOAD.'thumb/'.$content['image']);
			$this->db->delete($this->prefix."content","id = ".intval($id));
			$this->db->delete($this->prefix."content_ln","id = ".intval($id));
		}
	}
	
}
?>