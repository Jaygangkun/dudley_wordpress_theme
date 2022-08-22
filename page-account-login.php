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
				<input type="text" id="email" placeholder="Enter your email">
			</div>
			<div class="account-form-input-group has-button">
				<input type="password" id="password" placeholder="Password">
				<span class="account-form-input-group-button">Forgot?</span>
			</div>
			<span class="w-100 btn btn-black btn-sm" id="btn_login">Login</span>
		</div>
	</div>
	
</section>
<script>
	jQuery(document).on('click', '#btn_login', function() {
		
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
				if(resp.success) {
					location.href = '/';
				}
				else {
					alert(resp.message);
				}
			}
		})
	})
</script>
<?php get_footer() ?>