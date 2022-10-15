<?php
/**
* Template Name: Size Guide Page
*
* @package WordPress
* @subpackage 
* @since 
*/

?>
<?php get_header() ?>
<section class="section-size-guide-hero">
	<div class="container-sm">
		<h1 class="text-center fs-50">Sizing your dog</h1>
		<p class="section-size-guide-hero-desc">It is important to measure your dog to ensure the best fit and comfort, so please take the time to do so before making your purchase. We recommend you measure your dog using our guide, and choose the size giving the most room. If your dog is broader, has a thick coat or is right at the top of a size, consider going up a size.</p>
	</div>
</section>
<section class="section-size-guide-middle">
	<div class="container-lg">
		<div class="section-size-guide-middle-wrap">
			<div class="section-size-guide-middle-wrap--left">
				<img class="section-size-guide__img" src="<?php echo get_template_directory_uri()?>/assets/images/dog.png">
			</div>
			<div class="section-size-guide-middle-wrap--right">
				<h1 class="fs-50">Coat</h1>
				<ul>
					<li>Neck: Measure right around the neck, allowing enough room to slide 2 fingers in for comfort</li>
					<li>Length: Measure from the base of the neck (where the collar would sit) to the base of the tail along the dog's backbone.</li>
					<li>Chest: Measure right around the body around the deepest part of your dog's chest, usually just behind the dog's front legs.</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="section-size-guide-table">
	<div class="container-lg">
		<h1 class="fs-50">SIZE CHART</h1>
		<table>
			<tbody>
				<tr>
					<td>SIZE</td>
					<td>HEIGHT (CM)</td>
					<td>LENGTH (CM)</td>
					<td>NECK (CM) <br> CIRCUMFERENCE</td>
					<td>CHEST (CM) <br> CIRCUMFERENCE</td>
					<td>WEIGHT (LBS)</td>
				</tr>
				<tr>
					<td>XS</td>
					<td>22-29</td>
					<td>20-25</td>
					<td>25-30</td>
					<td>30-37</td>
					<td>7-13</td>
				</tr>
				<tr>
					<td>S</td>
					<td>30-38</td>
					<td>25-30</td>
					<td>30-35</td>
					<td>37-43</td>
					<td>14-25</td>
				</tr>
				<tr>
					<td>M</td>
					<td>39-50</td>
					<td>30-37</td>
					<td>35-40</td>
					<td>43-56</td>
					<td>26-50</td>
				</tr>
				<tr>
					<td>L</td>
					<td>51-64</td>
					<td>37-45</td>
					<td>40-50</td>
					<td>53-64</td>
					<td>51-80</td>
				</tr>
				<tr>
					<td>XL</td>
					<td>65-75</td>
					<td>45-52</td>
					<td>50-60</td>
					<td>63-74</td>
					<td>81-155</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
<section class="section-breed-guide-table">
	<div class="container-md">
		<h1 class="fs-50">Breed Guidelines</h1>
		<table>
			<tbody>
				<tr>
					<td>XS</td>
					<td>Chihuahua, Puppy, Miniature, Toy, Tea Cup</td>
				</tr>
				<tr>
					<td>S</td>
					<td>Cavalier King Charles Spaniel, Jack Russel Terrier, French Bulldog, Beagle, Puppy</td>
				</tr>
				<tr>
					<td>M</td>
					<td>Boston Terrier, Brittany, English Bulldog</td>
				</tr>
				<tr>
					<td>L</td>
					<td>Vizsla, Golden Retriever, Collie, Poodle</td>
				</tr>
				<tr>
					<td>XL</td>
					<td>Doberman Pincher, Mastiff, Rottweiler</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
<?php get_template_part('content', 'instagram');?>
<script>
	jQuery(document).ready(function() {
		
	})
</script>
<?php get_footer() ?>