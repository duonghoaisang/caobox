<form id="register" name="register" action="" method="post" onsubmit="return registerUser(this);">
	Ho ten <input type="text" name="fullname" placeholder="Enter your full name" /><br />
	Email <input type="text" name="email" placeholder="Enter your full name" /><br />
	Username <input type="text" name="username" placeholder="Enter your full name" /><br />
	Mat khau <input type="text" name="password" placeholder="Enter your full name" /><br />
	Xac nhan mat khau <input type="text" name="repassword" placeholder="Enter your full name" /><br />
	Ngay sinh 
	<select name="d_dob">
		<option value="0">Ngay</option>
		<!--BASIC list_date-->
		<option value="{list_date.value}">{list_date.name}</option>
		<!--BASIC list_date-->
		
		
	</select> 
	<select name="m_dob">
		<option value="0">Thang</option>
		<!--BASIC list_month-->
		<option value="{list_month.value}">{list_month.name}</option>
		<!--BASIC list_month-->
	</select> 
	<input type="text" name="y_dob" placeholder="Enter your full name" /><br />
	Gioi tinh <input type="radio" name="sex" checked="checked" value="1" /> Male <input type="radio" name="sex" value="0" /> Female<br />
	Ma bao ve <input type="text" name="security_code" placeholder="Enter your full name" /><img src="{system.project}captcha.php" /><br />
	 <input type="checkbox" name="accept_term"  />Chap nhan dieu khoan<br />
	 <input type="checkbox" name="newsletter"  />Nhan email <br />
	 <input type="submit" name="submit" value="Dang ky" /><br />
</form>
