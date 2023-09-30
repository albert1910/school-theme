<?php
/**
 * The template for displaying archive  Work pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package school-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

			<header class="page-header">
				<?php
				echo '<h1 class="page-title">Staff</h1>';
				echo '<div class="archive-description"><p></p>Our dedicated staff is here to help our students succeed. You will find the faculty and administrative staff listed below. Please contact the appropriate individual with any questions. Vestibulum pretium neque leo, nec euismod ex interdum vitae. Etiam viverra, lorem sed lobortis mattis, lectus enim eleifend nisi, non dapibus nulla purus malesuada risus. Donec consectetur neque turpis, vitae varius lectus commodo vel.</div>';
				?>
			</header><!-- .page-header -->
		
		<?php
		$args = array(
			'post_type'      => 'school-staff',
			'posts_per_page' => -1,
			'tax_query' 	 => array(
				array(
					'taxonomy' => 'school-staff-category',
					'field'    => 'slug',
					'terms'    => 'administrative'  
 				)
			)
		);
		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) {
			echo '<section class="staff"><h2>'. esc_html__('Administrative'). '</h2>';
			while( $query->have_posts() ) {
				$query->the_post(); 
				?>
				<article>
					<h2><?php the_title(); ?></h2>
					<?php
			    if ( function_exists ( 'get_field' ) ) {
    			if ( get_field( 'staff_fields' ) ) {
       			 the_field( 'staff_fields' );
    				}
				if ( get_field( 'course' ) ) {
       				 the_field( 'course' );
    				}
				if ( get_field( 'instructor_website' ) ) {
					the_field( 'instructor_website' );
					}
			}
		?>
				</article>
				<?php
			}
			wp_reset_postdata();
			echo '</section>';
		}
		$args = array(
			'post_type'      => 'school-staff',
			'posts_per_page' => -1,
			'tax_query' 	 => array(
				array(
					'taxonomy' => 'school-staff-category',
					'field'    => 'slug',
					'terms'    => 'faculty',  
 				)
			)
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			echo '<section class="staff"><h2>'. esc_html__('Faculty'). '</h2>';
			while( $query->have_posts() ) {
				$query->the_post(); 
				?>
				<article>
					<h2><?php the_title(); ?></h2>
					<?php
			if ( function_exists ( 'get_field' ) ) {
    			if ( get_field( 'staff_fields' ) ) {
       			 the_field( 'staff_fields' );
    				}
				if ( get_field( 'course' ) ) {
       				 the_field( 'course' );
    				}
				if ( get_field( 'instructor_website' ) ) {
					the_field( 'instructor_website' );
					}
			}
		?>
				</article>
				<?php
			}
			wp_reset_postdata();
			echo '</section>';
		}
		?>
		
			
	</main><!-- #primary -->

<?php
get_footer();
