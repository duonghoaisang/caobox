<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class MasterModel extends Model{
	function ClassModel(){
		parent::__construct();
	}
	
	function fields($table){
		$fields_query = $this->db->query("show fields from ".$this->prefix . $table);
		$aField = array();
		while ($fields = $fields_query->fetch()) {
			$aField[] = $fields['Field'];
		}
		return $aField;
	}
	
	function user_log($data){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."configure WHERE `code` = 'save_log'");
		$cfg = $result->fetch();
		if($cfg['value'] == 'yes'){
			$arr  = array(
				'userid'=>$_SESSION['admin_login']['id'],
				'ip'=>$_SERVER['REMOTE_ADDR'],
				'data'=>$data,
			);
			$this->db->insert($this->prefix."user_log",$arr);
			return $this->db->insert_id();
		}
	}
	
}
?>