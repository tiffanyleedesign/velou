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
			the_post();?>

			<section class="page-hero">
				<div class="page-title">
					<h1><?php the_title() ?></h1>
				</div>
				<div class="page-thumbnail">
					<?php the_post_thumbnail('large');	?>
				</div>
			</section>

			<section class="faqs">
				<?php the_content();?>
			</section>

			<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
