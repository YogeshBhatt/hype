<?php
/**
 * Template part for Categories list section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

	$categoriesList = get_field('categories_repeater');
?>

<?php if ($categoriesList): ?>
<div class="hl__double-screen row gx-0">
	 <?php foreach ($categoriesList as $index => $item):

		 $category_id = $item['category'];

		 $position_x = $item['product_bubble_x_position'] ? $item['product_bubble_x_position'] : '70%';
		 $position_y = $item['product_bubble_y_position'] ? $item['product_bubble_y_position'] : '70%';
		 $position_x_mobile = $item['product_bubble_x_position_mobile'] ? $item['product_bubble_x_position_mobile'] : '50%';
		 $position_y_mobile = $item['product_bubble_y_position_mobile'] ? $item['product_bubble_y_position_mobile'] : '70%';


		 $category = get_term($category_id, 'product_cat');
		 $category_name = $category->name;
		 $category_link = get_term_link($category_id, 'product_cat');
		 $category_image_id = get_woocommerce_term_meta($category_id, 'thumbnail_id', true);
		 $category_image_url = wp_get_attachment_url($category_image_id);

		 // Данные продукта
		 $product_id = $item['category_product_preview'];
		 $product = wc_get_product($product_id);
		 if ($product && is_a($product, 'WC_Product')) {
			 $product_name = $product->get_name();
			 $product_price = $product->get_price_html();
			 $product_link = get_permalink($product_id);
			 $product_image_url = wp_get_attachment_url($product->get_image_id());
		 } else {
			 // Обработка ситуации, когда продукт не найден
			 $product_name = '';
			 $product_price = '';
			 $product_link = '';
			 $product_image_url = '';
		 }
		 ?>
		 <div
			 class="hl__double-screen-item col-md-6 col-12 d-flex align-items-center justify-content-center">

			 <?php if ($category_image_url): ?>
				 <div class="hl__double-screen-image">
					 <img src="<?= esc_url($category_image_url); ?>" alt="<?= esc_attr($category_name); ?>">
				 </div>
			 <?php endif; ?>
			 <style>
				 .hl__double-screen-item .hl__double-screen-badge-position-<?php echo $index + 1; ?> {
					 z-index: 10;
					 position: absolute;
				 }
				 @media (min-width: 768px) {
					 .hl__double-screen-item .hl__double-screen-badge-position-<?php echo $index + 1; ?> {
						 left: <?php echo $position_x; ?>;
						 top: <?php echo $position_y; ?>;
					 }
				 }
				 @media (max-width: 767px) {
					 .hl__double-screen-item .hl__double-screen-badge-position-<?php echo $index + 1; ?> {
						 left: <?php echo $position_x_mobile; ?>;
						 top: <?php echo $position_y_mobile; ?>;
					 }
				 }
			 </style>
			 <a href="<?= esc_url($product_link); ?>" class="hl__badge hl__double-screen-badge-position-<?php echo $index + 1; ?>">
				 <?php if ($product_image_url): ?>
					 <div class="hl__badge-image">
						 <img
							 src="<?= esc_url($product_image_url); ?>"
							 alt="<?= esc_attr($product_name); ?>"
							 width="86"
							 height="86" />
					 </div>
				 <?php endif; ?>
				 <div class="hl__badge-content">
					 <div class="hl__badge-name"><?= $product_name; ?></div>
					 <div class="hl__badge-price"><?= $product_price; ?></div>
         </div>
			 </a>
			 <div class="hl__double-screen-text">
				 <a href="<?= esc_url($category_link); ?>"><?= esc_html($category_name); ?></a>
			 </div>
		 </div>
	 <?php endforeach; ?>
</div>
<?php endif; ?>