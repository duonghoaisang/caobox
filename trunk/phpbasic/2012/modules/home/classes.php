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
	
	function favorite($userid){
		$data = array();
		if($userid){
			$result = $this->db->query("SELECT * FROM ".$this->prefix."favorite WHERE userid = ".intval($userid));
			while($rs = $result->fetch()){
				$data[] = $rs['contentid'];
			}
		}
		return $data;
	}
	
}
?>