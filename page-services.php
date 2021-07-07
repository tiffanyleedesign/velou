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
				<h1><?php the_title() ?></h1>
				<?php the_post_thumbnail('large');	?>
			</section>	

			
			<section class="services accordion-container">
				
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

							<div class="accordion-header"><h3><?php the_title();  ?></h3><span class="acc-icon"></span></div>
							
							<div class="accordion-content">
								<?php
																
								if(function_exists('get_field')){
									
									$image = get_field('image');
									$size = 'medium'; 
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
											<th class="price-field">Price</th>
										</tr>
									
										<?php while( have_rows('service') ): the_row(); ?>									
											<tr>
												<td><?php the_sub_field('service_name'); ?></td>
												<td class="price-field"><?php the_sub_field('price'); ?></td>
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

			<!-- Book Now CTA -->
			<div class="cta-solid">
				<a href="<?php echo get_permalink(294); ?>">Book Now</a>
			</div>
			
			<!-- FAQ CTA -->
			<div class="cta-hollow">
				<a href="<?php echo get_permalink(12); ?>">FAQ</a>
			</div>

		<?php endwhile; // End of the loop.?>
	</main><!-- #main -->

<?php

get_footer();
