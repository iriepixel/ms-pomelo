<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MS_Pomelo
 */

get_header(); 

global $post;
$author_id=$post->post_author;

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<section class="row blog-page-section">
				<div class="cell">
					<div class="page-back-button">
						<a href="<?php echo esc_url( get_permalink(75) ); ?>">Back</a>
					</div>

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="blog-header-image desktop">	
						<?php $image = get_field('header_image');?>
						<img class"pinthis" src="<?php echo $image['sizes']['blog-header-1470-505']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>

					<div class="blog-header-image mobile">	
						<img src="<?php the_field('poster_image'); ?>" alt="<?php the_field('alt'); ?>" />
					</div>

					<div class="blog-text-content">
						<div class="blog-author desktop">
							<?php 
								foreach( get_coauthors() as $coauthor ): ?>
									<div class="entry-author co-author">
										
										<div class="entry-author-left">
											<div class="entry-author-image">
												<?php echo get_the_post_thumbnail($coauthor->ID, 'thumbnail'); ?>
											</div>
											<div class="entry-author-name">
												<?php echo $coauthor->display_name; ?>
											</div>
										</div>

										<div class="entry-author-right">
											<div class="entry-author-description">
												<?php echo $coauthor->description; ?>  
												<a href="<?php echo $coauthor->website; ?>"><?php echo $coauthor->website; ?></a>
											</div>
										</div>

								   </div><!-- .entry-author co-author -->
							<?php endforeach; ?>
						</div>

						<div class="blog-author mobile">
							<?php 
								foreach( get_coauthors() as $coauthor ): ?>
									<div class="entry-author co-author">
										<div class="entry-author-image">
											<?php echo get_the_post_thumbnail($coauthor->ID, 'thumbnail'); ?>
										</div>
										<div class="entry-author-text">
											<div class="entry-author-name">
												<?php echo $coauthor->display_name; ?>
											</div>
											<div class="entry-author-description">
												<?php echo $coauthor->description; ?>  
												<a href="<?php echo $coauthor->website; ?>"><?php echo $coauthor->website; ?></a>
											</div>
										</div>
								   </div><!-- .entry-author co-author -->
							<?php endforeach; ?>
						</div>
						<!-- blog-author -->

						<div class="blog-content">
							<div class="blog-post-date"><?php echo the_date('d/m/y'); ?></div>
							<?php the_content(); ?>
							<!-- <div class="mspomelo-share">
								<div class="mspomelo-share-title">SHARE: </div>
								<div class="mspomelo-share-icons">
									<a href="http://www.facebook.com/share.php?u=<?php the_permalink();?>&title=<?php echo get_the_title();?>" target="_blank"><img alt="Facebook" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/share-facebook.svg"></a>
									<a href="http://pinterest.com/pin/create/bookmarklet/?url=<?php the_permalink(); ?>&is_video=false&description=<?php echo get_the_title();?>" target="_blank"><img alt="Pinterest" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/share-pinterest.svg"></a>
									<a href="http://twitter.com/home?status=<?php echo get_the_title();?>+<?php the_permalink();?>" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/share-twitter.svg"></a>
								</div>
							</div> -->
						</div>
					</div>

				</div>
			</section>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

