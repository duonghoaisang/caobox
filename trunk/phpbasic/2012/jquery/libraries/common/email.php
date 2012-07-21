<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
class Email extends bTemplate{
	var $to;
	var $subject;
	var $is_smtp = true;
	var $is_html = true;
	function Email($to,$subject,$email_template){
		//if(!$to || !$subject || !$email_template) $this->getError('Missing $to or $subject or $email_template');
		parent::__construct(_ROOT.'email/'); 
		$this->to = $to;
		$this->subject = $subject;
		$this->setfile(array(
			'__main__'=>'master.tpl',
			'body'=>$email_template
		));
	}
	
	function send(){
		$smtp  = $GLOBALS['smtp'];
		$mail = new PHPMailer();
		$mail->CharSet = 'UTF-8';
		if($this->is_smtp){
			$mail->IsSMTP(); 
			$mail->SMTPAuth = true; 
		}
		$mail->Host = $smtp['server'] ;
		$mail->Username = $smtp['user'] ;
		$mail->Password = $smtp['psw']; 
		$mail->From = $smtp['from_email'];
		$mail->FromName = $smtp['from_name'];
		$mail->AddAddress($this->to,''); 
		$mail->AddReplyTo($smtp['reply_email'],$smtp['reply_email']);
		$mail->WordWrap = 50;
		$mail->IsHTML($this->is_html); 
		$mail->Subject = $this->subject;
		$mail->Body = $this->parse();
		$mail->AltBody = "";
		return $mail->Send();
	}
	
	
}

?>