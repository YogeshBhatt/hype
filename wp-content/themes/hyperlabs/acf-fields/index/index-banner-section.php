<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$index_banner = new FieldsBuilder('index_banner_section');

$index_banner
	->addImage('index_banner_background_image', [
		'label' => 'Background Image',
		'instructions' => 'Add background image for section',
		'return_format' => 'array',
		'preview_size' => 'medium',
		'library' => 'all',
	])
	->addTextarea('index_banner_title', [
		'label' => 'Title',
		'instructions' => 'Add title for section',
	])
	->addTextarea('index_banner_text', [
		'label' => 'Text',
		'instructions' => 'Add text for section',
	])
	->addRepeater('banner_bubble_products', [
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
	->endRepeater();

return $index_banner->getFields();