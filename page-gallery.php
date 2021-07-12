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
	while ( have_posts() ) : the_post();?>
		
	<div class="wrapper">

		<h1><?php the_title(); ?></h1>
		<section class="gallery">

			<?php 
			$args = array(
				'post_type'		=> 'velou-gallery',
				'post_per_page'	=> -1,
			);

			$query = new WP_Query ( $args );

			$types = get_terms(
				array(
					'taxonomy' 	=> 'velou-service-type'
				)
			);
			
			if ( $query->have_posts() ){ ?>
				<!-- Create Sorting Buttons -->
				<div id="btn-container">
					<button class="filter-btn active" onclick="filterSelection('all')"> All</button>
					<?php foreach ( $types as $type ) {?>
						<button class="filter-btn" onClick="filterSelection('<?php echo $type->slug ?>')">
							<?php echo $type->slug; ?>
						</button>
						<?php
					}
					?>
				</div>

				<!-- Create Gallery images with corresponding class name -->
				<div class="filter-container">
					<?php 
					while ( $query->have_posts() ) : $query->the_post();
						$terms = get_the_terms($post->ID, 'velou-service-type');?>
						<div class="<?php foreach($terms as $term) {
							echo ' ' . $term->slug; }?> filter-div">
							<?php the_post_thumbnail('medium');?>
						</div>
					<?php 
					endwhile; ?>
				</div>
				<?php
				wp_reset_postdata();
			}?>
		</section>
	<?php
	endwhile; // End of the loop.
	?>
		
</main><!-- #main -->

<?php
get_footer();
