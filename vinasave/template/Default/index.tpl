<link href="css/index.css" rel="stylesheet" type="text/css"  />

				<div class="top_product">
					<div class="box_product" data-id="1">
						<img src="images/product_hot.jpg"  width="330" />
						<div class="desc_hover">
							<div class="desc_hover_info white"><span class="yellow">2343</span> luot xem</div>
							<div class="desc_hover_content white">Khách sạn Hà Nội Horison là một thành viên trong hệ thống Swiss-Belhotel quốc tế. Nằm ở khu đầu mối và đang mở rộng của Hà Nội.</div>
						</div>
						<div class="desc">
							<a class="start" href="#"></a>
							<span class="name bold">IL Pino cafe</span>
							<span class="address">4 nguyen dinh chieu,F4,Q10,HCM</span>
							Con <span class="blue">100</span> ngay <span class="blue">17:35:20</span>
							<div class="bookmark">
								<span class="like">200</span>
								<span class="unlike">30</span>
								<span class="email"></span>
								<span class="warn"></span>
							</div>
						</div>
						<div class="grippon white">-15%</div>
					</div>
					<div class="box_category black">
						<ul>
							<!--BASIC categories-->
							<li class="{categories.active}"><a  href="{root_dir}{module.diadiem}/{categories.name_url}/{categories.id}/{current_submenu}"><img src="{_UPLOAD}{categories.icon}"></img>{categories.name}</a></li>
							<!--BASIC categories-->
							
						</ul>
						
					</div>
				</div>
				<div class="clearfix"></div>
			
				<div class="banner_middle">BANNER</div>
				
				<div class="product_list">
					
					<!--BASIC products-->
					<div class="box_product last" data-id="{products.id}" data-url="{root_dir}{module.diadiem}/{products.name_url}/{products.id}d/{current_submenu}">
						<img src="{_UPLOAD}{products.icon}"  width="330" />
						<div class="desc_hover">
							<div class="desc_hover_info white"><span class="yellow">{products.visited}</span> luot xem</div>
							<div class="desc_hover_content white">{products.intro}</div>
						</div>
						<div class="desc">
							<a class="start" href="#"></a>
							<span class="name bold">{products.name}</span>
							<span class="address">{products.address}</span>
							<div class="remain_time" data-time="{products.remain_time}"></span></div>
							
							<div class="bookmark">
								<span class="like">{products.like}</span>
								<span class="unlike">{products.unlike}</span>
								<span class="email"></span>
								<span class="warn"></span>
							</div>
						</div>
						<div class="grippon white">- {products.discount}%</div>
					</div>
					<!--BASIC products-->
					
				</div>
				<div class="clearfix"></div>
				<div class="paging black">
					<span class="title">Page {current_page} of {total_page} </span>
					{paging}
					<!-- 
					<a class="prev" href="#">&lt;</a>
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
					<a class="next" href="#">&gt;</a> -->
				</div>
				
			 