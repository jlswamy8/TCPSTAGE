<?php
/**
* This Template is used for showing Email log details
*
* @author	Tech Banker
* @package wp-mail-bank-business-edition/views/email-log-details
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
		?>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="icon-custom-home"></i>
					<a href="admin.php?page=mb_email_configuration">
						<?php echo $wp_mail_bank; ?>
					</a>
					<span>></span>
				</li>
				<li>
					<a href="admin.php?page=mb_email_logs">
						<?php echo $mb_email_logs; ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo $mb_email_logs_email_details; ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-note"></i>
							<?php echo $mb_email_logs_email_details; ?>
						</div>
					</div>
					<div class="portlet-body">
						<div class=pull-right>
							<a href="admin.php?page=mb_email_logs" class="btn vivid-green" name="ux_btn_back_to_email_logs" id="ux_btn_back_to_email_logs" ><?php echo $mb_back_to_email_logs;?></a>
						</div>
						<div class="custom-line-separator"></div>
						<div class="form-body">
							<div class="custom-details-body">
								<div id="ux_div_header">
									<?php
										$sender_email = isset($email_log_details["sender_email"]) ? esc_attr($email_log_details["sender_email"]) : get_option("admin_email");
										$sender_name = isset($email_log_details["sender_name"]) ? esc_attr($email_log_details["sender_name"]) : get_option("blogname");
										$email_to = isset($email_log_details["email_to"]) ? esc_attr($email_log_details["email_to"]) : "N/A";
										$cc = isset($email_log_details["cc"]) ? esc_attr($email_log_details["cc"]) : "N/A";
										$bcc = isset($email_log_details["bcc"]) ? esc_attr($email_log_details["bcc"]) : "N/A";
										$subject = isset($email_log_details["subject"]) ? esc_attr($email_log_details["subject"]) : "N/A";
										$timestamp = isset($email_log_details["timestamp"]) ? date('m/d/Y', esc_attr($email_log_details["timestamp"])) : "N/A";
									?>
									<p><label class="control-label"><b><?php echo $mb_from ?></b> : <?php echo $sender_name . "[" . $sender_email . "]"; ?></label></p>
									<p><label class="control-label"><b><?php echo $mb_email_sent_to ?></b> : <?php echo $email_to; ?></label></p>
									<p><label class="control-label"><b><?php echo $mb_email_configuration_cc_label ?></b> : <?php echo $cc == "" ? "N/A" : $cc; ?></label></p>
									<p><label class="control-label"><b><?php echo $mb_email_configuration_bcc_label ?></b> : <?php echo $bcc == "" ? "N/A" : $bcc ?></label></p>
									<p><label class="control-label"><b><?php echo $mb_subject ?></b> : <?php echo $subject; ?></label></p>
									<p><label class="control-label"><b><?php echo $mb_date_time ?></b> : <?php echo $timestamp; ?></label></p>
								</div>
								<div class="line-separator"></div>
									<?php echo trim($email_log_details["content"])?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
