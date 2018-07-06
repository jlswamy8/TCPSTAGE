<?php
function myemail() {
//require_once '/opt/bitnami/apps/wordpress/htdocs/wp-content/plugins/swift-mailer/lib/swift_required.php';
// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.mail.yahoo.com', 465)
  ->setUsername('vasu_vijay')
  ->setPassword('Kadavule1@')
  ;

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance()
  ->setFrom(array('vasu_vijay@yahoo.com' => 'Vasu Vijay'))
  ->setTo(array('vasu@ccprllc.com' => 'Vasu'))
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);
}
?>
