<?php

$file = fopen("/var/www/html/apps/TCP/illustration/tmp/ill-data.txt", "w") or die("unable to open file for writing") ;
fwrite($file, $_POST[requestor_name]);
fwrite($file, ",");
fwrite($file, $_POST[requestor_email]);
fwrite($file, ",");
fwrite($file, $_POST[date_of_request]);
fwrite($file, ",");
fwrite($file, $_POST[date_when_required]);
fwrite($file, ",");
fwrite($file, $_POST[cap_raise_name]);
fwrite($file, ",");
fwrite($file, $_POST[subscriber_type]);
fwrite($file, ",");
fwrite($file, $_POST[tax_status]);
fwrite($file, ",");
fwrite($file, $_POST[illustration_header_name]);
fwrite($file, ",");
fwrite($file, $_POST[investment_amount]);
fwrite($file, ",");
fwrite($file, $_POST[subscriber_full_name]);
fwrite($file, ",");
fwrite($file, $_POST[year_born]);
fwrite($file, ",");
fwrite($file, $_POST[street_address]);
fwrite($file, ",");
fwrite($file, $_POST[city]);
fwrite($file, ",");
fwrite($file, $_POST[zip]);
fwrite($file, ",");
fwrite($file, $_POST[phone]);
fwrite($file, ",");
fwrite($file, $_POST[email]);
fclose($file);
/** include ('illustration-view.php') ;*/
include ('illustration-pdf.php') ;
system('pdftk ill-example-test1-form.pdf fill_form tmp/new-ill-fdf output tmp/test.pdf');

//include ('send-pdf-by-email.php');
//include ('send-ill-request-by-email.php');
//Send_Pdf_By_Email();


$pdffile = "/apps/TCP/illustration/tmp/test.pdf";
echo "<script>window.open('$pdffile','_self');</script>";
//echo "<script>window.open('$pdffile');</script>";


?>
