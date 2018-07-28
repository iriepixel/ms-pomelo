<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

if ( ! $post->post_excerpt ) {
	return;
}

?>

<?php if(get_field('color_circles')): ?>
	<div class="product-colors">
		<div class="product-colors-title">
			colors:
		</div>
		<div class="product-colors-circles">
			<?php while(the_repeater_field('color_circles')): ?>
				<div class="product-colors-circle">
			    	<img src="<?php the_sub_field('color'); ?>" alt="<?php the_sub_field('color'); ?>" />
			    </div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>


<div class="product-description" itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>

<?php echo do_shortcode('[woocs]'); ?>

<div class="product-details">
	<div class="product-details-title">
		PRODUCT DETAILS
	</div>
	<div class="product-details-text">
		<?php the_field('product_details'); ?>
	</div>
</div>
