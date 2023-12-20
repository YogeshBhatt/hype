<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$index_promo_banner = new FieldsBuilder('index_promo_banner_section');

$index_promo_banner
	->addImage('index_promo_banner_image_1', [
		'label' => 'Promo Image 1',
		'instructions' => 'Add promo image 1',
		'return_format' => 'array',
		'preview_size' => 'medium',
		'library' => 'all',
	])
	->addImage('index_promo_banner_image_2', [
		'label' => 'Promo Image 2',
		'instructions' => 'Add promo image 2',
		'return_format' => 'array',
		'preview_size' => 'medium',
		'library' => 'all',
	])
	->addText('index_promo_banner_subtitle', [
		'label' => 'Subtitle',
		'instructions' => 'Add subtitle for section',
	])
	->addText('index_promo_banner_title', [
		'label' => 'Title',
		'instructions' => 'Add title for section',
	])
	->addTextarea('index_promo_banner_text', [
		'label' => 'Text',
		'instructions' => 'Add text for section',
	]);


return $index_promo_banner->getFields();