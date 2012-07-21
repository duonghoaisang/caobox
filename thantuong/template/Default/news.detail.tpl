<div id="col-1">
        	<ul id="bottomMenu">
               <!--BASIC category--><li class="{category.active}"><a href="{root_dir}{system.module_name}/{category.id}/{category.name_url}/" title="{category.name}">{category.name}</a></li><!--BASIC category-->   
            </ul>
        	<div id="boxContent">
            	<h3>{detail.intro}</h3>
                <p class="Date">{detail.date}</p>
        	  <p>{detail.intro}</p>
        	<!--  <p><a href="#">&gt;&gt; Kieu nu Han voi hanbook</a><br />
   	          <a href="#">&gt;&gt; SNSD xinh xan voi hanbook</a></p>-->
        	 
        	  {detail.content}
			  
			  
			  <div class="OtherNews">
				<h2>Các tin khác:</h2>
				<ul id="listOtherNews">
				<!--BASIC otherlist-->
					<li>
						<a href="{root_dir}{system.module_name}/detail/{otherlist.id}/{otherlist.name_url}.html" title="{otherlist.name}">{otherlist.name}</a><span class="Date">{otherlist.date}</span>
					</li>   <!--BASIC otherlist-->
					
				</ul>
				
			</div>
              <div id="boxSN">
              	<a href="http://facebook.com/share.php?u=demo.phpbasic.com{root_dir_absolute}{system.module_name}/detail/{detail.id}/{detail.name_url}.html" title="Facebook"><img src="images/fb-button.gif" /></a>
                <a href="http://twitter.com/home?status={detail.intro}+demo.phpbasic.com{root_dir_absolute}{system.module_name}/detail/{detail.id}/{detail.name_url}.html" title="Twitter"><img src="images/t-button.gif" /></a>
                <a href="" title="Zing me"><img src="images/zing-button.gif" /></a>
              </div>
        	</div>
        </div>
{include:tpl=rightbanner320}