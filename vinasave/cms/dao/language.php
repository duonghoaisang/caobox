<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class LanguageDAO extends Model{
	function LanguageDAO(){
		parent::__construct();
	}
	


	function view($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."language WHERE $cond ORDER BY is_default DESC");
	}


}

?>