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
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;
?>
<script type="text/javascript">
    jQuery(window).on('load', function() {
        jQuery('#myModal_success').modal('show');
		jQuery('#myModal_fail').modal('show');
    });
</script>

<div class="container">
<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>
		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<div id="myModal_fail" class="hl__thankyou_modal hl__fail_modal modal fade" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-body p-0 text-center">
								<div class="success-icon">
									<svg width="112" height="112" viewBox="0 0 112 112" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M56.0013 107.044C84.1922 107.044 107.046 84.1908 107.046 55.9998C107.046 27.8089 84.1922 4.95557 56.0013 4.95557C27.8103 4.95557 4.95703 27.8089 4.95703 55.9998C4.95703 84.1908 27.8103 107.044 56.0013 107.044Z" fill="#F63D44"/>
										<path d="M37.625 74.3759L56.0009 56L74.3769 37.624" stroke="black" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"/>
										<path d="M37.625 37.624L56.0009 56L74.3769 74.3759" stroke="black" stroke-width="4" stroke-miterlimit="10" stroke-linecap="round"/>
									</svg>

								</div>
								<h1 class="title">Fail</h1>
								<p class="text">An error occurred, please check your details and try paying again</p>
								<div class="d-flex justify-content-center">
									<a href="javascript:void(0)" class="hl__button hl__open-auth">Return to registration</a>
								</div>
							</div>
						</div>

				</div>
			</div>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>
     
			<div id="myModal_success" class="hl__thankyou_modal modal fade" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg">
						
						<div class="modal-content">
							<div class="modal-body p-0 text-center">
								<div class="success-icon">
									<svg width="103" height="103" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="51.5701" cy="51.5692" r="51.2615" fill="black"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M51.5716 0.380371C79.8232 0.380371 102.76 23.3176 102.76 51.5692C102.76 79.8208 79.8232 102.758 51.5716 102.758C23.3201 102.758 0.382812 79.8208 0.382812 51.5692C0.382812 23.3176 23.3201 0.380371 51.5716 0.380371ZM26.659 55.541L40.6196 69.5016C41.527 70.4113 43.0022 70.4113 43.9096 69.5016L76.4843 36.9269C77.3917 36.0194 77.3917 34.5443 76.4843 33.6368C75.5769 32.7294 74.1017 32.7294 73.1943 33.6368L42.2646 64.5665L29.949 52.2509C29.0416 51.3435 27.5664 51.3435 26.659 52.2509C25.7515 53.1584 25.7515 54.6335 26.659 55.541Z" fill="url(#paint0_linear_404_8586)"/>
										<defs>
										<linearGradient id="paint0_linear_404_8586" x1="-5.4341" y1="-4.27316" x2="106.251" y2="107.412" gradientUnits="userSpaceOnUse">
										<stop stop-color="#B3FF63"/>
										<stop offset="1" stop-color="#A5FD48"/>
										</linearGradient>
										</defs>
									</svg>
								</div>

								<h1 class="title">Success</h1>
								<p class="text">Your order number <span class="green"><?php echo $order->get_order_number();?></span> successfully created, we are already working on it, thank you!</p>
								<div class="d-flex justify-content-center">
									<a href="<?php echo site_url('shop');?>" class="hl__button hl__button--green">Go to the store</a>
								</div>
							</div>
						</div>

				</div>
			</div>

			<?php wc_get_template( 'checkout/order-received.php', array( 'order' => $order ) ); ?>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number 123:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>

	<?php endif; ?>
</div>
</div>
