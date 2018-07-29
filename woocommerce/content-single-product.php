<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
  echo get_the_password_form(); // WPCS: XSS ok.
  return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

  <section class="row single-product-main-section">
    <div class="cell-1000">
      <div class="single-product-main-content">

        <?php
          /**
           * Hook: woocommerce_before_single_product_summary.
           *
           * @hooked woocommerce_show_product_sale_flash - 10
           * @hooked woocommerce_show_product_images - 20
           */
          do_action( 'woocommerce_before_single_product_summary' );
        ?>

        <div class="summary entry-summary">
          <?php
            /**
             * Hook: woocommerce_single_product_summary.
             *
             * @hooked woocommerce_template_single_title - 5
             * @hooked woocommerce_template_single_rating - 10
             * @hooked woocommerce_template_single_price - 10
             * @hooked woocommerce_template_single_excerpt - 20
             * @hooked woocommerce_template_single_add_to_cart - 30
             * @hooked woocommerce_template_single_meta - 40
             * @hooked woocommerce_template_single_sharing - 50
             * @hooked WC_Structured_Data::generate_product_data() - 60
             */
            do_action( 'woocommerce_single_product_summary' );
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="row single-product-reviews-section">
    <div class="cell-1000 reviews-cell">
        <?php $tabs = apply_filters( 'woocommerce_product_tabs', array() ); ?>

        <div class="read-reviews-button" id="read-reviews">Read reviews</div>
        <div class="woocommerce-reviews wc-reviews-wrapper">

           <?php echo do_shortcode('[woocommerce_reviews]'); ?>

        </div>

        
    </div>
  </section>

  <section class="row single-product-extra-section">
    <div class="cell-1000">
      <?php if(get_field('extra_information')): ?>
          <div class="product-extra-information">
              <?php while(the_repeater_field('extra_information')): ?>
                  <div class="product-extra-information-item">
                      <div class="product-extra-information-title">
                          <?php the_sub_field('title'); ?>
                      </div>
                      <div class="product-extra-information-text">
                          <?php the_sub_field('text'); ?>
                      </div>
                  </div>
              <?php endwhile; ?>
          </div>
      <?php endif; ?>
        

      <div class="product-features">
          <?php if(get_field('product_features')): ?>
              <?php while(the_repeater_field('product_features')): ?>
                  <div class="product-features-item">
                      <div class="product-features-text">
                          <div class="slider-counter">
                              <div class="feature-title">Feature</div>
                              <span class="current-slide"></span> <div class="slides-counter-divider"></div> <span class="all-slides"></span>
                          </div>
                          <div class="description">
                              <?php the_sub_field('text'); ?>
                          </div>
                          <div class="carousel-nav">
                              <a class="prev" href="#"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/featured-left.svg"></a>
                              <a class="next" href="#"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/featured-right.svg"></a>
                          </div>
                      </div>
                      <div class="product-features-image">
                          <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('alt'); ?>" />
                      </div>
                  </div>
              <?php endwhile; ?>
          <?php endif; ?>
      </div>
         
    </div>
  </section>

  <section class="row single-product-similar-section">
    <div class="cell-1000">

        <?php if(get_field('matching_briefs_title')): ?>
             
            <div class="single-product-similar-information-line">
                <div class="single-product-similar-information-title">
                    <?php the_field('matching_briefs_title'); ?>
                </div>
                <div class="single-product-similar-information-text">
                    <?php the_field('matching_briefs_text'); ?>
                </div>
            </div>

        <?php endif; ?>

        <?php
            /**
             * woocommerce_after_single_product_summary hook
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            do_action( 'woocommerce_after_single_product_summary' );
        ?>
    </div>
  </section>

  <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    // do_action( 'woocommerce_after_single_product_summary' );
  ?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
