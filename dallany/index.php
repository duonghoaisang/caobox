<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dallany</title>
</head>

<body>
<?php
include("Mobile_Detect.php");
$detect = new Mobile_Detect();

if ($detect->isMobile()) {
    echo '<script type="text/javascript">window.location="http://www.dallany.ca/mobile/index.php";</script>';
}
else{
	include("index_pc.php");
	}
?>
</body>
</html>