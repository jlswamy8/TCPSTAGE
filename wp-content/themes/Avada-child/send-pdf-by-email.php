<?php
function Send_Pdf_By_Email($myarray) {
error_reporting(E_ERROR);
//echo "one" ;
require_once "vendor/autoload.php";

//echo "two" ;
$mail = new PHPMailer;

//echo "three" ;
//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.mail.yahoo.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "vasu_vijay@yahoo.com";                 
$mail->Password = "Kadavule2@";                           
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//If SMTP requires SSL encryption then set it
$mail->SMTPSecure = "ssl";

//Set TCP port to connect to 
$mail->Port = 465;                                   

$mail->From = "vasu_vijay@yahoo.com";
$mail->FromName = "SLS Strategies";

//$mail->addAddress("vasu@ccprllc.com", "Recipient Name");
//$to = "vasu@ccprllc.com" ;
$to = $myarray[pemail] ;
//$name = "Vasu Vijay" ;
$name = $myarray[plname] ;
$mail->addAddress($to, $name);
//Provide file path and name of the attachments
$mail->addAttachment("/home/capstone/forms/fullform.pdf", "fullform.pdf");        
//$mail->addAttachment("/home/capstone/forms/NQappformfilled.pdf", "NQappformfilled.pdf");        
//$mail->addAttachment("/home/capstone/forms/NQaccredinvackfilled.pdf"); //Filename is optional
//$mail->addAttachment("/home/capstone/forms/NQbenefdesigfilled.pdf"); //Filename is optional
//$mail->addAttachment("/home/capstone/forms/NQpuragmtfilled.pdf"); //Filename is optional
//$mail->addAttachment("/home/capstone/forms/NQsuitackfilled.pdf"); //Filename is optional
$mail->isHTML(true);

$mail->Subject = "Filled PDF forms attached";
$mail->Body = "<i>All ready to be signed and delivered</i>";
$mail->AltBody = "All ready to be signed and delivered";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
//    echo "Message has been sent successfully";
}
}
