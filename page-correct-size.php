<?php
/**
 * Template Name: Correct size
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

				<section class="row correct-size-tips-section">
					<div class="cell">
						<div class="page-back-button">
							<a href="<?php echo esc_url( get_permalink(212) ); ?>">Back</a>
						</div>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="correct-size-description">
							<div class="correct-size-tips">
								<?php the_content(); ?>
							</div>
							<div class="correct-size-steps-block desktop">
								<div class="correct-size-steps">
									<?php the_field('steps'); ?>
								</div>
								<img class="correct-size-steps-image" src="<?php the_field('steps_image'); ?>" alt="<?php the_field('alt'); ?>" />
							</div>

							<div class="correct-size-steps-block mobile">
								<img class="correct-size-steps-image" src="<?php the_field('steps_image'); ?>" alt="<?php the_field('alt'); ?>" />
								<div class="correct-size-steps">
									<?php the_field('steps'); ?>
								</div>
							</div>
							
						</div>
					</div>
				</section>

				<section class="row correct-size-tables desktop">
					<div class="cell">	
						<?php the_field('tables'); ?>
					</div>
				</section>

				<section class="row correct-size-tables mobile">
					<div class="cell">
						<div class="mobile-table-section">
							<h2 style="text-align: center;">Ms Pomelo Bra Size Chart</h2>
							<div class="simple-button">
								<a href="<?php the_field('how_to_measure_table_pdf'); ?>" target="_blank">DOWNLOAD PDF</a>
							</div>
						</div>	
					</div>
				</section>

				<section class="row correct-size-video">
					<div class="cell">	
						<div class="youtube-video">
							<?php the_field('youtube_video'); ?>
						</div>
					</div>
				</section>
				
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
