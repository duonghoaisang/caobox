<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class bDataStore extends CaoBox{
	function connect($dbhost,$dbport = '3306',$dbuser,$dbpass,$dbname){
		$conn = @mysql_pconnect($dbhost.':'.$dbport,$dbuser,$dbpass) or $this->getError('Cannot connect to mysql');
		mysql_select_db($dbname,$conn) or $this->getError("Cannot find $dbname");
		return $conn;
	}

	function query($sql,$conn){
		$sql = mysql_query($sql,$conn);
		return $sql;
	}
	function begin($conn){
		mysql_query("begin",$conn);
	}
	function commit($conn){
		mysql_query("commit",$conn);
	}
	function rollback($conn){
		mysql_query("rollback",$conn);
	}
	function insert_id($conn){
		$lastid =  mysql_insert_id($conn);// or $this->getError($this->error($this->conn));
		return $lastid;
	}
	
	function num_rows($result){
		return  mysql_num_rows($result);
	}
	
	function affected_rows($conn){
		return mysql_affected_rows($conn);
	}
	
	function fetch($result){
		if($result){
			$rs = @mysql_fetch_assoc($result);
			if(isset($rs)) return $rs; 
		}
	}
	
	
	function limit($sql, $start = 0,$limit = 0){
		return $sql. ($limit ? " LIMIT ".intval($start).",".intval($limit):"");
	}
	
	
	
	function free($result){
		mysql_free_result($result);
	}
	
	function error($conn){
		$error = array(
			'no' => mysql_errno($conn),
			'msg'=> mysql_error($conn),
		);
		return $error;
	}
	
	function close($conn){
		mysql_close($conn);
	}
	
}
?>