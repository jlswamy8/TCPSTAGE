<?php   

function  createAccreditedInvestorAckfdf($myarray){
//error_reporting(E_ERROR);
//echo "yes" ;
$fdffile1 = fopen("/home/capstone/forms/AccrInvAck-fdf", 'w');
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
$pname = $myarray[pfname]." ".$myarray[plname] ;
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($pname)\r\n");
fwrite($fdffile1, "/T (name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pcity])\r\n");
fwrite($fdffile1, "/T (city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pstate])\r\n");
fwrite($fdffile1, "/T (state)\r\n");
fwrite($fdffile1, ">>\r\n");

// Spouse 
//$spousename = $myarray[spousefname]." ".$myarray[spouselname] ;
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pcity])\r\n");
fwrite($fdffile1, "/T (spouse_city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pstate])\r\n");
fwrite($fdffile1, "/T (spouse_state)\r\n");



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
