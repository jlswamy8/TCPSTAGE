<?php
/**
* This file is used for creating sidebar menu.
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
	$access_granted = false;
	foreach($user_role_permission as $permission)
	{
		if(current_user_can($permission))
		{
			$access_granted = true;
			break;
		}
	}
	if(!$access_granted)
	{
		return;
	}
	else
	{
		$flag = 0;

		$role_capabilities = $wpdb->get_var
		(
			$wpdb->prepare
			(
				"SELECT meta_value from ".mail_bank_meta()."
				WHERE meta_key = %s",
				"roles_and_capabilities"
			)
		);

		$roles_and_capabilities_unserialized_data = unserialize($role_capabilities);
		$capabilities = explode(",",$roles_and_capabilities_unserialized_data["roles_and_capabilities"]);

		if(is_super_admin())
		{
			$mb_role = "administrator";
		}
		else
		{
			$mb_role = check_user_roles_mail_bank($current_user);
		}
		switch($mb_role)
		{
			case "administrator":
				$privileges = "administrator_privileges";
				$flag = $capabilities[0];
			break;

			case "author":
				$privileges = "author_privileges";
				$flag = $capabilities[1];
			break;

			case "editor":
				$privileges = "editor_privileges";
				$flag = $capabilities[2];
			break;

			case "contributor":
				$privileges = "contributor_privileges";
				$flag = $capabilities[3];
			break;

			case "subscriber":
				$privileges = "subscriber_privileges";
				$flag = $capabilities[4];
			break;

			default:
				$privileges = "other_roles_privileges";
				$flag = $capabilities[5];
			break;
		}

		foreach($roles_and_capabilities_unserialized_data as $key=>$value)
		{
			if($privileges == $key)
			{
				$privileges_value = $value;
				break;
			}
		}

		$full_control = explode(",",$privileges_value);
		if(!defined("full_control")) define("full_control","$full_control[0]");
		if(!defined("email_configuration_mail_bank")) define("email_configuration_mail_bank","$full_control[1]");
		if(!defined("test_email_mail_bank")) define("test_email_mail_bank","$full_control[2]");
		if(!defined("email_logs_mail_bank")) define("email_logs_mail_bank","$full_control[3]");
		if(!defined("settings_mail_bank")) define("settings_mail_bank","$full_control[4]");
		if(!defined("roles_and_capabilities_mail_bank")) define("roles_and_capabilities_mail_bank","$full_control[5]");
		if(!defined("system_information_mail_bank")) define("system_information_mail_bank","$full_control[6]");
		if(!defined("error_logs_mail_bank")) define("error_logs_mail_bank","$full_control[7]");
		if(!defined("licensing_mail_bank")) define("licensing_mail_bank","$full_control[8]");
		$isLicensed = get_option("mail_bank_api_details");

		if($flag == "1")
		{
			global $wp_version;

			$icon = $wp_version < "3.8" ? plugins_url("assets/global/img/icon.png",dirname(__FILE__)) : "dashicons-email-alt";

			add_menu_page($wp_mail_bank,$wp_mail_bank,"read","mb_email_configuration","",$icon);
			add_submenu_page("mb_email_configuration",$mb_email_configuration,$mb_email_configuration,"read","mb_email_configuration",$isLicensed == "" ? "mb_licensing" : "mb_email_configuration");
			add_submenu_page("mb_email_configuration",$mb_test_email,$mb_test_email,"read","mb_test_email",$isLicensed == "" ? "mb_licensing" : "mb_test_email");
			add_submenu_page("mb_email_configuration",$mb_email_logs,$mb_email_logs,"read","mb_email_logs",$isLicensed == "" ? "mb_licensing" : "mb_email_logs");
			add_submenu_page($mb_email_logs,$mb_email_logs,"","read","mb_email_log_details",$isLicensed == "" ? "mb_licensing" : "mb_email_log_details");
			add_submenu_page($mb_email_logs,$mb_email_logs,"","read","mb_email_debugging_output",$isLicensed == "" ? "mb_licensing" : "mb_email_debugging_output");
			add_submenu_page("mb_email_configuration",$mb_settings,$mb_settings,"read","mb_settings",$isLicensed == "" ? "mb_licensing" : "mb_settings");
			add_submenu_page("mb_email_configuration",$mb_roles_and_capabilities,$mb_roles_and_capabilities,"read","mb_roles_and_capabilities",$isLicensed == "" ? "mb_licensing" : "mb_roles_and_capabilities");
			add_submenu_page("mb_email_configuration",$mb_feedbacks,$mb_feedbacks,"read","mb_feedbacks",$isLicensed == "" ? "mb_licensing" : "mb_feedbacks");
			add_submenu_page("mb_email_configuration",$mb_system_information,$mb_system_information,"read","mb_system_information",$isLicensed == "" ? "mb_licensing" : "mb_system_information");
			add_submenu_page("mb_email_configuration",$mb_error_logs,$mb_error_logs,"read","mb_error_logs",$isLicensed == "" ? "mb_licensing" : "mb_error_logs");
			add_submenu_page("mb_email_configuration",$mb_licensing_label,$mb_licensing_label,"read","mb_licensing","mb_licensing");
		}

		/*
		Function Name: mb_email_configuration
		Parameters: No
		Description: This function is used to create mb_email_configuration menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_email_configuration"))
		{
			function mb_email_configuration()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/email-setup/email-setup.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/email-setup/email-setup.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mb_test_email
		Parameters: No
		Description: This function is used to create mb_test_email menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_test_email"))
		{
			function mb_test_email()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/test-email/test-email.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/test-email/test-email.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mb_email_logs
		Parameters: No
		Description: This function is used to create mb_email_logs menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_email_logs"))
		{
			function mb_email_logs()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/email-logs/email-logs.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/email-logs/email-logs.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mb_email_log_details
		Parameters: No
		Description: This function is used to show email log details
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_email_log_details"))
		{
			function mb_email_log_details()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/email-logs/email-log-details.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/email-logs/email-log-details.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mb_email_debugging_output
		Parameters: No
		Description: This function is used to show email dubugging output
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_email_debugging_output"))
		{
			function mb_email_debugging_output()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/email-logs/email-debugging-output.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/email-logs/email-debugging-output.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}


		/*
		Function Name: mb_settings
		Parameters: No
		Description: This function is used to create mb_settings menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_settings"))
		{
			function mb_settings()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/settings/settings.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/settings/settings.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}


		/*
		Function Name: mb_roles_and_capabilities
		Parameters: No
		Description: This function is used to create mb_roles_and_capabilities menu.
		Created On: 15-06-2016 12:59
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_roles_and_capabilities"))
		{
			function mb_roles_and_capabilities()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/roles-and-capabilities/roles-and-capabilities.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/roles-and-capabilities/roles-and-capabilities.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mb_feedbacks
		Parameters: No
		Description: This function is used to create mb_feedbacks menu.
		Created On: 15-06-2016 10:44
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_feedbacks"))
		{
			function mb_feedbacks()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/feedbacks/feedbacks.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/feedbacks/feedbacks.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}

		/*
		Function Name: mb_system_information
		Parameters: No
		Description: This function is used to create mb_system_information menu.
		Created On: 15-06-2016 02:29
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_system_information"))
		{
			function mb_system_information()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/system-information/system-information.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/system-information/system-information.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}
		/*
		Function Name: mb_error_logs
		Parameters: No
		Description: This function is used to create mb_error_logs menu.
		Created On: 15-06-2016 02:29
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_error_logs"))
		{
			function mb_error_logs()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/error-logs/error-logs.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/error-logs/error-logs.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}
		/*
		Function Name: mb_licensing
		Parameter: No
		Description: This Function is used for Licensing.
		Created On: 13-08-2016 09:41
		Created By: Tech Banker Team
		*/

		if(!function_exists("mb_licensing"))
		{
			function mb_licensing()
			{
				global $wpdb;
				$user_role_permission = get_users_capabilities_mail_bank();
				if(file_exists(MAIL_BANK_DIR_PATH."includes/translations.php"))
				{
					include MAIL_BANK_DIR_PATH."includes/translations.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/header.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/header.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/sidebar.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/sidebar.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/queries.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/queries.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."views/licensing/licensing.php"))
				{
					include_once MAIL_BANK_DIR_PATH."views/licensing/licensing.php";
				}
				if(file_exists(MAIL_BANK_DIR_PATH."includes/footer.php"))
				{
					include_once MAIL_BANK_DIR_PATH."includes/footer.php";
				}
			}
		}
	}
}
?>
