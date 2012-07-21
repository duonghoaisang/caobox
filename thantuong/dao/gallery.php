<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);

class GalleryDAO extends Model{
	var $configure_mod;
	function GalleryDAO($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	

	function view($page,$pageid,$orderby=" order_id,id"){
		return $this->db->query("SELECT * FROM ".$this->prefix."gallery WHERE page='".addslashes($page)."' AND pageid=".intval($pageid)." ORDER BY $orderby");
	}
}

?>