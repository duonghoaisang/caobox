        <div id="col-1">
        	<ul id="bottomMenu">
                <!--BASIC category--><li class="{category.active}"><a href="{root_dir}{system.module_name}/{category.id}/{category.name_url}/" title="{category.name}">{category.name}</a></li><!--BASIC category-->
            </ul>
			<!--BOX topnews-->
            <div id="boxNewsTop">
            	<div class="Left">
            		<a href="{root_dir}{system.module_name}/detail/{top.id}/{top.name_url}.html" title="{top.name}" class="Title">{top.name}</a>
                	<a href="{root_dir}{system.module_name}/detail/{top.id}/{top.name_url}.html" title="{top.name}">{top.icon}</a>
                </div>
                <div class="Right">
				<!--BASIC toplist-->
                	<p>
                		<a href="{root_dir}{system.module_name}/detail/{toplist.id}/{toplist.name_url}.html" title="{toplist.name}">{toplist.icon}</a>
                        <a href="{root_dir}{system.module_name}/detail/{toplist.id}/{toplist.name_url}.html" title="{toplist.name}" class="Title">{toplist.name}</a>
                    </p><!--BASIC toplist-->
                   
                </div>
            </div>
			<!--BOX topnews-->
            <div class="Wrapper">
            	<div class="BoxLeft">
            		<ul id="newNewsList">
					<!--BASIC list-->
                	<li>
                    	<a href="{root_dir}{system.module_name}/detail/{list.id}/{list.name_url}.html" title="{list.name}">{list.icon}</a>
                    	<a href="{root_dir}{system.module_name}/detail/{list.id}/{list.name_url}.html" title="{list.name}">{list.name}</a>
                       {list.intro}
                    </li>  <!--BASIC list-->
                    
                </ul>
                	<div class="OtherNews">
                    	<h2>Các tin khác:</h2>
                    	<ul id="listOtherNews">
						<!--BASIC otherlist-->
                            <li>
                                <a href="{root_dir}{system.module_name}/detail/{otherlist.id}/{otherlist.name_url}.html" title="{otherlist.name}">{otherlist.name}</a><span class="Date">{otherlist.date}</span>
                            </li>   <!--BASIC otherlist-->
                            
                		</ul>
                        <form method="get" action="{root_dir}{system.module_name}/" onsubmit="return searchNews(this)">
                        <p>
                        	Các tin đã đăng ngày: <input type="text"  value="" name="date" class="inputtext date-pick dp-applied" /> <input type="submit" value="Xem" />
                        </p>
                        </form>
						<script>
						Date.format = 'yyyy-mm-dd';
						$('.date-pick').datePicker({startDate: '1970-01-01',autoFocusNextInput: true});</script>
                    </div>
                </div>
                <div class="BoxRight">
                	<div id="boxTieudiem">
                	<h2><img src="images/tieudiem.gif" width="202" height="42" /></h2>
                    <ul id="tieudiemList2">
					<!--BASIC focuslist-->
                		<li>
                    		{focuslist.icon}
                    		<a href="{root_dir}{system.module_name}/detail/{focuslist.id}/{focuslist.name_url}.html" title="{focuslist.name}">{focuslist.name}</a>
                   		</li><!--BASIC focuslist-->
                        
                    </ul> 
                  {include:tpl=rightbanner220}
                </div>
                </div>
            </div>
        </div>
        {include:tpl=rightbanner320}
