<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Dudley
 * @since Dudley 1.0
 */

?>

<div class="footer">
	<div class="container-lg">
		<div class="footer-top">
			<div class="footer-menu-group">
				<h6 class="footer-menu-group-title">information</h6>
				<ul>
					<li><a class="footer-menu-link" href="">Our Story</a></li>
					<li><a class="footer-menu-link" href="">Shipping & Returns</a></li>
					<li><a class="footer-menu-link" href="">Doggie Do-Gooders</a></li>
					<li><a class="footer-menu-link" href="">Sizing your Dog</a></li>
				<ul>
			</div>
			<div class="footer-menu-group">
				<h6 class="footer-menu-group-title">legal</h6>
				<ul>
					<li><a class="footer-menu-link" href="">Terms & Condition</a></li>
					<li><a class="footer-menu-link" href="">Privacy Policy</a></li>
				<ul>
			</div>
			<div class="footer-menu-group">
				<h6 class="footer-menu-group-title">follow us</h6>
				<ul>
					<li><a class="footer-menu-link" href="">Facebook</a></li>
					<li><a class="footer-menu-link" href="">Twitter</a></li>
					<li><a class="footer-menu-link" href="">Pinterest</a></li>
					<li><a class="footer-menu-link" href="">Instagram</a></li>
				<ul>
			</div>
			<div class="footer-space"></div>
			<div class="footer-newsletter">
				<h2 class="footer-newsletter-title">Sign up to our mailing list</h2>
				<div class="input-btn-group">
					<input type="text" placeholder="Enter your email">
					<span class="btn btn-black btn-sm">Sign up</span>
				</div>
				<p class="newsletter-input-desc fs-15">By signing up you agree to our <a class="link" href="">Privacy Policy</a> and <a class="" href="">Terms and Conditions</a></p>
			</div>
		</div>
		<div class="footer-bottom">
			<p class="footer-copyright">© 2021 House of Dudley LtdPayment methods</p>
			<img class="footer-bottom_img" src="<?php echo get_template_directory_uri()?>/assets/images/img-payment.png">
		</div>
	</div>
</div>

<?php wp_footer(); ?>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri()?>/custom.css">
</body>
</html>
