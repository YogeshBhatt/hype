<?php
/**
 * Template part for intro section (collections page template)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$collectionsIntroText1 = get_field('collections_intro_text_1');
$collectionsIntroText2 = get_field('collections_intro_text_2');
$collectionsIntroBackground = get_field('collections_intro_image');
$collectionsIntroProduct = get_field('collections_intro_featured_products');
?>

<div class="hl__collections-main">
	<?php if ( $collectionsIntroBackground) : ?>
		<div class="hl__collections-main-image">
			<?php if ( $collectionsIntroBackground['type'] == 'image' ) : ?>
				<img
					src="<?php echo $collectionsIntroBackground['url']; ?>"
					alt="<?php echo $collectionsIntroBackground['title']; ?>" />
			<?php elseif ( $collectionsIntroBackground['type'] == 'video' ) : ?>
				<video
					src="<?php echo $collectionsIntroBackground['url']; ?>"
					alt="<?php echo $collectionsIntroBackground['title']; ?>"
					autoplay
					loop
					muted
					playsinline></video>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<?php if ( $collectionsIntroText1 || $collectionsIntroText2) : ?>
		<div class="container">
			<div class="row align-items-md-center align-items-end justify-content-center">
				<div class="col-auto">
					<?php if ($collectionsIntroText1) : ?>
						<div class="hl__collections-main-text1"><?php echo $collectionsIntroText1; ?></div>
					<?php endif; ?>
					<?php if ($collectionsIntroText2) : ?>
						<div class="hl__collections-main-text2"><?php echo $collectionsIntroText2; ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ($collectionsIntroProduct): ?>
		<?php foreach ($collectionsIntroProduct as $index => $fp): ?>
			<?php
			$product_id = $fp['collections_intro_product'];

			$position_x = $fp['collections_intro_product_bubble_x_position'] ? $fp['collections_intro_product_bubble_x_position'] : '70%';
			$position_y = $fp['collections_intro_product_bubble_y_position'] ? $fp['collections_intro_product_bubble_y_position'] : '86%';
			$position_x_mobile = $fp['collections_intro_product_bubble_x_position_mobile'] ? $fp['collections_intro_product_bubble_x_position_mobile'] : '30%';
			$position_y_mobile = $fp['collections_intro_product_bubble_y_position_mobile'] ? $fp['collections_intro_product_bubble_y_position_mobile'] : '25%';

			$product = wc_get_product($product_id);

			if (!$product) {
				continue;
			}
			$image_url = wp_get_attachment_image_url($product->get_image_id(), 'full');
			$product_link = get_permalink($product_id);
			$product_title = get_the_title($product_id);
			$product_price = $product->get_price_html();
			?>
			<style>
				.hl__badge.hl__collections-main-badge-position-<?php echo $index + 1; ?> {
					z-index: 10;
					position: absolute;
				}
				@media (min-width: 768px) {
					.hl__badge.hl__collections-main-badge-position-<?php echo $index + 1; ?> {
						left: <?php echo $position_x; ?>;
						top: <?php echo $position_y; ?>;
					}
				}
				@media (max-width: 767px) {
					.hl__badge.hl__collections-main-badge-position-<?php echo $index + 1; ?> {
						left: <?php echo $position_x_mobile; ?>;
						top: <?php echo $position_y_mobile; ?>;
					}
				}
			</style>
			<a href="<?php echo $product_link; ?>" class="hl__badge hl__collections-main-badge-position-<?php echo $index + 1; ?>">
				<?php if ($image_url): ?>
					<div class="hl__badge-image">
						<img
							src="<?php echo esc_url($image_url); ?>"
							alt="<?php echo esc_attr($product_title); ?>"
							width="86"
							height="86" />
					</div>
				<?php endif; ?>
				<?php if ($product_title || $product_price): ?>
					<div class="hl__badge-content">
						<?php if ($product_title): ?>
							<div class="hl__badge-name"><?php echo $product_title; ?></div>
						<?php endif; ?>
						<?php if ($product_price): ?>
							<div class="hl__badge-price"><?php echo $product_price; ?></div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</a>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
