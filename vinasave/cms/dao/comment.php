<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class CommentDAO extends Model{
	function CommentDAO(){
		parent::__construct();
	}
	
	
	function get($page,$pageid){
		return $this->db->query("SELECT c.* FROM ".$this->prefix."comment c
		WHERE c.`module`='$page' AND c.pageid=".intval($pageid)." ORDER BY `timestamp` DESC");
	}


}

?>