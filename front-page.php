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
			// get_template_part( 'template-parts/content', 'page' );	
		endwhile; // End of the loop.
		?>
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
		<section class="stylists">
			<h2>Our Awarded Stylists</h2>

			<?php 
			$args = array(
				'post-type'		=> 'velou-stylist',
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

			if ( $query -> have_posts() ) {
				while($query -> have_posts()){
					$query -> the_post(); ?>					
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail('medium'); ?>
					<?php		
					if(function_exists('get_field')){
						if(get_field('bio')){?>
						<p><?php the_field('bio'); ?> </p>
						<?php
						}
					}?>
					<button><a href="<?php the_permalink(); ?>">View Profile!</a></button> 

				<?php
				}
				wp_reset_postdata();
			}
			?>		
		</section>
	

	</main><!-- #main -->

<?php
get_footer();
