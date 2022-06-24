<?php
/**
* Template Name: Directory Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>

<section class="section-directory-head">
	<div class="container-sm">
		<h1>Directory</h1>
		<p class="section-directory-head-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel</p>
		<div class="section-directory-filter">
			<p class="section-directory-filter-title">Filter By</p>
			<div class="directory-filter-list">
				<span class="directory-filter-btn">DINING</span>
				<span class="directory-filter-btn">BEDROOM</span>
				<span class="directory-filter-btn">BATHROOM</span>
				<span class="directory-filter-btn">MEDICAL CABINET</span>
				<span class="directory-filter-btn">iTCHY DOG </span>
				<span class="directory-filter-btn">THE LIBARY</span>
				<span class="directory-filter-btn">DE STRESS</span>
				<span class="directory-filter-btn">pOSITIVE TRAINING</span>
				<span class="directory-filter-btn">DOG DAYS OUT</span>
			</div>
		</div>
	</div>
</section>
<section class="section-directory">
	<div class="container-lg">
		<div class="section-directory-top">
			<div class="section-directory-selects">
				<select class="section-directory-select">
					<option>BRAND</option>
				</select>
				<select class="section-directory-select">
					<option>DEPARTMENT</option>
				</select>
				<select class="section-directory-select">
					<option>COLOUR</option>
				</select>
			</div>
			<div class="section-directory-sort">
				<span class="section-directory-sort-title">Sort By:</span>
				<select class="section-directory-sort-select">
					<option>price low to high</option>
				</select>
			</div>
		</div>
		<div class="section-directory-list">
			<div class="directory-list-col">
				<div class="directory-list-col-wrap">
					<div class="directory-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img1.png)"></div>
					<h6 class="directory-list-col-title">The book your dog wishes you would read</h6>
					<p class="directory-list-col-brand">BRAND NAME</p>
					<p class="directory-list-col-price">£75.00</p>
				</div>
			</div>
			<div class="directory-list-col">
				<div class="directory-list-col-wrap">
					<div class="directory-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img1.png)"></div>
					<h6 class="directory-list-col-title">The book your dog wishes you would read</h6>
					<p class="directory-list-col-brand">BRAND NAME</p>
					<p class="directory-list-col-price">£75.00</p>
				</div>
			</div>
			<div class="directory-list-col">
				<div class="directory-list-col-wrap">
					<div class="directory-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img1.png)"></div>
					<h6 class="directory-list-col-title">The book your dog wishes you would read</h6>
					<p class="directory-list-col-brand">BRAND NAME</p>
					<p class="directory-list-col-price">£75.00</p>
				</div>
			</div>
			<div class="directory-list-col">
				<div class="directory-list-col-wrap">
					<div class="directory-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img1.png)"></div>
					<h6 class="directory-list-col-title">The book your dog wishes you would read</h6>
					<p class="directory-list-col-brand">BRAND NAME</p>
					<p class="directory-list-col-price">£75.00</p>
				</div>
			</div>
			<div class="directory-list-col">
				<div class="directory-list-col-wrap">
					<div class="directory-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/product-img1.png)"></div>
					<h6 class="directory-list-col-title">The book your dog wishes you would read</h6>
					<p class="directory-list-col-brand">BRAND NAME</p>
					<p class="directory-list-col-price">£75.00</p>
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