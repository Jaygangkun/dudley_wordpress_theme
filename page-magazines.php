<?php
/**
* Template Name: Magazines Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
<?php
$img = get_field('hero_image');
if(!empty($img)) {
	?>
	<div class="section-img-hero" style="background-image:url(<?php echo $img['url']?>)">
	<?php
}
?>

</div>
<section class="section-magazines">
	<div class="container-md">
		<div class="section-magazines-top">
			<h1 class="fs-50 section-magazines-title"><span class="text-highlight">DUDLEY</span> is a magazine for dog lovers.</h1>
			<p class="section-magazines-desc">Created with dog owners in mind, it's the place to go for everything dog-related. You'll not only find helpful hints and tips including dog training & health advice, but also a wide range of lifestyle content. Everything from insightful pieces on the important work of dog rescues & charities to reviews of dog-centric books & films; enjoy our "Bark Once for Service" pet friendly city guide and even celebrity interviews with their pets.</p>
			<div class="section-magazine-filter">
				<p class="section-magazine-filter-title">Filter By</p>
				<div class="magazine-filter-list">
					<?php
					$post_category_terms = get_terms(array(
						'taxonomy' => 'category'
					));

					$initial_slugs = array();
					foreach($post_category_terms as $term) {
						?>
						<span class="magazine-filter-btn" data-slug="<?php echo $term->slug?>"><?php echo $term->name?></span>
						<?Php
						$initial_slugs[] = $term->slug;
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="container-lg">
		<div class="section-magainzes-list" id="magazines_list">
			<?php
			$magazines = get_posts(array(
				'numberposts' => 9,
				'offset' => 0
			));
			foreach($magazines as $magazine) {
				?>
				<div class="section-magazine-col">
					<div class="section-magazine-col-wrap">
						<a class="section-magazine-col_img" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($magazine->ID), 'full' );?>)" href="<?php echo get_permalink($magazine->ID)?>"></a>
						<a href="<?php echo get_permalink($magazine->ID)?>"><h6 class="section-magazine-col_title"><?php echo get_the_title($magazine->ID)?></h6></a>
						<div class="section-magazine-col_desc">
							<?php 
							$excerpt = get_the_excerpt($magazine->ID);
							// $excerpt = substr($excerpt, 0, 260);
							// $result = substr($excerpt, 0, strrpos($excerpt, ' '));
							echo $excerpt;
							?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<div class="section-magazines-btn-wrap">
			<span class="btn btn-black btn-sm" id="btn_load_more_magazines" data-offset="9" data-total="<?php echo wp_count_posts()->publish;?>">read more</span>
		</div>
	</div>
</section>
<script>
	jQuery(document).on('click', '#btn_load_more_magazines', function() {
		var dom_active_filters = jQuery('.magazine-filter-btn');
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
				action: 'load_more_magazines',
				cat: cats,
				count: 3,
				offset: jQuery(this).attr('data-offset')
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('body').removeClass('loading');
				jQuery('#magazines_list').append(resp.html);
				jQuery('#btn_load_more_magazines').attr('data-offset', resp.offset);
				if(resp.offset == resp.total) {
					jQuery('#btn_load_more_magazines').hide();
				}
				else {
					jQuery('#btn_load_more_magazines').show();
				}
			}
		})
	})

	jQuery(document).on('click', '.magazine-filter-btn', function() {
		
		if(jQuery(this).hasClass('active')) {
			jQuery(this).removeClass('active');
		}
		else {
			jQuery(this).addClass('active');
		}
		
		var dom_active_filters = jQuery('.magazine-filter-btn');
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
				action: 'load_more_magazines',
				cat: cats,
				count: 9,
				offset: 0
			},
			dataType: 'json',
			success: function(resp) {
				jQuery('body').removeClass('loading');
				jQuery('#magazines_list').html(resp.html);
				jQuery('#btn_load_more_magazines').attr('data-offset', resp.offset);
				if(resp.offset == resp.total) {
					jQuery('#btn_load_more_magazines').hide();
				}
				else {
					jQuery('#btn_load_more_magazines').show();	
				}
			}
		})
	})
	jQuery(document).ready(function() {
		
	})
</script>
<?php get_footer() ?>