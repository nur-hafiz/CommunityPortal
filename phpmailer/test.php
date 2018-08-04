<?php
require_once './PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->setFrom('lithanm6@gmail.com', 'Admin');
#$mail->addAddress('mdnur.hafiz@outlook.com', 'User1');
$mail->Subject = 'Test Email';
$mail->isHTML(TRUE);
$mail->Body = '<html>There is a test <strong>mail</strong>.</html>';
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
$result = mysqli_query($mysql,'SELECT * FROM mailinglist');
foreach($result as $row){
	$mail->addAddress($row['email'],$row['name']);
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