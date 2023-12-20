<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$index_intro = new FieldsBuilder('index_intro_section');

$index_intro
    ->addText('intro_banner_text_1', [
        'label' => 'Text 1',
        'instructions' => 'Add text 1 for section',
    ])
		->addText('intro_banner_text_2_a', [
			'label' => 'Text 2',
			'instructions' => 'Add text 2a for section',
		])
		->addText('intro_banner_text_2_b', [
			'label' => 'Text 3',
			'instructions' => 'Add text 2b for section',
		])
		->addText('intro_banner_text_3', [
				'label' => 'Text 3',
				'instructions' => 'Add text 3 for section',
			])
    ->addImage('intro_banner_background_image', [
        'label' => 'Background Image',
        'instructions' => 'Add background image for section',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
    ])
		->addImage('intro_banner_background_mobile_image', [
			'label' => 'Mobile Background Image',
			'instructions' => 'Add background image for section',
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
		])
		->addLink('intro_banner_button_link', [
			'label' => 'Link',
			'instructions' => 'Add link for button',
			'return_format' => 'array',
		])
		->addRepeater('featured_products', [
			'label' => 'Featured Products',
			'instructions' => 'Add up to 2 featured products',
			'min' => 0,
			'max' => 2,
		])
			->addPostObject('product', [
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

	return $index_intro->getFields();