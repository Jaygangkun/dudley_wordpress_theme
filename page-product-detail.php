<?php
/**
* Template Name: Product Detail Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
<section class="section-product-detail">
	<div class="container-lg">
		<div class="product-detail-container">
			<div class="product-details-left">
				<div class="product-detail-imgs">
					<div class="product-detail-product-img-list">
						<img class="" src="<?php echo get_template_directory_uri()?>/assets/images/product-detail-img.png">
						<img class="" src="<?php echo get_template_directory_uri()?>/assets/images/product-img1.png">
						<img class="" src="<?php echo get_template_directory_uri()?>/assets/images/product-img2.png">
					</div>
					<div class="product-detail-product-img-preview">
						<img class="" src="<?php echo get_template_directory_uri()?>/assets/images/product-detail-img.png">
					</div>
				</div>
			</div>
			<div class="product-details-right">
				<h1 class="product-detail-title">Luxury 'Oscar' Dog Blanket</h1>
				<p class="product-detail-price">£60.00</p>
				<button class="product-detail-btn-add-cart">Add to bag</button>
				<div class="product-detail-payment">
					<div class="product-detail-payment-row">
						<img class="product-detail-payment-img" src="<?php echo get_template_directory_uri()?>/assets/images/icon-clearpay.png">
						<p class="product-detail-payment-desc">Make 4 interest-free payments from £15.00 bi-weekly. More info</p>
					</div>
				</div>
				<div class="product-detail-others">
					<div class="product-detail-accordion">
						<div class="product-detail-accordion-head">
							<span class="product-detail-accordion-title">description</span>
							<span class="product-detail-accordion-icon">
								<img class="product-detail-accordion-icon_img" minus src="<?php echo get_template_directory_uri()?>/assets/images/icon-minus.png">
								<img class="product-detail-accordion-icon_img" plus src="<?php echo get_template_directory_uri()?>/assets/images/icon-plus.png">
							</span>
						</div>
						<div class="product-detail-accordion-body">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel
						</div>
					</div>
					<div class="product-detail-accordion">
						<div class="product-detail-accordion-head">
							<span class="product-detail-accordion-title">details</span>
							<span class="product-detail-accordion-icon">
								<img class="product-detail-accordion-icon_img" minus src="<?php echo get_template_directory_uri()?>/assets/images/icon-minus.png">
								<img class="product-detail-accordion-icon_img" plus src="<?php echo get_template_directory_uri()?>/assets/images/icon-plus.png">
							</span>
						</div>
						<div class="product-detail-accordion-body">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel
						</div>
					</div>
					<div class="product-detail-accordion">
						<div class="product-detail-accordion-head">
							<span class="product-detail-accordion-title">delivery + returns</span>
							<span class="product-detail-accordion-icon">
								<img class="product-detail-accordion-icon_img" minus src="<?php echo get_template_directory_uri()?>/assets/images/icon-minus.png">
								<img class="product-detail-accordion-icon_img" plus src="<?php echo get_template_directory_uri()?>/assets/images/icon-plus.png">
							</span>
						</div>
						<div class="product-detail-accordion-body">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-collection-products">
	<div class="container-lg">
		<h1 class=""><span class="f-italic">More</span> In The Collection</h1>
		<div class="section-collection-products-list products-list">
			<div class="product-list-col">
				<div class="product-list-col-wrap">
					<div class="product-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img1.png)"></div>
					<h6 class="product-list-col-title">Tilly' Dog Drying Coat </h6>
					<p class="product-list-col-price">£75.00</p>
					<span class="btn btn-black btn-lg product-list-col-btn">Add To Basket</span>
				</div>
				<div class="product-list-col-wrap">
					<div class="product-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img3.png)"></div>
					<h6 class="product-list-col-title">Luxury 'Oscar' Dog Blanket </h6>
					<p class="product-list-col-price">£95.00</p>
					<span class="btn btn-black btn-lg product-list-col-btn">Add To Basket</span>
				</div>
				<div class="product-list-col-wrap">
					<div class="product-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img2.png)"></div>
					<h6 class="product-list-col-title">Raised Dog Bed</h6>
					<p class="product-list-col-price">£290.00</p>
					<span class="btn btn-black btn-lg product-list-col-btn">Add To Basket</span>
				</div>
				<div class="product-list-col-wrap">
					<div class="product-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img4.png)"></div>
					<h6 class="product-list-col-title">Signature 'Rizzo' Dog </h6>
					<p class="product-list-col-price">£95.00</p>
					<span class="btn btn-black btn-lg product-list-col-btn">Add To Basket</span>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	jQuery(document).ready(function() {
		jQuery(document).on('click', '.product-detail-accordion-head', function() {
			var accordion_container = jQuery(this).parents('.product-detail-accordion');
			if(jQuery(accordion_container).hasClass('open')) {
				jQuery(accordion_container).find('.product-detail-accordion-body').slideUp();
				jQuery(accordion_container).removeClass('open');
			}
			else {
				jQuery(accordion_container).find('.product-detail-accordion-body').slideDown();
				jQuery(accordion_container).addClass('open');
			}
		})

		jQuery(document).on('click', '.product-detail-product-img-list img', function() {
			console.log('click');
			jQuery('.product-detail-imgs .product-detail-product-img-preview img').attr('src', jQuery(this).attr('src'));
		})
	})
</script>
<?php get_footer() ?>