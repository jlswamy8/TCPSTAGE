<?php
echo "one" ;
require_once "vendor/autoload.php";

echo "two" ;
$mail = new PHPMailer;

echo "three" ;
//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.mail.yahoo.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "vasu_vijay@yahoo.com";                 
$mail->Password = "Kadavule1@";                           
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//If SMTP requires SSL encryption then set it
$mail->SMTPSecure = "ssl";

//Set TCP port to connect to 
$mail->Port = 465;                                   

$mail->From = "vasu_vijay@yahoo.com";
$mail->FromName = "Full Name";

$mail->addAddress("vasu@ccprllc.com", "Recipient Name");
//Provide file path and name of the attachments
$mail->addAttachment("/home/capstone/forms/NQappformfilled.pdf", "NQappformfilled.pdf");        
$mail->addAttachment("/home/capstone/forms/NQappform.pdf"); //Filename is optional
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
