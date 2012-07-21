<?
// doan nay khai bao chinh xac den file class.phpmailer.php trong cai goi download ve
if($_POST){
	require('class.phpmailer.php');
	// nhung thong tin bat buoc phai nhap
	$sEmail = 'admin@phpbasic.com'; // dia chi email se nhan mail
	$sName = 'TG';// ten nguoi nhan
	$sEmailSender = 'contact@phpbasic.com';// dia chi email cua nguoi goi
	$sSenderName ='Contact PHPBASIC'; // ten nguoi goi
	$sHost ='hostmaster.phpbasic.com';
	$sUser ='admin';// tuong u'ng voi mail admin@phpasic.com
	$sPass ='pass of admin@phpbasic.com';// mat khau truy cap server mail
	$sSub ='Contact From PHPBASIC'; // tieu de cho email
	$Scontent = "Test send mail voi SMTP (dl: phpbasic.com)";
	$mail = new PHPMailer();
	$mail->IsSMTP(); 
	$mail->Host = $sHost ;
	$mail->SMTPAuth = true; 
	$mail->Username = $sUser ;
	$mail->Password = $sPass; 
	$mail->From = $_POST['email'];//$sEmailSender;
	$mail->FromName = 'Visitor PHPBASIC';//$sSenderName;
	$mail->AddAddress($sEmail,$sName); 
	$mail->AddReplyTo($_POST['email']/*$sEmailSender*/,$sSenderName);
	$mail->WordWrap = 50;
	$mail->IsHTML(true); 
	$subject = $sSub;
	$message = $Scontent;
	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBody = “”;
	if(!$mail->Send()){
		print $mail->ErrorInfo;
		exit();
	}else{
		print "Successfull!";
	}
}
?>