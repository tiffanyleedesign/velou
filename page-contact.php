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

	<main id="primary" class="site-main">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
			</header>

			<div class="entry-content">
				<?php
				the_content();
				if ( function_exists ('get_field')) {

					if (get_field('address')) {?>
					<p><?php the_field('address'); ?> </p>
					<?php
					}

					if (get_field('hours')) {?>
						<p><?php the_field('hours'); ?> </p>
						<?php
						
					}

					if (get_field('phone')) {?>
						<p><?php the_field('phone'); ?> </p>
						<?php
						
					}

					if (get_field('email')) {?>
						<p><?php the_field('email'); ?> </p>
						<?php
						
					}

					if (get_field('parking_info')) {?>
						<p><?php the_field('parking_info'); ?> </p>
						<?php
						
					}
					?>
					<!-- FAQ CTA -->

					<section class="cta-services">
						<?php
						$args = array( 'page_id' => 12 );

						$query = new WP_Query( $args );

						if ( $query->have_posts() ): 
							while ( $query->have_posts() ) : $query->the_post();?>
								<button> <a href="<?php the_permalink(); ?>"> FAQ </a> </button>
							<?php endwhile;
							wp_reset_postdata();
						endif;?> 
					</section>
					<?php

					if (get_field('map')) {
						the_field('map');
					}

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
