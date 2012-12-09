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
	
	function get_module($module='product',$typeid=0){
		return $this->db->query("SELECT * FROM ".$this->prefix."configure_mod WHERE `module`='".addslashes($module)."' AND typeid = ".intval($typeid));
	}
	
	function max_module($module){
		return $this->db->query("SELECT MAX(typeid) maxid FROM ".$this->prefix."configure_mod WHERE `module` = '$module'");
	}
	
	function insert_module($module,$typeid,$name=""){
		return $this->db->query("INSERT INTO ".$this->prefix."configure_mod(`module`,typeid,name) VALUES('$module',$typeid,'$name')");
	}
	
	function check_html($id){
		return $this->db->query("SELECT id,draft FROM ".$this->prefix."html WHERE id = ".intval($id));
	}
	
	function insert_html($id){
		return $this->db->query("REPLACE INTO ".$this->prefix."html(id) VALUES(".intval($id).")");
	}
	
	function delete_options($typeid){
		$result = $this->db->query("SELECT id FROM ".$this->prefix."configure_mod WHERE typeid = ".intval($typeid));
		
	}
	
	
	function update_module($module,$typeid,$data){
		return $this->db->update($this->prefix.'configure_mod',$data," `module`= '".addslashes($module)."' AND typeid = ".intval($typeid));
	}
	
	function update($data){
		foreach($data as $key=>$val) $this->db->update($this->prefix.'configure',array('value'=>addslashes($val))," code = '$key'");
		return true;
	}
	
	function clear_data(){
		$result = $this->db->query("SHOW TABLE STATUS WHERE Comment != 'system'");
		while($rs = $result->fetch()){
			$this->db->query("TRUNCATE TABLE `".$rs['Name']."`");
		}
		
	}
	
	function clear_configure(){
		$this->db->query("TRUNCATE TABLE `".$this->prefix."configure_mod`");
	}
	function fields($table){
		$fields_query = $this->db->query("SHOW FULL FIELDS FROM ".$this->prefix . $table." WHERE Comment != 'system'");
		$aField = array();
		while ($fields = $fields_query->fetch()) {
			$aField[] = $fields;
		}
		return $aField;
	}
	
	function input_type($name,$c,$status = false,$params = '',$date = false){
		$type = array(
			'input'		=>'Input',
			'textarea'	=>'Textarea',
			'tinymce'	=>'TextEditor',
		);
		if($status){
			$type['status'] = 'As status field';
			
		}
		if($date){
			$type['date']	= 'Input date';
		}
		$str = '<select name="'.$name.'" '.($params?$params:'').'>';
		foreach($type as $key=>$val) $str .= '<option value="'.$key.'" '.($key==$c?'selected':'').'>'.$val.'</option>';
		$str .= '</select>';
		return $str;
	}
	
	function input_status_default($name,$c,$params = NULL){
		$type = array(
			'0'=>'InActive',
			'1'=>'Active',
		);
		$str = '<select name="'.$name.'" '.($params?$params:'').'>';
		foreach($type as $key=>$val) $str .= '<option value="'.$key.'" '.($key==$c?'selected':'').'>'.$val.'</option>';
		$str .= '</select>';
		return $str;
	}
	
	function insert($arr){
		return $this->db->insert($this->prefix."configure",$arr);
	}
}
?>