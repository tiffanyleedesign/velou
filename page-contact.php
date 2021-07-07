<?php
/**
 * The template for Contact Page
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

	<!-- <section class="page-hero">
		<div>
		</div>
		<div>
		</div>
	</section> -->

	<main id="primary" class="site-main">	
		<?php
		while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="page-header">
					<div class="page-title">
						<?php the_title( '<h1 class="contact-title">', ' Us</h1>'); ?>
					</div>
					<div class="page-thumbnail">
						<?php the_post_thumbnail('large');	?>
					</div>
				</header>

					<div class="contact-info">
					<?php			
					if ( function_exists ('get_field')) :
						if (get_field('address')) {?>
						<div class="address velou-info">
							<?php get_template_part('images/icon-location') ?>
							<p><?php the_field('address'); ?> </p>
						</div>
						<?php
						}

						if( have_rows('hours') ):
							get_template_part('images/icon-clock');
							// Loop through rows.
							while( have_rows('hours') ) : the_row();
								// Load sub field value.
								$get_day = get_sub_field('day');
								$get_hour = get_sub_field('hour');?>

								<div class="velou-hours">
									<div class="open-day"><?php echo $get_day; ?></div>
									<div class="open-hour"><?php echo $get_hour; ?></div>
								</div>
								<?php
							// End loop.
							endwhile;
							// Do something...
						endif;

						if (get_field('phone')) {?>
						<div class="phone-email-wrapper">
							<div class="phone velou-info">
								<?php get_template_part('images/icon-phone') ?>
								<p><?php the_field('phone'); ?> </p>
							</div><?php
								
							}

							if (get_field('email')) {?>
							<div class="email velou-info">
								<?php get_template_part('images/icon-email') ?>
								<p><?php the_field('email'); ?> </p>
							</div>
						</div>
						<?php
						}

						if (get_field('parking_info')) {?>
						<div class="parking velou-info">
							<?php get_template_part('images/icon-parking') ?>
							<p><?php the_field('parking_info'); ?> </p>
						</div><?php						
						}
						?>
					</div>
						
						<!-- FAQ CTA -->
						<div class="cta-hollow">
							<a href="<?php echo get_permalink(12); ?>">FAQ</a>
						</div>
					</div>


						<div class="contact-form">
							<h2>Speak to Us</h2>
							<?php the_content();?>
						</div>

						<?php 
						$location = get_field('map');
						if( $location ): ?>
							<div class="acf-map" data-zoom="14">
								<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
							</div>
					<?php endif;								 		
					endif;
					?>
			</article>
		<?php endwhile; ?>
	</main><!-- #main -->

<?php
get_footer();
