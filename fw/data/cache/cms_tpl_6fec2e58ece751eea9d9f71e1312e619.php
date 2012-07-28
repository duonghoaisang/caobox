<?php defined('_ROOT') or die('Not Allowed');
$merge_block = 6;
$_tpl = '<h2>REPLACE SQL</h2>
<textarea style="width:98%; height: 100px;" onfocus="this.select();">'.(isset($this->_data["."][0]['sqlreplace'])?$this->_data["."][0]['sqlreplace']:'').'</textarea>
<h2>UPDATE SQL</h2>
<textarea style="width:98%; height: 100px;" onfocus="this.select();">'.(isset($this->_data["."][0]['sqlupdate'])?$this->_data["."][0]['sqlupdate']:'').'</textarea>'; ?>