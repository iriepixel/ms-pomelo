<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices(); ?>

<section class="row">
	<div class="cell-900">
		<div class="shop-content-grey-border">

			<p class="myaccount_user account-main-description">
				<?php
				printf(
					__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>),<br/><br/>', 'woocommerce' ) . ' ',
					$current_user->display_name,
					wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) )
				);

				printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
					wc_customer_edit_account_url()
				);
				?>
			</p>

			<?php wc_get_template( 'myaccount/my-address.php' ); ?>

			<?php do_action( 'woocommerce_before_my_account' ); ?>
		</div>
	</div>
</section>


<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>
		
