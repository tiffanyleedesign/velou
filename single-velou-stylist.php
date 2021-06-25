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

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );?>

			<section class="bio">
			<?php 
			if(function_exists('get_field')){
				if(get_field('bio')){?>
				<p><?php the_field('bio'); ?> </p>
				<?php
				}
				if(get_field('qualifications')){?>					
				<p><?php the_field('qualifications'); ?> </p>
				<?php
				}
			}

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'velou' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'velou' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
			
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
