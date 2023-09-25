<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yafeng
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-contact">
		<?php
		if ( function_exists( 'get_field' ) ) {
			if ( ! is_page('contact') ) {
				if ( get_field('address_field', 15) ) {
					echo '<div class="footer-contact-left">';
						get_template_part( 'images/location' );
						the_field('address_field', 15);
					echo '</div>';
				}
				if ( get_field('email_field', 15) ) {
					$email  = get_field( 'email_field', 15 );
					$mailto = 'mailto:' . $email;
					?>
					<div class="footer-contact-right">
						<p><?php get_template_part( 'images/email' );?><a href="<?php echo esc_url( $mailto ); ?> "><?php echo esc_html( $email ); ?></a></p>
					</div>
					<?php
				}
			}
    }
	?>
		</div><!-- .footer-contact -->
		<div class="footer-menus">
			<nav class='footer-navigation'>
				<?php wp_nav_menu(array('theme_location'=>'footer-left')); ?>
			</nav>	
			<nav class='footer-navigation'>
				<?php wp_nav_menu(array('theme_location'=>'footer-right')); ?>
			</nav>
			
		</div><!-- .footer-menus -->
		<div class="site-info">
			<?php esc_html_e( 'Created by ', 'Yafeng & Yilin' ); ?><a href="<?php echo esc_url( __( 'https://yafengge.ca/school', 'yafeng' ) ); ?>"><?php esc_html_e( 'Yafeng Ge & Yilin Liu', 'yafeng' ); ?></a>
			<p><?php the_privacy_policy_link(); ?></p>
    </footer>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<button id="scroll-top" class="scroll-top">
	<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
		<path d="M23.677 18.52c.914 1.523-.183 3.472-1.967 3.472h-19.414c-1.784 0-2.881-1.949-1.967-3.472l9.709-16.18c.891-1.483 3.041-1.48 3.93 0l9.709 16.18z"/>
	</svg>
	<span class="screen-reader-text">Scroll To Top</span>
</button>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
