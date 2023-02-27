<?php
/**
* Template Name: Directory Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>

<section class="section-directory-head">
	<div class="container-sm">
		<h1>Directory</h1>
		<p class="section-directory-head-desc"><?php the_field('description')?></p>
	</div>
	<div class="container-lg">
		<div class="section-directory-filter">
			<p class="section-directory-filter-title">Filter By</p>
			<div class="directory-filter-list">
				<?php
				$directory_term = get_term_by('slug', 'directory', 'product_cat');
				$terms = get_terms(array('product_cat'), array(
					'parent' => $directory_term->term_id,
				));

				$initial_slugs = array();
				foreach($terms as $term) {
					?>
					<span class="directory-filter-btn" data-slug="<?php echo $term->slug?>"><?php echo $term->name?></span>
					<?Php
					$initial_slugs[] = $term->slug;
				}
				?>
			</div>
		</div>
	</div>
</section>
<?php
$products = get_posts(array(
	'post_type'             => 'product',
	// 'orderby' => 'rand',
	'numberposts' => -1,
	'posts_per_page' => -1,
	'orderby'        => 'meta_value_num',
	'order'          => 'ASC',
	'meta_key'       => '_price',
	'tax_query'             => array(
		// 'relation' => 'OR',
		array(
			'taxonomy'      => 'product_cat',
			'field'         => 'slug',
			'terms'         => array('directory'),
			'operator'      => 'IN'
		),
	)
));

$filter_brands = [];

foreach($products as $product) {
	$brand = trim(get_field('brand', $product->ID));
	if(!in_array($brand, $filter_brands) && $brand != '') {
		$filter_brands[] = $brand;
	}
}

$colors = get_terms(array(
	'taxonomy' => 'pa_color',
	'hide_empty' => false,
));
?>
<section class="section-directory">
	<div class="container-lg">
		<div class="section-directory-top">
			<div class="section-directory-selects">
				<select class="section-directory-select" id="select_brand">
					<option value="">BRAND</option>
					<?php 
					foreach($filter_brands as $filter_brand) {
						?>
						<option value="<?php echo $filter_brand?>"><?php echo $filter_brand?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="section-directory-sort">
				<span class="section-directory-sort-title">Sort By:</span>
				<select class="section-directory-sort-select" id="select_price_sort">
					<option value="asc">price low to high</option>
					<option value="desc">price high to low</option>
				</select>
			</div>
		</div>
		<div class="section-directory-list" id="directory_list">
			<?php
			foreach($products as $product) {
				$product_obj = wc_get_product($product);
				if(!$product_obj->is_type('external')) {
					continue;
				}
				?>
				<div class="directory-list-col">
					<div class="directory-list-col-wrap">
						<div class="directory-list-col-img-wrap" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($product->ID), 'full' );?>)"></div>
						<h6 class="directory-list-col-title"><?php echo get_the_title($product->ID)?></h6>
						<p class="directory-list-col-price"><?php echo $product_obj->get_price_html()?></p>
						<p class="directory-list-col-brand">
							<a href="<?php echo $product_obj->get_product_url()?>" target="_blank"><?php echo get_field('brand', $product->ID)?></a>
						</p>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
<?php get_template_part('content', 'instagram');?>
<script>
	jQuery(document).ready(function() {
		
	})

	function searchDirectory() {		
		var dom_active_filters = jQuery('.directory-filter-btn');
		var cats = [];
		for(var index = 0; index < dom_active_filters.length; index ++) {
			if(jQuery(dom_active_filters[index]).hasClass('active')) {
				cats.push(jQuery(dom_active_filters[index]).data('slug'));
			}
		}

		jQuery('body').addClass('loading');
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'load_directories',
				cat: cats,
				brand: jQuery('#select_brand').val(),
				sort: jQuery('#select_price_sort').val()
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('body').removeClass('loading');
				jQuery('#directory_list').html(resp.html);
			}
		})
	}

	jQuery(document).on('click', '.directory-filter-btn', function() {
		
		if(jQuery(this).hasClass('active')) {
			jQuery(this).removeClass('active');
		}
		else {
			jQuery(this).addClass('active');
		}

		searchDirectory();
	})

	jQuery(document).on('change', '#select_brand', function() {
		searchDirectory();
	})

	jQuery(document).on('change', '#select_price_sort', function() {
		searchDirectory();
	})


</script>
<?php get_footer() ?>