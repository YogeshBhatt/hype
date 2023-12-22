<?php
/**
 * Template part for Product slider 2 section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$sectionTitle = get_field('index_product_slider_2_section_title');

$productLinkText = get_field('product_link_text_2') ? get_field('product_link_text_2') : 'Переглянути';

$productsTag = get_field('index_product_slider_2_tag');
$productTagObject = get_term_by('id', $productsTag, 'product_tag');
$productTagSlug = $productTagObject->slug;

$productsQuantity = get_field('quantity_of_products_2');
$limit = $productsQuantity;

$args = array(
	'post_type'      => 'product',
	'posts_per_page' => -1,
	'product_tag'    => $productTagSlug
);

$query = new WP_Query($args);
$counter = 0;

?>

<div class="hl__slider-big">
	<div class="container">
		<?php if ($sectionTitle) : ?>
			<div class="hl__slider-big-header">
				<h2><?php echo $sectionTitle; ?></h2>
			</div>
		<?php endif; ?>
		<?php if ($query->have_posts()) : ?>
		<div class="swiper swiper__main-big">
			<div class="swiper-wrapper">
				<?php while ($query->have_posts() && $counter < $limit) : $query->the_post(); ?>
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
									<span><?php echo $productLinkText; ?></span>
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
					<?php $counter++; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="swiper-scrollbar__main-big"></div>
	</div>
</div>
