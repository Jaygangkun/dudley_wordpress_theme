<?php
/**
* Template Name: Account Login Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>

<section class="section-account-form">
	<div class="container-sm">
		<h1 class="text-center">Login to your account</h1>
		<p class="section-account-form-desc text-center">Don’t have an account? <a class="" href="/signup">Create one</a></p>
		<div class="account-form-wrap">
			<div class="account-form-input-group">
				<input type="text" id="email" placeholder="Enter your email*">
			</div>
			<div class="account-form-input-group has-button">
				<input type="password" id="password" placeholder="Password*">
				<a class="account-form-input-group-button text-black" href="/forgot-password">Forgot?</a>
			</div>
			<span class="w-100 btn btn-black btn-sm" id="btn_login">Login</span>
			<div class="form-warnning-message" id="login_warnning" style="display: none"></div>
		</div>
	</div>
	
</section>
<script>
	jQuery(document).on('click', '#btn_login', function() {
		jQuery('#login_warnning').hide();

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

		if(has_error) {
			return;
		}

		jQuery('body').addClass('loading');
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'login',
				email: jQuery('#email').val(),
				password: jQuery('#password').val()
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('body').removeClass('loading');
				if(resp.success) {
					location.href = '/';
				}
				else {
					jQuery('#login_warnning').text(resp.message);
					jQuery('#login_warnning').show();
				}
			}
		})
	})
</script>
<?php get_footer() ?>