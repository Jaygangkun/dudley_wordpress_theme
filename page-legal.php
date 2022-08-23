<?php
/**
* Template Name: Legal Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
<section class="section-legal">
	<?php
	$subpage = 'privacy_policy';
	if(isset($_GET['subpage'])) {
		if($_GET['subpage'] == 'terms-conditions') {
			$subpage = 'terms_conditions';
		}
		else if($_GET['subpage'] == 'shipping-returns') {
			$subpage = 'shipping_returns';
		}
	}
	?>
	<div class="section-legal-menus">
		<div class="section-legal-menu-link-wrap">
			<div class="section-legal-menu-link <?php echo $subpage == 'privacy_policy' ? 'active' : ''?>" target="privacy_policy">Privacy Policy</div>
		</div>
		<div class="section-legal-menu-link-wrap">
			<div class="section-legal-menu-link <?php echo $subpage == 'terms_conditions' ? 'active' : ''?>" target="terms_conditions">Terms & Conditions</div>
		</div>
		<div class="section-legal-menu-link-wrap">
			<div class="section-legal-menu-link <?php echo $subpage == 'shipping_returns' ? 'active' : ''?>" target="shipping_returns">Shipping & Returns</div>
		</div>
	</div>
	<div class="container-sm">
		<div class="section-single-magazine-content">
			<div class="section-legal-target-content" id="privacy_policy" style="<?php echo $subpage == 'privacy_policy' ? '' : 'display:none'?>">
				<?php the_field('privacy_policy')?>
			</div>
			<div class="section-legal-target-content" id="terms_conditions" style="<?php echo $subpage == 'terms_conditions' ? '' : 'display:none'?>">
				<?php the_field('terms_conditions')?>
			</div>
			<div class="section-legal-target-content" id="shipping_returns" style="<?php echo $subpage == 'shipping_returns' ? '' : 'display:none'?>">
				<?php the_field('shipping_returns')?>
			</div>
		</div>
	</div>
</section>
<script>
	jQuery(document).on('click', '.section-legal-menu-link', function() {
		jQuery('.section-legal-target-content').hide();
		jQuery('#' + jQuery(this).attr('target')).show();

		jQuery('.section-legal-menu-link').removeClass('active');
		jQuery(this).addClass('active');
	})
</script>
<?php get_footer() ?>