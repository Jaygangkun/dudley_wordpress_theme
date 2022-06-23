<?php
/**
 * Show the appropriate content for the Video post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Dudley
 * @since Dudley 1.0
 */

$content = get_the_content();

if ( has_block( 'core/video', $content ) ) {
	Dudley_print_first_instance_of_block( 'core/video', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	Dudley_print_first_instance_of_block( 'core/embed', $content );
} else {
	Dudley_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
the_excerpt();
