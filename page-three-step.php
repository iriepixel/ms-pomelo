<?php
/**
 * Template Name: Three step
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

				<section class="row three-step-section">
					<div class="cell">
						<div class="page-back-button">
							<a href="<?php echo esc_url( get_permalink(212) ); ?>">Back</a>
						</div>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<div class="page-content-top">
							<?php the_content(); ?>
						</div>

						<div class="three-step-list">
							<?php if(get_field('text_and_image')): ?>
								<?php while(the_repeater_field('text_and_image')): ?>

									<?php if( get_sub_field('image_position') == 'left'): ?>
										<div class="three-step-list-item image-left">
									    	<img class="three-step-list-item-image" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('alt'); ?>" />
											<div class="three-step-list-item-text-block">
												<div class="three-step-list-item-title">
										    		<?php the_sub_field('title'); ?>
										    	</div>
										    	<div class="three-step-list-item-text">
										    		<?php the_sub_field('text'); ?>
										    	</div>
											</div>
									    </div>
									<?php endif; ?>

									<?php if( get_sub_field('image_position') == 'right'): ?>
										<div class="three-step-list-item image-right">
											<div class="three-step-list-item-text-block">
												<div class="three-step-list-item-title">
										    		<?php the_sub_field('title'); ?>
										    	</div>
										    	<div class="three-step-list-item-text">
										    		<?php the_sub_field('text'); ?>
										    	</div>
											</div>
											<img class="three-step-list-item-image" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('alt'); ?>" />
									    </div>
									<?php endif; ?>

								<?php endwhile; ?>
							<?php endif; ?>
						</div>

					</div>
				</section>
				
				<section class="row three-step-important-section">
					<div class="cell">
						<?php the_field('important_part'); ?>
					</div>
				</section>
				
				<section class="row three-step-video-section">
					<div class="cell">
						<div class="youtube-video">
							<?php the_field('video'); ?>
						</div>
					</div>
				</section>
				
			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
