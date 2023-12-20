<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$index_intro = new FieldsBuilder('index_intro_section');

$index_intro
    ->addText('intro_banner_title', [
        'label' => 'Title',
        'instructions' => 'Add title for section',
    ])
    ->addImage('intro_banner_background_image', [
        'label' => 'Bacground Image',
        'instructions' => 'Add background image for section',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
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
		->endRepeater()
    ->setLocation('page_template', '==', 'landing.php');

add_action('acf/init', function() use ($index_intro) {
    acf_add_local_field_group($index_intro->build());
});
