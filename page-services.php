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
		<section class="services">
			
			<?php 
			$args = array(
				'post_type'		=> 'velou-service',
				'post_per_page'	=> -1,
				'order'			=> "ASC",
				);

			$query = new WP_Query ( $args );

			if ( $query -> have_posts() ) { ?>
				<h2>Our Services</h2>
				<?php

				while ( $query->have_posts() ) : $query->the_post();
					?> 
					<article class="accordion-menu">

						<div class="accordion-header"><h3><?php the_title();  ?></h3></div>
						
						<div class="accordion-content">
							<?php
							// the_post_thumbnail('medium');
							
							if(function_exists('get_field')){
								$image = get_field('thumbnail-image');
									if( !empty( $image ) ): ?>
    								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif;
								
								$image = get_field('image');
								$size = 'medium'; // (thumbnail, medium, large, full or custom size)
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								}

								if(get_field('service_description')){?>
									<p><?php the_field('service_description'); ?> </p>
									<?php
								}
								if( have_rows('service') ): ?>
			
									<table>
								
										<?php while( have_rows('service') ): the_row(); ?>
									
											<tr>
												<td><?php the_sub_field('service_name'); ?></td>
												<td><?php the_sub_field('price'); ?></td>
											</tr>
											
										<?php endwhile; ?>
								
									</table>
									
								<?php endif;
							}?>
								
							
						</div>
					</article>
				<?php
				endwhile; 
				wp_reset_postdata();
			}
			?>		
		</section>

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

	<!-- Book Now CTA -->

	<section class="cta-services">
		<?php
		$args = array( 'page_id' => 16 );

		$query = new WP_Query( $args );

		if ( $query->have_posts() ): 
			while ( $query->have_posts() ) : $query->the_post();?>
				<button> <a href="<?php the_permalink(); ?>"> Book Now </a> </button>
			<?php endwhile;
			wp_reset_postdata();
		endif;?> 
	</section>
	

	</main><!-- #main -->

<?php

get_footer();
