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
				echo '<h1 class="page-title">The Class</h1>';
				?>
			</header><!-- .page-header -->
		
		<?php
		$args = array(
			'post_type'      => 'school-student',
			'posts_per_page' => -1,
			'order'          => 'ASC',
			'orderby'        => 'name',
			'tax_query' 	 => array(
				array(
					'taxonomy' => 'school-student-category',
					'field'    => 'slug',
					'terms'    => 'designers',
 				)
			)
		);
		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) {
			echo '<section class="student"><h2>'. esc_html__('Designers'). '</h2>';
			while( $query->have_posts() ) {
				$query->the_post(); 
				?>
				<article>
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail('medium'); ?>
					</a>
					<?php the_excerpt(); ?>
				</article>
				<?php
			}
			wp_reset_postdata();
			echo '</section>';
		}
		$args = array(
			'post_type'      => 'school-student',
			'posts_per_page' => -1,
			'order'    		 => 'ASC',
			'orderby' 		 => 'name',
			'tax_query' 	 => array(
				array(
					'taxonomy' => 'school-student-category',
					'field'    => 'slug',
					'terms'    => 'developers'  
 				)
			)
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			echo '<section class="work-items"><h2>'. esc_html__('Developers'). '</h2>';
			while( $query->have_posts() ) {
				$query->the_post(); 
				?>
				<article>
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail('medium'); ?>
					</a>
					<?php the_excerpt(); ?>
					<?php echo 'Specialty: ' . $args['tax_query'][0]['taxonomy'];?>
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
