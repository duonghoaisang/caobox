<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<base href="{system.domain}{system.project}" />
<script type="text/javascript" src="plugins/jquery-1.3.2.min.js"></script>
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>{pages.web_title}</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Regeneracy  </a></h1>
				<p> design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
				<a href="{root_dir}{switch_url.en}">EN</a> <a href="{root_dir}{switch_url.vn}">VN</a>
			</div>
			<div id="menu">
				<ul>
					<li {menu_active.home}><a href="{root_dir}{module.home}">{module_name.home}</a></li>
					<li {menu_active.news}><a href="{root_dir}{module.news}">{module_name.news}</a></li>
					<li {menu_active.photo}><a href="{root_dir}{module.photo}">Photos</a></li>
					<li {menu_active.about}><a href="{root_dir}{module.about}">About</a></li>
					<li {menu_active.link}><a href="{root_dir}{module.link}">Links</a></li>
					<li {menu_active.contact}><a href="{root_dir}{module.contact}">{module_name.contact}</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
				<!--CACHE body-->
				{include:tpl=body}
				{include:tpl=left}
				<!--CACHE body-->
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						<li>
							<div id="search" >
								<form method="get" action="#">
									<div>
										<input type="text" name="s" id="search-text" value="" />
										<input type="submit" id="search-submit" value="GO" />
									</div>
								</form>
							</div>
							<div style="clear: both;">&nbsp;</div>
						</li>
						<li>
							<h2>Aliquam tempus</h2>
							<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
						</li>
						<li>
							<h2>Categories</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
						<li>
							<h2>Blogroll</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
						<li>
							<h2>Archives</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
	<p>{lang.home}</p>
</div>
<!-- end #footer -->
</body>
</html>
