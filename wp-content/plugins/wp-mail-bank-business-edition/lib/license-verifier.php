<?php
/**
* This File is used for license Validation.
*
* @author Tech Banker
* @package wp-mail-bank-business-edition/lib
* @version 2.0.0
*/

if(!defined("ABSPATH")) exit;//exit if accessed directly
if(defined("DOING_CRON") && DOING_CRON)
{
	global $wpdb;
	$updation_keys = $wpdb->get_row
	(
		"SELECT * FROM " . mail_bank_licensing()
	);

	$url = tech_banker_url."/wp-admin/admin-ajax.php";
	$response = wp_remote_post($url, array
	(
		"method" => "POST",
		"timeout" => 45,
		"redirection" => 5,
		"httpversion" => "1.0",
		"blocking" => true,
		"headers" => array(),
		"body" => array("ux_product_key" => "9292", "ux_domain" => $updation_keys->site_url, "ux_order_id" => $updation_keys->order_id, "ux_api_key"=>$updation_keys->api_key,"param"=>"license","action"=>"license_verifier")
	));
	if(is_wp_error($response))
	{
		delete_option("mail_bank_api_details");
	}
	else
	{
		$response["body"] == "" ? update_option("mail_bank_api_details",$updation_keys->api_key) : delete_option("mail_bank_api_details");
	}
}
?>
