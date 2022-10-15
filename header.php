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
		var price_symbol = '<?php echo get_woocommerce_currency_symbol();?>';
	</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div class="header-alert">
		<span class="header-alert-text">Our products guarenteed for life <a href="/legal?subpage=terms-conditions">*</a></span>
	</div>
	<div class="header">
		<div class="container-lg">
			<div class="header-wrap">
				<a class="header-logo-link" href="/">
					<img class="header-logo_img" src="<?php echo get_template_directory_uri()?>/assets/images/logo.png">
				</a>
				<div class="header-center-menus-wrap">
					<div class="header-center-menus-wrap-content">
						<div class="header-menu-link-wrap">
							<a class="header-menu-link" href='/shop'>shop</a>
						</div>
						<div class="header-menu-link-wrap">
							<a class="header-menu-link" href='/directory'>directory</a>
						</div>
						<div class="header-menu-link-wrap">
							<a class="header-menu-link" href='/magazines'>magazine</a>
						</div>
						<div class="header-menu-link-wrap">
							<a class="header-menu-link" href='/dogcast'>dogcast</a>
						</div>
						<div class="header-menu-link-wrap">
							<a class="header-menu-link" href='/our-story'>our story</a>
						</div>
					</div>
				</div>
				<div class="header-right-menus-wrap">
					<a class="header-account-link" href="/login">
						<img class="header-account-link_img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-account.svg">
					</a>
					<a class="header-cart-link" href="/cart">
						<img class="header-cart-link_img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-cart.svg">
						<span class="header-cart-link_count" id="header_cart_count"><?php echo WC()->cart->get_cart_contents_count();?></span>
					</a>
					<span class="header-hamburger-link">
						<img class="header-hamburger-link_img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-3lines.svg">
					</span>
				</div>
			</div>
		</div>
		
	</div>