<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  Automattic
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

global $post;

if(get_field('color_circles')): ?>
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
  </div>
<?php endif;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
  return;
}

?>

<div class=" product-description woocommerce-product-details__short-description">
  <?php echo $short_description; // WPCS: XSS ok. ?>
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

