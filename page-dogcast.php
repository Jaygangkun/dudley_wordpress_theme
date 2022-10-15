<?php
/**
* Template Name: Dogcast Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>

<section class="section-dogcast-hero">
	<div class="container-md">
		<div class="section-dogcast-hero-wrap">
			<div class="section-dogcast-hero-wrap-left">
				<h1 class="section-dogcast-hero_title fs-50">Dogcast</h1>
				<p class="section-dogcast-hero_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel</p>
			</div>
			<div class="section-dogcast-hero-wrap-right">
				<div class="section-dogcast-hero-img-wrap">
					<img class="" src="<?php echo get_template_directory_uri()?>/assets/images/dogcast-hero.png">
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-dogcast-list">
	<div class="container-lg">
		<div class="section-dogcast-list-wrap">
			<div class="section-dogcast-list-col">
				<div class="section-dogcast-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/dogcast1.jpg)">
					<h5 class="section-dogcast-list-col_vtitle">The Dudley Dog Cast Amanda Zuydervelt</h5>
				</div>
				<h6 class="section-dogcast-list-col_title">The Dudley Dog Cast: Amanda Zuydervelt</h6>
				<p class="section-dogcast-list-col_desc">Dudley & Co Founder Amanda Zuydervelt talks to Elliot Wilson about the origins of how Dudley came to have his own brand.</p>
				<p class="section-dogcast-list-col_date">March 2022</p>
			</div>
			<div class="section-dogcast-list-col">
				<div class="section-dogcast-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/dogcast2.jpg)">
					<h5 class="section-dogcast-list-col_vtitle">The Dudley Dog Cast Ashleigh Flemming</h5>
				</div>
				<h6 class="section-dogcast-list-col_title">The Dudley Dog Cast: Ashleigh Flemming</h6>
				<p class="section-dogcast-list-col_desc">When Ashleigh wanted a black dog she never imagined the one she brought home would be a silver brown mix by the time he had a bath</p>
				<p class="section-dogcast-list-col_date">March 2022</p>
			</div>
			<div class="section-dogcast-list-col">
				<div class="section-dogcast-list-col-img-wrap" style="background-image:url(<?php echo get_template_directory_uri()?>/assets/images/dogcast3.png)">
					<h5 class="section-dogcast-list-col_vtitle">The Dudley Dog Cast Rosemary Ferguson</h5>
				</div>
				<h6 class="section-dogcast-list-col_title">The Dudley Dog Cast: Rosemary Ferguson</h6>
				<p class="section-dogcast-list-col_desc">The first time Dudley met Rosemary Ferguson it was in a smart London Soho members club with a very strict no dogs policy. </p>
				<p class="section-dogcast-list-col_date">March 2022</p>
			</div>
		</div>
	</div>
</section>
<script>
	jQuery(document).ready(function() {
		
	})
</script>
<?php get_footer() ?>