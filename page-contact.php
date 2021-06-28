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

					if (get_field('address')) {
						the_field('address');
					}

					if (get_field('hours')) {
						the_field('hours');
					}

					if (get_field('phone')) {
						the_field('phone');
					}

					if (get_field('email')) {
						the_field('email');
					}

					if (get_field('parking_info')) {
						the_field('parking_info');
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
