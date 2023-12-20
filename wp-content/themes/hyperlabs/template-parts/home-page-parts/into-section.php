<?php
/**
 * Template part for Intro section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/


$introBannerText1 = get_field('intro_banner_text_1');
$introBannerText2A = get_field('intro_banner_text_2_a');
$introBannerText2B = get_field('intro_banner_text_2_b');
$introBannerText3 = get_field('intro_banner_text_3');

$introBannerBackgroundImage = get_field('intro_banner_background_image');
$introBannerBackgroundMobileImage = get_field('intro_banner_background_mobile_image');
$introBannerButtonLink = get_field('intro_banner_button_link');
$featuredProducts = get_field('featured_products');

?>

<div class="hl__main-screen">
	<?php if ( $introBannerBackgroundImage ) : ?>
		<div class="hl__main-screen-image">
			<?php if ( $introBannerBackgroundMobileImage ) : ?>
				<img
					class="d-md-block d-none"
					src="<?php echo $introBannerBackgroundImage['url']; ?>"
					alt="<?php echo $introBannerBackgroundImage['title']; ?>" />
				<img
					class="d-md-none d-block"
					src="<?php echo $introBannerBackgroundMobileImage['url']; ?>"
					alt="<?php echo $introBannerBackgroundMobileImage['title']; ?>" />
			<?php else: ?>
				<img
					class="d-block"
					src="<?php echo $introBannerBackgroundImage['url']; ?>"
					alt="<?php echo $introBannerBackgroundImage['title']; ?>" />
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="hl__main-screen-text">
		<div class="container d-md-block d-flex align-items-end">
			<div
				class="hl__main-screen-text-wrap d-flex flex-column align-items-start">
				<?php if ($introBannerText1) : ?>
					<div class="hl__main-screen-text1"><?php echo $introBannerText1; ?></div>
				<?php endif; ?>
				<?php if ($introBannerText2A) : ?>
					<div class="hl__main-screen-text2"><?php echo $introBannerText2A; ?></div>
				<?php endif; ?>
				<?php if ($introBannerText2B) : ?>
					<div class="hl__main-screen-text2 align-self-end"><?php echo $introBannerText2B; ?></div>
				<?php endif; ?>
				<?php if ($introBannerText3) : ?>
					<div class="hl__main-screen-text3 align-self-end"><?php echo $introBannerText3; ?></div>
				<?php endif; ?>
				<?php if ( $introBannerButtonLink ) : ?>
					<a
						href="<?php echo $introBannerButtonLink['url']; ?>"
						class="hl__main-screen-donate d-flex align-items-center justify-content-center">
						<img
							class="hl__main-screen-donate-text"
							src="<?php echo get_template_directory_uri(); ?>/images/svg/donate.svg"
							alt="Donate to Ukraine" />
						<img
							class="hl__main-screen-donate-arrow"
							src="<?php echo get_template_directory_uri(); ?>/images/svg/donate-arrow.svg"
							alt="Donate to Ukraine" />
					</a>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($featuredProducts): ?>
		<?php foreach ($featuredProducts as $index => $fp): ?>
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
					.hl__main-screen-text .hl__main-screen-badge-position-<?php echo $index + 1; ?> {
						z-index: 10;
						position: absolute;
					}
					@media (min-width: 768px) {
						.hl__main-screen-text .hl__main-screen-badge-position-<?php echo $index + 1; ?> {
							left: <?php echo $position_x; ?>;
							top: <?php echo $position_y; ?>;
						}
					}
					@media (max-width: 767px) {
						.hl__main-screen-text .hl__main-screen-badge-position-<?php echo $index + 1; ?> {
							left: <?php echo $position_x_mobile; ?>;
							top: <?php echo $position_y_mobile; ?>;
						}
					}
				</style>
				<a href="<?php echo $product_link; ?>" class="hl__badge hl__main-screen-badge-position-<?php echo $index + 1; ?>">
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
</div>