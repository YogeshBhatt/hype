<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

 /* $page_title = ( 'billing' === $load_address ) ? esc_html__( 'Billing address', 'woocommerce' ) : esc_html__( 'Shipping address', 'woocommerce' );*/

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>
	<div class="hl__account-info d-lg-block d-none">
		<h4 class="hl__account-info-header">Edit profile information</h4>
		<div class="hl__account-info-text">Check and edit your personal data</div>

	</div>

	<form method="post" id="billing_edit_address">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h3><?php // @codingStandardsIgnoreLine ?>

		<div class="woocommerce-address-fields">
			<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

			<div class="woocommerce-address-fields__field-wrapper">
				<?php
				foreach ( $address as $key => $field ) {
					woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
				}
				?>
			</div>

			<div class="hl__account-form-line d-flex">
                  <div class="hl__account-form-col hl__account-form-col--no-border">
                    <div class="hl__auth-item">
                      <input type="checkbox" name="checkboxAccountAgreement" id="checkboxAccountAgreement" class="hl__auth-item-checkbox" required>
                      <label class="hl__auth-item-checkbox-label" for="checkboxAccountAgreement">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect width="24" height="24" fill="#ffffff"/>
								<g clip-path="url(#clip0_838_33400)">
								<path d="M4 12.5105L9.4791 18.0001L20 7.48956L18.4896 6L9.4791 15L5.48953 11.0105L4 12.5105Z" fill="black"/>
								</g>
								<defs>
								<clipPath id="clip0_838_33400">
								<rect width="16" height="16" fill="white" transform="translate(4 4)"/>
								</clipPath>
								</defs>
							</svg>
							<span>I agree to receive updates, discounts and promotions</span>
							<abbr class="required" title="required">*</abbr>
                      </label>
                    </div>
					<div class="custom_error_checkbox"></div>
                  </div>
                </div>

			<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

			<div class="hl__account-form-line hl__account-form-line--button form-row">
				<button type="submit" class="hl__button hl__button--black button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_address" value="<?php esc_attr_e( 'Save address', 'woocommerce' ); ?>"><?php esc_html_e( 'Save address', 'woocommerce' ); ?></button>
				<?php wp_nonce_field( 'woocommerce-edit_address', 'woocommerce-edit-address-nonce' ); ?>
				<input type="hidden" name="action" value="edit_address" />
			</div>
		</div>

	</form>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
