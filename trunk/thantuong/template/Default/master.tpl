<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="{system.domain}{system.project}" />
<link rel="stylesheet" type="text/css" href="css/global.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="plugins/jquery-1.3.2.min.js"></script>
<script src="plugins/datepicker/date.js" type="text/javascript"></script>
<script src="plugins/datepicker/jquery.datePicker.js" type="text/javascript"></script>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="plugins/datepicker/datePicker.css"/>
<title>{cfg.web_title}</title>
</head>

<body class="{container.class}">
	<div id="header" class="{container.class}"><img src="images/{container.logo}"  /></div>
    <div id="boxMenu" style="background-color: {cfg.menu_bg};">
    	<ul id="topMenu" class="{container.class}">
            <li class="{menu_active.index}"><a href="{root_dir}{module.index}" title="{module_name.index}">{module_name.index}</a></li>
			
            
            <li class="{menu_active.stars}"><a href="{root_dir}{module.stars}" title="{module_name.stars}">{module_name.stars}</a></li>
            <li class="{menu_active.music}"><a href="{root_dir}{module.music}" title="{module_name.music}">{module_name.music}</a></li>
            <li class="{menu_active.movie}"><a href="{root_dir}{module.movie}" title="{module_name.movie}">{module_name.movie}</a></li>
            <li class="{menu_active.style}"><a href="{root_dir}{module.style}" title="{module_name.style}">{module_name.style}</a></li>
            <li class="{menu_active.idols}"><a href="{root_dir}{module.idols}" title="{module_name.idols}">{module_name.idols}</a></li>
			<li class="{menu_active.sport}"><a href="{root_dir}{module.sport}" title="{module_name.sport}">{module_name.sport}</a></li>
            <li class="{menu_active.relax}"><a href="{root_dir}{module.relax}" title="{module_name.relax}">{module_name.relax}</a></li>
            <li class="End {menu_active.media}"><a href="{root_dir}{module.media}" title="{module_name.media}">{module_name.media}</a></li>
			
   		</ul>
    </div>
<div id="container" class="{container.class}">
	{include:tpl=topbanner}
    {include:tpl=body}
</div>

<!--BOX footer-->

<div id="boxAdvBottom"><!--BASIC footerbanner-->
<a href="{footerbanner.intro}" title="{footerbanner.name}"><img src="{_UPLOAD}{footerbanner.image}" width="1020"  /></a><!--BASIC footerbanner--></div>
<div id="boxFooter">
	<div id="footer">
    	<div class="Left">
        	{footer.content}
        </div>
        <div class="Right">
		<!--BASIC rightbanner_footer-->
		<a href="{rightbanner_footer.intro}" title="{rightbanner_footer.name}"><img src="{_UPLOAD}{rightbanner_footer.image}" width="250"  /></a><!--BASIC rightbanner_footer-->
		
		</div>
    </div>
</div>
<!--BOX footer-->
</body>
</html>
