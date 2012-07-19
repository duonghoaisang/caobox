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
	
	function login($usr,$psw){
		return $this->db->query("SELECT * FROM ".$this->prefix."user WHERE `username` = '$usr' AND `password` = MD5('$psw')");
	}
	
	/*data = array(
		username
		password
		email
		displayname
	)*/
	function register($data){
		$this->db->query("INSERT INTO ".$this->prefix."user(username,password,email,isdisplay,last_login) VALUES(
			'".$data['username']."',
			'".$data['password']."',
			'".$data['email']."',
			'".($data['isdisplay']?$data['isdisplay']:$data['username'])."',
			NOW())");
		return $this->db->insert_id();
	}
	
	function docs($userid){
		return $this->db->query("SELECT * FROM ".$this->prefix."docs WHERE userid = ".intval($userid));
	}
	function links($userid){
		return $this->db->query("SELECT * FROM ".$this->prefix."link WHERE userid = ".intval($userid));
	}
	
	function favorite($userid){
		return $this->db->query("SELECT f.`date`,d.* FROM ".$this->prefix."favorite f,".$this->prefix."view_data d WHERE f.contentid = d.id AND f.userid = ".intval($userid));
	}
	
	function check_exists($cond = 1){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."user WHERE $cond");
		return $result->num_rows();
	}
	
	function profile($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."user WHERE $cond");
	}
	/*
	data = array(
		Email, isdisplay, signature, website
	)
	*/
	function update($data,$id){
		return $this->db->query("UPDATE ".$this->prefix."user SET 
			email = '".addslashes($data['email'])."',
			isdisplay = '".addslashes($data['isdisplay'])."',
			signature = '".addslashes($data['signature'])."',
			website = '".addslashes($data['website'])."' 
		WHERE id = ".intval($id));
	}
	
	function resetpsw($psw,$id){
		return $this->db->query("UPDATE ".$this->prefix."user SET password = MD5('".addslashes($psw)."') WHERE id = ".intval($id));
	}
}
?>