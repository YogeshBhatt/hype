<?php
/**
 * Template part for Product slider 2 section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$collectionsSectionTitle = get_field('collections_product_slider_section_title');

$collectionsProductLinkText = get_field('collections_product_link_text') ? get_field('collections_product_link_text') : 'Переглянути';

$collectionsProductsTag = get_field('collections_product_slider_tag');
$collectionsProductsQuantity = get_field('quantity_of_collections_products');
$collectionsProductLimit = $collectionsProductsQuantity;

$collectionsArgs = array(
	'post_type'      => 'product',
	'posts_per_page' => -1,
	'product_tag'    => $collectionsProductsTag
);

$collectionsQuery = new WP_Query($collectionsArgs);
$collectionsCounter = 0;

?>

<div class="hl__slider-big">
	<div class="container">
		<?php if ($collectionsSectionTitle) : ?>
			<div class="hl__slider-big-header">
				<h2><?php echo $collectionsSectionTitle; ?></h2>
			</div>
		<?php endif; ?>
		<div class="swiper swiper__main-big">
			<?php if ($collectionsQuery->have_posts()) : ?>
				<div class="swiper-wrapper">
					<?php while ($collectionsQuery->have_posts() && $collectionsCounter < $collectionsProductLimit) : $collectionsQuery->the_post(); ?>
						<?php global $product; ?>
						<div class="swiper-slide">
							<div class="hl__hit">

								<div class="hl__hit-image">
									<?php if ($product->get_image_id()): ?>
										<div class="hl__hit-image-wrap">
											<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="<?php the_title(); ?>" />
										</div>
									<?php endif; ?>
									<a href="<?php the_permalink(); ?>" class="hl__hit-buy">
										<span><?php echo $collectionsProductLinkText; ?></span>
									</a>
								</div>
								<div class="hl__hit-info">
									<div class="hl__hit-name">
										<?php the_title('<span>', '</span>'); ?>
									</div>
									<div class="hl__hit-price">
										<span><?php echo $product->get_price_html(); ?></span>
									</div>
								</div>
							</div>
						</div>
						<?php $collectionsCounter++; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="swiper-scrollbar__main-big"></div>
	</div>
</div>
