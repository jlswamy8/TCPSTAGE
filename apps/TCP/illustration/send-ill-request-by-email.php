<?php

//require_once "/var/www/html/apps/TCP/vendor/autoload.php";
require_once "/var/www/html/wp-content/themes/Avada-child/vendor/autoload.php";

$mail = new PHPMailer;


//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.mail.yahoo.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "kevin.dicke@yahoo.com";                 
$mail->Password = "KDyahoo!";                           
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//If SMTP requires SSL encryption then set it
$mail->SMTPSecure = "ssl";

//Set TCP port to connect to 
$mail->Port = 465;                                   

$mail->From = "kevin.dicke@yahoo.com";
$mail->FromName = "TCP Platform";

//$mail->addAddress("vasu@ccprllc.com", "Recipient Name");
//$to = "vasu@ccprllc.com" ;
$to = jason@capstonecapitalconsulting.com ;
$name = "Jason Bokina" ;
//$name = $requestor_name ;
//$to_cc = "jason@capstonecapitalconsulting.com" ;
//$name_cc = "Jason Bokina" ;
$mail->addAddress($to, $name);
//$mail->addCC($to_cc);
//Provide file path and name of the attachments
$mail->addAttachment("/var/www/html/apps/TCP/illustration/tmp/ill-data.txt", "ill-data.txt");        
//$mail->addAttachment("/home/capstone/forms/NQsuitackfilled.pdf"); //Filename is optional
$mail->isHTML(true);

$mail->Subject = "Request attached";
$mail->Body = "<i>New Request attached</i>";
$mail->AltBody = "New Request attached";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
//    echo "Message has been sent successfully";
}
?>
