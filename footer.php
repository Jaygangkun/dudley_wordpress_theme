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
					<li><a class="footer-menu-link" href="">Our Story</a></li>
					<li><a class="footer-menu-link" href="">Shipping & Returns</a></li>
					<li><a class="footer-menu-link" href="">Doggie Do-Gooders</a></li>
					<li><a class="footer-menu-link" href="">Sizing your Dog</a></li>
				<ul>
			</div>
			<div class="footer-menu-group">
				<h6 class="footer-menu-group-title">legal</h6>
				<ul>
					<li><a class="footer-menu-link" href="">Terms & Condition</a></li>
					<li><a class="footer-menu-link" href="">Privacy Policy</a></li>
				<ul>
			</div>
			<div class="footer-menu-group">
				<h6 class="footer-menu-group-title">follow us</h6>
				<ul>
					<li><a class="footer-menu-link" href="">Facebook</a></li>
					<li><a class="footer-menu-link" href="">Twitter</a></li>
					<li><a class="footer-menu-link" href="">Pinterest</a></li>
					<li><a class="footer-menu-link" href="">Instagram</a></li>
				<ul>
			</div>
			<div class="footer-space"></div>
			<div class="footer-newsletter">
				<h2 class="footer-newsletter-title">Sign up to our mailing list</h2>
				<div class="input-btn-group">
					<input type="text" placeholder="Enter your email">
					<span class="btn btn-black btn-sm">Sign up</span>
				</div>
				<p class="newsletter-input-desc fs-15">By signing up you agree to our <a class="link" href="">Privacy Policy</a> and <a class="" href="">Terms and Conditions</a></p>
			</div>
		</div>
		<div class="footer-bottom">
			<p class="footer-copyright">© 2021 House of Dudley LtdPayment methods</p>
			<img class="footer-bottom_img" src="<?php echo get_template_directory_uri()?>/assets/images/img-payment.png">
		</div>
	</div>
</div>

<?php wp_footer(); ?>
<script>
	var price_symbol = '<?php echo get_woocommerce_currency_symbol();?>';
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
</script>
</body>
</html>
