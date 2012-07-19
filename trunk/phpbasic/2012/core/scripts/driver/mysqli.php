<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

/******************************
Name: basicFramework3.0
website: http://fw.phpbasic.com
------------------------------*/
defined('_ROOT') or die(__FILE__);

class bDataStore extends bObject{
	var $conn;
	var $result;
	function connect($dbhost,$dbuser,$dbpass,$dbname,$charset = 'utf8'){
		$this->conn = mysqli_connect($dbhost,$dbuser,$dbpass) or $this->getError('Cannot connect to mysqli');
		mysqli_select_db($this->conn,$dbname) or $this->getError("Cannot find $dbname");
		mysqli_query($this->conn,"SET NAMES '$charset'");
	}
	function execute($buffered = 1){
		$this->result = mysqli_query($this->conn,$this->sql) or $this->getError($this->error());
		if($this->result) return mysqli_affected_rows($this->conn);
		return -1;
	}
	function lastInsertId(){
		return mysqli_insert_id($this->conn);
	}
	function fetch($free_result = true){
		if($this->result){
			$rs = @mysqli_fetch_assoc($this->result);
			if($free_result) mysqli_free_result($this->result);
			if(isset($rs)) return $rs;
		}
		$this->getError($this->error());;
	}
	function limit($start,$limit){
		$this->sql .= " LIMIT ".intval($start).",".intval($limit);
	}
	function error(){
		$error = mysqli_errno($this->conn);
		return $error?'MySQL say: ['.mysqli_errno($this->conn).'] '.mysqli_error($this->conn).'<br />Query:<strong>'.$this->sql.'</strong>':NULL;
	}
}
?>