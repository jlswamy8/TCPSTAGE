<?php   

function createPurchaseAgreementfdf($myarray){
error_reporting(E_ERROR);
//echo "yes" ;
$fdffile1 = fopen("/home/capstone/forms/PurAgmt-fdf", 'w');
if($fdffile1){

//common to all FDFs
fwrite($fdffile1, "%FDF-1.2\r\n") ;
fwrite($fdffile1, "%âãÏÓ\r\n") ;
fwrite($fdffile1, "%FDF-1.2\r\n") ;
fwrite($fdffile1, "1 0 obj\r\n"); 
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/FDF\r\n"); 
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/Fields [\r\n");

//All the fields that we can get from myarray and in the form
// Participant
$pfullname = $myarray[pfname]." ".$myarray[plname] ;
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($pfullname)\r\n");
fwrite($fdffile1, "/T (name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[psaddress])\r\n");
fwrite($fdffile1, "/T (address)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pcity])\r\n");
fwrite($fdffile1, "/T (city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pstate])\r\n");
fwrite($fdffile1, "/T (state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pzip])\r\n");
fwrite($fdffile1, "/T (ZIP)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pemail])\r\n");
fwrite($fdffile1, "/T (email)\r\n");
fwrite($fdffile1, ">>\r\n");

//Buyer
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pSSN])\r\n");
fwrite($fdffile1, "/T (buyer_ssn)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($pfullname)\r\n");
fwrite($fdffile1, "/T (buyer_name)\r\n");
fwrite($fdffile1, ">>\r\n");

// Joint Owner
$cobuyerfullname = $myarray[jfname]." ".$myarray[jlname] ;
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($cobuyerfullname)\r\n");
fwrite($fdffile1, "/T (co_buyer_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jSSN])\r\n");
fwrite($fdffile1, "/T (co_buyer_ssn)\r\n");
fwrite($fdffile1, ">>\r\n");

// TRUST
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[trustname])\r\n");
fwrite($fdffile1, "/T (partnership_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[trusteename])\r\n");
fwrite($fdffile1, "/T (trustee_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tstate])\r\n");
fwrite($fdffile1, "/T (org_state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[ttaxid])\r\n");
fwrite($fdffile1, "/T (tax_id_num)\r\n");


//fwrite($fdffile1, ">>\r\n");

// ACKNOWLEDGEMENT AND SIGNATURE

//Last field does not have the closing >>

//Next line serves as the last field closing line as well
fwrite($fdffile1, ">>]\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "endobj\r\n"); 
fwrite($fdffile1, "trailer\r\n");
fwrite($fdffile1, "\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/Root 1 0 R\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "%%EOF\r\n");


         }
          
fclose($fdffile1);

}

?>
