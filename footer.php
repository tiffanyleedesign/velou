<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Velou
 */

?>

	<footer id="colophon" class="site-footer">
	<h2 class="logo">Velou</h2>
	<div class="footer-contact">
			<?php 
			if ( function_exists( 'get_field' ) ) {
				if ( ! is_page('contact') ) {
					if ( get_field('address', 37) ) {
						echo '<div class="footer-contact-left">';
							get_template_part( 'images/location');
							the_field('address', 37);
						echo '</div>';
					}
					if ( get_field('email', 37) ) {
						echo '<div class="footer-contact-right">';
							get_template_part( 'images/email');
							echo '<p>'. get_field('email', 37) .'</p>';
						echo '</div>';
					}
					if ( get_field('email', 37) ) {
						echo '<div class="footer-contact-right">';
							get_template_part( 'images/email');
							echo '<p>'. get_field('phone', 37) .'</p>';
						echo '</div>';
					}
				}
			}
					
			?>
		</div><!-- .footer-contact -->
		<div class="footer-menus">
			<nav id="footer-navigation" class="footer-navigation">
			<?php wp_nav_menu(array('theme_location' => 'footer')); ?>
			</nav>
			<nav id="social-navigation" class="social-navigation">
			<?php wp_nav_menu(array('theme_location' => 'social')); ?>	
			</nav>
				
		</div><!-- .footer-menus -->
		<div class="site-info">

		<!-- My Privacy Page Link-->
		<p>&copy; 2021 Velou Hair Boutique.</p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
