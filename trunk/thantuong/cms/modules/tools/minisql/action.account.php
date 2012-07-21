<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);



if($_SESSION['ga']['token']){
	$ga = new gapi($_SESSION['ga']['ga_emai'],$_SESSION['ga']['ga_pasw']);
	$ga->requestAccountData();
	foreach($ga->getResults() as $result)
	{
	  echo $result . ' (' . $result->getProfileId() . ")<br />";
	}
}else{
	echo '0';
}
exit();

?>
