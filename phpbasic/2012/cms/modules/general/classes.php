<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends Model{
	function __construct(){
		parent::__construct();
	}
	
	function listNews(){
		return $this->db->select('product');
	}
	
	function make_templates(){
		$tpl_list = 'var tinyMCETemplateList = [';
		$tpl_list .= '["'.$rs['name'].'", "../data/tinymce/templates/snippet.htm", "Simple HTML snippet."],';
		$tpl_list.=']';
	}
	

}
?>