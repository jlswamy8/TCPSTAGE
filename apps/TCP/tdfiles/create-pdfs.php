<?php
//namespace backend\models;
//use Yii ;
//use yii\helpers\Html;

$file = '/var/www/html/apps/TCP/tdfiles/TDAI9020-header.fdf';
$fdffilename = '/var/www/html/apps/TCP/tdfiles/TDAI9020-final.fdf';

$data_handle = fopen('/var/www/html/apps/TCP/tdfiles/tab-delimited-test.txt', "r");
     $i = 0;

if ($data_handle) {
    while (($line = fgets($data_handle)) !== false) {
    // process the line read.
     $line_content_array = preg_split('/	/',$line);
     if ($i == 0 || $line_content_array[0] == ""){
       //skip to next line
       $i = 1 ;
       }
     else {
          if (!copy($file, $fdffilename)) {
          echo "failed to copy $file...\n";
          exit();
          }
         $fdffile = fopen($fdffilename,"a");
//         echo $line_content_array[9] ;

         $lname = str_replace("\"","", $line_content_array[0]) ;
         $fname = str_replace("\"","",$line_content_array[1]) ;
         $cap_raise = $line_content_array[2] ;
         $policy_num = $line_content_array[3] ;
         $carrier_name = $line_content_array[4] ;
         $face_amount = $line_content_array[5] ;
         $policy_date = $line_content_array[6] ;
         $carrier_bank = $line_content_array[7] ;
         $bank_aba = $line_content_array[8] ;
         $bank_account_num = $line_content_array[9] ;
         $has_loan = $line_content_array[10] ;
         $form_created = $line_content_array[11] ;
         $pr_team_member = $line_content_array[12] ;
         $pr_completed = $line_content_array[13] ;
         $reviewed = $line_content_array[14] ;
         $capstone_prm_account_num = $line_content_array[15] ;
         $advisor_code = $line_content_array[16] ;
         $capstone_account_desc = $line_content_array[17] ;
         $amount = "$ ".number_format((trim($line_content_array[18])),2,'.',',') ;
         $type = $line_content_array[19] ;

//         echo $lname.$fname.$cap_raise.$policy_num.$carrier_name.$face_amount.$policy_date.$carrier_bank.$bank_aba ;

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V ($capstone_prm_account_num)\n");
         fwrite($fdffile, "/T (Account)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V ($amount) \n");
         fwrite($fdffile, "/T (dollar_amount)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V (On) \n");
         fwrite($fdffile, "/T (One_Time_Only_Request)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V ($carrier_bank) \n");
         fwrite($fdffile, "/T (carrier_bank)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V ($capstone_account_desc) \n");
         fwrite($fdffile, "/T (account_description) \n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V (Memo:$fname $lname  Policy Reference:$policy_num  $type) \n");
         fwrite($fdffile, "/T (For_Further_Credit_to_Name)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V ($bank_aba) \n");
         fwrite($fdffile, "/T (carrier_bank_aba)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V ($carrier_name) \n");
         fwrite($fdffile, "/T (carrier_name)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V (On) \n");
         fwrite($fdffile, "/T (Amount)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V (On) \n");
         fwrite($fdffile, "/T (Maintain on file for my future use)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");

         $today = date("Y-m-d");
         fwrite($fdffile, "/V ($today) \n");
         fwrite($fdffile, "/T (Date)\n");
         fwrite($fdffile, ">>\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/V ($bank_account_num) \n");
         fwrite($fdffile, "/T (carrier_bank_account_num)\n");
// Last entry does not need a separate >>
//         fwrite($fdffile, ">>\n");
 
         fwrite($fdffile, ">>]\n");
         fwrite($fdffile, ">>\n");
         fwrite($fdffile, ">>\n");
         fwrite($fdffile, "endobj \n");
         fwrite($fdffile, "trailer\n");

         fwrite($fdffile, "\n");

         fwrite($fdffile, "<<\n");
         fwrite($fdffile, "/Root 1 0 R\n");
         fwrite($fdffile, ">>\n");
         fwrite($fdffile, "%%EOF\n");
         fclose($fdffile);
//Create pdf file
// Name of pdf file can be raisename-policyname.pdf         
system('pdftk TDAI9020-form.pdf fill_form TDAI9020-final.fdf output test.pdf');
$type = trim($type);
$new_type = str_replace(' ','',$type) ;
$new_name = "tmp/".$cap_raise.$lname.$policy_num.$new_type.".pdf" ;
          if (!copy("test.pdf", $new_name)) {
          echo "failed to copy test.pdf...\n";
          exit();
          }
//system('cp test.pdf $new_name');
          } //end of else

            } // end of while
        }// end of if handle
?>          
