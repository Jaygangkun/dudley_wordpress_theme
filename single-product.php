<?php
/**
 * The template for displaying all single product
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
	<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<script>
	jQuery(document).ready(function() {
		
	})
</script>
<?php get_footer() ?>
