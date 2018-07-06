<?php   

function createNewApplicationfdf($myarray){
//error_reporting(E_ERROR);
//echo "yes" ;
$fdffile1 = fopen("/home/capstone/forms/new-app-fdf", 'w');
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
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[plname])\r\n");
fwrite($fdffile1, "/T (LAST)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pfname])\r\n");
fwrite($fdffile1, "/T (FIRST)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pmname])\r\n");
fwrite($fdffile1, "/T (MIDDLE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[psaddress])\r\n");
fwrite($fdffile1, "/T (STREET ADDRESS)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pcity])\r\n");
fwrite($fdffile1, "/T (CITY)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pstate])\r\n");
fwrite($fdffile1, "/T (STATE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pzip])\r\n");
fwrite($fdffile1, "/T (ZIP)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[phomephone])\r\n");
fwrite($fdffile1, "/T (HOME TELEPHONE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pdaytimephone])\r\n");
fwrite($fdffile1, "/T (DAYTIME TELEPHONE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pbdate])\r\n");
fwrite($fdffile1, "/T (BIRTH DATE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pSSN])\r\n");
fwrite($fdffile1, "/T (SSN)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pemail])\r\n");
fwrite($fdffile1, "/T (EMAIL ADDRESS)\r\n");
fwrite($fdffile1, ">>\r\n");

// Joint Owner
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jlname])\r\n");
fwrite($fdffile1, "/T (JOINT LAST)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jfname])\r\n");
fwrite($fdffile1, "/T (JOINT FIRST)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jmname])\r\n");
fwrite($fdffile1, "/T (JOINT MIDDLE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jsaddress])\r\n");
fwrite($fdffile1, "/T (JOINT STREET ADDRESS)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jcity])\r\n");
fwrite($fdffile1, "/T (JOINT CITY)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jstate])\r\n");
fwrite($fdffile1, "/T (JOINT STATE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jzip])\r\n");
fwrite($fdffile1, "/T (JOINT ZIP)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jhomephone])\r\n");
fwrite($fdffile1, "/T (JOINT HOME TELEPHONE)\r\n");
fwrite($fdffile1, ">>\r\n"); 
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jdaytimephone])\r\n");
fwrite($fdffile1, "/T (JOINT DAYTIME TELEPHONE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jbirthdate])\r\n");
fwrite($fdffile1, "/T (JOINT BIRTH DATE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jSSN])\r\n");
fwrite($fdffile1, "/T (JOINT SSN)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jemail])\r\n");
fwrite($fdffile1, "/T (JOINT EMAIL ADDRESS)\r\n");
fwrite($fdffile1, ">>\r\n");

// TRUST
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[trustname])\r\n");
fwrite($fdffile1, "/T (TRUST NAME)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[trusteename])\r\n");
fwrite($fdffile1, "/T (TRUSTEE NAME)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tstreetaddress])\r\n");
fwrite($fdffile1, "/T (TRUST STREET ADDRESS)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tcity])\r\n");
fwrite($fdffile1, "/T (TRUST CITY)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tstate])\r\n");
fwrite($fdffile1, "/T (TRUST STATE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tzip])\r\n");
fwrite($fdffile1, "/T (TRUST ZIP)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tphone])\r\n");
fwrite($fdffile1, "/T (TRUST HOME TELEPHONE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tphone])\r\n");
fwrite($fdffile1, "/T (TRUST DAYTIME TELEPHONE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[trustdate])\r\n");
fwrite($fdffile1, "/T (DATE OF TRUST)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[ttaxid])\r\n");
fwrite($fdffile1, "/T (TRUST TAX ID NUMBER)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[temail])\r\n");
fwrite($fdffile1, "/T (TRUST EMAIL ADDRESS)\r\n");
fwrite($fdffile1, ">>\r\n");

//PHOTO IDENTIFICATION
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pidtype])\r\n");
fwrite($fdffile1, "/T (TYPE OF ID)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pidnum])\r\n");
fwrite($fdffile1, "/T (ID NUMBER)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pissuer])\r\n");
fwrite($fdffile1, "/T (ISSUING JURISDICTION)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pexpdate])\r\n");
fwrite($fdffile1, "/T (EXPIRATION DATE)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pissuedate])\r\n");
fwrite($fdffile1, "/T (ISSUE DATE)\r\n");
fwrite($fdffile1, ">>\r\n");

// ESTABLISHING THE ACCOUNT
fwrite($fdffile1, "<<\r\n");
if($myarray[paccttype] == 'Non Qualified'){
fwrite($fdffile1, "/V (On)\r\n");
}
else {
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (NonQualified)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[paccttype] == 'Qualified'){
fwrite($fdffile1, "/V (On)\r\n");
}
else {
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (Qualified)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pacctown] == 'Individual'){
fwrite($fdffile1, "/V (On)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (Individual)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pacctown] == 'Joint Owners'){
fwrite($fdffile1, "/V (On)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (Joint Owners)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pacctown] == 'Trust'){
fwrite($fdffile1, "/V (On)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (Trust)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pacctfunding],'Cash') !== false){
fwrite($fdffile1, "/V (On)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (Cash)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pacctfunding], 'Will Wire Funds') !== false){
fwrite($fdffile1, "/V (On)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (Expected Amount)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pamtwapp])\r\n");
fwrite($fdffile1, "/T (Amount with application)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[ptotalamt])\r\n");
fwrite($fdffile1, "/T (Wire Amount)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pfundswiredt])\r\n");
fwrite($fdffile1, "/T (Wire Date)\r\n");

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
