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
			}?>
			
			<section class="testimonial">
			<?php 

		
				?>
					<h3>Testimonial</h3>
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
					
					if ( $query->have_posts() ):
						while ( $query->have_posts() ) : $query->the_post();
							the_content();
						endwhile; 
						wp_reset_postdata();
					endif;
				
			
			?>	
			</section>

				<?php 
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'velou' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'velou' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
				
			
			
		endwhile; // End of the loop.?>
		

	</main><!-- #main -->

<?php
get_footer();
