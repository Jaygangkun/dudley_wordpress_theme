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
			<div class="account-form-input-group">
				<input type="text" id="fullname" placeholder="Full name*">
			</div>
			<div class="account-form-input-group">
				<input type="text" id="email" placeholder="Enter your email">
			</div>
			<div class="account-form-input-group">
				<input type="password" id="password" placeholder="Password">
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
		</div>
	</div>
	
</section>
<script>
	jQuery(document).on('click', '#btn_signup', function() {
		
		if(jQuery('#fullname').val() == '') {
			alert('Please Input Full name');
			jQuery('#fullname').focus();
			return;
		}

		if(jQuery('#email').val() == '') {
			alert('Please Input Email');
			jQuery('#email').focus();
			return;
		}

		if(jQuery('#password').val() == '') {
			alert('Please Input Password');
			jQuery('#password').focus();
			return;
		}

		if(jQuery('#repassword').val() == '') {
			alert('Please Input Re Password');
			jQuery('#repassword').focus();
			return;
		}

		if(jQuery('#password').val() != jQuery('#repassword').val()) {
			alert('Please Match Re Type Password');
			jQuery('#repassword').focus();
			return;
		}

		if(!jQuery('#agree').is(':checked')) {
			alert('Please check agree to our privacy policy and terms and conditions');
			return;
		}

		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'signup',
				fullname: jQuery('#fullname').val(),
				email: jQuery('#email').val(),
				password: jQuery('#password').val(),
				join: jQuery('#join').is(':checked')
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.success) {
					alert('Signup Successfully!');
					location.href = '/login';
				}
				else {
					alert(resp.message);
				}
			}
		})
	})
</script>
<?php get_footer() ?>