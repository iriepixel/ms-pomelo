<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
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

		<!--<?php
			foreach ( $attributes as $attribute_name => $options ) :
				$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) : $product->get_variation_default_attribute( $attribute_name );
				wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
				/*echo end( $attribute_keys ) === $attribute_name ? '<a class="reset_variations" href="#">' . __( 'Clear selection', 'woocommerce' ) . '</a>' : '';*/
			endforeach;
		?>-->
		
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<!-- <td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td> -->
						<td class="value">
							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
								/*echo end( $attribute_keys ) === $attribute_name ? '<a class="reset_variations" href="#">' . __( 'Clear selection', 'woocommerce' ) . '</a>' : '';*/
							?>
						</td>
					</tr>
		        <?php endforeach;?>
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
				 * woocommerce_before_single_variation Hook
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * woocommerce_after_single_variation Hook
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>

</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
