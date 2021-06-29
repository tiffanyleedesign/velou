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
	endwhile; // End of the loop.
	?>

	<!-- Our Mission Section -->
	
	<section class="mission">
		<?php 
		if(function_exists('get_field')){
			if(get_field('title')){?>
			<h2><?php the_field('title'); ?> </h2>
			<?php
			}
			if(get_field('mission_statement')){?>					
			<p><?php the_field('mission_statement'); ?> </p>
			<?php
			}
		}?>
	</section>

	<!-- Stylists Slider -->

	<section class="stylists">
		<?php 
		$args = array(
			'post_type'		=> 'velou-stylist',
			'post_per_page'	=> -1,
			'tax_query'		 => array(
				array(
					'taxonomy' 	=> 'velou-stylist-speciality',
					'field'		=> 'slug',
					'terms'		=> 'colors'
				)
			)
		);

		$query = new WP_Query ( $args );

		if ( $query->have_posts() ){ ?>
			<section class="home-slider">
				<h2>Our Award Winning Team</h2>
				<div class="swiper-container">
					<div class="swiper-wrapper">						
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="swiper-slide">
							<h2><?php the_title(); ?></h2>
							<?php the_post_thumbnail('medium'); 		
							if(function_exists('get_field')){
								if(get_field('bio')){?>
									<p><?php the_field('bio'); ?> </p> 		
						
								<?php
								
								}
							}?>	
							<button><a href="<?php the_permalink(); ?>">View Profile!</a></button> 	
						</div>		
					<?php endwhile; ?>
						</div>
						<div class="swiper-pagination"></div> 
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
				</div>
			</section>
			<?php
			wp_reset_postdata();
		}?>				
	</section> 

	<!-- Services CTA -->

	<section class="cta-services">
		<?php
		$args = array( 'page_id' => 106 );

		$query = new WP_Query( $args );

		if ( $query->have_posts() ): 
			while ( $query->have_posts() ) : $query->the_post();?>
				<button> <a href="<?php the_permalink(); ?>"> See Out Services </a> </button>
			<?php endwhile;
			wp_reset_postdata();
		endif;?>
	</section>


	<!-- Testimonial Slider -->

	<section class="testimonial">
		<?php
		$args = array(
			'post_type'      => 'velou-testimonial',
			'posts_per_page' => -1
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ): ?>
			<section class="home-slider">
				<h2>Customer Reviews</h2>
				<div class="swiper-container">
					<div class="swiper-wrapper">
				
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<div class="swiper-slide">
								<?php the_content(); ?>
							</div>
					
						<?php endwhile; ?>
					</div>
					<div class="swiper-pagination"></div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</section>
			<?php wp_reset_postdata();
		endif;?>
	</section>

	<!-- Brands Logo Section  -->

	<section class="brand-logo">
		<h2>Our special Brands</h2><?php
		$args = array(
			'post_type' 	=> 'velou-brand-list',
			'post_perr_page'=> -1,			
		);

		$query = new WP_Query ( $args );

		if ( $query -> have_posts() ) { 
			while( $query -> have_posts()){
				$query -> the_post();
				the_post_thumbnail('medium'); 
				
			}
		wp_reset_postdata();
		}
		

	?></section>

</main><!-- #main -->

<?php
get_footer();
