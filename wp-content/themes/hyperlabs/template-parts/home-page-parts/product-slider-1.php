<?php
/**
 * Template part for Product slider section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

	$sectionTitle = get_field('index_product_slider_section_title');

	$productLinkText = get_field('product_link_text') ? get_field('product_link_text') : 'Переглянути';

	$productsTag = get_field('index_product_slider_tag');
	$productTagObject = get_term_by('id', $productsTag, 'product_tag');
	$productTagSlug = $productTagObject->slug;

	$productsQuantity = get_field('quantity_of_products');
	$limit = $productsQuantity;

	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => -1,
		'product_tag'    => $productTagSlug
	);

	$query = new WP_Query($args);
	$counter = 0;
?>

<div class="hl__slider-small">
	<div class="container">

		<div
			class="hl__slider-small-header row align-items-center justify-content-between">
			<?php if ($sectionTitle) : ?>
				<div class="col-auto">
					<h2><?php echo $sectionTitle; ?></h2>
				</div>
			<?php endif; ?>
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
		<?php if ($query->have_posts()) : ?>
		<div class="swiper swiper__main-small">
			<div class="swiper-wrapper">
					<?php while ($query->have_posts() && $counter < $limit) : $query->the_post(); ?>
						<?php global $product; ?>

						<div class="swiper-slide">
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
										<span><?php echo $productLinkText; ?></span>
									</a>
								</div>
							</div>
						</div>
						<?php $counter++; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="swiper-scrollbar__main-small"></div>
	</div>
</div>
