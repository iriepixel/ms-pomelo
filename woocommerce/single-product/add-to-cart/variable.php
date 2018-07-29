<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); 

global $post;

$terms = get_the_terms( $post->ID, 'product_cat' );
foreach ($terms as $term) 

{
    $product_cat_id = $term->term_id;
    /*echo $product_cat_id;*/
    break;
}

?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ); // WPCS: XSS ok. ?>">
  <?php do_action( 'woocommerce_before_variations_form' ); ?>

  <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
    <p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
  <?php else : ?>

    <!-- add dropdownlist with available colors -->
    <?php 

      $args = array(
          'post_type'             => 'product',
          'post_status'           => 'publish',
          'ignore_sticky_posts'   => 1,
          'posts_per_page'        => '12',
          'meta_query'            => array(
              array(
                  'key'           => '_visibility',
                  'value'         => array('catalog', 'visible'),
                  'compare'       => 'IN'
              )
          ),
          'tax_query'             => array(
              array(
                  'taxonomy'      => 'product_cat',
                  'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                  'terms'         => $product_cat_id,
                  'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
              )
          )
      );

      


      $products = new WP_Query($args);

      $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      // The Loop
      if ( $products->have_posts() ) {
        echo '<div class="product-color-select"><select onChange="window.location.href=this.options[this.selectedIndex].value">';
        while ( $products->have_posts() ) {
          $products->the_post();

          if($actual_link == get_permalink())
          {
            echo '<option value="' . get_permalink() . '" selected="true">' . get_the_title() . '</option>';
          }
          else
          {
            echo '<option value="' . get_permalink() . '">' . get_the_title() . '</option>';
          }         
        }
        echo '</select></div>';
      } else {
        // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
    ?>

    <!-- add dropdownlist with available colors END-->

    <table class="variations" cellspacing="0">
      <tbody>
        <?php foreach ( $attributes as $attribute_name => $options ) : ?>
          <tr>
            <td class="value">
              <?php
                wc_dropdown_variation_attribute_options( array(
                  'options'   => $options,
                  'attribute' => $attribute_name,
                  'product'   => $product,
                ) );
              ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="mspomelo-share-size-guide">
      <div class="mspomelo-product-size-guide">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>?p=145" target="_blank">Size guide</a>
      </div>
    </div>

    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

    <div class="single_variation_wrap" style="display:none;">
      <?php
        /**
         * Hook: woocommerce_before_single_variation.
         */
        do_action( 'woocommerce_before_single_variation' );

        /**
         * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
         *
         * @since 2.4.0
         * @hooked woocommerce_single_variation - 10 Empty div for variation data.
         * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
         */
        do_action( 'woocommerce_single_variation' );

        /**
         * Hook: woocommerce_after_single_variation.
         */
        do_action( 'woocommerce_after_single_variation' );
      ?>
    </div>
  <?php endif; ?>

  <?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
