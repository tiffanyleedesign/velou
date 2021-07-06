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

		<section class="hero">
			<?php the_post_thumbnail('large');	?>
		</section>		
			
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
				<section class="home-slider stylist">
					<h2>Our Award Winning Team</h2>
					<div class="swiper-container">
						<div class="swiper-wrapper">						
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<article class="swiper-slide">
								<h3><?php the_title(); ?></h3>
								<?php the_post_thumbnail('medium'); 		
								if(function_exists('get_field')){
									if(get_field('bio')){?>
										<p><?php the_field('bio'); ?> </p> 		
							
									<?php
									
									}
								}?>	
								<div class="cta-hollow">
									<a href="<?php the_permalink(); ?>">View Profile</a>
								</div>
							</article>		
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


		<!-- Services CTA -->
		<div class="cta-solid">
			<a href="<?php echo get_permalink(106); ?>">Our Services</a>
		</div>

		<!-- Testimonial Slider -->

		<?php
			$args = array(
				'post_type'      => 'velou-testimonial',
				'posts_per_page' => -1
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ): ?>
				<section class="home-slider testimonial">
					<div class="block">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"/></svg>
						<h2 class="testimonial-title">Customer Reviews</h2>
					</div>	
					
					<div class="swiper-container">
						<div class="swiper-wrapper">

							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						
								<div class="swiper-slide">
									<?php the_content(); ?>
								</div>
			
							<?php endwhile; ?>

						</div>

						<div class="swiper-pagination"></div>
						<!-- <div class="swiper-button-prev"></div> -->
						<div class="swiper-button-next"></div>
					</div>
				

				</section>
				<?php wp_reset_postdata();
			endif;?>


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
		<?php
	endwhile; // End of the loop.?>

</main><!-- #main -->

<?php
get_footer();
