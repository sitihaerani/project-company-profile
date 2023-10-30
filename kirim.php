<?php
// $isSent = false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";


function sendEmail(){
	$nama= $_POST['name'];
	$email= $_POST['email'];
	$kontak= $_POST['kontak'];
	$pesan= $_POST['pesan'];
	
	$body= "
	Nama	: $nama <br/>
	Email	: $email <br/>
	No. HP: $kontak <br/>
	Pesan	: $pesan <br/>
	";
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
 
	$mail->From = $email; //email pengirim
	$mail->FromName = $nama; //email pengirim
  $mail->AddReplyTo($email,'user');
	$mail->addAddress("nentinur300901@gmail.com", $nama); //email penerima
 
	$mail->isHTML(true);
 
	$mail->Subject = "Pesan baru dari $nama"; //subject
    $mail->Body    = $body; //isi email
        $mail->AltBody = "PHP mailer"; //body email (optional)
 
	if(!$mail->send()) 
	{  
		return false;
	} 
	else 
	{
		return true;
	}
}
 
	

?>
