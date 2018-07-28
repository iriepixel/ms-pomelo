<?php
/**
 * Template Name: Bra school
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

						<div class="page-content-top">
							<?php the_content(); ?>
						</div>

						<div class="bra-school-section">
							<?php if(get_field('bra_school_section')): ?>
								<?php while(the_repeater_field('bra_school_section')): ?>
									<div class="bra-school-section-item">
										<a href="<?php the_sub_field('bra_school_section_link'); ?>">
									    	<img class="bra-school-section-item-image" src="<?php the_sub_field('bra_school_section_image'); ?>" alt="<?php the_sub_field('alt'); ?>" />
									    	<div class="bra-school-section-item-title">
									    		<?php the_sub_field('bra_school_section_title'); ?>
									    	</div>
									    </a>
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
