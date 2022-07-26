<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Dudley
 * @since Dudley 1.0
 */

get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="section-single-magazine-hero" style="background-image:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'full' );?>)">
	</section>
	<section class="section-single-magazine-container">
		<div class="container-sm">
			<h1 class="fs-50 section-single-magazine-title"><?php the_title(); ?></h1>
			<p class="section-single-magazine-author">Words by <?php echo get_the_author()?></p>
			<div class="section-single-magazine-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<section class="section-single-magazine-more-like">
		<div class="container-lg">
			<h1 class="fs-50 section-single-magazine-more-like__title"><span class="text-highlight">More like this</span></h1>
			<div class="section-magainzes-list">
				<?php
				$related_magazines = get_posts(array(
					'numberposts' => 3,
					'post__not_in' => array( get_the_ID() ),
					'orderby' => 'rand',
				));
				foreach($related_magazines as $magazine) {
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
				?>
			</div>
		</div>
	</section>
<?php endwhile; ?>
<?php endif; ?>
<script>
	jQuery(document).ready(function() {
		
	})
</script>
<?php get_footer() ?>
