<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$collections_intro = new FieldsBuilder('collections_intro_section');

$collections_intro
	->addTextarea('collections_intro_text_1', [
		'label' => 'Text 1',
		'instructions' => 'Add text 1 for section',
		'new_lines' => 'br',
	])
	->addText('collections_intro_text_2', [
		'label' => 'Text 2',
		'instructions' => 'Add text 2 for section',
	])
	->addFile('collections_intro_image', [
		'label' => 'Image or video',
		'instructions' => 'Add image or video for section background',
		'return_format' => 'array',
		'preview_size' => 'thumbnail',
		'library' => 'all',
		'mime_types' => 'mp4, ogg, jpg, jpeg, png, gif, webm',
	])
	->addRepeater('collections_intro_featured_products', [
		'label' => 'Featured Products',
		'instructions' => 'Add up to 2 featured products',
		'min' => 0,
		'max' => 2,
	])
	->addPostObject('collections_intro_product', [
		'label' => 'Product',
		'instructions' => 'Select a product',
		'post_type' => [
			'product'
		],
		'return_format' => 'id',
		'multiple' => 0,
	])
	->addText('collections_intro_product_bubble_x_position', [
		'label' => 'Bubble X position for desktop screen',
		'instructions' => 'Add bubble X position as a percentage',
	])
	->addText('collections_intro_product_bubble_y_position', [
		'label' => 'Bubble Y position for desktop screen',
		'instructions' => 'Add bubble Y position as a percentage',
	])
	->addText('collections_intro_product_bubble_x_position_mobile', [
		'label' => 'Bubble X position for mobile screen',
		'instructions' => 'Add bubble X position as a percentage',
	])
	->addText('collections_intro_product_bubble_y_position_mobile', [
		'label' => 'Bubble Y position for mobile screen',
		'instructions' => 'Add bubble Y position as a percentage',
	])
	->endRepeater();


return $collections_intro->getFields();