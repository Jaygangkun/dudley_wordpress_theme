<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Dudley
 * @since Dudley 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div class="header-alert">
		<span class="header-alert-text">our product guarented for life*</span>
	</div>
	<div class="header">
		<div class="container-lg">
			<div class="header-wrap">
				<a class="header-logo-link">
					<img class="header-logo_img" src="<?php echo get_template_directory_uri()?>/assets/images/logo.png">
				</a>
				<div class="header-center-menus-wrap">
					<a class="header-menu-link" href='#'>shop</a>
					<a class="header-menu-link" href='#'>directory</a>
					<a class="header-menu-link" href='#'>magazine</a>
					<a class="header-menu-link" href='#'>dogcast</a>
					<a class="header-menu-link" href='#'>our story</a>
				</div>
				<div class="header-right-menus-wrap">
					<a class="header-account-link" href="#">
						<img class="header-account-link_img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-account.png">
					</a>
					<a class="header-cart-link" href="#">
						<img class="header-cart-link_img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-cart.png">
						<span class="header-cart-link_count">2</span>
					</a>
				</div>
			</div>
		</div>
		
	</div>

