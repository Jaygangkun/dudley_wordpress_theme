<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri()?>/custom.css">
	<script>
		var ajax_url = '<?php echo admin_url('admin-ajax.php')?>';
	</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div class="header-alert">
		<span class="header-alert-text">our product guarented for life*</span>
	</div>
	<div class="header">
		<div class="container-lg">
			<div class="header-wrap">
				<a class="header-logo-link" href="/">
					<img class="header-logo_img" src="<?php echo get_template_directory_uri()?>/assets/images/logo.png">
				</a>
				<div class="header-center-menus-wrap">
					<a class="header-menu-link" href='/shop'>shop</a>
					<a class="header-menu-link" href='/directory'>directory</a>
					<a class="header-menu-link" href='/magazines'>magazine</a>
					<a class="header-menu-link" href='/dogcast'>dogcast</a>
					<a class="header-menu-link" href='/our-story'>our story</a>
				</div>
				<div class="header-right-menus-wrap">
					<a class="header-account-link" href="#">
						<img class="header-account-link_img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-account.png">
					</a>
					<a class="header-cart-link" href="/cart">
						<img class="header-cart-link_img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-cart.png">
						<span class="header-cart-link_count" id="header_cart_count"><?php echo WC()->cart->get_cart_contents_count();?></span>
					</a>
					<span class="header-hamburger-link" href="/cart">
						<img class="header-hamburger-link_img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-3lines.png">
					</span>
				</div>
			</div>
		</div>
		
	</div>