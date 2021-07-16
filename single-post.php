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
		while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_type() );	
				get_the_category( $post_id = false);
				
			?>

			<!-- Return to news list link -->
			<a class="return" href="<?php echo get_permalink(89); ?>">Return to News List </a>

			<section class="home-blog">
				<div class="post-suggestion">
					<span>You May Also Like</span>
				</div>	
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
									<?php the_post_thumbnail('large'); ?>
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
		<?php endwhile; // End of the loop.?>

	</main><!-- #main -->

<?php
get_footer();
