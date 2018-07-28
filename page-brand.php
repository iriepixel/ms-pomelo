<?php
/**
 * Template Name: Brand
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

				<section class="row brand-text-section">
					<div class="cell">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="text-content-grey-border">
							<?php the_content(); ?>
						</div>
					</div>
				</section>

				<section class="row brand-background-section">
					<div class="brand-background-image">
						<img src="<?php the_field('background_image'); ?>" alt="MS Pomelo Brand image">
					</div>
					<div class="brand-background-text-block">
						<div class="brand-background-title">
							<?php the_field('background_title'); ?>
						</div>
						<div class="brand-background-text">
							<?php the_field('backround_text'); ?>
						</div>
						<div class="brand-background-button">
							<div class="simple-button">
								<a href="<?php echo esc_url( get_permalink(606) ); ?>">SHOP NOW</a>
							</div>
						</div>
					</div>
				</section>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
