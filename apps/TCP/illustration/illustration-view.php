<?php
// Template Name: Browse Investments Sep
// get_header(); 
?>  
<!--jQuery dependencies commented out as these are already included by the revolution slider -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" /> 
    <link rel="stylesheet" href="/apps/TCP/css/cap-w3.css" /> 
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> 
<?php 
//if(function_exists('pf_show_link')){echo pf_show_link();} 
?>


<script>
var table_title = "CURRENT SENIOR LIFE SETTLEMENT PORTFOLIO OFFERED AS OF : JUNE 15 2016";
var name_label = "Subscriber Name : " ;
var subscriber_name = "Kevin Dicke" ;
var amount_label = "Subscription Amount : " ;
var subscription_amount = "100000" ;
var participation_label = "% Participation in the Portfolio" ;
var participation_percent = 0 ;
var maturity_label = "Total Projected Yield to Maturity" ;
var sls_label = "SENIOR LIFE SETTLEMENT PORTFOLIO INFORMATION" ;
var insured_label = "INSURED INFORMATION" ;
var policy_label = "SLS Policy Code" ;
var face_label = "Face Amount" ;
var percent_label = "% of Portfolio" ;
var carrier_label = "Insurance Carrier"
var rating_label = "AM Best Credit Rating" ;
var age_label = "Age & Gender" ;
var LE_label = "Life Expectancy (LE) in months" ;
var PRM_label = "LE + 24 months Premium Reserve";
var sub_participation_label = "Cost Basis Subscriber Participation";
var yield_label = "Total Projected Yield %";
var distribution_label = "Subscriber Distribution at Maturity";
var policy = new Array(7);
policy[0] = ["RS73290J", "2413445","ReliaStar Life","A", "81M","59","0.634" ];
policy[1] = ["PL535955", "8000000","Phoenix Life","B", "80M","50","0.6172" ];
policy[2] = ["GL040083", "500000","Genworth Life","A", "77M","76","0.7807" ];
policy[3] = ["GL040084", "500000","Genworth Life","A", "77M","76","0.7807" ];
policy[4] = ["LN152041", "1500000","Lincoln National Life","A+", "79M","51","0.5307" ];
policy[5] = ["TL503162", "3523035","Transamerica Life","A+", "79F","55","0.5723" ];
policy[6] = ["LN431575", "7760000","Lincoln National Life","A+", "82F","70","0.7415" ];

var total_face_value = 0 ;;
var LEplus2 = 0 ;
var sub_participation = 0;
var maturity_distribution = 0;
var total_maturity_distribution = 0 ;
var totalLE = 0;
var totalLEplus2 = 0;
var total_yield = 0 ;

for (i = 0; i < 7;  i++){
        	    total_face_value = total_face_value + Number(policy[i][1]) ;			
			}

participation_percent = subscription_amount/total_face_value ;

for (i = 0; i < 7;  i++){
            total_yield = total_yield + Number(policy[i][6]) ;  
      	    percent_portfolio = Number(policy[i][1])/total_face_value ;
						policy[i].splice(2,0,percent_portfolio);
						LEplus2 = Number(policy[i][6]) + 24 ;
						totalLE = totalLE + Number(policy[i][6]);
						totalLEplus2 = totalLEplus2 + LEplus2 ;
						policy[i].splice(7,0,LEplus2);
						sub_participation = Number(subscription_amount) * percent_portfolio ;
						policy[i].splice(8,0,sub_participation) ;
						maturity_distribution = (1+ Number(policy[i][9]))*sub_participation;
						policy[i][10] = maturity_distribution;		
						total_maturity_distribution = total_maturity_distribution + maturity_distribution;	
			}	
var avg_LE = totalLE/7 ;
var avg_LEplus2 = totalLEplus2/7 ;
var avg_yield = total_yield/7 ;

function calculate_values () {
    var subscription_amount = <?php echo $_POST[investment_amount]; ?> ;

    if (isNaN(subscription_amount)) {
        alert("Oops - subscription amount is not a number");
    } 
		else {
		
		var myTable = document.getElementById("portfolio_table");
    myTable.rows[17].cells[8].innerHTML = "$ " + Number(subscription_amount).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");	
		
		participation_percent = subscription_amount/total_face_value ;
		myTable.rows[4].cells[1].innerHTML = (100*Number(participation_percent)).toFixed(4) + " %";	
		
		total_maturity_distribution =0 ;
		
		for (i = 0; i < 7;  i++){
		
						sub_participation = Number(subscription_amount) * Number(policy[i][2]) ;
						myTable.rows[i+8].cells[8].innerHTML = "$ " + Number(sub_participation).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
						maturity_distribution = (1+ Number(policy[i][9]))*sub_participation;
						myTable.rows[i+8].cells[10].innerHTML = "$ " + Number(maturity_distribution).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");		
						total_maturity_distribution = total_maturity_distribution + maturity_distribution;	
						
			}
			myTable.rows[17].cells[10].innerHTML = "$ " + Number(total_maturity_distribution).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
			myTable.rows[4].cells[3].innerHTML = "$ " + Number(total_maturity_distribution).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
			
		}
}
</script>    



<div class= "w3-container w3-margin w3-border w3-round-jumbo w3-responsive">

<table class="w3-table-all w3-hoverable" id="portfolio_table" border=1 cellpadding=0 cellspacing=0 style='border-collapse:
 collapse;table-layout:fixed;width=100%'>
<tr class = "w3-lime">
<td colspan = 11 height = 17 class="w3-center"><script> document.write(table_title); </script></td>
</tr>
<tr>
<td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
</tr>
<tr>
<td colspan = 2 class="w3-center"> Subscriber Name: </td><td colspan = 5 class="w3-orange w3-xxlarge w3-center"> <?php echo $_POST[subscriber_full_name];  ?></td><td colspan = 2 class="w3-center"> Subscription Amount </td><td colspan = 2 class="w3-orange w3-large"> <?php echo $_POST[investment_amount]; ?> 
</td>
</tr>
<tr>
<td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
</tr>
<tr>
<td colspan = 2 class="w3-center"> % participation in the portfolio </td><td colspan = 5 class="w3-orange w3-xxlarge w3-center"> <script>document.write((participation_percent*100).toFixed(2) + " %"); </script> </td><td colspan = 2 class="w3-center"> Total Projected Yield to Maturity </td><td colspan = 2 class="w3-orange w3-xlarge"> <script>document.write("$ " + total_maturity_distribution.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script> </td>
</tr>
<tr>
<td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
</tr>
<tr class="w3-lime">
<td colspan = 5 class = "w3-border-right w3-center">SENIOR LIFE SETTLEMENT PORTFOLIO INFORMATION </td><td colspan = 6 class="w3-center">INSURED INFORMATION </td>
</tr>

<tr class = "w3-lime">
<td> SLS Policy Code</td><td> Face Amount </td><td>% of Portfolio </td><td>Insurance Carrier </td><td class="w3-border-right w3-center"> AM Best Credit Rating </td><td class="w3-center">Age and Gender </td><td class="w3-center"> Life Expectancy (LE) in months</td><td class="w3-center"> LE + 24 months Premium Reserve</td><td>Cost Basis Subscriber Participation </td><td>Total Projected Yield % </td><td>Subscriber Distribution at Maturity </td>
</tr>
<tr class = "w3-orange">
<td><script>i = 0; j = 0; document.write(policy[i][j]);</script></td><td><script>document.write("$ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
</tr>
<tr>
<td><script>i = 1; j = 0; document.write(policy[i][j]);</script></td><td><script>document.write("$ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
</tr>
<tr class="w3-orange">
<td><script>i = 2; j = 0; document.write(policy[i][j]);</script></td><td><script>document.write("$ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
</tr>
<tr>
<td><script>i = 3; j = 0; document.write(policy[i][j]);</script></td><td><script>document.write("$ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
</tr>
<tr class="w3-orange">
<td><script>i = 4; j = 0; document.write(policy[i][j]);</script></td><td><script>document.write("$ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
</tr>
<tr>
<td><script>i = 5; j = 0; document.write(policy[i][j]);</script></td><td><script>document.write("$ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
</tr>
<tr class="w3-orange">
<td><script>i = 6; j = 0; document.write(policy[i][j]);</script></td><td><script>document.write("$ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
</tr>
<tr>
<td> </td><td> </td><td> </td><td> </td><td class="w3-border-right"> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
</tr>
<tr>
<td> </td><td> </td><td> </td><td> </td><td class="w3-border-right"> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
</tr>

<tr class="w3-lime">
<td>TOTALS: </td><td><script>document.write("$ " + (Number(total_face_value)).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script> </td><td> 100 % </td><td> </td><td class="w3-border-right"> </td><td> AVERAGES: </td><td><script> document.write(avg_LE.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script> </td><td><script>document.write(avg_LEplus2.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script> </td><td><script>document.write("$ " + (Number(subscription_amount)).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));</script> </td><td><script> document.write(avg_yield*100 +" %");</script> </td><td><script>document.write("$ " + total_maturity_distribution.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")) </script></td>
</tr>

</table>

</div>


<p>
Life expectancy (LE) is the average of at least two Life Expectancies as of the Life Certification Dates provided by licensed medical underwriters.
</p><p>
Additional premium capital calls may be necessary to maintain policies only in the event of an outright default of the Premium Reserve Management Company.
This could decrease the overall yield.</p><p>  The Dicke Company Policy Protection Trust has executed Policy Purchase Agreements for the policies set forth above.</p><p>
However, the current owner(s) can withdraw policies until the insurance carriers complete the ownership change in their official company records.
The policies may no longer be available by the time Subscriber funds are available to participate in the policies.  If the policies are withdrawn or are fully
particpated/subscribed before Subscription Funds are available to participate, then the Subscriber's funds will remain in escrow until a new,
similar portfolio is identified and purchased.  At that time, the Subscriber will receive a Policy Disclosure Statement ("PDS") setting forth the policies
that the Subscriber is participating in or subscribing to and the Subscriber will have ten (10) calendar days after delivery to review the PDS with the right 
of full rescission. </p><p>  AM Best is a nationally known credit ratings agency with an emphasis on the insurance industry.   The associated credit ratings are a gauge 
of the likelihood of a credit default.

</p>

<?php 
//get_footer();  
?>

<!-- Omit closing PHP tag to avoid "Headers already sent" issues.-->
