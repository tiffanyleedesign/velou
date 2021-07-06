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
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
					<?php the_post_thumbnail('large');	?>
				</header>

				<div class="entry-content">
					<div class="contact-info">
					<?php
					if ( function_exists ('get_field')) {

						if (get_field('address')) {?>
						<div class="address velou-info">
							<?php get_template_part('images/icon-location') ?>
							<p><?php the_field('address'); ?> </p>
						</div>
						<?php
						}

						if (get_field('hours')) {?>
						<div class="hours velou-info">
							<?php get_template_part('images/icon-clock') ?>
							<p><?php the_field('hours'); ?> </p>
						</div><?php
							
						}
						
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
						
						<!-- FAQ CTA -->
						<div class="cta-hollow">
							<a href="<?php echo get_permalink(12); ?>">FAQ</a>
						</div>
					</div>

						<?php
						
						// Display Contact Form 
						the_content();

						$location = get_field('map');
						if( $location ): ?>
							<div class="acf-map" data-zoom="14">
								<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
							</div>
					<?php endif;								 		
					}
					?>
				</div>
			</article>
		<?php endwhile; ?>
	</main><!-- #main -->

<?php
get_footer();
