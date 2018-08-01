<?php
/**
 * Template Name: Store
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MS_Pomelo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section class="row shop-section">
					<div class="cell">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

						<div class="page-content-top">
							<!-- <?php the_content(); ?> -->
							<p>When it comes to big bras, beauty and comfort need not be a compromise. Our bras make women open their shoulders, stand tall, put them into a good mood, and make them feel they can conquer the world. Here are our time-tested favourites. We chose them because in our 30+ years of experience they work with all shapes and sizes, and the styles suit most occasions.</p>
						</div>

						<div class="shop-grid">
              <?php echo do_shortcode("[wpv-view name='Shop']"); ?>
							<?php echo do_shortcode("[wpv-view name='Briefs']"); ?>
						</div>
					</div>
				</section>

				<section class="row fit-kit-section">
					<div class="cell">
						<div class="fit-kit">
							<div class="fit-kit-text">

								<?php
									$the_query = new WP_Query( 'page_id=1448' );

									while ( $the_query->have_posts() ) : ?>
										<?php $the_query->the_post(); ?>
										<div class="fit-kit-text-title">
											<?php the_field('fitkit_title'); ?>
										</div>
										<div class="fit-kit-text-subtitle">
											<?php the_field('fitkit_subtitle'); ?>
										</div>
										<div class="fit-kit-text-content">
											<?php the_field('fitkit_text'); ?>
										</div>
									<?php endwhile;

									wp_reset_postdata();
								?>

								<div class="simple-button">
					                <a href="<?php echo esc_url( get_permalink(638) ); ?>">ORDER NOW</a>
					              </div>
							</div>
							<div class="fit-kit-map">
								<?php echo do_shortcode("[image_mapper id='1']"); ?>
							</div>
						</div>
					</div>
				</section>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
