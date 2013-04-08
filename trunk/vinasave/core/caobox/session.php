<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
class bSession extends CaoBox{
	var $timeout = 30;
	var $enable = false;
	var $db;
	var $prefix;
	function bSession($db){
		$this->db = $db;
		$this->prefix = $db->prefix;
		
	}
	
	
	function load(){
		if($this->enable){
			ini_set('session.save_handler', 'user');
			session_set_save_handler(
				array($this, 'open'),
				array($this, 'close'),
				array($this, 'read'),
				array($this, 'write'),
				array($this, 'destroy'),
				array($this, 'gc')
			);
		}else{
			$ini_session = session_save_path();
			if(!is_writable($ini_session)) $this->getError('We cannot create session, please set  <strong>WRITE</strong> access for folder <strong>'.$ini_session.'</strong>');

		}
		if(isset($_GET['token']) && $_GET['token']) session_id($_GET['token']);
		session_start();
	
	}
	
	function open() {
	}
	function close() {
	}
	function read($id) {
		$sql = $this->db->query("SELECT `data` FROM `".$this->prefix."session` WHERE `session_id` = '".addslashes($id)."'");
		$data =  $sql->fetch();
		return $data['data'];
	}
	function write($id, $data) {
		$sql = "REPLACE INTO `".$this->prefix."session`(`session_id`,`expires`,`data`,`ip`,`user_agent`) VALUES('".addslashes($id)."', '".addslashes(time())."', '".addslashes($data)."','".$_SERVER['REMOTE_ADDR']."','".$_SERVER['HTTP_USER_AGENT']."')";
		return $this->db->query($sql) or die($sql);
	}
	
	function destroy($id) {
		return $this->db->query("DELETE FROM `".$this->prefix."session` WHERE `session_id` = '".addslashes($id)."'");
	}
	function gc($max) {
		return $this->db->query("DELETE FROM `".$this->prefix."session` WHERE `expires` < '".(time() - $this->timeout)."'");
	}
	
	function count(){
		$result = $this->db->query("SELECT COUNT(`session_id`) total FROM `".$this->prefix."session` WHERE `expires` < '".(time() - $this->timeout)."'");
		$rs = $result->fetch();
		return $rs['total'];
	}
}

/*//ini_set('session.gc_probability', 50);
ini_set('session.save_handler', 'user');
$session = new bSession();
session_set_save_handler(array($session, 'open'),
                         array($session, 'close'),
                         array($session, 'read'),
                         array($session, 'write'),
                         array($session, 'destroy'),
                         array($session, 'gc'));
*/						 

// below sample main


?>