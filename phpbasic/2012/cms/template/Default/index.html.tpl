<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>bTemplate 1.1</title>
<script type="text/javascript" src="../plugins/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugins/smoothmenu/h.css" />
<script>var plugins_dir = '../';</script>
<script type="text/javascript" src="../plugins/smoothmenu/script.js"></script>
<script type="text/javascript" src="../plugins/tableorder/jquery.tableorder.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="../plugins/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src="js/editor.js"></script>
<script type="text/javascript" src="../plugins/slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="../plugins/slimbox/css/slimbox2.css" type="text/css" media="screen" />


</head>
<body>
<div id="main">
<div id="nav"><a class="logout" href="?mod=user&act=logout"><img align="absmiddle" src="images/logout.jpg" /> Logout</a><a class="logo" href="./"><img alt="Content Manage System" src="images/logo.gif" /></a><br />
</div>
<div id="left">
	<!--BASIC leftmenu-->
	<div class="submenu">
    <h2>{leftmenu.name}</h2>
    	{leftmenu.links}
    </div>
    <!--BASIC leftmenu-->
</div>
<div id="content">
<div class="breadcrumb">{breadcrumb}</div>

{include:tpl=body}</div>
<div id="footer"> </div>
</div>
</body>
</html>