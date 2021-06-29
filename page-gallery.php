<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Velou
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.?>

	<section class="gallery">
	<?php 
	$args = array(
		'post_type'		=> 'velou-gallery',
		'post_per_page'	=> -1,
		'tax_query'		 => array(
			array(
				'taxonomy' 	=> 'velou-service-type',
				'field'		=> 'slug',
				'terms'		=> 'general'
			)
		)
	);

	$query = new WP_Query ( $args );

	
	if ( $query->have_posts() ){ ?>
		<h2>Our Work Examples</h2>

		<!-- Sorting -->
		<div id="btn-container">
			<button class="filter-btn active" onclick="filterSelection('all')"> All</button>
			<button class="filter-btn" onclick="filterSelection('haircuts')"> Cuts</button>
			<button class="filter-btn" onclick="filterSelection('treatments')"> Treatments</button>
			<button class="filter-btn" onclick="filterSelection('stylings')"> Styling</button>
			<button class="filter-btn" onclick="filterSelection('special-package')"> Special</button>
		</div>

		<div className=""></div>
		<?php while ( $query->have_posts() ) : $query->the_post();
		
			$terms = get_the_terms($post->ID, 'velou-service-type');?>
			<div class="<?php foreach($terms as $term) {
				echo ' ' . $term->slug;
			}?> filter-div">

			<?php the_post_thumbnail('medium');?>
		</div>
		<?php 
		endwhile;
		wp_reset_postdata();
	}

	?>
</main><!-- #main -->

<?php

get_footer();
