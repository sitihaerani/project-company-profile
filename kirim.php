<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";
 
	$mail = new PHPMailer;
 
	//Enable SMTP debugging. 
	// $mail->SMTPDebug = 3;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "tls://smtp.gmail.com"; //host mail server
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = "nenur2001@gmail.com";   //nama-email smtp          
	$mail->Password = "bwcd nsgq zncb ltkz";           //password email smtp
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "tls";                           
	//Set TCP port to connect to 
	$mail->Port = 587;                                   
 
	$mail->From = $_POST['email']; //email pengirim
	$mail->FromName = $_POST['name']; //e pengirim
 
	 $mail->addAddress("nenur2001@gmail.com", $_POST['name']); //email penerima
 
	$mail->isHTML(true);
 
	$mail->Subject = "Pesan baru dari {$_POST['name']}"; //subject
    $mail->Body    = $_POST['pesan']; //isi email
        $mail->AltBody = "PHP mailer"; //body email (optional)
 
	if(!$mail->send()) 
	{  
      echo '<div class="alert alert-danger" role="alert">
							A simple danger alert—check it out!
						</div>';
	} 
	else 
	{
	    echo '<div class="alert alert-success" role="alert">
							A simple success alert—check it out!
						</div>';
	}

?>
