<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="woocommerce-order">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php _e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php _e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php _e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php _e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php   /*<?php _e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>

   */ ?>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>

</div>
<a class="button-print" href="#" onclick="window.print()"><img src="data:image/svg+xml;base64,&#10;PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgNDgyLjUgNDgyLjUiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ4Mi41IDQ4Mi41OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiPjxnPjxnPgoJPGc+CgkJPHBhdGggZD0iTTM5OS4yNSw5OC45aC0xMi40VjcxLjNjMC0zOS4zLTMyLTcxLjMtNzEuMy03MS4zaC0xNDkuN2MtMzkuMywwLTcxLjMsMzItNzEuMyw3MS4zdjI3LjZoLTExLjMgICAgYy0zOS4zLDAtNzEuMywzMi03MS4zLDcxLjN2MTE1YzAsMzkuMywzMiw3MS4zLDcxLjMsNzEuM2gxMS4ydjkwLjRjMCwxOS42LDE2LDM1LjYsMzUuNiwzNS42aDIyMS4xYzE5LjYsMCwzNS42LTE2LDM1LjYtMzUuNiAgICB2LTkwLjRoMTIuNWMzOS4zLDAsNzEuMy0zMiw3MS4zLTcxLjN2LTExNUM0NzAuNTUsMTMwLjksNDM4LjU1LDk4LjksMzk5LjI1LDk4Ljl6IE0xMjEuNDUsNzEuM2MwLTI0LjQsMTkuOS00NC4zLDQ0LjMtNDQuM2gxNDkuNiAgICBjMjQuNCwwLDQ0LjMsMTkuOSw0NC4zLDQ0LjN2MjcuNmgtMjM4LjJWNzEuM3ogTTM1OS43NSw0NDcuMWMwLDQuNy0zLjksOC42LTguNiw4LjZoLTIyMS4xYy00LjcsMC04LjYtMy45LTguNi04LjZWMjk4aDIzOC4zICAgIFY0NDcuMXogTTQ0My41NSwyODUuM2MwLDI0LjQtMTkuOSw0NC4zLTQ0LjMsNDQuM2gtMTIuNFYyOThoMTcuOGM3LjUsMCwxMy41LTYsMTMuNS0xMy41cy02LTEzLjUtMTMuNS0xMy41aC0zMzAgICAgYy03LjUsMC0xMy41LDYtMTMuNSwxMy41czYsMTMuNSwxMy41LDEzLjVoMTkuOXYzMS42aC0xMS4zYy0yNC40LDAtNDQuMy0xOS45LTQ0LjMtNDQuM3YtMTE1YzAtMjQuNCwxOS45LTQ0LjMsNDQuMy00NC4zaDMxNiAgICBjMjQuNCwwLDQ0LjMsMTkuOSw0NC4zLDQ0LjNWMjg1LjN6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiPjwvcGF0aD4KCQk8cGF0aCBkPSJNMTU0LjE1LDM2NC40aDE3MS45YzcuNSwwLDEzLjUtNiwxMy41LTEzLjVzLTYtMTMuNS0xMy41LTEzLjVoLTE3MS45Yy03LjUsMC0xMy41LDYtMTMuNSwxMy41UzE0Ni43NSwzNjQuNCwxNTQuMTUsMzY0LjQgICAgeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIj48L3BhdGg+CgkJPHBhdGggZD0iTTMyNy4xNSwzOTIuNmgtMTcyYy03LjUsMC0xMy41LDYtMTMuNSwxMy41czYsMTMuNSwxMy41LDEzLjVoMTcxLjljNy41LDAsMTMuNS02LDEzLjUtMTMuNVMzMzQuNTUsMzkyLjYsMzI3LjE1LDM5Mi42eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIj48L3BhdGg+CgkJPHBhdGggZD0iTTM5OC45NSwxNTEuOWgtMjcuNGMtNy41LDAtMTMuNSw2LTEzLjUsMTMuNXM2LDEzLjUsMTMuNSwxMy41aDI3LjRjNy41LDAsMTMuNS02LDEzLjUtMTMuNVM0MDYuNDUsMTUxLjksMzk4Ljk1LDE1MS45eiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIj48L3BhdGg+Cgk8L2c+CjwvZz48L2c+IDwvc3ZnPg==" class="loading" data-was-processed="true"> Распечатать чек</a>
