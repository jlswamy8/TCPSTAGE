<?php
// User Input
$requestor_name = $_POST[requestor_name];
$requestor_email =  $_POST[requestor_email];
$date_of_request = $_POST[date_of_request];
$date_when_required = $_POST[date_when_required];
$cap_raise_name = $_POST[cap_raise_name];
$subscriber_type = $_POST[subscriber_type];
$tax_status = $_POST[tax_status];
$illustration_header_name = $_POST[illustration_header_name];
$investment_amount = $_POST[investment_amount];
$subscriber_full_name = $_POST[subscriber_full_name];
$year_born = $_POST[year_born];
$street_address = $_POST[street_address];
$city = $_POST[city];
$zip = $_POST[zip];
$phone = $_POST[phone];
$email = $_POST[email];

//Known static data
$rows = array(
 array("2413445","59","0.6340"),
 array("8000000","50","0.6172"),
 array("500000","76","0.7807"),
 array("500000","76","0.7807"),
 array("1500000","51","0.5307"),
 array("3523035","55","0.5723"),
 array("7760000","70","0.7415")
);

//Calculated data

setlocale(LC_MONETARY, 'en_US');

$totalfaceamount = 0;
$subscription_amount = $investment_amount ;
$total_maturity_distribution = 0;
for ($i=0;$i<7;$i++){
$totalfaceamount = $totalfaceamount + $rows[$i][0]; 
}
for ($i=0;$i<7;$i++){
 $percentportfolio = round( $rows[$i][0]*100/$totalfaceamount ,2);
 $total_yield = round($total_yield + ($rows[$i][2]),2) ;  
 $LEplus2 = $rows[$i][1] + 24 ;
 $totalLE = $totalLE + $rows[$i][1];
 $totalLEplus2 = $totalLEplus2 +$LEplus2 ;
 $sub_participation = round($subscription_amount * $percentportfolio/100,2) ;
 $maturity_distribution = round((1+$rows[$i][2])*$sub_participation,2);
 $total_maturity_distribution = $total_maturity_distribution + $maturity_distribution;
//column index 3
 $rows[$i][] = $percentportfolio." %" ;
//column index 4
 $rows[$i][] =  $LEplus2 ;
//column index 5
 $rows[$i][] =  money_format('%(#8n',$sub_participation) ;
// column index 6
 $rows[$i][] =  money_format('%(#8n', $maturity_distribution) ;
}
// Note : Order is important
// Cannot calculate after money_format is applied
$totalportfoliopercent = "100.00 %";
$avg_LE = round($totalLE/7 ,2);
$avg_LEplus2 = round($totalLEplus2/7 ,2);
$avg_yield = round(($total_maturity_distribution - $subscription_amount)*100/$subscription_amount ,2);
//$total_cost = money_format('%(#8n',round($totalfaceamount/(1+($avg_yield) ,2));
$total_cost = money_format('%(#8n',$subscription_amount);
$avg_yield = round(($total_maturity_distribution - $subscription_amount)*100/$subscription_amount ,2)." %";
$participation_percent = round($subscription_amount*100/$totalfaceamount ,2)." %";
$totalfaceamount = money_format('%(#8n', $totalfaceamount);
$total_maturity_distribution = money_format('%(#8n', $total_maturity_distribution);
$subscription_amount = money_format('%(#8n', $subscription_amount);

include ('fillfdf.php');
//fillfdf($rows);
?>
