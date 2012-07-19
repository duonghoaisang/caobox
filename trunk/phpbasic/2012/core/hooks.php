<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class bHooker extends CaoBox{
	// do not change
	function hook($function,$arguments = array()){
		return call_user_func_array($function,$arguments);
	}
	
	function is_hook($function){
		if(function_exists($function)) return true;
		return false;
	}
	
	
	
	/* function can hook*/
	function web_header(){
		// define to hook function
		$args = func_get_args();if($this->is_hook(__FUNCTION__)) return $this->hook(__FUNCTION__,$args);
		// end
		ob_start();
		session_start();
		header('Powered-by: '.$this->name.' '.$this->version);
		header('Visited: www.phpbasic.com');
	
	}
	
	function web_footer(){
		// define to hook function
		$args = func_get_args();if($this->is_hook(__FUNCTION__)) return $this->hook(__FUNCTION__,$args);
		// end
	
	}
	
	
	function redirect($url = NULL){
		if(!$url) return false;
		// define to hook function
		$args = func_get_args();if($this->is_hook(__FUNCTION__)) return $this->hook(__FUNCTION__,$args);
		// end
		header('location: '.$url);
		die();
	}
	
	function format($array = NULL){
		if(!$array) return NULL;
		// hook
		$args = func_get_args();if($this->is_hook(__FUNCTION__)) return $this->hook(__FUNCTION__,$args);

		if(is_array($array)) foreach($array as $key=>$v){
			$array[$key] = stripslashes($v);
		}else{
			$array =  stripslashes($array);
		}
		return $array;
	}
	
	function html($str = NULL){
		if(!$str) return NULL;
		return htmlspecialchars($str, NULL , 'utf-8');
	}
}

?>