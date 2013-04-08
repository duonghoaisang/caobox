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
	function ClassModel(){
		parent::__construct();
	}
	
	function login($username,$password){
		$sql = $this->query("SELECT * FROM ".$this->prefix."member WHERE username = '".addslashes($username)."'");
		if($sql->num_rows()){
			$user = $sql->fetch();
			if(md5($password) == $user['password']){
				$_SESSION['member'] = $user;
				return true;
			}
		}
		return false;
	}
	
}
?>