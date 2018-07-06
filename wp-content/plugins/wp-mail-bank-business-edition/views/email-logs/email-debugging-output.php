<?php
/**
* This Template is used for showing Email Debugging output
*
* @author	Tech Banker
* @package wp-mail-bank-business-edition/views/email-debugging-output
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
						<?php echo $mb_email_debugging_output; ?>
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
							<?php echo $mb_email_debugging_output; ?>
						</div>
					</div>
					<div class="portlet-body">
						<div class=pull-right>
							<a href="admin.php?page=mb_email_logs" class="btn vivid-green" name="ux_btn_back" id="ux_btn_back" ><?php echo $mb_back_to_email_logs;?></a>
						</div>
						<div class="custom-line-separator"></div>
							<div class="form-body">
								<div id=ux_div_debugging_output>
									<pre><strong><?php echo isset($email_log_details["debugging_output"]) ? esc_html($email_log_details["debugging_output"]) : "";?>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
