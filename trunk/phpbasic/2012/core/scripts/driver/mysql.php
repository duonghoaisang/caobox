<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class bDataStore extends CaoBox{
	var $result;
	var $sql;
	var $conn;
	function bDataStore($conn=NULL){
		if($conn) $this->conn = $conn;
	}
	function connect($dbhost,$dbuser,$dbpass,$dbname){
		$conn = @mysql_pconnect($dbhost,$dbuser,$dbpass) or $this->getError('Cannot connect to mysql');
		mysql_select_db($dbname,$conn) or $this->getError("Cannot find $dbname");
		mysql_query("SET NAMES 'UTF8'",$conn);
		$this->conn =  $conn;
		return $conn;
	}

	function execute($sql){
		$this->sql = $sql;
		$this->result = mysql_query($sql,$this->conn) or $this->getError($this->error($this->conn));
	}
	function insert_id(){
		$lastid =  mysql_insert_id($this->conn);// or $this->getError($this->error($this->conn));
		return $lastid;
	}
	
	function num_rows(){
		return  mysql_affected_rows($this->conn);// or $this->getError($this->error($this->conn));
		//return $int;
	}
	function fetch($stripslashes = true){
		if($this->result){
			$rs = @mysql_fetch_assoc($this->result);
			if(isset($rs)) return $rs; 
		}
		$this->getError($this->error($this->conn));;
	}
	
	function limit($start,$limit){
		$this->sql .= " LIMIT ".intval($start).",".intval($limit);
	}
	function error($conn = NULL){
		$error = mysql_errno($this->conn);
		return $error?'MySQL: '.$this->sql.'<br />Error Message: ['.$error.'] '.mysql_error($this->conn):NULL;
	}
	
}
?>