<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class CategoryDAO extends Model{
	function CategoryDAO(){
		parent::__construct();
	}
	
	function view($type=0,$parentid = 0,$q = NULL,$sorted_by = " cat.`order_id`"){
		$cond = "cat.type = ".intval($type);
		if($q) $cond .= " AND ln.name LIKE '%".addslashes($q)."%'";
		else $cond .= "  AND cat.parentid = ".intval($parentid);
		$order = "";
		if($sorted_by ) $order = ",$sorted_by";
		return $this->db->query("SELECT * FROM ".$this->prefix."category cat,".$this->prefix."category_ln ln WHERE cat.id = ln.id AND ln.ln = '".$this->lang."' AND $cond ORDER BY $sorted_by");
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
		if($content) $result = $this->query("SELECT c.*,ln.* FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.id=ln.id AND ln.ln='".$this->lang."' AND c.type=".intval($type)." AND c.parentid = ".intval($parentid));
		else $result = $this->query("SELECT * FROM ".$this->prefix."category WHERE type=".intval($type)." AND parentid = ".intval($parentid));
		while($rs = $result->fetch()){
			$rs['prefix'] = $space;
			$array[] = $rs;
			$array = $this->tree($type,$rs['id'],$rs['prefix'].$space,$content,$array);
		}
		return $array;
	}

}

?>