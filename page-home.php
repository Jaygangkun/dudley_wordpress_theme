<?php
/**
* Template Name: Home Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
<script src="<?php echo get_template_directory_uri()?>/assets/lib/slick-slider/slick.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/lib/slick-slider/slick.css">
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/lib/slick-slider/slick-theme.css">
<section class="section-hero-slider">
	<div class="container-md">
		<div class="hero-slider">
			<div class="">
				<div class="hero-slide-wrap">
					<div class="hero-slide-wrap-left">
						<h1 class="hero-slide-text">Dudley & Co is a British label for dogs, and the humans who love them. Our products deliver on the promise of <span class="text-highlight">‘luxury that lasts’.</span></h1>
						<a class="btn btn-black btn-lg" href="">shop the collection</a>
					</div>
					<div class="hero-slide-wrap-right">
						<div class="hero-slide-img-wrap">
							<img class="hero-slide-img" src="<?php echo get_template_directory_uri()?>/assets/images/slider-img.png">
						</div>
					</div>
				</div>
			</div>
			<div class="">
				<div class="hero-slide-wrap">
					<div class="hero-slide-wrap-left">
						<h1 class="hero-slide-text">Dudley & Co is a British label for dogs, and the humans who love them. Our products deliver on the promise of <span class="text-highlight">‘luxury that lasts’.</span></h1>
						<a class="btn btn-black btn-lg" href="">shop the collection</a>
					</div>
					<div class="hero-slide-wrap-right">
						<div class="hero-slide-img-wrap">
							<img class="hero-slide-img" src="<?php echo get_template_directory_uri()?>/assets/images/slider-img.png">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-newsletter">
	<div class="container-lg">
		<div class="section-newsletter-wrap">
			<div class="section-newsletter-wrap-left">
				<h1 class="newsletter-title"><span class="text-highlight text-highlight-white">Sign Up</span> For Dudley & Co News</h1>
			</div>
			<div class="section-newsletter-wrap-right">
				<div class="input-btn-group">
					<input type="text" placeholder="Enter your email">
					<span class="btn btn-black btn-sm">Sign up</span>
				</div>
				<p class="newsletter-input-desc fs-15">By signing up you agree to our <a class="link" href="">Privacy Policy</a> and <a class="" href="">Terms and Conditions</a></p>
			</div>
		</div>
	</div>
</section>
<section class="section-signature-products">
	<div class="container-lg">
		<div class="section-signature-products-top">
			<h1 class="signature-products-title"><span class="text-highlight">Shop</span> Signature Products</h1>
			<div class="">
				<span class="signature-products-cat-btn active" data-cat="dogs">Dogs</span>
				<span class="signature-products-cat-btn" data-cat="human">Humans</span>
			</div>
		</div>		
		<div class="section-signature-products-list products-list" id="home_products_list">
			<?php
			$products = get_posts(array(
				'post_type'             => 'product',
				'orderby' => 'rand',
				'numberposts' => 4,
				'tax_query'             => array(
					// 'relation' => 'OR',
					array(
						'taxonomy'      => 'product_cat',
						'field'         => 'slug',
						'terms'         => array('dog_clothing', 'dog_accessories'),
						'operator'      => 'IN'
					),
					// array(
					// 	'taxonomy'      => 'product_cat',
					// 	'field'         => 'slug',
					// 	'terms'         => 'mens_clothing', 
					// 	// 'operator'      => 'IN'
					// )
				)
			));
			
			foreach($products as $product) {
				$product_obj = wc_get_product($product->ID);

				$get_variations = count( $product_obj->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product_obj );
				$available_variations = $get_variations ? $product_obj->get_available_variations() : false;
				$attributes = $product_obj->get_variation_attributes();
				$selected_attributes = $product_obj->get_default_attributes();


				// single-product/add-to-cart/variable.php
				$attribute_keys  = array_keys( $attributes );
				$variations_json = wp_json_encode( $available_variations );
				$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
				
				?>
				<div class="product-list-col" data-product-variants="<?php echo $variations_attr;?>" data-product-initial-price="<?php echo function_exists( 'wc_esc_json' ) ? wc_esc_json( $product_obj->get_price_html() ) : _wp_specialchars( $product_obj->get_price_html(), ENT_QUOTES, 'UTF-8', true )?>">
					<div class="product-list-col-wrap">
						<div class="product-list-col-img-wrap" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($product->ID), 'full' );?>)"></div>
						<a class="text-link" href="<?php echo get_permalink($product->ID)?>"><h6 class="product-list-col-title"><?php echo get_the_title($product->ID)?></h6></a>
						<p class="product-list-col-price"><?php echo $product_obj->get_price_html();?></p>
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
													'product'   => $product_obj,
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
						<input type='hidden' name="product_id" value="<?php echo $product->ID?>">
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
			}
			?>
		</div>
	</div>
</section>
<section class="section-feature">
	<div class="section-feature-top">
		<img class="section-feature-img" src="<?php echo get_template_directory_uri()?>/assets/images/img-feature.png">
		<h1 class="section-feature-title">Luxury, Quality, Durability</h1>
	</div>
	<div class="container-lg">
		<div class="section-feature-list">
			<div class="section-feature-col">
				<h6 class="section-feature-col-title">✓ Made in Britain</h6>
				<p class="section-feature-desc">Fiercely proud of our British heritage, our entire range is designed and manufactured in the UK.</p>
			</div>
			<div class="section-feature-col">
				<h6 class="section-feature-col-title">✓ Performance Fabrics</h6>
				<p class="section-feature-desc">We’ve sourced high performance fabrics that use technology to deliver on their promise to keep your dog dry and comfortable.</p>
			</div>
			<div class="section-feature-col">
				<h6 class="section-feature-col-title">✓ Double Stitching</h6>
				<p class="section-feature-desc">We use double stitching on all our products to ensure our seams will be strong enough for playful and active dogs.</p>
			</div>
			<div class="section-feature-col">
				<h6 class="section-feature-col-title">✓ Superior Quality towelling</h6>
				<p class="section-feature-desc">Made from organic bamboo, our towelling is soft & luxurious,reminiscent of hotel bathrobes.</p>
			</div>
		</div>
	</div>
</section>
<section class="section-testimonials">
	<div class="container-md">
		<div class="section-testimonial-wrap">
			<div class="section-testimonial-wrap-left">
				<div class="section-testimonial-img-wrap">
					<img class="section-testimonial-img" src="<?php echo get_template_directory_uri()?>/assets/images/slider-img.png">
				</div>
			</div>
			<div class="section-testimonial-wrap-right">
				<h1 class="">“Absolutely LOVE! My dog loves its jacket and never wants to take it off ”</h1>
				<p class="section-testimonial-name">Katie Ling, Tatler</p>
			</div>
		</div>
	</div>
</section>
<section class="section-instagrams">
	<div class="container-lg">
		<h1 class="section-instagram-title">Follow us <span class="text-highlight">@wearedudleyandco</span></h1>
		<div class="section-instagram-img-list">
			<img class="section-instagram-img" src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img1.png">
			<img class="section-instagram-img" src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img2.png">
			<img class="section-instagram-img" src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img3.png">
			<img class="section-instagram-img" src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img4.png">
		</div>
		<div class="trustpilot-img-wrap">
			<img class="trustpilot-img" src="<?php echo get_template_directory_uri()?>/assets/images/trustpilot.png">
		</div>
	</div>
</section>
<script>
	jQuery(document).ready(function() {
		jQuery('.hero-slider').slick({
			prevArrow: '<img class="hero-slider-arrow-toleft" src="<?php echo get_template_directory_uri()?>/assets/images/icon-arrow-toleft.png">',
			nextArrow: '<img class="hero-slider-arrow-toright" src="<?php echo get_template_directory_uri()?>/assets/images/icon-arrow-toright.png">'
		});
	})

	jQuery(document).on('click', '.signature-products-cat-btn', function() {
		jQuery('.signature-products-cat-btn').removeClass('active');
		jQuery(this).addClass('active');

		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'load_home_products',
				cat: jQuery(this).attr('data-cat')
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('#home_products_list').html(resp.html);
			}
		})
	})
</script>
<?php get_footer() ?>