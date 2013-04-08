<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends MasterModel{
	function ClassModel(){
		parent::__construct();
	}	
	
	function comment($Id,$start=0,$limit = 0){
		return $this->query("SELECT * FROM ".$this->prefix."comment WHERE contentid = ".intval($Id)." ORDER BY id LIMIT 1,1000000".($limit?" LIMIT $start,$limit":""));
	}
	
	
	function test_insert(){
		$this->query("INSERT INTO php_content(catid) VALUES(10)");
		echo $this->insert_id();
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
		$this->query($sql);
		//$contentid = mysql_insert_id();
		$contentid =  $this->insert_id();
		
		if($contentid){
			$sql = "INSERT INTO ".$this->prefix."comment(contentid,title,content,author,userid) VALUES(
				'".$contentid."',
				'".addslashes($data['title'])."',
				'".addslashes($data['content'])."',
				'".addslashes($data['author'])."',
				'".intval($data['userid'])."'
			)";
			$this->query($sql);
			$commentid = $this->insert_id();
			//$commentid = mysql_insert_id();
			if($commentid){
				$this->query("UPDATE ".$this->prefix."content SET firstid = $commentid,lastid = $commentid WHERE id = $contentid");
				return $contentid;
			}else{
				$this->query("DELETE FROM ".$this->prefix."content WHERE id = $contentid");
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
		$result = $this->query("SELECT firstid FROM ".$this->prefix."content WHERE id = ".intval($id));
		$content = $result->fetch();
		if($content['firstid']){
			$this->query("UPDATE ".$this->prefix."comment SET 
				title = '".addslashes($data['title'])."', 
				content = '".addslashes($data['content'])."' 
			WHERE id = ".$content['firstid']);
			return 1;
		}
		return 0;
	}
	
	function delete($id){
		$this->query("DELETE FROM ".$this->prefix."comment WHERE contentid = ".intval($id));
		$this->query("DELETE FROM ".$this->prefix."content WHERE id = ".intval($id));
		return '1';
	}
}
?>