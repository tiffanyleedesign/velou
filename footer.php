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
	<div class="footer-info">
			<div class="footer-contact-left">	
				<div class="footer-logo">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 331.99 161.87"><defs><style>.cls-1{isolation:isolate;}.cls-2{fill:#4a4745;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g class="cls-1"><path class="cls-2" d="M0,.87H10.7L33.12,135.18,55.54.87h4.84L33.63,161H26.75Z"/><path class="cls-2" d="M76.69.87h45.1V4.56H87.9V76.81h29.81V80.5H87.9v76.81h35.16V161H76.69Z"/><path class="cls-2" d="M139.88.87h11.21V157.31h31.34V161H139.88Z"/><path class="cls-2" d="M188.54,80.93C188.54,15.41,200.77,0,221.92,0c21.4,0,33.63,15.41,33.63,80.93s-12.23,80.94-33.63,80.94C200.77,161.87,188.54,146.46,188.54,80.93Zm55.55,0c0-64.87-5.35-77-22.17-77-16.56,0-21.91,12.15-21.91,77s5.35,77,21.91,77C238.74,158,244.09,145.81,244.09,80.93Z"/><path class="cls-2" d="M275.68,128V.87h11.21V129.1c0,23.22,6.11,27.13,19.62,27.13s19.62-3.91,19.62-27.13V.87H332V129.1c0,26.47-9.43,33-28.28,32.33C285.36,160.78,275.68,154.92,275.68,128Z"/></g></g></g></svg>
				</div>
				
				<?php 
				if ( function_exists( 'get_field' ) ) {
					if ( ! is_page('contact') ) {
						if ( get_field('address', 37) ) {?>
							<div class="address">
								<p><?php the_field('address', 37)?></p>
							</div>
						<?php
						}
						if ( get_field('email', 37) ) {?>
							<div class="email">
								<p><?php the_field('email', 37) ?></p>
							</div>
						<?php
						}
						if ( get_field('phone', 37) ) {?>
							<div class="phone">
								<p><?php the_field('phone', 37) ?></p>
							</div>
						<?php
						}
					}
				}	
				?>
			</div><!-- .footer-contact -->

			<!-- Navigations -->
			<div class="footer-contact-right">
				<div class="footer-menus">
					<!-- Social Media Navigation -->
					<nav id="social-navigation" class="social-navigation">
						<?php wp_nav_menu(array('theme_location' => 'social')); ?>	
					</nav>
					<!-- Footer Navigation -->
					<nav id="footer-navigation" class="footer-navigation">
						<?php wp_nav_menu(array('theme_location' => 'footer')); ?>
					</nav>								
				</div><!-- .footer-menus -->

				<!-- Privacy Page Link-->
				<div class="site-info">				
					<p>&copy; 2021 Velou Hair Boutique.</p>
				</div>
			</div>	
		</div>	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
