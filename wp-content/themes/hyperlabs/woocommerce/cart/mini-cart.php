<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

	<?php if ( ! WC()->cart->is_empty() ) : ?>
	<div class="overflow-y-auto mb-4">
		<div class="hl__filter-block" data-cart="<?php echo count( WC()->cart->get_cart() )?>"> <h2  class="hl_title">Кошик для покупок</h2> </div>
		<ul class="woocommerce-mini-cart cart_list hl_minicard_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
			<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					/**
					 * This filter is documented in woocommerce/templates/cart/cart.php.
					 *
					 * @since 2.1.0
					 */
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<li class="hl_minicard_itm woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						<?php
						echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'woocommerce_cart_item_remove_link',
							sprintf(
								'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">Видалити</a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								/* translators: %s is the product name */
								esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
								esc_attr( $product_id ),
								esc_attr( $cart_item_key ),
								esc_attr( $_product->get_sku() )
							),
							$cart_item_key
						);
						?>
						<?php

						$product = $cart_item['data'];
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
							// Display product image
							$thumbnail = $product->get_image('thumbnail');
							// echo '<div class="hl__product_img mini-cart-product-image">' . $thumbnail . '</div> <div class="hl_cart_content">';
							echo '<div class="hl__product_img mini-cart-product-image"><img src="'.$image[0].'"></div> <div class="hl_cart_content">';


							// Display product name
							echo '<h3 class="hl__product_title">' . $product->get_title() . '</h3>';

							// Display product attributes and values
							foreach ($cart_item['variation'] as $attribute_name => $attribute_value) {

								$attribute = $attribute_name;
								$prefix = "attribute_pa_";

								if (strpos($attribute, $prefix) === 0) {
									$newAttribute = substr($attribute, strlen($prefix));

								} else {
									// Handle the case where the prefix is not found, or the attribute doesn't start with it.
									$newAttribute = $attribute_name;
								}

								echo '<div class="hl__product_att mini-cart-attribute">' . wc_attribute_label($newAttribute) . ': <span>' . $attribute_value . '</span></div>';
							}
							echo '<div class="hl__product_price d-flex align-items-center mini-cart-product-price">Цена: </span>' . wc_price($product->get_price() * $cart_item['quantity']) . ' </span></div>';


							 // Display product quantity with increase and decrease buttons
							 echo '<div class="mini-cart-quantity d-flex align-items-center">';
							 echo '<span class="quantity-label me-3">Кількість:</span>';
							 echo '<div class="hl__quantity d-flex align-items-center"><button class="quantity-decrease hl__btn" data-cart-key="' . $cart_item_key . '">
									<svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M8 1L2 7L8 13" stroke="#FFFFFF70" stroke-width="2"/>
									</svg>
							 </button>';
							 echo '<span class="quantity">' . $cart_item['quantity'] . '</span>';
							 echo '<button class="quantity-increase hl__btn" data-cart-key="' . $cart_item_key . '">
									<svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1 1L7 7L1 13" stroke="#FFFFFF70" stroke-width="2"/>
									</svg>
								</button></div>';

							 // echo '<button class="remove-from-cart" data-cart-key="' . $cart_item_key . '">Remove</button>';

							 // echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							 // 	'woocommerce_cart_item_remove_link',
							 // 	sprintf(
							 // 		'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">Видалити</a>',
							 // 		esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							 // 		esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product->get_title() ) ) ),
							 // 		esc_attr( $product->get_id() ),
							 // 		esc_attr( $cart_item_key ),
							 // 		esc_attr( $product->get_sku() )
							 // 	),
							 // 	$cart_item_key
							 // );

							 echo '</div> </div>';

						?>
						<?php //echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php //echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</li>
					<?php
				}
			}

			do_action( 'woocommerce_mini_cart_contents' );
			?>
		</ul>
	</div>

	<div class="hl_minicard_total">
	<div class="woocommerce-mini-cart__total hl__minicard_total d-flex align-items-center justify-content-between">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
	</div>


	<?php
	echo '<div class="mb-3"><a class="hl__verify_btn hl__btn" href="' . esc_url(wc_get_checkout_url()) . '">Перевірити</a> </div>';
	echo '<div><a class="hl__shopping_btn hl__btn" href="' . esc_url(home_url('/shop')) . '">Продовжити покупки</a> </div>';?>
	 <!-- // Add "Verify" button -->
	 </div>
	<?php //do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<!-- <p class="woocommerce-mini-cart__buttons buttons"> -->
		<?php // do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
	<!-- </p> -->

	<?php //do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
<?php if(is_cart() || is_checkout()): ?>
<script>
    jQuery(document).on('click', '.remove_from_cart_button', function(e) {
       var check = jQuery('.hl__filter-block').attr('data-cart');
        if(check == 1)
        {
			setTimeout(function() {
				window.location.href = window.location.href;
				window.location.reload();
				
			}, 1500);
        }
        
    })
</script>
<?php endif;?>