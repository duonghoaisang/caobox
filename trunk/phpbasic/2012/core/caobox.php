<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class CaoBox{
	var $name = 'Framework';
	var $version = '1.0';
	
	function __construct(){
		if($GLOBALS['cfg']['error_report']) set_error_handler(array(&$this,'error_system'));
	}
	
	function __set($name, $value){
		$trace = debug_backtrace();
		$this->getError("Cannot setting value for \$$name to '$value'",$trace[0]['file'],$trace[0]['line']);
    }

    function __get($name){
        $trace = debug_backtrace();
		$this->getError("Cannot get value of varrible :\$$name",$trace[0]['file'],$trace[0]['line']);
    }
	function __call($name, $arguments) {
        $trace = debug_backtrace();
		$this->getError("Cannot use method :$name('".implode('\',\'',$arguments)."')",$trace[1]['file'],$trace[1]['line']);
    }

    /**  As of PHP 5.3.0  */
    function __callStatic($name, $arguments) {
        $trace = debug_backtrace();
		$this->getError("Cannot use method :$name('".implode('\',\'',$arguments)."')",$trace[1]['file'],$trace[1]['line']);
    }	
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
		
		$error_skin  = '<title>bframe</title><base href="http://phpbasic.com/man/"></base><pre>
	***********************************************************************************************************
	<u>General by</u>   : %s
	<u>Message</u>: <strong>%s</strong>
	<u>File</u>   : <strong>%s</strong>
	<u>Line</u>   : <strong>%d</strong>	
	***********************************************************************************************************	
	Email to: <a href="mailto:admin@phpbasic.com?subject=Error Code!">admin@phpbasic.com</a>
	</pre>%s';
	
		if(!$file) $file = 'Undefined';
		printf($error_skin,$this->name.' '.$this->version,preg_replace('/href=\'(.*?)\'/','href="\\1.php"',$error_msg),$file,$line,$ctx);
		die();
	}
	
	function error_system($no,$error_msg,$file,$line,$ctx){
		$this->getError("$error_msg",$file,$line);
	}
	
	
}

?>