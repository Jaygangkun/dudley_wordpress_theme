<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Dudley
 * @since Dudley 1.0
 */

?>

<div class="footer">
	<div class="container-lg">
		<div class="footer-top">
			<div class="footer-menu-group">
				<h6 class="footer-menu-group-title">information</h6>
				<ul>
					<li><a class="footer-menu-link" href="/our-story">Our Story</a></li>
					<li><a class="footer-menu-link" href="/legal?subpage=shipping-returns">Shipping & Returns</a></li>
					<li><a class="footer-menu-link" href="/doggie-do-gooders">Doggie Do-Gooders</a></li>
					<li><a class="footer-menu-link" href="/sizing-your-dog">Sizing your Dog</a></li>
				<ul>
			</div>
			<div class="footer-menu-group">
				<h6 class="footer-menu-group-title">legal</h6>
				<ul>
					<li><a class="footer-menu-link" href="/legal?subpage=terms-conditions">Terms & Condition</a></li>
					<li><a class="footer-menu-link" href="/legal?subpage=privacy-policy">Privacy Policy</a></li>
				<ul>
			</div>
			<div class="footer-menu-group">
				<h6 class="footer-menu-group-title">follow us</h6>
				<ul>
					<li><a class="footer-menu-link" href="https://www.facebook.com/dudleyandco/shop/">Facebook</a></li>
					<li><a class="footer-menu-link" href="https://www.instagram.com/wearedudleyandco/">Instagram</a></li>
				<ul>
			</div>
			<div class="footer-space"></div>
			<div class="footer-newsletter newsletter-form">
				<h2 class="footer-newsletter-title">Sign up to our mailing list</h2>
				<div class="newsletter-success" style="display:none"></div>
				<p class="newsletter-input-desc mobile-v fs-15">By signing up you agree to our <a class="link" href="/legal?subpage=privacy-policy">Privacy Policy</a> and <a class="" href="/legal?subpage=terms-conditions">Terms and Conditions</a></p>
				<div class="input-btn-group">
					<input type="text" placeholder="Enter your email" class="input-email">
					<span class="btn btn-black btn-sm btn-newsletter">Sign up</span>
				</div>
				<div class="newsletter-error" style="display:none"></div>
				<p class="newsletter-input-desc desktop-v fs-15">By signing up you agree to our <a class="link" href="/legal?subpage=privacy-policy">Privacy Policy</a> and <a class="" href="/legal?subpage=terms-conditions">Terms and Conditions</a></p>
			</div>
		</div>
		<div class="footer-bottom">
			<p class="footer-copyright">© 2022 House of Dudley Ltd</p>
			<div>
				<p class="footer-payments">Payment methods</p>
				<img class="footer-bottom_img" src="<?php echo get_template_directory_uri()?>/assets/images/img-payment.png">
			</div>			
		</div>
	</div>
</div>
<div class="loading-screen">
	<div class="loading-screen-icon"></div>
</div>
<?php wp_footer(); ?>
<script>
	function validateEmail(email) 
	{
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
		{
			return true;
		}
		
		return false;
	}

	jQuery(document).on('click', '.header-hamburger-link', function() {
		if(jQuery('body').hasClass('mobile-menu')) {
			jQuery('body').removeClass('mobile-menu');
		}
		else {
			jQuery('body').addClass('mobile-menu');
		}
	})

	jQuery(document).on('change', '.product-list-col .product-detail-variant-select select', function() {
		var product_list_col = jQuery(this).parents('.product-list-col');
		var product_variations = jQuery(product_list_col).data('product-variants');
		var product_initial_price = jQuery(product_list_col).data('product-initial-price');
		var selected_variants = [];
		var dom_variant_selects = jQuery(product_list_col).find('.product-detail-variant-select select');
		for(var index = 0; index < dom_variant_selects.length; index ++) {
			selected_variants.push({
				attribute_name: jQuery(dom_variant_selects[index]).data('attribute_name'),
				attribute_val: jQuery(dom_variant_selects[index]).val()
			});
		}

		// finding product variant
		var found_variant = null;
		for(var index = 0; index < product_variations.length; index ++) {
			var attributes = product_variations[index]['attributes'];
			var bfound = true;
			for(var vindex = 0; vindex < selected_variants.length; vindex ++) {
				if(attributes[selected_variants[vindex].attribute_name] != selected_variants[vindex].attribute_val) {
					bfound = false;
					break;
				}
			}

			if(bfound) {
				found_variant = product_variations[index];
				break;
			}
		}

		if(found_variant) {
			jQuery(product_list_col).find('.product-list-col-price').html(price_symbol + found_variant.display_price);
			jQuery(product_list_col).find('[name="variant_id"]').val(found_variant.variation_id);
		}
		else {
			jQuery(product_list_col).find('.product-list-col-price').html(product_initial_price);
			jQuery(product_list_col).find('[name="variant_id"]').val('');
		}
	})

	jQuery(document).on('click', '.product-list-col .btn-add-cart', function() {
		var product_list_col = jQuery(this).parents('.product-list-col');

		if(jQuery(product_list_col).find('[name="variant_id"]').val() == '') {
			alert('Please Choose Product Variant');
			return;
		}

		jQuery('body').addClass('loading');
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'add_to_cart',
				product_id: jQuery(product_list_col).find('[name="product_id"]').val(),
				variation_id: jQuery(product_list_col).find('[name="variant_id"]').val(),
				quantity: 1
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('body').removeClass('loading');
				// jQuery('#home_products_list').html(resp.html);
				jQuery('#header_cart_count').text(resp.count);
				alert('Added Successfully!');
				// jQuery('.woocommerce-notices-wrapper').show();
				// setTimeout(function(){
				// 	jQuery('.woocommerce-notices-wrapper').slideUp();
				// }, 3000);
			}
		})
	})

	jQuery(document).on('click', '.newsletter-form .btn-newsletter', function() {
		var newsletter_form = jQuery(this).parents('.newsletter-form');
		jQuery(newsletter_form).find('.newsletter-error').hide();
		jQuery(newsletter_form).find('.newsletter-success').hide();
		if(jQuery(newsletter_form).find('.input-email').val() == '') {
			jQuery(newsletter_form).find('.newsletter-error').text('Please enter your email');
			jQuery(newsletter_form).find('.newsletter-error').show();
			jQuery(newsletter_form).find('.input-email').focus();
			return;
		}

		if(!validateEmail(jQuery(newsletter_form).find('.input-email').val())) {
			jQuery(newsletter_form).find('.newsletter-error').text('Please enter valid email');
			jQuery(newsletter_form).find('.newsletter-error').show();
			jQuery(newsletter_form).find('.input-email').focus();
			return;
		}
		
		jQuery('body').addClass('loading');
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'subscribe_newsletter',
				email: jQuery(newsletter_form).find('.input-email').val()
			},
			dataType: 'json',
			success: function(resp) {
				if(resp.success) {
					jQuery(newsletter_form).find('.newsletter-success').text('Done Successfully!');
					jQuery(newsletter_form).find('.newsletter-success').show();
				}
				else {
					jQuery(newsletter_form).find('.newsletter-error').text(resp.message);
					jQuery(newsletter_form).find('.newsletter-error').show();
				}
				jQuery('body').removeClass('loading');
			}
		})
	})
</script>
</body>
</html>
