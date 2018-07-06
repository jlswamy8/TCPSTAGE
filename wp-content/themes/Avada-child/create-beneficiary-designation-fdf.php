<?php   

function createBeneficiaryDesignationfdf($myarray){
error_reporting(E_ERROR);
//echo "yes" ;
$fdffile1 = fopen("/home/capstone/forms/BenefDesig-fdf", 'w');
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
$pfullname = $myarray[pfname]." ".$myarray[plname];
//echo ($pfullname) ;
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($pfullname)\r\n");
fwrite($fdffile1, "/T (part_full_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pdaytimephone])\r\n");
fwrite($fdffile1, "/T (part_phone_num)\r\n");
fwrite($fdffile1, ">>\r\n");

// Primary Beneficiary 1 
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1name])\r\n");
fwrite($fdffile1, "/T (ben1_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1relationship])\r\n");
fwrite($fdffile1, "/T (ben1_relationship)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1percentshare])\r\n");
fwrite($fdffile1, "/T (ben1_percent_share)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1ssaddress])\r\n");
fwrite($fdffile1, "/T (ben1_address)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1city])\r\n");
fwrite($fdffile1, "/T (ben1_city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1state])\r\n");
fwrite($fdffile1, "/T (ben1_state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1zip])\r\n");
fwrite($fdffile1, "/T (ben1_zip)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1phone])\r\n");
fwrite($fdffile1, "/T (ben1_phone_num)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1birthdate])\r\n");
fwrite($fdffile1, "/T (ben1_birthdate)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b1SSN])\r\n");
fwrite($fdffile1, "/T (ben1_ssn)\r\n");
fwrite($fdffile1, ">>\r\n");

//Primary Beneficiary 2
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2name])\r\n");
fwrite($fdffile1, "/T (ben2_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2relationship])\r\n");
fwrite($fdffile1, "/T (ben2_relationship)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2percentshare])\r\n");
fwrite($fdffile1, "/T (ben2_percent_share)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2ssaddress])\r\n");
fwrite($fdffile1, "/T (ben2_address)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2city])\r\n");
fwrite($fdffile1, "/T (ben2_city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2state])\r\n");
fwrite($fdffile1, "/T (ben2_state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2zip])\r\n");
fwrite($fdffile1, "/T (ben2_zip)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2phone])\r\n");
fwrite($fdffile1, "/T (ben2_phone_num)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2birthdate])\r\n");
fwrite($fdffile1, "/T (ben2_birthdate)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[b2SSN])\r\n");
fwrite($fdffile1, "/T (ben2_ssn)\r\n");
fwrite($fdffile1, ">>\r\n");

// Secondary Beneficiary 1
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1name])\r\n");
fwrite($fdffile1, "/T (sben1_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1relationship])\r\n");
fwrite($fdffile1, "/T (sben1_relationship)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1percentshare])\r\n");
fwrite($fdffile1, "/T (sben1_percent_share)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1ssaddress])\r\n");
fwrite($fdffile1, "/T (sben1_address)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1city])\r\n");
fwrite($fdffile1, "/T (sben1_city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1state])\r\n");
fwrite($fdffile1, "/T (sben1_state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1zip])\r\n");
fwrite($fdffile1, "/T (sben1_zip)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1phone])\r\n");
fwrite($fdffile1, "/T (sben1_phone_num)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1birthdate])\r\n");
fwrite($fdffile1, "/T (sben1_birthdate)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb1SSN])\r\n");
fwrite($fdffile1, "/T (sben1_ssn)\r\n");
fwrite($fdffile1, ">>\r\n");

// Secondary Beneficiary 2
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2name])\r\n");
fwrite($fdffile1, "/T (sben2_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2relationship])\r\n");
fwrite($fdffile1, "/T (sben2_relationship)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2percentshare])\r\n");
fwrite($fdffile1, "/T (sben2_percent_share)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2ssaddress])\r\n");
fwrite($fdffile1, "/T (sben2_address)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2city])\r\n");
fwrite($fdffile1, "/T (sben2_city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2state])\r\n");
fwrite($fdffile1, "/T (sben2_state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2zip])\r\n");
fwrite($fdffile1, "/T (sben2_zip)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2phone])\r\n");
fwrite($fdffile1, "/T (sben2_phone_num)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2birthdate])\r\n");
fwrite($fdffile1, "/T (sben2_birthdate)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[sb2SSN])\r\n");
fwrite($fdffile1, "/T (sben2_ssn)\r\n");

 
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
