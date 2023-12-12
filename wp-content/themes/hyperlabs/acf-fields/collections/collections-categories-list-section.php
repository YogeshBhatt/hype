<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$collections_categories_repeater = new FieldsBuilder('collections_categories_list_section');

$collections_categories_repeater
    ->addRepeater('collections_categories_repeater', [
        'label' => 'WooCommerce Categories',
        'button_label' => 'Add Category'
    ])
        ->addTaxonomy('category', [
            'label' => 'Select Category',
            'taxonomy' => 'product_cat',
            'field_type' => 'select',
            'add_term' => 0,
        ])
				->addPostObject('collections_category_product_preview', [
					'label' => 'Product',
					'instructions' => 'Select a product',
					'post_type' => [
						'product'
					],
					'return_format' => 'id',
					'multiple' => 0,
				])
				->addText('product_bubble_x_position', [
					'label' => 'Bubble X position for desktop screen',
					'instructions' => 'Add bubble X position as a percentage',
				])
				->addText('product_bubble_y_position', [
					'label' => 'Bubble Y position for desktop screen',
					'instructions' => 'Add bubble Y position as a percentage',
				])
				->addText('product_bubble_x_position_mobile', [
					'label' => 'Bubble X position for mobile screen',
					'instructions' => 'Add bubble X position as a percentage',
				])
				->addText('product_bubble_y_position_mobile', [
					'label' => 'Bubble Y position for mobile screen',
					'instructions' => 'Add bubble Y position as a percentage',
				])
    ->endRepeater();

return $collections_categories_repeater->getFields();