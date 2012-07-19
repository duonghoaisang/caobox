<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class DB extends bDataStore{
	var $prefix;
	var $connect;
	function DB($server,$user,$pass,$name,$prefix=NULL){
		$this->connect = parent::connect($server,$user,$pass,$name);
	}
	
	
	
	
	function insert($table,$data = array()){
		foreach($data as $key=>$value) $data[$key] = addslashes($value);
		$sql = "INSERT INTO `".$table."`(`".implode('`,`',array_keys($data))."`) VALUES('".implode("','",$data)."')";
		return $this->query($sql);
	}
	
	function replace($table,$data = array()){
		foreach($data as $key=>$value) $data[$key] = addslashes($value);
		$sql = "REPLACE INTO `".$table."`(`".implode('`,`',array_keys($data))."`) VALUES('".implode("','",$data)."')";
		return $this->query($sql);
	}

	function update($table,$data = array(),$cond=0){
		$sql = "UPDATE `".$table."` SET ";
		foreach($data as $field=>$value) $sql .= "`$field`='".addslashes($value)."',";
		$sql = substr($sql,0,-1);
		$sql .=" WHERE $cond";
		return $this->query($sql);
	}
	
	function delete($table,$cond = 0){
		$sql = "DELETE FROM `".$table."` WHERE $cond";
		return $this->query($sql);
	}
	
	
	
	function query($sql,$start = 0,$limit = NULL){
		$obj = new bDataStore($this->connect); 
		$obj->execute($sql);
		return $obj;
	}
	
	
}
?>