<?php   

function createSuitabilityAckfdf($myarray){
error_reporting(E_ERROR);
//echo "yes" ;
$fdffile1 = fopen("/home/capstone/forms/SuitAck-fdf", 'w');
if($fdffile1){

//common to all FDFs
fwrite($fdffile1, "%FDF-1.2\r\n") ;
fwrite($fdffile1, "%����\r\n") ;
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
fwrite($fdffile1, "/T (p_lastname)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pfname])\r\n");
fwrite($fdffile1, "/T (p_firstname)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pmname])\r\n");
fwrite($fdffile1, "/T (p_middlename)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[psaddress])\r\n");
fwrite($fdffile1, "/T (p_address)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pcity])\r\n");
fwrite($fdffile1, "/T (p_city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pstate])\r\n");
fwrite($fdffile1, "/T (p_state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pzip])\r\n");
fwrite($fdffile1, "/T (p_ZIP)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[phomephone])\r\n");
fwrite($fdffile1, "/T (p_home_phone)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pdaytimephone])\r\n");
fwrite($fdffile1, "/T (p_daytime_phone)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pbdate])\r\n");
fwrite($fdffile1, "/T (p_birthdate)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pSSN])\r\n");
fwrite($fdffile1, "/T (p_ssn)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pemail])\r\n");
fwrite($fdffile1, "/T (p_email)\r\n");
fwrite($fdffile1, ">>\r\n");

// Joint Owner
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jlname])\r\n");
fwrite($fdffile1, "/T (joint_lastname)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jfname])\r\n");
fwrite($fdffile1, "/T (joint_firstname)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jmname])\r\n");
fwrite($fdffile1, "/T (joint_middle)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jsaddress])\r\n");
fwrite($fdffile1, "/T (joint_address)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jcity])\r\n");
fwrite($fdffile1, "/T (joint_city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jstate])\r\n");
fwrite($fdffile1, "/T (joint_state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jzip])\r\n");
fwrite($fdffile1, "/T (joint_ZIP)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jhomephone])\r\n");
fwrite($fdffile1, "/T (joint_home_phone)\r\n");
fwrite($fdffile1, ">>\r\n"); 
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jdaytimephone])\r\n");
fwrite($fdffile1, "/T (joint_daytime_phone)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jbirthdate])\r\n");
fwrite($fdffile1, "/T (joint_birthdate)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jSSN])\r\n");
fwrite($fdffile1, "/T (joint_ssn)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[jemail])\r\n");
fwrite($fdffile1, "/T (joint_email)\r\n");
fwrite($fdffile1, ">>\r\n");

// TRUST
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[trustname])\r\n");
fwrite($fdffile1, "/T (trust_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[trusteename])\r\n");
fwrite($fdffile1, "/T (trustee_name)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tstreetaddress])\r\n");
fwrite($fdffile1, "/T (trust_address)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tcity])\r\n");
fwrite($fdffile1, "/T (trust_city)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tstate])\r\n");
fwrite($fdffile1, "/T (trust_state)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tzip])\r\n");
fwrite($fdffile1, "/T (trust_ZIP)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tphone])\r\n");
fwrite($fdffile1, "/T (trust_home_phone)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[tphone])\r\n");
fwrite($fdffile1, "/T (trust_daytime_phone)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[trustdate])\r\n");
fwrite($fdffile1, "/T (date_of_trust)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[ttaxid])\r\n");
fwrite($fdffile1, "/T (trust_tax_id_num)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[temail])\r\n");
fwrite($fdffile1, "/T (trust_email)\r\n");
fwrite($fdffile1, ">>\r\n");

//PHOTO IDENTIFICATION
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pidtype])\r\n");
fwrite($fdffile1, "/T (type_of_id)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pidnum])\r\n");
fwrite($fdffile1, "/T (id_num)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pissuer])\r\n");
fwrite($fdffile1, "/T (issuing_jurisdiction)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pexpdate])\r\n");
fwrite($fdffile1, "/T (expiry_date)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pissuedate])\r\n");
fwrite($fdffile1, "/T (issue_date)\r\n");
fwrite($fdffile1, ">>\r\n");

// FINANCIAL INFORMATION 
$radiochoice = "Yes" ;
if ($myarray[paccttype] == "Non Qualified") {
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($radiochoice)\r\n");
fwrite($fdffile1, "/T (nonqualified)\r\n");
fwrite($fdffile1, ">>\r\n");
}
if ($myarray[paccttype] == "Qualified") {
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($radiochoice)\r\n");
fwrite($fdffile1, "/T (qualified)\r\n");
fwrite($fdffile1, ">>\r\n");
}
if ($myarray[pacctown] == "Individual") {
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($radiochoice)\r\n");
fwrite($fdffile1, "/T (individual)\r\n");
fwrite($fdffile1, ">>\r\n");
}
if ($myarray[pacctown] == "Joint Owners") {
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($radiochoice)\r\n");
fwrite($fdffile1, "/T (joint_owners)\r\n");
fwrite($fdffile1, ">>\r\n");
}
if ($myarray[pacctown] == "Trust") {
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($radiochoice)\r\n");
fwrite($fdffile1, "/T (trust)\r\n");
fwrite($fdffile1, ">>\r\n");
}
fwrite($fdffile1, "<<\r\n");
fwrite($fdffile1, "/V ($myarray[pnetworth])\r\n");
fwrite($fdffile1, "/T (household_net_worth)\r\n");
fwrite($fdffile1, ">>\r\n");


//echo $myarray[pgrossincome] ;
fwrite($fdffile1, "<<\r\n");
if($myarray[pgrossincome] == "249000"){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_level1)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pgrossincome]=="300000") {
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_level2)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pgrossincome]=="400000"){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_level3)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pgrossincome]=="400000plus"){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_level4)\r\n");
fwrite($fdffile1, ">>\r\n");
// Liquidity
fwrite($fdffile1, "<<\r\n");
if($myarray[pliquidity] == "Yes"){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (explain_liquidity_yes)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pliquidity] == "No"){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (explain_liquidity_no)\r\n");
fwrite($fdffile1, ">>\r\n");
//Emerhgency
fwrite($fdffile1, "<<\r\n");
if($myarray[pemergency] == "Yes"){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (have_liquidity_yes)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pemergency] == "No"){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (have_liquidity_no)\r\n");
fwrite($fdffile1, ">>\r\n");
//Income Tax Bracket
fwrite($fdffile1, "<<\r\n");
if($myarray[ptaxbracket] == '0'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_tax_level1)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[ptaxbracket] == '10'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_tax_level2)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[ptaxbracket] == '15'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_tax_level3)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[ptaxbracket] == '25'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_tax_level4)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[ptaxbracket] == '28'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_tax_level5)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[ptaxbracket] == '35'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_tax_level6)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[ptaxbracket] == 'Other'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_tax_level7)\r\n");
fwrite($fdffile1, ">>\r\n");

// Source of Income
fwrite($fdffile1, "<<\r\n");
//if($myarray[pincomesource] == 'Current Wages'){
if(strpos($myarray[pincomesource],'Current Wages') !== false){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_source_wages)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pincomesource],'Plan or IRA') !== false){
//if($myarray[pincomesource] == 'Plan or IRA'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_source_ira)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pincomesource],'Investment Income') !== false){
//if($myarray[pincomesource] == 'Investment Income'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_source_investment)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pincomesource],'Social Security') !== false){
//if($myarray[pincomesource] == 'Social Security'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_source_social_sec)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");

if(strpos($myarray[pincomesource],'Other') !== false){
//if($myarray[pincomesource] == 'Other'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_source_other)\r\n");
fwrite($fdffile1, ">>\r\n");

// Expenses greater than Income
fwrite($fdffile1, "<<\r\n");
if($myarray[pexpoverincome] == 'Yes'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (expenses_income_yes)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pexpoverincome] == 'No'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (expenses_income_no)\r\n");
fwrite($fdffile1, ">>\r\n");

// Change in income
fwrite($fdffile1, "<<\r\n");
if($myarray[pincchange] == 'Yes'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_change_yes)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pincchange] == 'No'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (income_change_no)\r\n");
fwrite($fdffile1, ">>\r\n");

// Change in expenses
fwrite($fdffile1, "<<\r\n");
if($myarray[pexpchange] == 'Yes'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (expense_change_yes)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if($myarray[pexpchange] == 'No'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (expense_change_no)\r\n");
fwrite($fdffile1, ">>\r\n");

// Financial Objectives
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pfinobj], 'Long Term Growth') !== false){
//if($myarray[pfinobj] == 'Long Term Growth'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (objective_growth)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pfinobj], 'Investment Income') !== false){
//if($myarray[pfinobj] == 'Investment Income'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (objective_income)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pfinobj], 'Pass on to heirs') !== false){
//if($myarray[pfinobj] == 'Pass on to heirs'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (objective_heirs)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pfinobj], 'Retirement Income') !== false){
//if($myarray[pfinobj] == 'Retirement Income'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (objective_retirement_income)\r\n");
fwrite($fdffile1, ">>\r\n");
fwrite($fdffile1, "<<\r\n");
if(strpos($myarray[pfinobj], 'Other') !== false){
//if($myarray[pfinobj] == 'Other'){
fwrite($fdffile1, "/V (Yes)\r\n");
}
else{
fwrite($fdffile1, "/V (Off)\r\n");
}
fwrite($fdffile1, "/T (objective_other)\r\n");
//

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
