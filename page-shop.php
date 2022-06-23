<?php
/**
* Template Name: Shop Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
<section class="section-shop-hero" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/shop-hero.png)">
	<div class="container-lg">
		<h1 class="section-shop-hero-title">shop the edit your dog will thank you</h1>
	</div>
</section>
<section class="section-products">
	<div class="container-lg">
		<div class="section-products-top">
			<div class="section-products-filter">
				<span class="section-products-filter-title">Filter By:</span>
				<span class="section-products-filter-btn">dogs</span>
				<span class="section-products-filter-btn">apparel</span>
				<span class="section-products-filter-btn active">view all</span>
			</div>
			<div class="section-products-sort">
				<span class="section-products-sort-title">Sort By:</span>
				<select class="section-products-sort-select">
					<option>price low to high</option>
				</select>
			</div>
		</div>
		<div class="section-products-list products-list">
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
<section class="section-instagrams">
	<div class="container-lg">
		<h1 class="section-instagram-title">Follow us <span class="text-highlight">@wearedudleyandco</span></h1>
		<div class="section-instagram-img-list">
			<img class="section-instagram-img" src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img1.png">
			<img class="section-instagram-img" src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img2.png">
			<img class="section-instagram-img" src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img3.png">
			<img class="section-instagram-img" src="<?php echo get_template_directory_uri()?>/assets/images/instagram-img4.png">
		</div>
	</div>
</section>
<script>
	jQuery(document).ready(function() {
		
	})
</script>
<?php get_footer() ?>