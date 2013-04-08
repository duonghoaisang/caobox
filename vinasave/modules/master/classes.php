<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
class MasterModel extends Model{
	function MasterModel(){
		parent::Model();
		$this->setCache(_CACHE);
	}
	
	
	function configure_mod(){
		$configure_mod = array();
		$result = $this->db->query("SELECT * FROM ".$this->prefix."configure_mod WHERE 1 ORDER BY `module`,typeid");
		while($rs = $result->fetch()){
			$data = unserialize($rs['data']);
			$order_default = isset($data['sort_default'])?$data['sort_default']:'order_id';
			if(isset($data['sort_default_order'])) $order_default .= " ".($data['sort_default_order'] == 'DESC'?'DESC':'ASC');
			$sort_order = $order_default;
			if(isset($data['sort_order']) && $data['sort_order']) $sort_order .= ",".$data['sort_order'];
			$catsort_order = $order_default;
			if(isset($data['catsort_order']) && $data['catsort_order']) $catsort_order .= ",".$data['catsort_order'];
			$configure_mod[$rs['module']][$rs['typeid']] = array(
				'languages'=>intval($data['languages']),
				'sort_order'=>$sort_order,
				'catsort_order'=>$catsort_order,
			);
		}
		$result->cache();
		
		$result = $this->db->query("SELECT * FROM ".$this->prefix."language WHERE is_default = 1");
		$default_lang = $result->fetch();
		$configure_mod['default_lang'] = $default_lang['ln'];
		$result->cache();
		
		$result = $this->db->query("SELECT * FROM ".$this->prefix."configure");
		while($rs = $result->fetch()){
			$configure_mod['cfg'][$rs['code']] = addslashes($rs['value']);
		}
		$result->cache();
		
		return $configure_mod;
		
	}
	
	
	
}
?>