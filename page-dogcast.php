<?php
/**
* Template Name: Dogcast Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>

<section class="section-dogcast-hero">
	<div class="container-md">
		<div class="section-dogcast-hero-wrap">
			<div class="section-dogcast-hero-wrap-left">
				<h1 class="section-dogcast-hero_title fs-50"><?php the_field('title')?></h1>
				<p class="section-dogcast-hero_desc"><?php the_field('description')?></p>
			</div>
			<div class="section-dogcast-hero-wrap-right">
				<div class="section-dogcast-hero-img-wrap">
					<?php
					$img = get_field('hero_image');
					if(!empty($img)) {
						?>
						<img class="" src="<?php echo $img['url']?>">
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-dogcast-list">
	<div class="container-lg">
		<div class="section-dogcast-list-wrap">
			<?php if( have_rows('list') ): while ( have_rows('list') ) : the_row(); ?>
				<div class="section-dogcast-list-col">
					<?php
					$img = get_sub_field('image');
					$img_src = '';
					if(!empty($img)) {
						$img_src = $img['url'];
					}
					?>
					<div class="section-dogcast-list-col-img-wrap" style="background-image:url(<?php echo $img_src;?>)">
						<h5 class="section-dogcast-list-col_vtitle"><?php the_sub_field('image_title')?></h5>
					</div>
					<h6 class="section-dogcast-list-col_title"><?php the_sub_field('title')?></h6>
					<p class="section-dogcast-list-col_desc"><?php the_sub_field('description')?></p>
					<p class="section-dogcast-list-col_date"><?php the_sub_field('date')?></p>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
</section>
<script>
	jQuery(document).ready(function() {
		
	})
</script>
<?php get_footer() ?>