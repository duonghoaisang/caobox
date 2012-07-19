<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class DAO extends Model{
	function __construct(){
		parent::__construct();
	}
	
	function category($type=0,$parentid = 0,$q = NULL){
		$cond = "type = ".intval($type);
		if($q) $cond .= " AND ln.name LIKE '%".addslashes($q)."%'";
		else $cond .= "  AND parentid = ".intval($parentid);
		return $this->db->query("SELECT * FROM ".$this->prefix."category cat,".$this->prefix."category_ln ln WHERE cat.id = ln.id AND ln.ln = '".$this->lang."' AND $cond ORDER BY order_id");
	}

	function xpath($id,$result = NULL){
		if(!$result) $result = array();
		$sql = $this->db->query("SELECT * FROM ".$this->prefix."category cat,".$this->prefix."category_ln ln WHERE cat.id = ln.id AND ln.ln = '".$this->lang."' AND cat.id = ".intval($id)." ORDER BY cat.id");
		$rs = $sql->fetch($sql);
		if($rs){
			$result[] = $rs;
			$result = $this->xpath($rs['parentid'],$result);
		}
		return $result;
	}
	
	function tree($type=0,$parentid=0,$space='-',$content = NULL,$array = NULL){
		if(!$array) $array = array();
		if($content) $result = $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.id=ln.id AND ln.ln='".$this->lang."' AND c.type=".intval($type)." AND c.parentid = ".intval($parentid));
		else $result = $this->db->query("SELECT * FROM ".$this->prefix."category WHERE type=".intval($type)." AND parentid = ".intval($parentid));
		while($rs = $result->fetch()){
			$rs['prefix'] = $space;
			$array[] = $rs;
			$array = $this->tree($type,$rs['id'],$rs['prefix'].$space,$content,$array);
		}
		return $array;
	}
	function comment($page,$pageid){
		return $this->db->query("SELECT c.*,m.username FROM ".$this->prefix."comment c
		LEFT JOIN ".$this->prefix."member m ON m.id = c.memid
		WHERE c.page='$page' AND c.pageid=".intval($pageid)." ORDER BY `timestamp` DESC");
	}


	function language($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."language WHERE $cond ORDER BY order_id");
	}

	function gallery($page,$pageid){
		return $this->db->query("SELECT * FROM ".$this->prefix."gallery WHERE page='".addslashes($page)."' AND pageid=".intval($pageid)." ORDER BY order_id,id");
	}
	
	function gallery_insert($page,$pageid,$data = array()){
		$data['page'] = $page;
		$data['pageid'] = intval($pageid);
		return $this->db->insert($this->prefix.'gallery',$data);
	}
	function gallery_update($id,$data){
		return $this->db->update($this->prefix.'gallery',$data," id = ".intval($id));
	}
	
	function gallery_delete($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."gallery WHERE id = ".intval($id));
		if($cat = $result->fetch()){
			$this->db->delete($this->prefix."gallery","id = ".intval($id));
			@unlink(_UPLOAD.$cat['icon']);
			@unlink(_UPLOAD.$cat['image']);
			@unlink(_UPLOAD.'thumb/'.$cat['image']);
		}
	}
	
	function cfg_module($cond  = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."configure_mod WHERE $cond ORDER BY `module`,typeid,page_or_id");
	}

}

?>