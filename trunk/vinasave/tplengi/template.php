<?php


class Template{
	var $cache = 'build/';
	var $tpl_dir = "";
	var $cache_enable = true ;

	function compile_file_name($file){
		return str_replace(array('"','\''),array('',''),$file);
	}
	function compile_complex_var($var){
		if(!$var) return null;
		$arr = explode('.',$var);
		$first = $arr[0];
		unset($arr[0]);
		return '$'.$first.(count($arr)?'["'.implode('"]["',$arr).'"]':"");
	}
	function compile_slashes($mytpl){
		$mytpl = str_replace(array('\\','\\\{{','\\\}}','\''),
		array('\\\\','[:ldelim:]','[:rdelim:]','\\\''), $mytpl);
		return $mytpl;
	}
	function decompile_slashes($mytpl){
		$mytpl = str_replace(array('[:ldelim:]','[:rdelim:]'),array('{{','}}'),$mytpl);
		return $mytpl;

	}
	function compile_parse_bug($content){
		$msg = '<br />An error appear when template engine is generating.... <br />';
		$msg .= highlight_string("<?php echo '$content';\n?>",1);
		return $msg;
	}
	function compile_block_tag($content){
		//preg_replace($pattern, $replacement, $subject)
		preg_match_all('#\{% block ([a-z0-9]+?) %\}(.*?)\{% endblock %\}#is', $content, $matches);
		$last_modified = 0;
		$track_value = array();
		if(count($matches[1])) for($i=count($matches[1]) - 1; $i >= 0;$i--){
			if(isset($track_value[$matches[1][$i]])){
				//$content  = str_replace($matches[0][$i], $track_value[$matches[1][$i]], $content);
				$content = preg_replace('#\{% block '.$matches[1][$i].' %\}(.*?)\{% endblock %\}#is',$track_value[$matches[1][$i]],$content,1);
			}else{
				$track_value[$matches[1][$i]] = $matches[2][$i];
				//$content  = str_replace($matches[0][$i], '++++++++++++', $content);
			}
			
		}
		//$content .= preg_replace('#\{% block ([a-z0-9]+?) %\}(.*?)\{% endblock %\}#is','+++++++++++', $content);
		return $content;
		//print_r($matches);
	}
	function compile_include_tag($content){
		preg_match_all('#\{%\s?include\s?(.*?)\s?%\}#is', $content, $matches);
		$last_modified = 0;
		if(count($matches[1])) for($i=0;$i<count($matches[1]);$i++){
			$tpl = $this->compile_file_name($this->tpl_dir.$matches[1][$i]);
			if(file_exists($tpl)){
				$content = str_replace($matches[0][$i],file_get_contents($tpl),$content);
				$t = filemtime($tpl);
				if($t > $last_modified) $last_modified = $t; 
			}else {
				throw new ErrorException('Template '.$tpl.' dont exists!');
				$content = str_replace($matches[0][$i],'<span style="color:red;">Template '.$tpl.' dont exists!</span>',$content);
			}
		}
		return array(
			'content'=>$content,
			'last_modified'=>$last_modified,
		);
	}
	
	function compile_php_tag($content){
		preg_match_all('#\{php\s?(.*?)\s?\?\}#is', $content, $matches);
		//print_r($matches);
		if(count($matches[1])) for($i =0; $i< count($matches[1]);$i++){
			$var = $matches[1][$i];
			$var = str_replace(array('\\\''),array('\''),$var);
			$content = str_replace($matches[0][$i],'\';'.$var.';echo \'', $content);
		}
		return $content;
	}
	function parse($data, $tpl_file, $return_data = false){
		$content = file_get_contents($this->tpl_dir.$tpl_file);
		/*
		try{
			$included_tpl = $this->compile_include_tag($content);
		} catch(Exception $e){
			die('Error');
		}
		*/
		$included_tpl = $this->compile_include_tag($content);
		$content = $included_tpl['content'];
		$content = $this->compile_block_tag($content);
		//print_r($content);
		//exit();
		$last_modified = $included_tpl['last_modified'];
		$t = filemtime($this->tpl_dir.$tpl_file);
		if($t > $last_modified) $last_modified = $t;
		
		
		
		$cache_file = $this->cache.$tpl_file.".php";
		if($this->cache_enable && file_exists($cache_file) && filemtime($cache_file) > $last_modified){
			extract($data,EXTR_OVERWRITE);
			if($return_data){
				ob_start();
				include $cache_file;
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
			}else{
				include $cache_file;
			}
			return false;
		}
		
		
		
		$content = $this->compile_slashes($content);
		$content = $this->compile_php_tag($content);
		
		//$content = str_replace('\\{{','\\\\[:ldim:]',$content);
		//single varibles {{ var }}
		$content = preg_replace('/\{\{\s?([a-z0-9]+?)\s?\}\}/i','\';print_r( isset($\\1)?$\\1:NULL);echo \'',$content);

		// complex varibles {{ rs.name }}
		preg_match_all('/\{\{\s?([a-z0-9\.\_]*?)\s?\}\}/i', $content, $matches);
		if($matches[1]) for($i = 0; $i < count($matches[1]); $i++){
			$var = $this->compile_complex_var($matches[1][$i]);
			$content = str_replace($matches[0][$i],'\';print_r(isset('.$var.')?'.$var.':NULL);echo \'',$content);
		}




		// loop
		// if
		// endif , endloop

		preg_match_all('#\{%\s?(.*?)\s?%\}#is', $content, $matches);
		//print_r($matches);
		if(count($matches[1])) for($i =0; $i< count($matches[1]); $i++){
			$var = trim($matches[1][$i]);
			switch ($var){
				case 'endfor':
				case 'endif':
				case 'endwhile':
				case 'endforeach':
					$var = '}';
					break;
				case 'else':
				case 'elseif':
					$var = '}'.$var.'{';
					break;

				default:
					if(substr($var,0,2) == 'if' || substr($var,0,3) == 'for' || substr($var,0,6) == 'foreach' || substr($var, 0,5) == 'while'){
						$var .= ' {';
					}else{
						$var = "echo '{% $var %}'";
					}
				break;
					
			}
			$content = str_replace($matches[0][$i],'\'; '.$var.';echo \'',$content);
				
				
		}

		// calculate ( rs.price * 10 + rs.discount ... )
		$support_caculation = '\+\-\*\/\s\(\)\:\|\&\%';
		preg_match_all('/\{\{\s?([a-z0-9'.$support_caculation.']*?)\s?\}\}/i', $content, $matches);
		//print_r($matches);
		if($matches[1]) for($i = 0; $i < count($matches[1]); $i++){
			$var = trim($matches[1][$i]);
			preg_match_all('/(['.$support_caculation.'])/i',str_replace(' ','',$var), $cal);
			$arr = preg_split('/(['.$support_caculation.'])/i',str_replace(' ','',$var));
			//$arr = array_unique($arr);
			$var = '';
			for($j = 0; $j < count($arr); $j++){
				$v = $arr[$j];
				if(!intval($v)) $v = $this->compile_complex_var($v);
				$var .= $v. (isset($cal[1][$j])?$cal[1][$j]:NULL);

				//if(!intval(trim($v))) $var = preg_replace("/$v/",$this->compile_complex_var($v),$var,  1);
			}
			//echo $var;
			$content = str_replace($matches[0][$i],'\'; print_r('.$var.');  echo \'',$content);
		}
		// show all content in {{ string }}
		$content = preg_replace('#\{\{\s?([^|]*?)\s?\}\}#is', '\'; print_r(\\1);echo \'',$content);

		$content = $this->decompile_slashes($content);
		//
		//$content = str_replace('\\\\[:ldim:]','{{',$content);



		
		extract($data,EXTR_OVERWRITE);
		$_tmp_parse_error_ = true;
		//echo "<?php '$content'>";
		//exit();
		if($return_data){
			ob_start();
			eval("echo '$content'; \$_tmp_parse_error_ = false;");
			$_content = ob_get_contents();
			ob_end_clean();
			return $_content;
		}else{
			eval("echo '$content'; \$_tmp_parse_error_ = false;");
				
		}

		
		if($_tmp_parse_error_){
			echo $this->compile_parse_bug($content);
		}else{
			if($this->cache_enable && (!file_exists($cache_file) || filemtime($cache_file) < $last_modified)){
				$fp = @fopen($cache_file,'w');
				if($fp){
					fwrite($fp,'<?php echo \''.$content.'\';?>');
				}else{
					throw new AppException('Your code has no cache because  '.$this->cache.' no such directory or permission denied');
					//die('<br /><strong>Warning</strong>: Your code has no cache because  <strong>'.$this->cache.'</strong> no such directory or permission denied ');
				}
			}
		}
		//include $tpl_file;


	}

	//public methods
	function display($data,$file){
		echo $this->parse($data,$file,false);
	}
	function get($data,$file){
		return $this->parse($data,$file,true);
	}
}
?>