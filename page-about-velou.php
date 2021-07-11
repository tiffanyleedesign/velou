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
			<section class="page-title">
					<div class="page-thumbnail">
						<?php the_post_thumbnail('large');	?>
					</div>
					<div class="page-hero">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 331.99 161.87"><defs><style>.cls-1{isolation:isolate;}.cls-2{fill:#4a4745;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g class="cls-1"><path class="cls-2" d="M0,.87H10.7L33.12,135.18,55.54.87h4.84L33.63,161H26.75Z"/><path class="cls-2" d="M76.69.87h45.1V4.56H87.9V76.81h29.81V80.5H87.9v76.81h35.16V161H76.69Z"/><path class="cls-2" d="M139.88.87h11.21V157.31h31.34V161H139.88Z"/><path class="cls-2" d="M188.54,80.93C188.54,15.41,200.77,0,221.92,0c21.4,0,33.63,15.41,33.63,80.93s-12.23,80.94-33.63,80.94C200.77,161.87,188.54,146.46,188.54,80.93Zm55.55,0c0-64.87-5.35-77-22.17-77-16.56,0-21.91,12.15-21.91,77s5.35,77,21.91,77C238.74,158,244.09,145.81,244.09,80.93Z"/><path class="cls-2" d="M275.68,128V.87h11.21V129.1c0,23.22,6.11,27.13,19.62,27.13s19.62-3.91,19.62-27.13V.87H332V129.1c0,26.47-9.43,33-28.28,32.33C285.36,160.78,275.68,154.92,275.68,128Z"/></g></g></g></svg>
						<section class="mission">
							<?php 
							if(function_exists('get_field')){
								if(get_field('company_mission')){?>
									<p><?php the_field('company_mission'); ?> </p>
								<?php
								}
								
							}?>
						</section>					
					</div>
				</section>
	

			

			<!-- Stylists Section -->
			<?php 
			
			$args = array(
				'post_type'		=> 'velou-stylist',
				'post_per_page'	=> -1,
				
			);
			$query = new WP_Query ( $args );

			if ( $query->have_posts() ){ ?>
			<section class="stylists-section">
				<h2>Our Award Winning Team</h2>	<?php	

				if(get_field('stylist_section_overview')){?>				
					<p><?php the_field('stylist_section_overview'); ?> </p>
					<?php
				}?>
				<article class="stylists"><?php
						while ( $query->have_posts() ) : $query->the_post(); ?>				
						<div class="one-stylist">
							<div class="image">
								<?php the_post_thumbnail('medium'); ?>
							</div>	
							<h3> <?php the_title(); ?></h3>
							<p><?php echo get_the_term_list( $post->ID, 'velou-stylist-speciality', '', ', ', ' stylist' ); ?></p>
							<a href="<?php the_permalink(); ?>">View Profile</a>									
						</div>				
						<?php 
			
					endwhile; ?>							
				</article>
			</section>
			<?php
			wp_reset_postdata();
			}?>
				
			<!-- Testimonial Slider -->
	
			<?php
			$args = array(
				'post_type'      => 'velou-testimonial',
				'posts_per_page' => -1
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ): ?>
				<section class="slider testimonial">
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
						<div class="swiper-button-prev"></div> 
						<div class="swiper-button-next"></div>
					</div>

				</section>
				<?php wp_reset_postdata();
			endif;?>

			<!-- Brands we use -->
			
			<!-- Brands Logo Section  -->

			<section class="brands-section">
				<h2>Brands We Use</h2>
				<div class="image-display"><?php
				
			
					$args = array(
					'post_type' 	=> 'velou-brand-list',
					'post_perr_page'=> -1,			
					);

					$query = new WP_Query ( $args );

					if ( $query -> have_posts() ) { 
						while( $query -> have_posts()){	$query -> the_post();?>
						<div class="brand-logo">
							<?php the_post_thumbnail('medium'); ?>
						</div>
						<?php					
						}
					wp_reset_postdata();
					}?>				
				</div>
			</section>

			<!-- CTA Section -->
			<section class="cta">	
				<div class="inner-cta">
					<!-- Contact Us CTA -->
					<div class="cta-solid cta-contact">
						<a href="<?php echo get_permalink(37); ?>">Contact Us</a>
					</div>
					<!-- FAQ CTA -->
					<div class="cta-hollow cta-faq">
						<a href="<?php echo get_permalink(12); ?>">FAQ</a>
					</div>
				</div>
			</section>
		<?php endwhile; // End of the loop.?>
	</main><!-- #main -->
<?php
get_footer();


















// if(function_exists('get_field')){
								// 	if(get_field('bio')){?>
									<!-- <p><?php// the_field('bio'); ?> </p>  -->
																
									<?php
									// 	}
									// }?>