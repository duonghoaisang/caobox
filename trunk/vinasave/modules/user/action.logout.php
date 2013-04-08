<?php
	if(isset($_SESSION['member'])) unset($_SESSION['member']);
	$hook->redirect($this->project);
?>