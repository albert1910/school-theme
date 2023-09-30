<?php
/**
 * The template for displaying the homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package school-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			?>
			<h1><?php the_title(); ?></h1>
			<section class='home-intro'>
			<?php
			if ( function_exists ( 'get_field' ) ) {
    			if ( get_field( 'top_section' ) ) {
       				 the_field( 'top_section' );
    				}
			}
			?>
			</section>
			<section class='home-work'>
			</section>
			<section class='home-work'>
			<?php
				$args = array(
					'post_type'      => 'school-work',
					'posts_per_page' => 4,
					'tax_query'	=> array(
						array(
							'taxonomy' =>'school-featured',
							'field'    =>'slug',
							'terms'	   =>'front-page'
						),
					),
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
					while( $query->have_posts() ) {
						$query->the_post(); 
						?>
						<article>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('medium'); ?>
								<h3><?php the_title(); ?></h3>
							</a>
						</article>
						<?php
					}
					wp_reset_postdata();
				}
				?>
			</section>
			<section >
			<?php
				the_content();
			?>
			</section>
			<section class='home-right'>
			<?php
				if ( function_exists( 'get_field' ) ) {

				if ( get_field( 'right_section_heading' ) ) {
					echo '<h2>';
					the_field( 'right_section_heading' );
					echo '</h2>';
				}

				if ( get_field( 'right_section_content' ) ) {
					echo '<p>';
					the_field( 'right_section_content' );
					echo '</p>';
				}

			}
			?>
			</section>
			<section class='home-blog'>
				<h2><?php esc_html_e('Recent News','school');?></h2>
				<?php
					$args =array(
						'post_type'=>'post',
						'posts_per_page'=> 3
					);
					
					$blog_query = new WP_Query($args);
					if($blog_query -> have_posts()){
						while($blog_query -> have_posts()){
							$blog_query -> the_post();
							?>
							<article>
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
									<?php the_post_thumbnail('latest-blog-post'); ?>
									<?php $post_date = get_the_date(); ?>
                                    <p><?php echo $post_date; ?></p>
								</a>
							</article>
							<?php
						}
						wp_reset_postdata();
					}
				?>
			</section>

<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php

get_footer();
