<link href="css/detail.css" rel="stylesheet" type="text/css"  />
				<div class="breadcrumb black"><a href="#">Home</a> &gt; <a href="{root_dir}{module_url}/">{module_name}</a> &gt; {current_submenu_name}</div>
				
				<!-- Top Product  & Category -->
				<div id="right">
					<div class="register_store bold">
						<div class="store_bg"></div>
						<div class="store_content">
						Đăng Ký Gian Hàng<br />
						Giảm Giá Ưu Đãi<br />
						<a class="reg  white" href="#">click here</a>
						</div>
					</div>
					<div class="box_category black">
						<ul>
							<!--BASIC categories-->
							<li class="{categories.active}"><a  href="{root_dir}{module.diadiem}/{categories.name_url}/{categories.id}/{current_submenu}"><img src="{_UPLOAD}{categories.icon}"></img>{categories.name}</a></li>
							<!--BASIC categories-->
						</ul>
						
					</div>
					
					
					<div class="clearfix"></div>
					<div class="banners" >
						<img src="images/detail/images/client_banners.jpg" width="340" />
						<img src="images/detail/images/client_banners.jpg" width="340" />
					</div>
					<div class="product_relative white">ĐỊA ĐIỂM GIẢM GIÁ ƯU ĐÃI TƯƠNG TỰ</div>
					
					<!--BASIC related_products-->
					<div class="box_product last" data-id="{related_products.id}" data-url="{root_dir}{module_url}/{related_products.name_url}/{related_products.id}d/{current_submenu}">
						<img src="{_UPLOAD}{related_products.icon}"  width="330" />
						<div class="desc_hover">
							<div class="desc_hover_info white"><span class="yellow">{related_products.visited}</span> luot xem</div>
							<div class="desc_hover_content white">{related_products.intro}</div>
						</div>
						<div class="desc">
							<a class="start" href="#"></a>
							<span class="name bold">{related_products.name}</span>
							<span class="address">{related_products.address}</span>
							<div class="remain_time" data-time="{related_products.remain_time}"></div>
							
							<div class="bookmark">
								<span class="like">{related_products.like}</span>
								<span class="unlike">{related_products.unlike}</span>
								<span class="email"></span>
								<span class="warn"></span>
							</div>
						</div>
						<div class="grippon white">-{related_products.discount}%</div>
					</div>
					<!--BASIC related_products-->
					
					
					
					
					
					
					<div class="clearfix"></div>
					<div class="product_relative white">ĐỪNG BỎ LỠ</div>
					
					<!--BASIC recommend_products-->
					<div class="box_product last" data-id="{recommend_products.id}" data-url="{root_dir}{module_url}/{recommend_products.name_url}/{recommend_products.id}d/{current_submenu}">
						<img src="{_UPLOAD}{recommend_products.icon}"  width="330" />
						<div class="desc_hover">
							<div class="desc_hover_info white"><span class="yellow">{recommend_products.visited}</span> luot xem</div>
							<div class="desc_hover_content white">{recommend_products.intro}</div>
						</div>
						<div class="desc">
							<a class="start" href="#"></a>
							<span class="name bold">{recommend_products.name}</span>
							<span class="address">{recommend_products.address}</span>
							<div class="remain_time" data-time="{recommend_products.remain_time}"></div>
							
							<div class="bookmark">
								<span class="like">{recommend_products.like}</span>
								<span class="unlike">{recommend_products.unlike}</span>
								<span class="email"></span>
								<span class="warn"></span>
							</div>
						</div>
						<div class="grippon white">-{recommend_products.discount}%</div>
					</div>
					<!--BASIC recommend_products-->
					
					
					 
					
					<div class="clearfix"></div>
					<div class="right_bottom_banners">
						<img src="images/detail/images/banners.jpg" />
					</div>
				</div>
				<div id="left">
					<div class="hot_message">Hãy <span class="red bold">MUA THẺ NGAY</span> để được giảm giá đến 80% trên mỗi hóa đơn thanh toán khi Bạn mua sắm ở bất kỳ nơi nào nằm trong hệ thống <a href="#" class="blue">Địa Điểm giảm giá ưu đãi</a> của chúng tôi. Xem <a href="#" class="blue">hướng dẫn chi tiết</a>.</div>
					<h3 class="marginleft15 name">{name}</h3>
					<div class="marginleft15 description">{intro}</div>
				
					<div class="col1 product_info">
						<div class="discount white">GIAM <span class="yellow">{discount}%</span></div>
						<div class="time remain_time blue2red" data-time="{remain_time}"></div>
						<div class="store_info_title white">THONG TIN GIAN HANG</div>
						<div class="store_info">
							<div class="home">
								{address}
							</div>
							<div class="phone">{phone}</div>
							<div class="email">{email}</div>
							<div class="website">{website}</div>
							<div class="map">Sơ đồ đường đi</div>
						</div>
					</div>
					<div class="col2 product_image">
						<img src="images/detail/images/product_detail.jpg"></img>
					</div>
					
					<div class="socials">
						<span class="red">{visited}</span> views
						<div class="bookmark">
							<span class="like">{like}</span>
							<span class="unlike">{unlike}</span>
							<span class="email"></span>
							<span class="warn"></span>
						</div>
					</div>
					
					<div class="col1 left_title white">ĐIỀU KIỆN ÁP DỤNG</div>
					<div class="col2 right_title white">Điểm nhấn</div>
					<div class="col1 guide">
						<div class="guideleft">
							{condition}
						</div>
						<div class="guideright">
						     {focus_point}

     					</div>

     

     
					</div>
					
					
					
					<div class="col1 left_title  white">HƯỚNG DẪN</div>
					<div class="col1 guide bgnone struction">
						{guide}
					</div>
					
					
					
					<div class="col1 left_title white">GIỚI THIỆU</div>
					<div class="col1 guide bgnone">
						{content}
					</div>
					
					
					<div class="col1 left_title white">LƯU Ý</div>
					<div class="col2 right_title white">SƠ ĐỒ ĐƯỜNG ĐI</div>
					<div class="col1 guide map">
						<div class="guideleft"> {note}</div>
						<img src="images/detail/images/detail_map.jpg" width="374" />
					</div>
					
					
					
					<div class="chat marginleft15">
						<div id="comment_rows">
							<div class="rows">
								<div class="col1 avatar"></div>
								<div class="col1 nick red">$fullname$</div>
								<div class="col1 bgmsg">
									<div class=""></div>
								</div>
								<div class="col1 message">$comment$</div>
								
							</div>
						</div>
						<div id="comment_data">
							<!--BASIC comment-->
							<div class="rows">
								<div class="col1 avatar"></div>
								<div class="col1 nick red">{comment.fullname}</div>
								<div class="col1 bgmsg">
									<div class=""></div>
								</div>
								<div class="col1 message">{comment.content}</div>
								
							</div>
							<!--BASIC comment-->
						</div>
						
						
						
						
						<div class="">
							<form method="post" onsubmit="return post_comment(this);">
							<input type="hidden" name="redirect_url" value="{module_url}/{name_url}/{id}d/{current_submenu}"
							<input type="hidden" name="id" value="{id}" />
							<input class="comment" type="text" name="comment" placeholder="Y kien khac hang"></input>
							<input type="submit" value="submit" class="comment_btn"></input></form>
						</div>
						
						
					</div>
					
					
					
					
				</div>
				
			