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
			<div class="account-form-input-group">
				<input type="text" id="email" placeholder="Enter your email">
			</div>
			<span class="w-100 btn btn-black btn-sm" id="btn_login">Submit</span>
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