<?php
/**
* Template Name: Account Signup Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>

<section class="section-account-form">
	<div class="container-sm">
		<h1 class="text-center">Create an account</h1>
		<p class="section-account-form-desc text-center">Already have account? <a class="" href="/login">Login</a></p>
		<div class="account-form-wrap">
			<div class="form-success-message" id="signup_success" style="display: none"></div>
			<div class="account-form-input-group">
				<input type="text" id="fullname" placeholder="Full name*">
			</div>
			<div class="account-form-input-group">
				<input type="text" id="email" placeholder="Enter your email*">
			</div>
			<div class="account-form-input-group">
				<input type="password" id="password" placeholder="Password*">
			</div>
			<div class="account-form-input-group">
				<input type="password" id="repassword" placeholder="Re type password">
			</div>
			<div class="account-form-input-group">
				<select id="hear">
					<option value="">How did you hear about us?</option>
					<option value="Search Engine">Search Engine</option>
					<option value="Online Advertising">Online Advertising</option>
					<option value="In the Press">In the Press</option>
					<option value="Word of Mouth">Word of Mouth</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div class="account-form-group">
				<label class="account-form-checkbox-container">By signing up you agree to our <a class="" href="/legal?subpage=privacy-policy">Privacy Policy</a> and <a href="/legal?subpage=terms-conditions">Terms and Conditions</a>
					<input type="checkbox" id="agree">
					<span class="checkmark"></span>
				</label>
			</div>
			<div class="account-form-group">
				<label class="account-form-checkbox-container">Join the mailing list to receive news and offers
					<input type="checkbox" checked="checked" id="join">
					<span class="checkmark"></span>
				</label>
			</div>
			<span class="w-100 btn btn-black btn-sm" id="btn_signup">Signup</span>
			<div class="form-warnning-message" id="signup_warnning" style="display: none">Please  check our privacy policy and terms and conditions</div>
		</div>
	</div>
	
</section>
<script>
	jQuery(document).on('click', '#btn_signup', function() {
		
		jQuery('#signup_success').hide();

		var has_error = false;
		if(jQuery('#fullname').val() == '') {
			jQuery('#fullname').parent().addClass('has-error');
			has_error = true;
		}
		else {
			jQuery('#fullname').parent().removeClass('has-error');
		}

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

		if(!jQuery('#agree').is(':checked')) {
			// alert('Please check agree to our privacy policy and terms and conditions');
			jQuery('#signup_warnning').text('Please  check our privacy policy and terms and conditions');
			jQuery('#signup_warnning').show();
			has_error = true;
		}
		else {
			jQuery('#signup_warnning').hide();
		}

		if(has_error) {
			return;
		}

		jQuery('body').addClass('loading');
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'signup',
				fullname: jQuery('#fullname').val(),
				email: jQuery('#email').val(),
				password: jQuery('#password').val(),
				hear: jQuery('#hear').val(),
				join: jQuery('#join').is(':checked')
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.success) {
					jQuery('#signup_success').text('Signup Successfully!');
					jQuery('#signup_success').show();
					// location.href = '/login';
				}
				else {
					jQuery('#signup_warnning').text(resp.message);
					jQuery('#signup_warnning').show();
				}

				jQuery('body').removeClass('loading');
			}
		})
	})
</script>
<?php get_footer() ?>