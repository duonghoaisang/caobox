<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class ContentDAO extends Model{
	function ContentDAO(){
		parent::__construct();
	}
	
	
	function options($content_id = 0,$options_type = 0, $options_id = 0){
		$cond = 1;
		if($content_id) $cond .= " AND content_id = ".intval($content_id);
		if($options_type) $cond .= " AND content_id = ".intval($options_type);
		if($options_id) $cond .= " AND content_id = ".intval($options_id);
		return $this->db->query("SELECT * FROM ".$this->prefix."content_options WHERE $cond");
		
	}


}

?>