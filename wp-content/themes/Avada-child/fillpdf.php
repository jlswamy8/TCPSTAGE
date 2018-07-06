<?php   
function DoProcessing() {
error_reporting(E_ERROR);

$formfile1 = fopen("formdata/NAA_v1_olive.txt", "r");
if($formfile1){
//print  "form file can be opened \n" ;

$myarray = array();

while (($data = fgetcsv($formfile1, ",")) !== FALSE) {

$myarray["plname"] .= $data[1] ;
$myarray["pfname"] .= $data[2] ; 
$myarray["pmname"] .= $data[3] ;
$myarray["psaddress"] .= $data[4] ;
$myarray["pcity"] .= $data[5] ;
$myarray["pstate"] .= $data[6] ;
$myarray["pzip"] .= $data[7] ;
$myarray["pemail"] .= $data[8] ;
$myarray["pbdate"] .= $data[9] ;
$myarray["pSSN"] .= $data[10] ;
$myarray["phomephone"] .= $data[11] ;
$myarray["pdaytimephone"] .= $data[12] ;
$myarray["pidtype"] .= $data[13] ;
$myarray["pidnum"] .= $data[14] ;
$myarray["pissuer"] .= $data[15] ;
$myarray["pexpdate"] .= $data[16] ;
$myarray["pissuedate"] .= $data[17] ;
$myarray["paccttype"] .= $data[18] ;
$myarray["pacctown"] .= $data[19] ;
$myarray["pacctfunding"] .= $data[20] ;
$myarray["pamtwapp"] .= $data[21] ;
$myarray["ptotalamt"] .= $data[22] ;
$myarray["pfundswiredt"] .= $data[23] ;
$myarray["pnetworth"] .= $data[24] ;
$myarray["pgrossincome"] .= $data[25] ;
$myarray["pliquidity"] .= $data[26] ;
$myarray["pemergency"] .= $data[27] ;
$myarray["pliquidamt"] .= $data[28] ;
$myarray["ptaxbracket"] .= $data[29] ;
$myarray["pothertaxbracket"] .= $data[30] ;
$myarray["pincomesource"] .= $data[31] ;
$myarray["potherincome"] .= $data[32] ;
$myarray["pexpoverincome"] .= $data[33] ;
$myarray["pincchange"] .= $data[34] ;
$myarray["pinclevelexplanation"] .= $data[35] ;
$myarray["pincchangeexplanation"] .= $data[36] ;
$myarray["pexpchange"] .= $data[37] ;
$myarray["pexpchangeexplanation"] .= $data[38] ;
$myarray["pfinobj"] .= $data[39] ;
$myarray["potherfinobj"] .= $data[40] ;
$myarray["jlname"] .= $data[41] ;
$myarray["jbirthdate"] .= $data[42] ;
$myarray["jSSN"] .= $data[43] ;
$myarray["jemail"] .= $data[44] ;
$myarray["jhomephone"] .= $data[45] ;
$myarray["jdaytimephone"] .= $data[46] ;
$myarray["jsameaddress"] .= $data[47] ;
$myarray["jaddress"] .= $data[48] ;
$myarray["jcity"] .= $data[49] ;
$myarray["jstate"] .= $data[50] ;
$myarray["jzip"] .= $data[51] ;
$myarray["jfname"] .= $data[52] ;
$myarray["jmname"] .= $data[53] ;
$myarray["trustname"] .= $data[54] ;
$myarray["trusteename"] .= $data[55] ;
$myarray["trustdate"] .= $data[56] ;
$myarray["ttaxid"] .= $data[57] ;
$myarray["temail"] .= $data[58] ;
$myarray["tphone"] .= $data[59] ;
$myarray["tstreetaddress"] .= $data[60] ;
$myarray["tcity"] .= $data[61] ;
$myarray["tstate"] .= $data[62] ;
$myarray["tzip"] .= $data[63] ;
$myarray["b1name"] .= $data[64] ;
$myarray["b1relationship"] .= $data[65] ;
$myarray["b1percentshare"] .= $data[66] ;
$myarray["b1SSN"] .= $data[67] ;
$myarray["b1birthdate"] .= $data[68] ;
$myarray["b1phone"] .= $data[69] ;
$myarray["b1saddress"] .= $data[70] ;
$myarray["b1city"] .= $data[71] ;
$myarray["b1state"] .= $data[72] ;
$myarray["b1zip"] .= $data[73] ;
$myarray["b2name"] .= $data[74] ;
$myarray["b2relationship"] .= $data[75] ;
$myarray["b2percentshare"] .= $data[76] ;
$myarray["b2SSN"] .= $data[77] ;
$myarray["b2birthdate"] .= $data[78] ;
$myarray["b2phone"] .= $data[79] ;
$myarray["b2saddress"] .= $data[80] ;
$myarray["b2city"] .= $data[81] ;
$myarray["b2state"] .= $data[82] ;
$myarray["b2zip"] .= $data[83] ;
$myarray["sb1name"] .= $data[84] ;
$myarray["sb1relationship"] .= $data[85] ;
$myarray["sb1percentshare"] .= $data[86] ;
$myarray["sb1SSN"] .= $data[87] ;
$myarray["sb1birthdate"] .= $data[88] ;
$myarray["sb1phone"] .= $data[89] ;
$myarray["sb1saddress"] .= $data[90] ;
$myarray["sb1city"] .= $data[91] ;
$myarray["sb1state"] .= $data[92] ;
$myarray["sb1zip"] .= $data[93] ;
$myarray["sb2name"] .= $data[94] ;
$myarray["sb2relationship"] .= $data[95] ;
$myarray["sb2percentshare"] .= $data[96] ;
$myarray["sb2SSN"] .= $data[97] ;
$myarray["sb2birthdate"] .= $data[98] ;
$myarray["sb2phone"] .= $data[99] ;
$myarray["sb2saddress"] .= $data[100] ;
$myarray["sb2city"] .= $data[101] ;
$myarray["sb2state"] .= $data[102] ;
$myarray["sb2zip"] .= $data[103] ;

  }

//echo $myarray["lname"];
//echo ("No") ;
//echo $myarray["email"];
//echo $myarray["paccttype"];

//Is it Qualified or Non Qualified
if ($myarray[paccttype] == "Qualified") {
echo "Work in Progress" ;
  }
elseif ($myarray[paccttype] == "Non Qualified") {
     include ("create-new-application-fdf.php") ;
     include ("create-accredited-investor-ack-fdf.php") ;
     include "create-suitability-ack-fdf.php" ;
     include "create-beneficiary-designation-fdf.php" ;
     include "create-purchase-agreement-fdf.php" ;

     createNewApplicationfdf($myarray);
     createAccreditedInvestorAckfdf($myarray);
     createSuitabilityAckfdf($myarray);
     createBeneficiaryDesignationfdf($myarray);
     createPurchaseAgreementfdf($myarray) ;

system('pdftk /home/capstone/forms/NQappform.pdf fillform /home/capstone/forms/new-app-fdf output /home/capstone/forms/NQappformfilled.pdf') ;

system('pdftk /home/capstone/forms/NQaccredinvack.pdf fillform /home/capstone/forms/AccrInvAck-fdf output /home/capstone/forms/NQaccredinvackfilled.pdf') ;

system('pdftk /home/capstone/forms/NQbenefdesig.pdf fillform /home/capstone/forms/BenefDesig-fdf output /home/capstone/forms/NQbenefdesigfilled.pdf') ;

system('pdftk /home/capstone/forms/NQpuragmt.pdf fillform /home/capstone/forms/PurAgmt-fdf output /home/capstone/forms/NQpuragmtfilled.pdf') ;

system('pdftk /home/capstone/forms/NQsuitack.pdf fillform /home/capstone/forms/SuitAck-fdf output /home/capstone/forms/NQsuitackfilled.pdf') ;

system('pdftk /home/capstone/forms/NQappformfilled.pdf /home/capstone/forms/payment-info-sheet.pdf /home/capstone/forms/NQsuitackfilled.pdf /home/capstone/forms/NQaccredinvackfilled.pdf /home/capstone/forms/NQbenefdesigfilled.pdf /home/capstone/forms/NQpuragmtfilled.pdf cat output /home/capstone/forms/fullform.pdf') ;

include ('send-pdf-by-email.php');
Send_Pdf_By_Email($myarray);

  }

//}

//Call pdftk for all the fdfs

include ('send-to-docusign5.php');
SendToDocusign($myarray) ;
//Call Docusign - create envelope, add all the relevant docs, send
// it to the client for signing via email 
// Include the illustration.pdf also in this same envelope
// Include the Payment Information Sheet also in the envelope
// (does not need signature)
}

fclose($formfile1);

               }





?>
