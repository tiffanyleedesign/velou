<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Velou
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="wrapper">
		<?php
		while ( have_posts() ) : the_post();?>
			<div class="name">
				<p><?php echo get_the_term_list( $post->ID, 'velou-stylist-speciality', '', ', ', ' stylist' ); ?></p>
				<h1><?php the_title() ?></h1>
			</div>	
			<section class="hero">
				<div class="colored-background"></div>
				<div class="stylist-photo">
					<?php the_post_thumbnail('large');	?>
				</div>
				<div class="stylist-photo-medium">
					<?php the_post_thumbnail('medium');	?>
				</div>

				<article class="bio">
					<h2>Bio</h2>
					<?php 
					if(function_exists('get_field')){
						if(get_field('short_profile')){?>
							<p><?php the_field('short_profile'); ?> </p>
							<?php
							}
						if(get_field('bio')){?>
						<p><?php the_field('bio'); ?> </p>
						<?php
						}?>
						<h2 class="recognitions">Recognition</h2>
						<?php
						if(get_field('qualifications')){?>					
						<p><?php the_field('qualifications'); ?> </p>
						<?php
						}
					}?>
					<!-- Book Now CTA -->
				
			
					<div class="cta-solid">
						<a href="<?php echo get_permalink(294); ?>">Book Now</a>
					</div>
				</article>
			</section>	

			<!-- Testimonial Section -->

			<section class="testimonial">
				
					<?php				
					$args = array(
						'post_type'      => 'velou-testimonial',
						'posts_per_page' => 1,
						'tax_query'      => array(
							array(
								'taxonomy' => 'velou-stylist-name',
								'field'    => 'slug',
								'terms'    => $post->post_name,
							)
						),
					);
					
					$query = new WP_Query( $args );
					
				if ( $query->have_posts() ):?>
					<section class="slider testimonial">
						<div class="block">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"><path d="M13 14.725c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275zm-13 0c0-5.141 3.892-10.519 10-11.725l.984 2.126c-2.215.835-4.163 3.742-4.38 5.746 2.491.392 4.396 2.547 4.396 5.149 0 3.182-2.584 4.979-5.199 4.979-3.015 0-5.801-2.305-5.801-6.275z"/></svg>
							<h2 class="testimonial-title">Customer Reviews</h2>
						</div>	
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<?php
								while ( $query->have_posts() ) : $query->the_post();?>
								<div class="swiper-slide">
									<?php
									the_content();?>
								</div>
								
								<?php
								endwhile; ?>
							</div> 

							<div class="swiper-pagination"></div>
							<div class="swiper-button-prev"></div> 
							<div class="swiper-button-next"></div>
							
						</div>
					</section>
					<?php
				wp_reset_postdata();
				endif;			
				?>	
			

			<!-- Portfolio Relationship Field and assign it to the Single Stylist Page -->
			<section class="stylist-portfolio">	
				<h2><?php the_title() ?>'s Portfolio</h2>
				<article class="portfolio-box">	
					<?php
					if ( function_exists( 'get_field' ) ) : 
						$portfolio = get_field('portfolio');
						if ($portfolio) :
							foreach($portfolio as $post) :
								setup_postdata($post); ?>
								<article class="portfolio">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('medium'); ?>
									</a>
								</article>		
							<?php 
							endforeach;
							wp_reset_postdata();
						endif;
					endif;
					?>
				</article>	
			</section>	

			<?php 
			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'velou' ) . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'velou' ) . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );?>

<div class="post-navigation">
		<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		if (!empty( $prev_post )): ?>
		<div>
			<a href="<?php echo $prev_post->guid ?>" class="prev-stylist">
				<h4> Previous Stylist</h4>			
				<p><?php echo $prev_post->post_title ?></p>
				<?php echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' ); ?>						
			</a>
		</div>	
		<?php endif;
		if (!empty( $next_post )): ?>
		<div>
			<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="next-stylist">
				<h4>Next Stylist</h4>			
				<p><?php echo esc_attr( $next_post->post_title ); ?></p>	
				<?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' ); ?>						
			</a>
		</div>	
		<?php endif; ?>

	</div>
	</div>	<?php	
	
	
	
endwhile; // End of the loop.?>
		
	
</main><!-- #main -->

<?php
get_footer();
