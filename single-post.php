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

			get_template_part( 'template-parts/content', get_post_type() );	

		endwhile; // End of the loop.
		?>

		<!-- Return to news list link -->
		<section class="return">
		<?php
		$args = array( 'page_id' => 106 );

		$query = new WP_Query( $args );

		if ( $query->have_posts() ): 
			while ( $query->have_posts() ) : $query->the_post();?>
				 <a href="<?php the_permalink(); ?>"><h3> Return to news list</h3> </a> 
			<?php endwhile;
			wp_reset_postdata();
		endif;?>
			</section>


			<section class="home-blog">
				<h2>You May Also Like</h2>	
				<?php
				
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3
				);
				$blog_query = new WP_Query( $args );
				if( $blog_query -> have_posts()){?>
					
					<section class="you-may-like">
					
						<?php
						while($blog_query -> have_posts()){
							$blog_query -> the_post(); ?>

							<article>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</article>

						<?php
						}
						wp_reset_postdata(); ?>
				
					</section>

					<?php
				}
				?>
			</section>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
