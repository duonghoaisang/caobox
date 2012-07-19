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
	
	function comment($Id,$start=0,$limit = 0){
		return $this->db->query("SELECT * FROM ".$this->prefix."comment WHERE contentid = ".intval($Id)." ORDER BY id LIMIT 1,1000000".($limit?" LIMIT $start,$limit":""));
	}
	
	
	function insert_mark($contentid , $userid){
		$result = $this->db->query("SELECT contentid FROM ".$this->prefix."favorite WHERE contentid = ".intval($contentid)." AND userid = ".intval($userid));
		
		if($result->num_rows()){
			$this->db->query("DELETE FROM ".$this->prefix."favorite WHERE  contentid = ".intval($contentid)." AND userid = ".intval($userid));
			return 0;
		}else{
			$this->db->query("INSERT INTO ".$this->prefix."favorite(contentid,userid) VALUES('".intval($contentid)."','".intval($userid)."')");
			return 1;
		}
	}
	
	function test_insert(){
		$this->db->query("INSERT INTO php_content(catid) VALUES(10)");
		echo $this->db->insert_id();
	}
	/*
		data = array(
			'catid' =>,
			'typeid'=>,
			'active'=>,
			'title'=>,
			'content'=>,
			'author'=>,
			'userid'=>
		);
	*/
	function insert($data){
		$sql = "INSERT INTO ".$this->prefix."content(catid,typeid,active) VALUES(
			'".$data['catid']."','".$data['typeid']."','".$data['active']."')";
		$this->db->query($sql);
		//$contentid = mysql_insert_id();
		$contentid =  $this->db->insert_id();
		
		if($contentid){
			$sql = "INSERT INTO ".$this->prefix."comment(contentid,title,content,author,userid) VALUES(
				'".$contentid."',
				'".addslashes($data['title'])."',
				'".addslashes($data['content'])."',
				'".addslashes($data['author'])."',
				'".intval($data['userid'])."'
			)";
			$this->db->query($sql);
			$commentid = $this->db->insert_id();
			//$commentid = mysql_insert_id();
			if($commentid){
				$this->db->query("UPDATE ".$this->prefix."content SET firstid = $commentid,lastid = $commentid WHERE id = $contentid");
				return $contentid;
			}else{
				$this->db->query("DELETE FROM ".$this->prefix."content WHERE id = $contentid");
				return 0;
			}
		}
	}
/*
		data = array(
			'title'=>,
			'content'=>,
		)
*/	
	function update($id,$data){
		$result = $this->db->query("SELECT firstid FROM ".$this->prefix."content WHERE id = ".intval($id));
		$content = $result->fetch();
		if($content['firstid']){
			$this->db->query("UPDATE ".$this->prefix."comment SET 
				title = '".addslashes($data['title'])."', 
				content = '".addslashes($data['content'])."' 
			WHERE id = ".$content['firstid']);
			return 1;
		}
		return 0;
	}
	
	function delete($id){
		$this->db->query("DELETE FROM ".$this->prefix."comment WHERE contentid = ".intval($id));
		$this->db->query("DELETE FROM ".$this->prefix."content WHERE id = ".intval($id));
		return '1';
	}
	
	function check_favorite($contentid,$userid){
		if(!$userid || !$contentid) return false;
		$result = $this->db->query("SELECT contentid FROM ".$this->prefix."favorite WHERE userid = ".intval($userid)." AND contentid = ".intval($contentid));
		return $result->num_rows();
	}
}
?>