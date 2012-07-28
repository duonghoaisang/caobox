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
	
	function active($ln){
		return $this->db->query("UPDATE ".$this->prefix."language SET active = ABS(active - 1) WHERE ln ='".addslashes($ln)."'");
	}
	
	function set_default($ln){
		$this->db->query("UPDATE ".$this->prefix."language SET is_default = 0");
		return $this->db->query("UPDATE ".$this->prefix."language SET is_default = 1 WHERE ln ='".addslashes($ln)."'");
	}
	
	function update($ln,$data){
		return $this->db->update($this->prefix."language",$data," ln = '".addslashes($ln)."'");
	}
}
?>