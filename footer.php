<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MS_Pomelo
 */

?>

	</div><!-- #content -->

	<?php if ( !is_front_page()) : ?>
		<section class="row footer-shop-banner-section">
			<div class="cell footer-shop-banner-cell">

				<?php
					$the_query = new WP_Query( 'page_id=190' );

					while ( $the_query->have_posts() ) : ?>
						<?php $the_query->the_post(); ?>
						<div class="section text">
							<?php the_content(); ?>
							<div class="arrow-button">
								<a href="<?php echo esc_url( get_permalink(638) ); ?>">ORDER NOW</a>
							</div>
						</div>
						<div class="section fit-kit-image">
							<img src="<?php the_field('fit_kit_image'); ?>"/>
						</div>
						<div class="section shop-banner">
							<div class="desktop">
								<img src="<?php the_field('shop_banner_image'); ?>"/>
							</div>
							<div class="tablet">
								<img src="<?php the_field('shop_banner_image_tablet'); ?>"/>
							</div>
							<div class="simple-button">
								<a href="<?php echo esc_url( get_permalink(606) ); ?>"><?php the_field('shop_link_text'); ?></a>
							</div>
						</div>
					<?php endwhile;

					wp_reset_postdata();
				?>

			</div>
		</section>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<section class="row footer-section">
			<div class="cell">
				<div class="footer-cell">
					<div class="footer-left">
						<?php wp_nav_menu( array('menu' => 'Footer menu' )); ?>
						<div class="footer-donation">
							<div class="image">
								<a href="http://www.pinkribbonfoundation.org.uk" target="_blank"><img alt="Pink ribbon foundation" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/pinkribbon-logo-footer.svg"></a>
							</div>
							<div class="text">
								We donate £1 for every bra we sell to the Pink Ribbon Foundation<br/>(reg. charity No. 1080839) to fight breast cancer.
							</div>
						</div>
						<div class="footer-copyright">
							<div class="image">
								<img alt="MS Pomelo logo" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/pomelo-logo-footer.svg">
							</div>
							<div class="text">
								Copyright &copy; <?php echo date("Y"); ?> Ms Pomelo Studios Ltd.<br/>Developed by <a href="http://iriepixel.com" target="_blank">IRIE PIXEL</a>
							</div>
						</div>
					</div>
					<div class="footer-right">
						<div class="subscribe">
							<div class="title">
								Be in<br/>the know
							</div>
							<?php echo do_shortcode("[mc4wp_form id='628']"); ?>
						</div>
						<div class="social">
							<div class="title">
								Stay<br/>connected
							</div>
							<a href="https://www.facebook.com/MsPomeloBrasOriginal" target="_blank" class="facebook social-icon">
								<img alt="Facebook" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/facebook.svg">
							</a>
							<a href="https://www.instagram.com/ms_pomelo_bras" target="_blank" class="instagram social-icon">
								<img alt="Instagram" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/instagram.svg">
							</a>
							<a href="https://www.pinterest.com/mspomelo" target="_blank" class="pinterest social-icon">
								<img alt="Pinterest" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/pinterest.svg">
							</a>
						</div>
						<div class="bank-cards">
							<img alt="MS Pomelo logo" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/bank-cards.png">
						</div>
					</div>
				</div>
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
