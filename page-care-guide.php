<?php
/**
 * Template Name: Care guide
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

				<section class="row care-guide-section">
					<div class="cell">
						<div class="page-back-button">
							<a href="<?php echo esc_url( get_permalink(212) ); ?>">Back</a>
						</div>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="page-content-top">
							<?php the_content(); ?>
						</div>

						<div class="care-guide-grid">
							<?php if(get_field('care_guide')): ?>
								<?php while(the_repeater_field('care_guide')): ?>
									<div class="care-guide-grid-item">
								    	<img class="care-guide-grid-item-image" src="<?php the_sub_field('care_guide_image'); ?>" alt="<?php the_sub_field('alt'); ?>" />
								    	<div class="care-guide-grid-item-title">
								    		<?php the_sub_field('care_guide_text'); ?>
								    	</div>
								    </div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>

					</div>
				</section>
				
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
