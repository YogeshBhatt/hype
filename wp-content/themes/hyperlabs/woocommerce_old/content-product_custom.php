<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<div class="hl__product">
		<div class="hl__product-images">
			<?php if ($product->get_image_id()): ?>
				<div class="hl__product-images-big-image">
						<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="<?php the_title(); ?>" />
				</div>
			<?php endif; ?>
			<?php $gallery_ids = $product->get_gallery_image_ids(); ?>
			<?php if ( $gallery_ids ): ?>
			<div class="hl__product-images-thumbnails">
				<?php foreach ($gallery_ids as $id): ?>
					<div class="hl__product-images-thumbnail-item">
						<img src="<?php echo wp_get_attachment_url($id); ?>" alt="<?php the_title_attribute(); ?>" class="hl__product-images-thumbnail-item-img" />
					</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="hl__product-info">
			<div class="hl__product-name">
				<?php the_title('<strong>', '</strong>'); ?>
			</div>
			<div class="hl__product-price">
				<span><?php echo $product->get_price_html(); ?></span>
			</div>
			<a href="<?php the_permalink(); ?>" class="hl__product-add d-inline-flex align-items-center">
				<img
					src="<?php echo get_template_directory_uri(); ?>/images/svg/more-arrow.svg"
					alt="Arrow for more" />
				<span><?php echo _('купити зараз'); ?></span>
			</a>
		</div>
	</div>
</li>
