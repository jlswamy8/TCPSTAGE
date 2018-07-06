<?php
// Template Name: Browse Investments 
 get_header(); ?>  
<!--jQuery dependencies commented out as these are already included by the revolution slider -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" /> 
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> 

    

<script>
    $(function () {
        var data = [['AG68MU00', '$500,000','16.67%', 'American General Life', 'AA', '81F', '68', '92', '$254,934', '70.75%', '$435,300'],
            ['AG68MU00', '$500,000','16.67%', 'American General Life', 'AA', '81F', '68', '92', '$254,934', '70.75%', '$435,300'],
			['AG68MU00', '$500,000','16.67%', 'American General Life', 'AA', '81F', '68', '92', '$254,934', '70.75%', '$435,300'],
			['AG68MU00', '$500,000','16.67%', 'American General Life', 'AA', '81F', '68', '92', '$254,934', '70.75%', '$435,300'],
			['AG68MU00', '$500,000','16.67%', 'American General Life', 'AA', '81F', '68', '92', '$254,934', '70.75%', '$435,300'],
			['AG68MU00', '$500,000','16.67%', 'American General Life', 'AA', '81F', '68', '92', '$254,934', '70.75%', '$435,300'],
['', '', '', ''],
['TOTALS', '$3,000,000', '100%', '']	
                    ];


        var obj = { width: 1200, height: 300, title: "SLS Portfolio Information",resizable:true,draggable:true, align:"left" };
        obj.colModel = [{ title: "Policy Code", width: 100, dataType: "integer" },
        { title: "Face Amount", width: 100, dataType: "string" },
{ title: "% of Portfolio", width: 100, dataType: "string" },
        { title: "Insurance Company", width: 150, dataType: "float", align: "right" },
{ title: "AM Best Rating", width: 100, dataType: "string" },
{ title: "Age & Gender", width: 50, dataType: "float", align: "right" },
{ title: "LE in Months", width: 100, dataType: "float", align: "right" },
{ title: "LE + 24 Months Premium Reserves", width: 150, dataType: "float", align: "right" },
{ title: "Client Purchase Price", width: 150, dataType: "float", align: "right" },
{ title: "Payout Ratio", width: 50, dataType: "float", align: "right" },
        { title: "Payout at Maturity", width: 100, dataType: "float", align: "right"}];
        obj.dataModel = { data: data };
        $("#grid_array").pqGrid(obj);
$("#grid_array").pqGrid({editable: false});
$("#grid_array").pqGrid({stripeRows: true});


    });
        
</script>    


<p></p>
<p></p>
<div id="grid_array" style="margin:10px;"></div>

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

<?php get_footer();  

// Omit closing PHP tag to avoid "Headers already sent" issues.
