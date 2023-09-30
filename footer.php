<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package school-theme
 */

?>

	<footer id="colophon" class="site-footer">
		<!-- <div class="footer-contact">
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
		</div> -->
		<!-- .footer-contact -->
		<?php the_custom_logo() ?>
		<div class="footer-menus">
			<!-- <nav class='footer-navigation'>
				<?php wp_nav_menu(array('theme_location'=>'footer-left')); ?>
			</nav>	 -->
			<nav class='footer-navigation'>
			<h2>Links</h2>
			<?php wp_nav_menu(array('theme_location'=>'footer-right')); ?>
			</nav>
			
		</div>
		<!-- .footer-menus -->
		<div class="site-info">
			<h2>Credits</h2>
			<?php esc_html_e( 'Created by ', 'Yafeng & Yilin' ); ?><a href="<?php echo esc_url( __( 'https://yafengge.ca/school', 'school' ) ); ?>"><?php esc_html_e( 'Yafeng Ge & Yilin Liu', 'school' ); ?></a>
    </footer>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
