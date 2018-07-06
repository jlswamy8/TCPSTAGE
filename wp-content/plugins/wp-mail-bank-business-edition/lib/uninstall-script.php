<?php
/**
* This file contains code for remove tables and options at uninstall.
*
* @author  Tech Banker
* @package wp-mail-bank-business-edition/lib
* @version 2.0.0
*/

if(!defined("ABSPATH")) exit; // Exit if accessed directly
if(!is_user_logged_in())
{
	return;
}
else
{
	if(!current_user_can("manage_options"))
	{
		return;
	}
	else
	{
		// Drop Tables
		if(count($wpdb->get_var("SHOW TABLES LIKE '" . mail_bank_meta() . "'")) != 0 && count($wpdb->get_var("SHOW TABLES LIKE '" . mail_bank() . "'")) != 0)
		{
			global $wpdb;
			$settings_remove_tables = $wpdb->get_var
			(
				$wpdb->prepare
				(
					"SELECT meta_value FROM ".mail_bank_meta()."
					WHERE meta_key = %s",
					"settings"
				)
			);
			$settings_remove_tables_unserialize = unserialize($settings_remove_tables);

			if($settings_remove_tables_unserialize["remove_tables_at_uninstall"] == "enable")
			{
				$wpdb->query("DROP TABLE " .mail_bank());
				$wpdb->query("DROP TABLE ".mail_bank_meta());
				if(count($wpdb->get_var("SHOW TABLES LIKE '" . mail_bank_licensing() . "'")) != 0)
				{
					$wpdb->query("DROP TABLE ".mail_bank_licensing());
				}

				// Delete options
				delete_option("mail-bank-version-number");
				delete_option("mail_bank_api_details");
			}

			// Unschedule schedulers
			if(wp_next_scheduled("automatic_updates_mail_bank"))
			{
				wp_clear_scheduled_hook("automatic_updates_mail_bank");
			}
			if(wp_next_scheduled("check_plugin_updates-wp-mail-bank-business-edition"))
			{
				wp_clear_scheduled_hook("check_plugin_updates-wp-mail-bank-business-edition");
			}
			if(wp_next_scheduled("mail_bank_license_validator_scheduler"))
			{
				wp_clear_scheduled_hook("mail_bank_license_validator_scheduler");
			}
		}
	}
}
?>
