<?php
/**
 * Template part for Banner section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$indexBannerBackgroundImage = get_field('index_banner_background_image');
$IndexBannerBubbleProducts = get_field('banner_bubble_products');
$indexBannerTitle = get_field('index_banner_title');
$indexBannerText = get_field('index_banner_text');
?>

<div class="hl__info-banner">
	<?php if ( $indexBannerBackgroundImage ) : ?>
	<div class="hl__info-banner-top">
			<div class="hl__info-banner-image">
				<img
					src="<?php echo $indexBannerBackgroundImage['url']; ?>"
					alt="<?php echo $indexBannerBackgroundImage['title']; ?>" />
			</div>
		<?php if ($IndexBannerBubbleProducts): ?>
			<?php foreach ($IndexBannerBubbleProducts as $index => $fp): ?>
				<?php
				$product_id = $fp['product'];

				$position_x = $fp['product_bubble_x_position'] ? $fp['product_bubble_x_position'] : '50%';
				$position_y = $fp['product_bubble_y_position'] ? $fp['product_bubble_y_position'] : '50%';
				$position_x_mobile = $fp['product_bubble_x_position_mobile'] ? $fp['product_bubble_x_position_mobile'] : '50%';
				$position_y_mobile = $fp['product_bubble_y_position_mobile'] ? $fp['product_bubble_y_position_mobile'] : '50%';

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
					@media (min-width: 768px) {
						.hl__info-banner .hl__info-banner-badge-position-<?php echo $index + 1; ?> {
							z-index: 10;
							position: absolute;
							left: <?php echo $position_x; ?>;
							top: <?php echo $position_y; ?>;
						}
					}
					@media (max-width: 767px) {
						.hl__info-banner .hl__info-banner-badge-position-<?php echo $index + 1; ?> {
							display: none;
						}
					}
				</style>
				<a href="<?php echo $product_link; ?>" class="hl__badge hl__info-banner-badge-position-<?php echo $index + 1; ?>">
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
	<?php endif; ?>
	<?php if ( $indexBannerTitle || $indexBannerText ) : ?>
		<div class="hl__info-banner-bottom">
			<div class="container">
				<div class="row">
					<?php if ( $indexBannerTitle) : ?>
					<style>
						.hl__info-banner-bottom-header span + span:before {
							background-image: url(<?php echo get_template_directory_uri(); ?>/images/svg/more-arrow.svg);
						}
					</style>
					<?php $linesTitle = explode("\n", $indexBannerTitle); ?>
						<div class="hl__info-banner-bottom-header col-xl-6 col-12">
							<?php foreach ($linesTitle as $line): ?>
								<?php if (trim($line)): ?>
									<span><?= esc_html($line); ?></span>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php if ( $indexBannerText ) : ?>
						<?php $linesText = explode("\n", $indexBannerText); ?>
						<div class="hl__info-banner-bottom-text col-xl-6 col-12">
							<?php foreach ($linesText as $line): ?>
								<?php if (trim($line)): // Проверяем, не пустая ли строка ?>
									<p><?= esc_html($line); ?></p>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
