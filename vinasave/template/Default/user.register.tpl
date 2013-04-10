<link href="css/register.css" rel="stylesheet" type="text/css"  />
<div id="register" >
<div class="title blue">ĐĂNG KÝ THÀNH VIÊN WEBSITE</div>
<div class="floatleft col1">
	<div class="welcome">
	<strong>Quyền lợi khi Đăng Ký Tài Khoản Thành Viên Website:</strong>
		<ul>
		<li>- Cơ hội nhận quà tặng, ưu đãi từ các chương trình, sự kiện đặc biệt của vinaSAVE.vn</li>
		<li>- Được cập nhật tin tức, thông báo thường xuyên từ vinaSAVE thông qua Email</li>
		<li>- MIỄN PHÍ mở gian hàng trực tuyến để đăng bán & quảng bá sản phẩm/dịch vụ trên hệ thống website vinaSAVE.vn ở tất cả các chuyên mục:</li>
                 <ul class="bull level2">
                 <li>&bull; Địa Điểm Ưu Đãi Giảm Giá</li>
                 <li>&bull; Hot Deal</li>
                 <li>&bull; Gian Hàng Sản Phẩm</li>
                 </ul>
        </ul>
	</div>
	
	<br />
	<span class="typereg">Mua Thẻ Ưu Đãi Giảm Giá</span>
	<span class="typereg on">Tài Khoản Thành Viên website vinaSAVE</span>
</div>
<div class="floatleft col2">
	<div class="blue login_require_txt">Bạn đã Đăng Ký rồi ?</div>
	<a class="left_login white" href="{root_dir}{module.user}/login">HÃY ĐĂNG NHẬP</a>
	<div class="blue login_require_txt">Hoặc Đăng Nhập qua Facebook</div>
	<a class="left_login_fb" href="{root_dir}{module.user}/login"></a>
</div>
<div class="clearfix"></div>
<div class="floatleft col1 form">
	<form name="register" action="" method="post" onsubmit="return registerUser(this);">
		<span class="spanleft">Họ tên:</span><input type="text" name="fullname" placeholder="Enter your full name" /><br />
		<span class="spanleft">Email</span><input type="text" name="email" placeholder="Enter your full name" /><br />
		<span class="spanleft">Username</span><input type="text" name="username" placeholder="Enter your full name" /><br />
		<span class="spanleft">Mật khẩu:</span><input type="text" name="password" placeholder="Enter your full name" /><br />
		<span class="spanleft">Xác nhận Mật khẩu:</span><input type="text" name="repassword" placeholder="Enter your full name" /><br />
		<span class="spanleft">Ngày sinh:</span><select name="d_dob">
			<option value="0">Ngày</option>
			<!--BASIC list_date-->
			<option value="{list_date.value}">{list_date.name}</option>
			<!--BASIC list_date-->
			
			
		</select> 
		<select name="m_dob">
			<option value="0">Tháng</option>
			<!--BASIC list_month-->
			<option value="{list_month.value}">{list_month.name}</option>
			<!--BASIC list_month-->
		</select> 
		<input type="text" name="y_dob" class="nowidth" placeholder="Năm" /><br />
		<span class="spanleft">Giới tính:</span><input class="nowidth" type="radio" name="sex" checked="checked" value="1" /> Nam <input class="nowidth" type="radio" name="sex" value="0" /> Nữ<br />
		<span class="spanleft">Nhập mã bảo vệ:</span><input class="security_code" type="text" name="security_code" placeholder="Enter your full name" /><img class="captcha" src="{system.project}captcha.php" /><br />
		 <div class="policy">
			 <input  style="display:none;" type="checkbox" name="accept_term" id="accept_term" />
			 <label onclick="toogleOnLabel(this);" for="accept_term">Đồng ý về Điều khoản dịch vụ & Chính sách bảo mật của chúng tôi</label>
			 <input  style="display:none;"  class="nowidth" type="checkbox" id="newsletter" name="newsletter"  />
			 <label onclick="toogleOnLabel(this);" for="newsletter">Nhận Thông Báo & Tin Tức từ vinaSAVE.vn qua Email </label>
		 </div>
		 <input class="nowidth regist_btn" type="submit" name="submit" value="Đăng ký" /><br />
	</form>
</div>
</div>
