<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

global $product;

$product_id = $product->get_id();

?>
<div class="woocommerce-notices-wrapper" style="display: none">
	<div class="woocommerce-message" role="alert">
		<a href="http://mrsthoughtful.co.uk/cart/" tabindex="1" class="button wc-forward">View cart</a> “<?php echo get_the_title($product->ID)?>” has been added to your cart.	</div>
</div>
<section class="section-product-detail" id="product_detail">
	<input type="hidden" id="product_id" value="<?php echo $product_id?>">
	<input type="hidden" id="variation_id">
	<div class="container-lg">
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
			<div class="product-detail-container">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				// do_action( 'woocommerce_before_single_product_summary' );
				?>
				<div class="product-details-left">
					<div class="product-detail-imgs">
						<div class="product-detail-product-img-list">
							<?php
							$attachment_ids = $product->get_gallery_image_ids();
							
							if ( $attachment_ids && $product->get_image_id() ) {
								foreach ( $attachment_ids as $attachment_id ) {
									$full_src = wp_get_attachment_image_src( $attachment_id, 'full' );
									?>
									<img class="" src="<?php echo $full_src[0]?>">
									<?php
								}
							}
							?>
						</div>
						<div class="product-detail-product-img-preview">
							<?php
							$post_thumbnail_id = $product->get_image_id();
							$full_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
							?>
							<img class="" src="<?php echo $full_src[0]?>">
						</div>
					</div>
				</div>
				<div class="product-details-right">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					// do_action( 'woocommerce_single_product_summary' );
					
					
					?>
					<?php
					// do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );

					// woocommerce_variable_add_to_cart
					wp_enqueue_script( 'wc-add-to-cart-variation' );
					$get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );
					$main_available_variations = $get_variations ? $product->get_available_variations() : false;
					$attributes = $product->get_variation_attributes();
					$selected_attributes = $product->get_default_attributes();


					// single-product/add-to-cart/variable.php
					$attribute_keys  = array_keys( $attributes );
					$variations_json = wp_json_encode( $main_available_variations );
					$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

					?>
					<?php the_title( '<h1 class="product-detail-title">', '</h1>' );?>
					<p class="product-detail-price"><?php echo $product->get_price_html(); ?></p>
					<?php
					foreach ( $attributes as $attribute_name => $options ) {
						?>
						<div class="product-detail-variant-wrap">
							<div class="product-detail-variant-title"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></div>
							<div class="product-detail-variant-select">
								<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
								?>
							</div>
						</div>
						<?php
					}
					?>
					<div class="product-detail-variant-wrap">
						<div class="product-detail-variant-title">Quantity</div>
						<div class="product-detail-variant-select">
							<input type="text" id="quantity" value="1">
						</div>
					</div>
					<button class="product-detail-btn-add-cart" id="btn_add_cart">Add to bag</button>
					<div class="product-detail-payment">
						<div class="product-detail-payment-row">
							<img class="product-detail-payment-img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-clearpay.png">
							<p class="product-detail-payment-desc">Make 4 interest-free payments from £15.00 bi-weekly. More info</p>
						</div>
					</div>
					<?php
					$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
					if ( ! empty( $product_tabs ) ) :
					?>
						<div class="product-detail-others">
							<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
								<div class="product-detail-accordion">
									<div class="product-detail-accordion-head">
										<span class="product-detail-accordion-title"><?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?></span>
										<span class="product-detail-accordion-icon">
											<img class="product-detail-accordion-icon_img" minus src="<?php echo get_template_directory_uri()?>/assets/images/icon-minus.png">
											<img class="product-detail-accordion-icon_img" plus src="<?php echo get_template_directory_uri()?>/assets/images/icon-plus.png">
										</span>
									</div>
									<div class="product-detail-accordion-body" style="display:none">
										<?php
										if ( isset( $product_tab['callback'] ) ) {
											call_user_func( $product_tab['callback'], $key, $product_tab );
										}
										?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>

				<?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				// do_action( 'woocommerce_after_single_product_summary' );
				?>
			</div>
		</div>
	</div>
</section>
<section class="section-collection-products">
	<div class="container-lg">
		<h1 class=""><span class="f-italic">More</span> In The Collection</h1>
		<?php
		$args = array(
			'posts_per_page' => 4,
			'columns'        => 2,
			'orderby'        => 'rand', // @codingStandardsIgnoreLine.
			'order'          => 'desc',
		);

		// Get visible related products then sort them at random.
		$related_products = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $posts_per_page, $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

		// Handle orderby.
		$related_products = wc_products_array_orderby( $related_products, $args['orderby'], $args['order'] );

		// Set global loop values.
		wc_set_loop_prop( 'name', 'related' );
		wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_related_products_columns', $args['columns'] ) );

		if ( $related_products ) :
			?>
				<div class="section-collection-products-list products-list">
					<?php
					foreach ( $related_products as $related_product ) :
						$post_object = get_post( $related_product->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
						global $product;

						$get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );
						$available_variations = $get_variations ? $product->get_available_variations() : false;
						$attributes = $product->get_variation_attributes();
						$selected_attributes = $product->get_default_attributes();
	
	
						// single-product/add-to-cart/variable.php
						$attribute_keys  = array_keys( $attributes );
						$variations_json = wp_json_encode( $available_variations );
						$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
						
						?>
						<div class="product-list-col" data-product-variants="<?php echo $variations_attr;?>" data-product-initial-price="<?php echo function_exists( 'wc_esc_json' ) ? wc_esc_json( $product->get_price_html() ) : _wp_specialchars( $product->get_price_html(), ENT_QUOTES, 'UTF-8', true )?>">
							<div class="product-list-col-wrap">
								<div class="product-list-col-img-wrap" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($product->get_id()), 'full' );?>)"></div>
								<a class="text-link" href="<?php echo get_permalink($product->get_id())?>"><h6 class="product-list-col-title"><?php echo get_the_title($product->get_id())?></h6></a>
								<p class="product-list-col-price"><?php echo $product->get_price_html()?></p>
								<div class="product-list-detail-variants-row">
									<?php
									foreach ( $attributes as $attribute_name => $options ) {
										?>
										<div class="product-list-detail-variant-col">
											<div class="product-detail-variant-wrap">
												<div class="product-detail-variant-title"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></div>
												<div class="product-detail-variant-select">
													<?php
													wc_dropdown_variation_attribute_options(
														array(
															'options'   => $options,
															'attribute' => $attribute_name,
															'product'   => $product,
														)
													);
													?>
												</div>
											</div>
										</div>
										<?php
									}
									?>
								</div>
								<input type='hidden' name="variant_id">
								<input type='hidden' name="product_id" value="<?php echo $product->get_id()?>">
								
								<p class="product-list-col-desc">
									<?php 
									$excerpt = get_the_excerpt($product->ID);
									$excerpt = substr($excerpt, 0, 260);
									$result = substr($excerpt, 0, strrpos($excerpt, ' '));
									echo $result;
									?>
								</p>
								<span class="btn btn-black btn-lg product-list-col-btn btn-add-cart">Add To Basket</span>
							</div>
						</div>
						<?php
					endforeach;
					?>
				</div>
			<?php
		endif;
		?>
	</div>
</section>
<?php do_action( 'woocommerce_after_single_product' ); ?>
<script>
	var data_product_variations = <?php echo json_encode($main_available_variations);?>;
	var data_product_initial_price = jQuery('.product-detail-price').html();

	function updatePrice() {
		var selected_variants = [];
		var dom_variant_selects = jQuery('#product_detail .product-detail-variant-select select');
		for(var index = 0; index < dom_variant_selects.length; index ++) {
			selected_variants.push({
				attribute_name: jQuery(dom_variant_selects[index]).data('attribute_name'),
				attribute_val: jQuery(dom_variant_selects[index]).val()
			});
		}

		// finding product variant
		var found_variant = null;
		for(var index = 0; index < data_product_variations.length; index ++) {
			var attributes = data_product_variations[index]['attributes'];
			var bfound = true;
			for(var vindex = 0; vindex < selected_variants.length; vindex ++) {
				if(attributes[selected_variants[vindex].attribute_name] != selected_variants[vindex].attribute_val) {
					bfound = false;
					break;
				}
			}

			if(bfound) {
				found_variant = data_product_variations[index];
				break;
			}
		}

		if(found_variant) {
			jQuery('#product_detail .product-detail-price').html(price_symbol + found_variant.display_price.toFixed(2) + (found_variant.is_in_stock ? '' : '<span class="stock out-of-stock">Out of stock</span>'));
			jQuery('#product_detail #variation_id').val(found_variant.variation_id);
		}
		else {
			jQuery('.product-detail-price').html(data_product_initial_price);
			jQuery('#product_detail #variation_id').val('');
		}
	}

	jQuery(document).on('change', '#product_detail .product-detail-variant-select select', function() {
		updatePrice();
	})

	updatePrice();

	jQuery(document).on('click', '#product_detail #btn_add_cart', function() {
		if(jQuery('#product_detail #variation_id').val() == '') {
			alert('Please Choose Product Variant');
			return;
		}
		
		if(jQuery('#product_detail #quantity').val() == '') {
			alert('Please Input Quantity');
			return;
		}

		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'add_to_cart',
				product_id: jQuery('#product_detail #product_id').val(),
				variation_id: jQuery('#product_detail #variation_id').val(),
				quantity: jQuery('#product_detail #quantity').val()
			},
			dataType: 'json',
			success: function(resp) {
				// jQuery('#home_products_list').html(resp.html);
				alert('Added Successfully!');
				jQuery('#header_cart_count').text(resp.count);
				// jQuery('.woocommerce-notices-wrapper').show();
				// setTimeout(function(){
				// 	jQuery('.woocommerce-notices-wrapper').slideUp();
				// }, 3000);
			}
		})
	})
</script>
