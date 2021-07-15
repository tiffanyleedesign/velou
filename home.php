<?php
/**
 * The main template file List of Blog Posts
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Velou
 */

get_header();
?>
	<main id="primary" class="site-main">
		
		<h1 class='news-list'>News</h1>
		
		<?php
		
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;?>

			<!-- /* Start the Loop */ -->
			<article class="single-blog">
				<?php while ( have_posts() ) : the_post();?>

					<div class="post-thumbnail-list">
				
						<?php the_post_thumbnail(); ?>
						<div class="entry-content">				
							<?php
							$categories_list = get_the_category_list( esc_html__( ', ', 'velou' ) );
							if ( $categories_list ) {
								printf( '<span class="cat-news-list">' . esc_html__( '%1$s', 'velou' ) . '</span>', $categories_list ); 
							} ?>
							<a href="<?php the_permalink()?>">
							<?php
							the_title( '<h2 class="news-list-title">', '</h2>' ); ?>					
							</a>
							<?php
							the_excerpt();

							?>
						</div><!-- .entry-content -->
					</div>
				<?php endwhile;?>
			
			</article>
			<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();