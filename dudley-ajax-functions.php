<?php
function load_more_magazines() {
	$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
	$magazines = get_posts(array(
		'numberposts' => 3,
		'offset' => $offset
	));

	ob_start();
	foreach($magazines as $magazine) {
		?>
		<div class="section-magazine-col">
			<div class="section-magazine-col-wrap">
				<a class="section-magazine-col_img" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($magazine->ID), 'full' );?>)" href="<?php echo get_permalink($magazine->ID)?>"></a>
				<a href="<?php echo get_permalink($magazine->ID)?>"><h6 class="section-magazine-col_title"><?php echo get_the_title($magazine->ID)?></h6></a>
				<div class="section-magazine-col_desc">
					<?php 
					$excerpt = get_the_excerpt($magazine->ID);
					$excerpt = substr($excerpt, 0, 260);
					$result = substr($excerpt, 0, strrpos($excerpt, ' '));
					echo $result;
					?>
				</div>
				<p class="section-magazine-col_date"><?php echo get_the_date('F Y', $magazine->ID)?></p>
			</div>
		</div>
		<?php
	}
	$html = ob_get_contents();
	ob_end_clean();

	echo json_encode(array(
		'offset' => $offset + count($magazines),
		'html' => $html
	));

	die();
}

add_action("wp_ajax_load_more_magazines", "load_more_magazines");
add_action("wp_ajax_nopriv_load_more_magazines", "load_more_magazines");


function load_home_products() {

	$terms = array('dog_clothing', 'dog_accessories');

	if(isset($_POST['cat']) && $_POST['cat'] == 'human') {
		$terms = array('mens_clothing', 'womens_clothing');
	}
	$products = get_posts(array(
		'post_type'             => 'product',
		'orderby' => 'rand',
		'numberposts' => 4,
		'tax_query'             => array(
			array(
				'taxonomy'      => 'product_cat',
				'field'         => 'slug',
				'terms'         => $terms,
				'operator'      => 'IN'
			),
		)
	));
	ob_start();
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
	$html = ob_get_contents();
	ob_end_clean();

	echo json_encode(array(
		'html' => $html
	));
	die();
}

add_action("wp_ajax_load_home_products", "load_home_products");
add_action("wp_ajax_nopriv_load_home_products", "load_home_products");

function load_shop_products() {

	$terms = array('dog_clothing', 'dog_accessories');
    $order = 'ASC';

	if(isset($_POST['cat']) && $_POST['cat'] == 'human') {
		$terms = array('mens_clothing', 'womens_clothing');
	}

    if(isset($_POST['cat']) && $_POST['cat'] == 'all') {
		$terms = array('dog_clothing', 'dog_accessories', 'mens_clothing', 'womens_clothing');
	}

    if(isset($_POST['sort']) && $_POST['sort'] == 'desc') {
		$order = 'DESC';
	}

	$products = get_posts(array(
		'post_type'             => 'product',
		// 'orderby' => 'rand',
        'numberposts' => -1,
        'posts_per_page' => -1,
        'orderby'        => 'meta_value_num',
        'order'          => $order,
        'meta_key'       => '_price',
		'tax_query'             => array(
			array(
				'taxonomy'      => 'product_cat',
				'field'         => 'slug',
				'terms'         => $terms,
				'operator'      => 'IN'
			),
		)
	));
	ob_start();
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
	$html = ob_get_contents();
	ob_end_clean();

	echo json_encode(array(
		'html' => $html
	));
	die();
}

add_action("wp_ajax_load_shop_products", "load_shop_products");
add_action("wp_ajax_nopriv_load_shop_products", "load_shop_products");

function add_to_cart() {
	WC()->cart->add_to_cart( $_POST['product_id'], $_POST['quantity'], $_POST['variation_id'] );
	echo json_encode(array(
		'success' => true,
		'count' => WC()->cart->get_cart_contents_count()
	));
	die();
}

add_action("wp_ajax_add_to_cart", "add_to_cart");
add_action("wp_ajax_nopriv_add_to_cart", "add_to_cart");

function load_directories() {

	$terms = array('directory');
    $order = 'ASC';

	if(isset($_POST['cat'])) {
		$terms = $_POST['cat'];
	}


    if(isset($_POST['sort']) && $_POST['sort'] == 'desc') {
		$order = 'DESC';
	}

	$products = get_posts(array(
		'post_type'             => 'product',
		// 'orderby' => 'rand',
        'numberposts' => -1,
        'posts_per_page' => -1,
        'orderby'        => 'meta_value_num',
        'order'          => $order,
        'meta_key'       => '_price',
		'tax_query'             => array(
			array(
				'taxonomy'      => 'product_cat',
				'field'         => 'slug',
				'terms'         => $terms,
				'operator'      => 'IN'
			),
		)
	));
	ob_start();
	foreach($products as $product) {
        ?>
        <div class="directory-list-col">
            <div class="directory-list-col-wrap">
                <div class="directory-list-col-img-wrap" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($product->ID), 'full' );?>)"></div>
                <a class="text-link" href="<?php echo get_field('product_link', $product->ID)?>"><h6 class="directory-list-col-title"><?php echo get_the_title($product->ID)?></h6></a>
                <p class="directory-list-col-brand"><?php echo get_field('brand', $product->ID)?></p>
                <p class="directory-list-col-price"><?php echo get_field('price', $product->ID)?></p>
            </div>
        </div>
        <?php
    }
	$html = ob_get_contents();
	ob_end_clean();

	echo json_encode(array(
		'html' => $html
	));
	die();
}

add_action("wp_ajax_load_directories", "load_directories");
add_action("wp_ajax_nopriv_load_directories", "load_directories");

?>