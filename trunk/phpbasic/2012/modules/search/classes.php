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
	function _search($cond = 1){
		$shortlen = 20;
		return $sql = "SELECT v.id,v.author,v.title,v.`date`,v.posts,v.c_rewrite,CONCAT(SUBSTRING_INDEX(v.content,SPACE(1),".$shortlen."),IF(lENGTH(v.content)>".$shortlen.",'...','')) as intro FROM ".$this->prefix."view_data v WHERE  v.`active` = 1 AND $cond";
	}
	function search($q = NULL,$start = 0,$limit = 0){
		$sql = $this->_search("0");
		if($q){
			$sql = $this->_search(" v.title LIKE '%".str_replace(' ','%',$q)."%'");
			
			$r = trim($q);
			$r = str_replace(array('|',' '),array('\|','|'),$r);
			$cond = " v.title REGEXP '$r'";
			$sql .= ' UNION '.$this->_search($cond);
			$sql .= ' UNION	'.$this->_search("v.content LIKE '%$q%'");
		}
		//die($sql);
		if($limit) $sql .= " LIMIT $start,$limit";
		return $this->db->query($sql);
		
	}
	
}
?>