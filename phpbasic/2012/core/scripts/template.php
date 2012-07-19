<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
class bTemplate extends CaoBox{
	var $attribute = 'src|href|background|value|url';
	var $folder = 'format|media|css|images|flash|js';
	var $files=array();
	var $mytpl;
	var $_data;
	var $tpl_dir;
	var $cache;
	var $aLang = array();
	var $return_data = array();
	var $box = array();
	var $merge = array();
	function __construct($tpl_dir){ 
		$this->mytpl = NULL;
		$this->_data = array();
		$this->tpl_dir = rtrim($tpl_dir,'/').'/';
	
	}

	function box($name){
		$this->box[$name] = true;
	}
	
	function setstring($array_files,$dir = NULL,$justify_path = true ){
		$this->setfile($array_files,$dir,$justify_path,true);
	}
	function setfile($array_files,$dir = NULL,$justify_path = true,$file_string = false){
		if(!$array_files) return false;
		$dir = $dir ? rtrim($dir,'/').'/' : $this->tpl_dir;
		if(!is_array($array_files)){ $this->files['__master__'] = $dir.$array_files;return false;} // load template master
		foreach($array_files as $block=>$file) {
			$this->files[$block] = array('dir'=>$dir, 'file'=>$file,'file_string'=>$file_string, 'justify_path'=>$justify_path);
		}
	}
	
	function attribute($attribute){
		$this->attribute .= '|'.$attribute;
	}
	
	function folder($folder){
		$this->folder .= '|'.$folder;
	}
	
	function _load($file){
		if(file_exists($file)) return file_get_contents($file);
		$this->getError('File :'.$file.' isn\'t exists');
	}
	
	function merge($array,$prefix = 'lang'){
		/*$mytpl =  preg_replace('/\{'.$prefix.'\.([a-z0-9\-_]*?)\}/i','\'.(isset($array[\'\\1\'])?$array[\'\\1\']:\'\').\'',$this->mytpl);
		return $mytpl;*/
		if(!$prefix) return false;
		if(is_array($array)) $this->merge[$prefix] = $array;
	}
	function assign($vararray,$block = NULL){
		if($vararray && !is_array($vararray) && $block) $this->_data['.'][0][$block] = $vararray;
		if(!$vararray || !is_array($vararray)) return false;
		if($block){
			if(strpos($block,'.')){
				$blocks = explode('.',$block);
				$this->_data["$blocks[0]."][(count($this->_data["$blocks[0]."])-1)]["$blocks[1]."][] = 
					$vararray;
			}else{
				$this->_data["$block."][] = $vararray;
			}		
		}else{
			if(!isset($this->_data['.'][0])) $this->_data['.'][0] = array();
			$this->_data['.'][0] = array_merge($this->_data['.'][0],$vararray);
		}
	}
	
	function compile_tpl($mytpl){
		$mytpl = str_replace('\\', '\\\\', $mytpl); 
		$mytpl = str_replace('\\\{', ':ldelim:', $mytpl);
		$mytpl = str_replace('\\\}', ':rdelim:', $mytpl);
		$mytpl = str_replace('\'', '\\\'', $mytpl);
		return $mytpl;
	}
	
	function getTemplate($tpl_dir,$currentLang){
		$mytpl = '';
		if(count($this->files)) foreach($this->files as $block=>$array){
			$content = $array['file_string']?$array['file']:$this->_load($array['dir'].$array['file']);
			if($array['justify_path']){
				$content = $this->modify_url($content,$array['dir']?$array['dir']:$tpl_dir,$currentLang);
			}
			if($mytpl==''){
				$mytpl = $content;
			}else{
				$mytpl = str_replace('{include:tpl='.$block.'}',"\n<!--start:$block-->\n".$content."\n<!--end:$block-->\n",$mytpl);
			}
		}
		$mytpl = $this->compile_tpl($mytpl);
		$mytpl = $this->compile_data($mytpl,$tpl_dir,$currentLang);
		
		return $mytpl;
	}
	function compile_block($mytpl){
		preg_match_all('#\{(([a-z0-9\-_]+?\.)+?)([a-z0-9\-_]+?)\}#is', $mytpl, $vars);
		if(count($vars[0])){
			$keyblock = array_unique($vars[0]);
		 	foreach($keyblock as $i=>$val){
				$tmp = explode('.',$val);
				if(isset($this->_data[substr($tmp[0],1)."."])){
				$cTmp = count($tmp);
				if($cTmp ==2){
					$mytpl = str_replace($val,'\'.(isset($this->_data["'.substr($tmp[0],1).'."][$i]["'.substr($tmp[1],0,strlen($tmp[1])-1).'"])?$this->_data["'.substr($tmp[0],1).'."][$i]["'.substr($tmp[1],0,strlen($tmp[1])-1).'"]:\'\').\'',$mytpl);
				}elseif($cTmp==3){
					$mytpl = str_replace($val,'\'.(isset($this->_data["'.substr($tmp[0],1).'."][$i]["'.$tmp[1].'."][$j]["'.substr($tmp[2],0,strlen($tmp[2])-1).'"])?$this->_data["'.substr($tmp[0],1).'."][$i]["'.$tmp[1].'."][$j]["'.substr($tmp[2],0,strlen($tmp[2])-1).'"]:\'\').\'',$mytpl);
				}
				}
			}
		}
		//compine boxes
		//if(count($this->box)){
			preg_match_all('#<!--BOX ([^\.<>]+?)-->(.*?)<!--BOX \\1-->#is',$mytpl,$boxes);
			$box = $boxes[1];
			for($i=0;$i<count($box);$i++) if(!isset($this->box[$box[$i]])) $mytpl = str_replace($boxes[0][$i],'',$mytpl);
		//}
		
		preg_match_all('#<!--BASIC ([^\.<>]+?)-->(.*?)<!--BASIC \\1-->#is',$mytpl,$blocks);
		$block = $blocks[1];
		$i = 0;
		for($i=0;$i<count($block);$i++)
			if(isset($this->_data["$block[$i]."])){
				$str = "';\n";
				$str .= 'for($i=0;$i<'.(count($this->_data["$block[$i]."])).';$i++){';
				$str .= "\$_tpl .= '".$blocks[2][$i]."';";
				$str .= '}'."\n\$_tpl .= '";
				$mytpl = str_replace($blocks[0][$i],$str,$mytpl);
			}else{
				$mytpl = str_replace($blocks[0][$i],'',$mytpl);
			}
		preg_match_all('#<!--BASIC ([a-z0-9^\.]+?)\.([a-z0-9^\.]+?)-->(.*?)<!--BASIC \\1\.\\2-->#is',$mytpl,$subblocks);
		$block = $subblocks[1];
		
		$subblock = $subblocks[2];
		for($j=0;$j<count($block);$j++) 
			if(isset($this->_data["$block[$j]."][0]["$subblock[$j]."])){
				$str = "';\n";
				$str .= '	for($j=0;$j<count($this->_data["'.$block[$j].'."][$i]["'.$subblock[$j].'."]);$j++){';
				$str .= "		\$_tpl .= '".$subblocks[3][$j]."';";
				$str .= '	}'."\n\$_tpl .= '";
				$mytpl = str_replace($subblocks[0][$j],$str,$mytpl);
			}else{
				$mytpl = str_replace($subblocks[0][$j],'',$mytpl);
			}
		return $mytpl;
	}
	function compile_data($mytpl,$tpl_dir,$currentLang){
		//clear box not assign
	
		$cache = $this->cache?'.(substr(\'\\1\',0,6)==\'cache_\'?\'<!--n:\\1-->\':\'\')':'';
		$mytpl =  preg_replace('/\{([a-z0-9\-_]+?)\}/i','\''.$cache.'.(isset($this->_data["."][0][\'\\1\'])?$this->_data["."][0][\'\\1\']:\'\')'.$cache.'.\'',$mytpl);
		$mytpl =  preg_replace('/\{([a-z0-9\-_]+?)\}/i','\''.$cache.'.(isset($this->_data["."][0][\'\\1\'])?$this->_data["."][0][\'\\1\']:\'\')'.$cache.'.\'',$mytpl);
		
		//$mytpl =  preg_replace('/\{([a-z0-9\$\-\>]+)\((.*?)\)\}/is','\''.$cache.'.(function_exists(\\1)?(isset($this->_data["."][0][\'\\2\'])?\\1($this->_data["."][0][\'\\2\']):\\1(\'\\2\')):\'<span style="color: red;" title="function \\1 is not exists {\\1(...)}">[function]</span>\')'.$cache.'.\'',$mytpl);
		//$mytpl =  preg_replace('/\{include:file=(.*?)\}/i','\'; include "\\1"; echo \'',$mytpl);
		$mytpl =  $this->modify_url($mytpl,$tpl_dir,$currentLang);
		$cache = $this->cache?'<!--c:\\1-->':'';
		if(count($this->merge)) foreach($this->merge as $prefix=>$arr){
			$mytpl =  preg_replace('/\{'.$prefix.'\.([a-z0-9\-_]*?)\}/i','\'.(isset($this->merge[\''.$prefix.'\'][\'\\1\'])?$this->merge[\''.$prefix.'\'][\'\\1\']:\'\').\'',$mytpl);
		}
		return $mytpl;
			
	}
	function modify_url($mytpl,$tpl_dir,$currentLang){
		$mytpl = preg_replace('/('.$this->attribute.')="('.$this->folder.')\/lang_([a-z]{2})\//i','\\1="'.$tpl_dir.'\\2/lang_'.$currentLang.'/',$mytpl);
		$mytpl = preg_replace('/('.$this->attribute.')="('.$this->folder.')\//i','\\1="'.$tpl_dir.'\\2/',$mytpl);
		$mytpl = preg_replace('/url\((.*?)\)/i','url('.$tpl_dir.'\\1)',$mytpl);
		return $mytpl;
	}	
	function reset(){
		$this->mytpl = NULL;
		$this->files = array();
	}
	function parse($mimeType = 'text/html'){
		$mytpl = $this->getTemplate($this->tpl_dir,$this->aLang);
		$mytpl = $this->compile_block($mytpl);
		$mytpl = preg_replace('/\{([a-z0-9\._\-\:=]+?)\}/i','',$mytpl);
		$mytpl = str_replace(array(':ldelim:',':rdelim:'),array('{','}'),$mytpl);
		if(!headers_sent()) header('Content-Type: '.$mimeType.';charset=UTF-8');
		$bug = 1;
		$_tpl = NULL;
		@eval("\$_tpl = '$mytpl';\$bug = 0;");
		if($bug){
			$msg = 'An error appear when template parsed <br />';
			if($this->debug==2) $msg .= highlight_string("<?php\necho '$mytpl';\n?>",1);
			$this->getError($msg,1);
		}
		return $_tpl;
	}
	
	
	
	
}
?>