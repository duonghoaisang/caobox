<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */

defined('_ROOT') or die(__FILE__);

/*
	CaoBox Object
	Call $obj->error_handle to handle PHP error.
	
*/

class CaoBox{
	var $name = 'CaoBox';
	var $version = '1.1';
	var $docs = 'http://caobox.com/document';
	var $error_display = true;
	var $error_log = false;
	var $error_log_path = '';
	var $magic_quote_gpc = true;// = get_magic_quotes_gpc();
	
	function __construct(){	
		
	}
	
	
	function error_handle($error_report = E_ALL,$error_display, $error_log, $error_log_path){
		ini_set('display_errors','On');
		error_reporting($error_report);
		//error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED);
		if(get_magic_quotes_runtime()){
			if(function_exists('set_magic_quotes_runtime')){
				set_magic_quotes_runtime(false);
			}
		}
		if(get_magic_quotes_gpc()){
			function strip_value(&$value){
				$value = stripslashes($value);
			}
			array_walk_recursive($_POST, 'strip_value');
			array_walk_recursive($_GET, 'strip_value');
			array_walk_recursive($_SESSION, 'strip_value');
			array_walk_recursive($_COOKIE, 'strip_value');
		}
		set_error_handler(array(&$this,'error_system'));
		
		$this->error_display = $error_display;
		$this->error_log = $error_log;
		$this->error_log_path = $error_log_path;
	}
	function __set($name, $value){
		$trace = debug_backtrace();
		$error_msg = "Cannot setting value for \$$name to '$value'";
		$this->logger_system('CAOBOX',$error_msg,$trace[0]['file'],$trace[0]['line']);
		$this->getError($error_msg,$trace[0]['file'],$trace[0]['line']);
    }

    function __get($name){
        $trace = debug_backtrace();
		$error_msg = "Cannot get value of varrible :\$$name";
		$this->logger_system('CAOBOX',$error_msg,$trace[0]['file'],$trace[0]['line']);
		$this->getError($error_msg,$trace[0]['file'],$trace[0]['line']);
    }
	function __call($name, $arguments) {
        $trace = debug_backtrace();
		$error_msg = "Cannot use method :$name('".implode('\',\'',$arguments)."')";
		$this->logger_system('CAOBOX',$error_msg,$trace[0]['file'],$trace[0]['line']);
		$this->getError($error_msg,$trace[1]['file'],$trace[1]['line']);
    }
	
	

    /**  As of PHP 5.3.0  */
/*    function __callStatic($name, $arguments) {
        $trace = debug_backtrace();
		
		print_r($trace);
		$this->getError("Cannot use method :$name('".implode('\',\'',$arguments)."')",$trace[1]['file'],$trace[1]['line']);
    }	
*/
	function help(){
		$const = get_defined_constants(true);
		
		ob_start();
		echo '<br />';
		echo '------------Constants: --------------------<br />';
		foreach($const['user'] as $key=>$name){
			echo "$key => $name<br />";
		}
	
		$method = get_class_methods($this);
		echo '<br />';
		echo '-------------Methods:      ---------------<br />';
		print_r($method);
		

		$include = get_included_files();
		echo '<br />';
		echo '-------------Include Files ---------------<br />';
		print_r($include);
		
		$header = getallheaders();
		echo '<br />';
		echo '-------------Header:       ---------------<br />';
		print_r($header);
		
		$msg = ob_get_contents();
		ob_end_clean();
		$this->getError($msg);
	}
	
	function getError($error_msg,$file = NULL,$line = NULL,$ctx =  NULL){
	 	//$trace = debug_print_backtrace();
		$error_file = rtrim(dirname(__FILE__),'/').'/caobox/error.html';
		if(file_exists($error_file)) $error_skin = file_get_contents($error_file);
		else $error_skin  = '<title>'.$this->name.' '.$this->version.'</title><base href="http://phpbasic.com/"></base><pre>
	***********************************************************************************************************
	<u>General by</u>   : %s
	<u>Message</u>: <strong>%s</strong>
	<u>File</u>   : <strong>%s</strong>
	<u>Line</u>   : <strong>%d</strong>	
	***********************************************************************************************************	
	Document: '.$this->docs.'
	</pre>%s';
	
	
		if(!$file) $file = 'Undefined';
		
		$err = sprintf($error_skin,$this->name.' '.$this->version,preg_replace('/href=\'(.*?)\'/','href="\\1.php"',$error_msg),$file,$line,$ctx);
		
		die($err);
	}
	
	
	function getAlert($msg,$file,$line,$ctx){
		if($this->error_display) echo ' - '.$msg." in file <strong>$file</strong> line <strong>$line</strong> <br />";
		
	}
	
	function saveLog($msg,$file_log = 'caobox'){
		$fp = @fopen($this->error_log_path.$file_log.'.txt','a+');
		$time = date('Y-m-d h:i:s');
		$msg = '['.microtime()."] $msg [$time]\n";
		if($fp){
			fwrite($fp,$msg);
			fclose($fp);
		}
	}
	
	function logger_system($error_no,$error_msg,$file,$line,$file_log = 'caobox.txt'){
		if(!$this->error_log) return false;
		$error_code[E_WARNING] = 'E_WARNING';
		$error_code[E_NOTICE] = 'E_NOTICE';
		$code = ($error_no == E_WARNING || $error_no == E_NOTICE)?$error_code[$error_no]:$error_no;
		$msg = "[$code] $error_msg file $file line $line";
		$this->saveLog($msg,'caobox');
		
	}
	
	function getLog($msg){
		$this->saveLog($msg,'user');
	}
	
	function error_system($error_no,$error_msg,$file,$line,$ctx){
		$error_msg = preg_replace('/href=\'(.*?)\'/i','href="http://php.net/$1" target="_blank"',$error_msg);
		$error_code[E_WARNING] = '<strong>'.$this->name.' '.$this->version.' Warning:</strong> ';
		$error_code[E_NOTICE] = '<strong>'.$this->name.' '.$this->version.' Notice:</strong> ';
		if($error_no == E_WARNING || $error_no == E_NOTICE) $this->getAlert($error_code[$error_no].$error_msg,$file,$line,$ctx);
		else	$this->getError($error_msg,$file,$line,$ctx);
		$this->logger_system($error_no,$error_msg,$file,$line);
	}
	
	
	
}




?>