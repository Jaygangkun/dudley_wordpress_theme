<?php
/**
* Template Name: Forgot Password Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>

<section class="section-account-form">
	<div class="container-sm">
		<h1 class="text-center">Forgot Password</h1>
		<p class="section-account-form-desc text-center">Remembered your password? <a class="" href="/login">Return to Login</a></p>
		<div class="account-form-wrap">
			<div class="form-success-message" id="forgot_success" style="display: none">Password reset successfully</div>
			<div class="account-form-input-group">
				<input type="text" id="email" placeholder="Enter your email*">
			</div>
			<div class="account-form-input-group">
				<input type="password" id="password" placeholder="Password*">
			</div>
			<div class="account-form-input-group">
				<input type="password" id="repassword" placeholder="Re type password">
			</div>
			<span class="w-100 btn btn-black btn-sm" id="btn_submit">Submit</span>
			<div class="form-warnning-message" id="forgot_warnning" style="display: none"></div>
		</div>
	</div>
	
</section>
<script>
	jQuery(document).on('click', '#btn_submit', function() {
		
		jQuery('#forgot_success').hide();
		jQuery('#forgot_warnning').hide();

		var has_error = false;

		if(jQuery('#email').val() == '') {
			jQuery('#email').parent().addClass('has-error');
			has_error = true;
		}
		else {
			jQuery('#email').parent().removeClass('has-error');
		}

		if(jQuery('#password').val() == '') {
			jQuery('#password').parent().addClass('has-error');
			has_error = true;
		}
		else {
			jQuery('#password').parent().removeClass('has-error');
		}

		if(jQuery('#repassword').val() == '') {
			jQuery('#repassword').parent().addClass('has-error');
			has_error = true;
		}
		else {
			jQuery('#repassword').parent().removeClass('has-error');
		}

		if(jQuery('#password').val() != '' && jQuery('#password').val() != jQuery('#repassword').val()) {
			jQuery('#repassword').parent().addClass('has-error');
			has_error = true;
		}
		else {
			jQuery('#repassword').parent().removeClass('has-error');
		}

		if(has_error) {
			return;
		}

		jQuery('body').addClass('loading');
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'forgot_password',
				email: jQuery('#email').val(),
				password: jQuery('#password').val()
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.success) {
					jQuery('#forgot_success').show();
					// location.href = '/';
				}
				else {
					jQuery('#forgot_warnning').text(resp.message);
					jQuery('#forgot_warnning').show();
				}
				jQuery('body').removeClass('loading');
			}
		})
	})
</script>
<?php get_footer() ?>