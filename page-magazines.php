<?php
/**
* Template Name: Magazines Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
<img class="w-100" src="<?php echo get_template_directory_uri()?>/assets/images/magazine-hero.png">
<section class="section-magazines">
	<div class="container-md">
		<div class="section-magazines-top">
			<h1 class="fs-50 section-magazines-title"><span class="text-highlight">DUDLEY</span> is a magazine for dog lovers.</h1>
			<p class="section-magazines-desc">Created with dog owners in mind, it's the place to go for everything dog-related. You'll not only find helpful hints and tips including dog training & health advice, but also a wide range of lifestyle content. Everything from insightful pieces on the important work of dog rescues & charities to reviews of dog-centric books & films; enjoy our "Bark Once for Service" pet friendly city guide and even celebrity interviews with their pets.</p>
		</div>
	</div>
	<div class="container-lg">
		<div class="section-magainzes-list">
			<div class="section-magazine-col">
				<div class="section-magazine-col-wrap">
					<div class="section-magazine-col_img" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/magazine-img1.png)"></div>
					<h6 class="section-magazine-col_title">The Dudley Questionnaire: Rosemary Ferguson</h6>
					<p class="section-magazine-col_desc">The first time Dudley met Rosemary Ferguson it was in a smart London Soho members club with a very strict no dogs policy. </p>
					<p class="section-magazine-col_date">March 2022</p>
				</div>
			</div>
			<div class="section-magazine-col">
				<div class="section-magazine-col-wrap">
					<div class="section-magazine-col_img" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/magazine-img2.png)"></div>
					<h6 class="section-magazine-col_title">The Dudley Questionnaire: Gary Barlow</h6>
					<p class="section-magazine-col_desc">Whenever we introduce suitcases to the hallway their whole mood changes - they sulk until we’re gone - then they probably forget about us. </p>
					<p class="section-magazine-col_date">March 2022</p>
				</div>
			</div>
			<div class="section-magazine-col">
				<div class="section-magazine-col-wrap">
					<div class="section-magazine-col_img" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/magazine-img3.png)"></div>
					<h6 class="section-magazine-col_title">The Dudley Questionnaire: Sara Pascoe</h6>
					<p class="section-magazine-col_desc">Mouse is a really good boy. He doesn’t chew our shoes or furniture but he does like to destroy and then hump a squeaky octopus once a day.</p>
					<p class="section-magazine-col_date">March 2022</p>
				</div>
			</div>
			<div class="section-magazine-col">
				<div class="section-magazine-col-wrap">
					<div class="section-magazine-col_img" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/magazine-img4.png)"></div>
					<h6 class="section-magazine-col_title">Life After Lockdown</h6>
					<p class="section-magazine-col_desc">As people across Britain leave lockdown and return to work spare a thought for our furry friends. </p>
					<p class="section-magazine-col_date">March 2022</p>
				</div>
			</div>
		</div>
		<div class="section-magazines-btn-wrap">
			<span class="btn btn-black btn-sm">read more</span>
		</div>
	</div>
</section>
<script>
	jQuery(document).ready(function() {
		
	})
</script>
<?php get_footer() ?>