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
		while ( have_posts() ) : the_post(); ?>
			<section class="hero">
				<?php the_post_thumbnail('large');	?>
			</section>	
			<h1><?php the_title() ?></h1>

			<section class="services">
				
				<?php 
				$args = array(
					'post_type'		=> 'velou-service',
					'post_per_page'	=> -1,
					'order'			=> "ASC",
					);

				$query = new WP_Query ( $args );

				if ( $query -> have_posts() ) { ?>
					<?php

					while ( $query->have_posts() ) : $query->the_post();
						?> 
						<article class="accordion-menu">

							<div class="accordion-header"><h3><?php the_title();  ?></h3></div>
							
							<div class="accordion-content">
								<?php
								// the_post_thumbnail('medium');
								
								if(function_exists('get_field')){
									
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
										<caption> <?php the_title() ?> Prices</caption>
										<tr>
											<th>Name</th>
											<th>Price</th>
										</tr>
									
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

			<div class="cta-FAQ">
				<a href="<?php echo get_permalink(12); ?>"> FAQ  </a>
			</div>

			<!-- Book Now CTA -->

			<div class="cta-Book-now">
				<a href="<?php echo get_permalink(294); ?>"> Book Now </a>
			</div>
		<?php endwhile; // End of the loop.?>
	</main><!-- #main -->

<?php

get_footer();
