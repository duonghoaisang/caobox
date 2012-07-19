<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class DAO extends Model{
	function __construct(){
		parent::__construct();
	}
	
	function view_data($cond = 1,$start = 0,$limit = 0){
		$shortlen = 20;
		return $this->db->query("SELECT v.*,c.author last_author,c.`date` last_date,
				CONCAT(SUBSTRING_INDEX(v.content,SPACE(1),".$shortlen."),IF(lENGTH(v.content)>".$shortlen.",'...','')) as intro
			FROM ".$this->prefix."view_data v,".$this->prefix."comment c WHERE "."v.lastid = c.id AND". " v.`active` = 1 AND $cond ORDER BY v.sorted DESC,v.lastid DESC".($limit?" LIMIT $start,$limit":""));
	}
	
	function view_menu($cond=1){
		return $this->db->query("SELECT * FROM ".$this->prefix."category WHERE parentid = 0 ORDER BY `order` DESC");
	
	}
	
	function login_remember($id,$psw){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."user WHERE id = ".intval($id));
		$user = $result->fetch();
		if($user['password'] == $psw) $_SESSION['user_login'] = $user;
	}
	

}

?>