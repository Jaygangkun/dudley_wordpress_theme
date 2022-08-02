<?php
/**
* Template Name: Shop Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
<section class="section-shop-hero" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/shop-hero.png)">
	<div class="container-lg">
		<h1 class="section-shop-hero-title">shop the edit your dog will thank you</h1>
	</div>
</section>
<section class="section-products">
	<div class="container-lg">
		<div class="section-products-top">
			<div class="section-products-filter desktop">
				<span class="section-products-filter-title">Filter By:</span>
				<span class="section-products-filter-btn" data-cat="dogs">dogs</span>
				<span class="section-products-filter-btn" data-cat="human">apparel</span>
				<span class="section-products-filter-btn active" data-cat="all">view all</span>
			</div>
			<div class="section-products-filter mobile">
				<span class="section-products-filter-title">Filter By:</span>
				<select class="section-products-filter-select">
					<option value="dogs">dogs</option>
					<option value="human">apparel</option>
					<option value="all" selected>all</option>
				</select>
			</div>

			<div class="section-products-sort">
				<span class="section-products-sort-title">Sort By:</span>
				<select class="section-products-sort-select">
					<option value="asc">price low to high</option>
					<option value="desc">price high to low</option>
				</select>
			</div>
		</div>
		<div class="section-products-list products-list" id="show_products_list">
		<?php
			$products = array_merge(
				get_posts(array(
					'post_type'             => 'product',
					// 'orderby' => 'rand',
					'numberposts' => -1,
					'posts_per_page' => -1,
					'orderby'        => 'meta_value_num',
					'order'          => 'ASC',
					'meta_key'       => '_price',
					'tax_query'             => array(
						array(
							'taxonomy'      => 'product_cat',
							'field'         => 'slug',
							'terms'         => array('dog_clothing', 'dog_accessories'),
							'operator'      => 'IN'
						),
					)
				)),
				get_posts(array(
					'post_type'             => 'product',
					// 'orderby' => 'rand',
					'numberposts' => -1,
					'posts_per_page' => -1,
					'orderby'        => 'meta_value_num',
					'order'          => 'ASC',
					'meta_key'       => '_price',
					'tax_query'             => array(
						array(
							'taxonomy'      => 'product_cat',
							'field'         => 'slug',
							'terms'         => array('doglovers_clothing'),
							'operator'      => 'IN'
						),
					)
				))
			);
			
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
						<span class="btn btn-black btn-lg product-list-col-btn btn-add-cart">Add To Basket</span>
					</div>
				</div>
				<?php
			}
			?>
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
	</div>
</section>
<script>
	jQuery(document).ready(function() {
		
	})

	jQuery(document).on('click', '.section-products-filter-btn', function() {
		jQuery('.section-products-filter-btn').removeClass('active');
		jQuery(this).addClass('active');

		jQuery('.section-products-filter-selec').val(jQuery(this).attr('data-cat'));
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'load_shop_products',
				cat: jQuery(this).attr('data-cat'),
				sort: jQuery('.section-products-sort-select').val()
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('#show_products_list').html(resp.html);
			}
		})
	})

	jQuery(document).on('change', '.section-products-filter-select', function() {
		
		jQuery('.section-products-filter-btn').removeClass("active");
		jQuery('.section-products-filter-btn[data-cat="' + jQuery(this).val() + '"]').addClass("active");

		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'load_shop_products',
				cat: jQuery('.section-products-filter-btn.active').attr('data-cat'),
				sort: jQuery('.section-products-sort-select').val()
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('#show_products_list').html(resp.html);
			}
		})
	})

	jQuery(document).on('change', '.section-products-sort-select', function() {		
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'load_shop_products',
				cat: jQuery('.section-products-filter-btn.active').attr('data-cat'),
				sort: jQuery('.section-products-sort-select').val()
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('#show_products_list').html(resp.html);
			}
		})
	})
</script>
<?php get_footer() ?>