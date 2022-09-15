
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
<section class="section-legal">
	<div class="container-sm">
		<div class="section-single-magazine-content">
			<?php
			while ( have_posts() ) :
				?>
				<div class="page-container">
					<div class="container-lg">
						<?php
						the_post();
						get_template_part( 'content', 'page' );
						?>
					</div>
				</div>
				<?php
			endwhile; // End of the loop.
			?>
		</div>
	</div>
</section>
<?php get_footer() ?>