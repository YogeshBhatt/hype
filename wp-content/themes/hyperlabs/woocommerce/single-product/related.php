<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products hl__slider-small">
	   <div class="hl__slider-small-header row align-items-center justify-content-between">
	      	 <div class="col-auto">
				<?php $heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Хіти продажів', 'woocommerce' ) );
				if ( $heading ) : ?>
					<h2><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
			</div>

			<div class="col-auto">
				<div class="swiper__main-small-cntrl d-flex align-items-center">
					<div class="swiper__main-small-prev">
						<img
							src="<?php echo get_template_directory_uri(); ?>/images/svg/swiper-arrow-right.svg"
							alt="swiper right arrow" />
					</div>
					<div class="swiper__main-small-next">
						<img
							src="<?php echo get_template_directory_uri(); ?>/images/svg/swiper-arrow-right.svg"
							alt="swiper right arrow" />
					</div>
				</div>
			</div>
		</div>

		<?php woocommerce_product_loop_start(); ?>
		<div class="swiper swiper__main-small">
			<div class="swiper-wrapper">
				<?php foreach ( $related_products as $related_product ) : ?>
					<div class="swiper-slide">
					<?php
					$post_object = get_post( $related_product->get_id() );
					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					//wc_get_template_part( 'content', 'product' );
					 wc_get_template_part( 'content', 'product_custom' );
					 ?>
					 </div>

			<?php endforeach; ?>
		</div>
	 </div>
			<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();



