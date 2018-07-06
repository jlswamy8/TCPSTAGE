<?php

     require_once('vendor/docusign/esign-client/autoload.php');

    /* get these from www.docusign.com/devcenter */
    $integratorKey = '1bafb0b9-7cae-46e6-9908-05ec9f1ccf92';
    $email = 'vasu@ccprllc.com';
    $password = 'docusign4capstone';
    
    $header = "<DocuSignCredentials><Username>" . $email . "</Username><Password>" . $password . "</Password><IntegratorKey>" . $integratorKey . "</IntegratorKey></DocuSignCredentials>";
    
    $url = "https://demo.docusign.net/restapi/v2/login_information";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-DocuSign-Authentication: $header"));
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
    if ( $status != 200 ) {
        echo "status is:" . $status;
        exit(-1);
    }
    
    $response = json_decode($json_response, true);
    
    echo "accountId " . $response["loginAccounts"][0]["accountId"] . "\n";
    echo "baseUrl " . $response["loginAccounts"][0]["baseUrl"] . "\n";

    
    $accountID = $response["loginAccounts"][0]["accountId"] ;
    $baseUrl  = $response["loginAccounts"][0]["baseUrl"] ";

    curl_close($curl);

// Create the recipient
//$rcp1 = new Recipient();// First recipient to put in recipient array
//$rcp1->UserName = "John Doe";
//$rcp1->Email = $RecipientEmail;
//$rcp1->Email = "vasu_vijay@yahoo.com";
//$rcp1->Type = RecipientTypeCode::Signer;
//$rcp1->ID = "1";
//$rcp1->RoutingOrder = 1;
//$rcp1->RequireIDLookup = FALSE;
 
// Create the envelope contents
//$env = new Envelope();
//$env->AccountId = $accountID; // Note: GUID should be used here rather than email
//$env->AccountId = "vasu@ccprllc.com"; // Note: GUID should be used here rather than email
//$env->Subject = "Subject";
//$env->EmailBlurb = "testing docusign creation services";
//$env->Recipients = array($rcp1);
 
// Attach the document
//$doc = new Document();
//$doc->ID = "1";
//$doc->Name = "Picture PDF";
//$doc->PDFBytes = file_get_contents("docs/picturePdf.pdf");
//$doc->PDFBytes = file_get_contents("/home/capstone/forms/NQappformfilled.pdf");
//$env->Documents = array($doc);
 
// Create a new signature tab
//$tab = new Tab();
//$tab->DocumentID = "1";
//$tab->RecipientID = "1";
//$tab->Type = TabTypeCode::SignHere;
//$tab->PageNumber = "1";
//$tab->XPosition = "100";
//$tab->YPosition = "100";
//$env->Tabs = array($tab);
 
// Create and send the envelope
//$createAndSendEnvelopeparams = new CreateEnvelope();
//$createAndSendEnvelopeparams->Envelope = $env;
//$response = $api->CreateAndSendEnvelope($createAndSendEnvelopeparams);

    
?>
