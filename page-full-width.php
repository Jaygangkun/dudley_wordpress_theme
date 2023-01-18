
<?php
/**
* Template Name: Full Width Page
*
* @package WordPress
* @subpackage 
* @since 
*/

get_header();
?>
<div class="page-full-width">
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
<?php get_footer() ?>