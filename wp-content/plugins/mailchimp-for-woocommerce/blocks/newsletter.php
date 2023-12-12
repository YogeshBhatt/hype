<?php

define( 'MAILCHIMP_WOOCOMMERCE_NEWSLETTER_VERSION', '1.0.0' );

add_action( 'woocommerce_blocks_loaded', function() {
	if (class_exists( '\Automattic\WooCommerce\Blocks\Package' ) &&
	    interface_exists('\Automattic\WooCommerce\Blocks\Integrations\IntegrationInterface')) {
		require_once dirname( __FILE__ ) . '/woocommerce-blocks-integration.php';
		require_once dirname( __FILE__ ) . '/woocommerce-blocks-extend-store-endpoint.php';
		add_action(
			'woocommerce_blocks_checkout_block_registration',
			function( $integration_registry ) {
				$integration_registry->register( new Mailchimp_Woocommerce_Newsletter_Blocks_Integration() );
			}
		);

		Mailchimp_Woocommerce_Newsletter_Blocks_Extend_Store_Endpoint::init();
	}
} );

add_action( 'woocommerce_store_api_checkout_update_order_from_request', array( 'Mailchimp_Woocommerce_Newsletter_Blocks_Integration', 'order_processed' ), 10, 2 );