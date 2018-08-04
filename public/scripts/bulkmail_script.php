<?php
require_once '../../phpmailer/PHPMailerAutoload.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$mail = new PHPMailer();
	$mail->setFrom('lithanm6@gmail.com', 'Admin');
	
	$mail->Subject = $_REQUEST['title'];
	$mail->isHTML(TRUE);
	$mail->Body = $_REQUEST['emailContent'];
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = TRUE;
	$mail->Username = 'lithanm6@gmail.com';
	$mail->Password = 'H245hyt12';
	
	#$mysql = mysqli('localhost','root','test123','capstone');
	$mysql = mysqli_connect('localhost','root','test123');
	mysqli_select_db($mysql,'capstone');
	$result = mysqli_query($mysql,'SELECT * FROM tb_user');
	foreach($result as $row){
		if($row['mail_subscribe']){
			$mail->addAddress($row['email'],$row['firstname']);
			if (!$mail->send())
			{
				echo "Error: " . $mail->ErrorInfo;
				break;
			}
			else
			{
				echo "Message sent to: ".$row['email'];
			}
			$mail->clearAddresses();
		}
	}
}
?>