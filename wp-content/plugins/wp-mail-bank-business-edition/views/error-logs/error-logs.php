<?php
/**
* This Template is used for managing Other Plugin settings.
*
* @author Tech Banker
* @package wp-mail-bank/views/error-logs
* @version 3.0.0
*/

if(!defined("ABSPATH")) exit;//exit if accessed directly
if(!is_user_logged_in())
{
	return;
}
else
{
	$access_granted = false;
	if(isset($user_role_permission) && count($user_role_permission) > 0)
	{
		foreach($user_role_permission as $permission)
		{
			if(current_user_can($permission))
			{
				$access_granted = true;
				break;
			}
		}
	}
	if(!$access_granted)
	{
		return;
	}
	else if(error_logs_mail_bank == "1")
	{
		$clear_error_logs_nonce = wp_create_nonce("clear_error_logs_nonce");
		?>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="icon-custom-home"></i>
					<a href="admin.php?page=mb_dashboard">
						<?php echo $mb_mail_bank;?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo $mb_error_logs_label;?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-shield"></i>
							<?php echo $mb_error_logs_label;?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_other_settings">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo plugins_url("views/error-logs/error-logs.txt",dirname(dirname(__FILE__)));?>" download="error-logs.txt" class="btn vivid-green" name="ux_btn_download_error_logs"><?php echo $mb_download_error_logs;?></a>
										<input type="button" class="btn vivid-green btn_clear_error_logs" name="ux_btn_clear_error_logs" value="<?php echo $mb_clear_error_logs;?>">
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="form-group">
									<label class="control-label">
										<?php echo $mb_error_logs_output; ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo $mb_error_logs_output_tooltip;?>" data-placement="right"></i>
									</label>
									<textarea rows="20" class="form-control" readonly="true"><?php echo dbHelper_mail_bank::file_reader(MAIL_BANK_ERROR_LOGS_FILE);?></textarea>
								</div>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo plugins_url("views/error-logs/error-logs.txt",dirname(dirname(__FILE__)));?>" download="error-logs.txt" class="btn vivid-green" name="ux_btn_download_error_logs"><?php echo $mb_download_error_logs;?></a>
										<input type="button" class="btn vivid-green btn_clear_error_logs" name="ux_btn_clear_error_logs" value="<?php echo $mb_clear_error_logs;?>">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	else
	{
		?>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="icon-custom-home"></i>
					<a href="admin.php?page=mb_dashboard">
						<?php echo $mb_mail_bank;?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo $mb_error_logs_label;?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-wrench"></i>
							<?php echo $mb_error_logs_label;?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_other_settings">
							<div class="form-body">
								<strong><?php echo $mb_user_access_message;?></strong>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
?>
