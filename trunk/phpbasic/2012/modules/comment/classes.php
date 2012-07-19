<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends Model{
	var $total = 0;
	function __construct(){
		parent::__construct();
	}

	function view($id){
		return $this->db->query("SELECT * FROM ".$this->prefix."comment WHERE id = ".intval($id));
	}
	
	
	function insert($userid,$contentid,$content,$author){
		$sql = "INSERT INTO ".$this->prefix."comment(
			userid,
			contentid,
			content,
			author
		) VAlUES(
			'".intval($userid)."',
			'".intval($contentid)."',
			'".addslashes($content)."',
			'".addslashes($author)."'
		)";
		$this->db->query($sql);
		$lastid =  $this->db->insert_id();
		if($lastid){
			$this->db->query("UPDATE ".$this->prefix."content SET lastid = $lastid, posts = posts + 1 WHERE id = ".intval($contentid));
			return $lastid;
		}
		return 0;
	}
	
	function update($id,$content){
		$sql = "UPDATE ".$this->prefix."comment SET content = '".addslashes($content)."' WHERE id = ".intval($id);
		return $this->db->query($sql);
	}
	
	function delete($id){
		$result = $this->db->query("SELECT contentid FROM ".$this->prefix."comment WHERE id = ".intval($id));
		$comment = $result->fetch();
		if($comment){
			$result = $this->db->query("SELECT MAX(id) lastid FROM ".$this->prefix."comment WHERE contentid = ".$comment['contentid']);
			$max = $result->fetch();
			$this->db->query("DELETE FROM ".$this->prefix."comment WHERE id = ".intval($id));
			//update lastid
			if($id == $max['lastid']){
				$this->db->query("UPDATE ".$this->prefix."content SET lastid = (SELECT MAX(id) FROM ".$this->prefix."comment WHERE contentid = ".$comment['contentid'].") WHERE id = ".$comment['contentid']);
			}
			$this->db->query("UPDATE ".$this->prefix."content SET posts = posts - 1 WHERE id =".intval($comment['contentid']));
			return '1';
		}
		return 'This comment is not exists';
	}
	
}
?>