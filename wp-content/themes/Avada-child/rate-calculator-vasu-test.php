<?php
/**
    * Template Name: Rate Calculator.
 */
get_header(); ?>

            
                <script>
                    var table_title = "CURRENT SENIOR LIFE SETTLEMENT PORTFOLIO OFFERED AS OF : SEPT 15 2017";
                    var name_label = "Subscriber Name : " ;
                    var subscriber_name = "" ;
                    var amount_label = "Subscription Amount : " ;
                    var subscription_amount = "500000" ;
                    var participation_label = "% Participation of Raise" ;
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
                    var sub_participation_label = "Subscriber Cost Basis";
                    var yield_label = "Total Projected Yield %";
                    var distribution_label = "Subscriber Distribution at Maturity";
                    var policy = new Array(8);
                    policy[0] = ["PL8400","2000000","Pacific Life","A+","76M","87","0.8951"];
                    policy[1] = ["WC9122","2239975","West Coast Life","A+","80M","67","0.6971"];
                    policy[2] = ["LB8373","5000000","Lincoln Benefit Life","A-","84F","54","0.5619"];
                    policy[3] = ["TL6501","1421000","Transamerica Life","A+","81M","66","0.6867"];
                    policy[4] = ["AX0890","4750000","AXA Equitable Life","A","76F","75","0.7703"];
                    policy[5] = ["MM0438","1750000","MassMutual","A++","73M","67","0.6971"];
                    policy[6] = ["RS245H","969351","ReliaStar Life","A","82M","53","0.5515"];
                    policy[7] = ["LB6900","2000000","Lincoln Benefit Life","A-","82F","46","0.4787"];
                    var total_face_value = 0 ;;
                    var LEplus2 = 0 ;
                    var sub_participation = 0;
                    var maturity_distribution = 0;
                    var total_maturity_distribution = 0 ;
                    var totalLE = 0;
                    var totalLEplus2 = 0;
                    var total_yield = 0 ;
                    var total_cost = 0 ;

                    for (i = 0; i < 8;  i++){
                        total_face_value = total_face_value + Number(policy[i][1]) ;            
                    }

                    for (i = 0; i < 8;  i++){
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
                    var avg_LE = totalLE/8 ;
                    var avg_LEplus2 = totalLEplus2/8 ;
                    //var avg_yield = total_yield/8 ;
                    var avg_yield = (total_maturity_distribution - subscription_amount)/subscription_amount ;
                    total_cost = total_face_value/(1+avg_yield) ;
                    //total_cost = 14231000;
                    participation_percent = subscription_amount/total_cost ;

                    var inputTable = document.getElementById("input_table");
                    subscription_amount = inputTable.rows[0].cells[3].innerHTML ;
                    subscriber_name = inputTable.rows[0].cells[1].innerHTML ;


                    function calculate_values (form) {
                        subscription_amount = form.inputamt.value;
                        subscriber_name = form.name.value ;

                        if (isNaN(subscription_amount)) {
                            alert("Please enter a number with no commas");
                        } 
                            else {
                        if(subscription_amount > total_cost) {
                            alert("Please enter a smaller number. Maximum investment in this portfolio is $ " + total_cost.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                            return;
                        }
                            cost_participation = subscription_amount / total_cost ;
                            var myTable = document.getElementById("portfolio_table");

                        myTable.rows[2].cells[3].innerHTML = "$ " + Number(subscription_amount).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        myTable.rows[2].cells[1].innerHTML = subscriber_name;
                        myTable.rows[18].cells[8].innerHTML = "$ " + Number(subscription_amount).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"); 
                            
                            participation_percent = subscription_amount/total_cost ;
                            myTable.rows[4].cells[1].innerHTML = (100*Number(participation_percent)).toFixed(4) + " %"; 
                            
                            total_maturity_distribution =0 ;
                            
                            for (i = 0; i < 8;  i++){
                            
                    //      sub_participation = (Number(subscription_amount) * Number(policy[i][2]))/(1 + Number(policy[i][9]))  ;
                    //      myTable.rows[i+8].cells[8].innerHTML = "$ " + Number(sub_participation).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    //      maturity_distribution = (1+ Number(policy[i][9]))*sub_participation;
                            maturity_distribution = (Number(policy[i][1]))*cost_participation;
                     
                            sub_participation = maturity_distribution/(1 + Number(policy[i][9]))  ;
                            myTable.rows[i+8].cells[10].innerHTML = "$ " + Number(maturity_distribution).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");     
                            myTable.rows[i+8].cells[8].innerHTML = "$ " + Number(sub_participation).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                            total_maturity_distribution = total_maturity_distribution + maturity_distribution;  
                                            
                                }
                                //total_maturity_distribution = Math.round(total_maturity_distribution);
                                myTable.rows[18].cells[10].innerHTML = "$ " + Number(total_maturity_distribution).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                myTable.rows[4].cells[5].innerHTML = "$ " + Number(total_maturity_distribution).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

                    avg_yield = (total_maturity_distribution - subscription_amount)/subscription_amount ;
                                
                            }
                    }
                    </script>    
                    <?php if (function_exists('pf_show_link')) {
    echo pf_show_link();
} ?>
                    <div class= "w3-container w3-responsive">
                        <form id = "input-form" ACTION="" METHOD="GET">
                            <table class="w3-table-all w3-hoverable" id="input_table" border=0 cellpadding=0 cellspacing=0 style='border-collapse:collapse;table-layout:fixed;width=100%'>
                            <tr>
                                <td class="w3-center w3-padding-16">Name:</td>
                                <td class="w3-center w3-padding-16"><input type="text" placeholder="Name" id="name" size = "20" ></td>
                                <td class="w3-center w3-padding-16">Subscription Amount:</td>
                                <td class="w3-center w3-padding-16"><input type="text" placeholder="Subscription Amount" id="inputamt" size = "12"></td>
                                <td class="w3-center w3-padding-16"><INPUT TYPE="button" NAME="button" Value="ReCalculate" onClick="calculate_values(this.form)"></td>
                            </tr>
                            </table>
                        </form>
                    </div>


                    <div class= "w3-container w3-margin w3-border w3-round-jumbo w3-responsive">

                        <table class="w3-table-all w3-hoverable" id="portfolio_table" border=0 cellpadding=0 cellspacing=0 style='border-collapse: collapse;table-layout:fixed;width=100%'>
                            <tr class = "w3-lime">
                            <td colspan = 13 height = 17 class="w3-center"><script> document.write(table_title); </script></td>
                            </tr>
                            <tr>
                            <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                            </tr>
                            <tr>
                            <td colspan = 2 class="w3-center w3-padding-16 w3-grey"> Subscriber Name: </td><td colspan = 6 class="w3-orange w3-xlarge w3-center w3-padding-16"><script>document.write(subscriber_name); </script></td><td colspan = 2 class="w3-center w3-padding-16"> Subscription Amount </td><td colspan = 4 class="w3-orange w3-xlarge w3-center w3-padding-16"> <script>document.write("$ " + subscription_amount); </script> </td>
                            </tr>
                            <tr>
                            <td> </td><td> </td><td> </td> <td> </td><td> </td><td> </td> <td> </td><td> </td> <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                            </tr>
                            <tr>
                            <td colspan = 2 class="w3-center w3-grey"> % Participation Of Raise </td><td colspan = 2 class="w3-orange w3-xlarge w3-center w3-padding-16"> <script>document.write((participation_percent*100).toFixed(2) + " %"); </script> </td><td colspan = 2 class ="w3-right-align w3-padding-16">  Total YTM</td> <td colspan = 3 class="w3-orange w3-xlarge w3-center w3-padding-16"><script> document.write((avg_yield*100).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +" %");</script> </td><td colspan = 2 class = "w3-right-align w3-padding-16"> Total Payout</td><td colspan = 3 class="w3-orange w3-xlarge w3-padding-16 w3-center"> <script>document.write("$ " + total_maturity_distribution.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script> </td>
                            </tr>
                            <tr>
                            <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td> <td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                            </tr>
                            <tr class="w3-lime">
                            <td colspan = 6 class = "w3-border-right w3-center">SENIOR LIFE SETTLEMENT PORTFOLIO INFORMATION </td><td colspan = 8 class="w3-center">INSURED INFORMATION </td>
                            </tr>

                            <tr class = "w3-lime">
                            <td> SLS Policy Code</td><td class = "w3-center" colspan = 2> Face Amount </td><td>% of Portfolio </td><td colspan = 1>Insurance Carrier </td><td class="w3-border-right w3-center"> AM Best Credit Rating </td><td class="w3-center">Age and Gender </td><td class="w3-center"> LE in months</td><td class="w3-center"> LE + 24 months Premium Reserve</td><td colspan = 2 class="w3-center">Subscriber </br>Cost Basis </td><td>Projected Yield % </td><td colspan = 2 class = "w3-center">Subscriber Distribution at Maturity </td>
                            </tr>
                            <tr class = "w3-orange">
                            <td><script>i = 0; j = 0; document.write(policy[i][j]);</script></td><td class = "w3-center" colspan = 2><script>document.write(" $ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td colspan = 1> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td class = "w3-center" colspan =2 > <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td colspan = 2 class = "w3-center"> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
                            </tr>
                            <tr>
                            <td><script>i = 1; j = 0; document.write(policy[i][j]);</script></td><td class = "w3-center" colspan = 2><script>document.write(" $ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td colspan = 1> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td class = "w3-center" colspan =2> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td colspan = 2 class = "w3-center"> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
                            </tr>
                            <tr class="w3-orange">
                            <td><script>i = 2; j = 0; document.write(policy[i][j]);</script></td><td class = "w3-center" colspan = 2><script>document.write(" $ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td colspan = 1> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td class = "w3-center" colspan =2> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td colspan = 2 class = "w3-center"> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
                            </tr>
                            <tr>
                            <td><script>i = 3; j = 0; document.write(policy[i][j]);</script></td><td class = "w3-center" colspan = 2><script>document.write(" $ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td colspan = 1> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td  class = "w3-center" colspan =2> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td colspan = 2 class = "w3-center"> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
                            </tr>
                            <tr class="w3-orange">
                            <td><script>i = 4; j = 0; document.write(policy[i][j]);</script></td><td class = "w3-center" colspan = 2><script>document.write(" $ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td colspan = 1> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td class = "w3-center" colspan =2> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td colspan = 2 class = "w3-center"> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
                            </tr>
                            <tr>
                            <td><script>i = 5; j = 0; document.write(policy[i][j]);</script></td><td class = "w3-center" colspan = 2><script>document.write(" $ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td colspan = 1> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td class = "w3-center" colspan =2> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td colspan = 2 class = "w3-center"> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
                            </tr>
                            <tr class="w3-orange">
                            <td><script>i = 6; j = 0; document.write(policy[i][j]);</script></td><td class = "w3-center" colspan = 2><script>document.write(" $ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td colspan = 1> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td class = "w3-center" colspan =2> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td colspan = 2 class = "w3-center"> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
                            </tr>
                            <tr>
                            <td><script>i = 7; j = 0; document.write(policy[i][j]);</script></td><td class = "w3-center" colspan = 2><script>document.write(" $ " + policy[i][j+1].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script></td><td><script>document.write((policy[i][j+2]*100).toFixed(2) + " %")</script> </td><td colspan = 1> <script>document.write(policy[i][j+3])</script></td><td class="w3-border-right w3-center"><script>document.write(policy[i][j+4])</script> </td><td class="w3-center"><script>document.write(policy[i][j+5])</script> </td><td class="w3-center"><script>document.write(policy[i][j+6])</script> </td><td class="w3-center"><script>document.write(policy[i][j+7])</script> </td><td class = "w3-center" colspan =2> <script>document.write("$ " + policy[i][j+8].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td><td> <script>document.write((policy[i][j+9]*100).toFixed(2) + " %")</script></td><td colspan = 2 class = "w3-center"> <script>document.write("$ " +policy[i][j+10].toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script></td>
                            </tr>

                            <tr>
                            <td> </td><td> </td><td> </td><td> </td><td > </td><td></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                            </tr>
                            <tr>
                            <td> </td><td> </td><td> </td><td> </td><td > </td><td></td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>
                            </tr>

                            <tr class="w3-lime">
                            <td>TOTALS: </td><td class = "w3-center" colspan = 2><script>document.write("$ " + (Number(total_face_value)).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script> </td><td> 100 % </td><td colspan = 1> </td><td class="w3-border-right"> </td><td> AVERAGES: </td><td class = "w3-center"><script> document.write(avg_LE.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script> </td><td class = "w3-center"><script>document.write(avg_LEplus2.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); </script> </td><td class = "w3-center" colspan = 2><script>document.write("$ " + (Number(subscription_amount)).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));</script> </td><td><script> document.write((avg_yield*100).toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +" %");</script> </td><td colspan = 2 class = "w3-center"><script>document.write("$ " + total_maturity_distribution.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")) </script></td>
                            </tr>

                        </table>
                    </div>
            </div>
            
        </div>
    </div>
</div>

<?php get_footer();
