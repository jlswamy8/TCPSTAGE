<?php
/**
* Template for licensing settings.
*
* @author  Tech Banker
* @package wp-mail-bank-business-edition/views/licensing
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
	else if(licensing_mail_bank == "1")
	{
		$mb_license = wp_create_nonce("mail_bank_licensing");
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
					<span>
						<?php echo $mb_licensing_label; ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-key"></i>
							<?php echo $mb_licensing_label;?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_licensing">
							<div class="form-body">
								<div class="note note-warning">
									<h4 class="block">
										<?php echo $mb_licensing_important_notice_label; ?>
									</h4>
									<p>
										<?php echo $mb_licensing_activate_license_label; ?>
									</p>
									<p>
										<?php echo $mb_licensing_validate_licanse_label; ?>
									</p>
									<p>
										<?php echo $mb_licensing_contact_us_label; ?>
										<a href="mailto:support@tech-banker.com" target="_blank">support@tech-banker.com</a>
									</p>
								</div>
								<div class="note note-danger" id="error_notice" style="display:none">
									<h4 class="block">
										<?php echo $mb_licensing_important_notice_label;?>
										<p id="ux_error_message_from_server"></p>
									</h4>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo $mb_licensing_product_key_label; ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo $mb_licensing_installed_product_tooltip; ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_product_name" id="ux_txt_product_name" value="Mail Bank Business Edition" disabled="disabled">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo $mb_licensing_current_version_label; ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo $mb_licensing_product_version_tooltip; ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_current_version" id="ux_txt_current_version" value="2.1.16" disabled="disabled">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo $mb_licensing_website_url_label; ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo $mb_licensing_website_site; ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_website_url" id="ux_txt_website_url" value="<?php echo esc_attr($mb_licensing->site_url);?>" readonly="readonly">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo $mb_licensing_order_id_label; ?> :
												<i class="icon-custom-question tooltips" data-original-title="<?php echo $mb_licensing_order_id_tooltip; ?>" data-placement="right"></i>
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" maxlength="6" name="ux_txt_order_id" id="ux_txt_order_id" placeholder="<?php echo $mb_licensing_order_id_placeholder; ?>" onfocus="paste_only_digits_mail_bank(this.id);" value="<?php echo $mb_licensing->order_id;?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo $mb_licensing_api_key_label; ?> :
										<i class="icon-custom-question tooltips" data-original-title="<?php echo $mb_licensing_api_key_tooltip ?>" data-placement="right"></i>
										<span class="required" aria-required="true">*</span>
									</label>
									<input type="text" class="form-control" maxlength="36" name="ux_txt_api_key" id="ux_txt_api_key" value="<?php echo esc_attr($mb_licensing->api_key);?>" placeholder="<?php echo $mb_licensing_api_key_placeholder; ?>" onblur="remove_unwanted_spaces_mail_bank(this.id)">
								</div>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<input type="submit" class="btn vivid-green" value="<?php echo $mb_licensing_validate_license_label; ?>">
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
						<a href="admin.php?page=mb_email_configuration">
							<?php echo $wp_mail_bank; ?>
						</a>
						<span>></span>
				</li>
				<li>
					<span>
						<?php echo $mb_licensing_label; ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-key"></i>
							<?php echo $mb_licensing_label; ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_license">
							<div class="form-body">
								<strong><?php echo $mb_user_access_message; ?></strong>
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
