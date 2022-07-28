
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

/* Start the Loop */
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

get_footer();
