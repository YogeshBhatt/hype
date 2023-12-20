<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$collections_banner_section = new FieldsBuilder('collections_banner_section');

$collections_banner_section
	->addImage('collections_banner_image', [
		'label' => 'Banner Image',
		'instructions' => 'Add image',
		'return_format' => 'array',
		'preview_size' => 'medium',
		'library' => 'all',
	])
	->addText('collections_banner_subtitle', [
		'label' => 'Subtitle',
		'instructions' => 'Add subtitle for section',
	])
	->addText('collections_banner_title', [
		'label' => 'Title',
		'instructions' => 'Add title for section',
	])
	->addLink('collections_banner_link', [
		'label' => 'Link',
		'instructions' => 'Add link for section',
	]);


return $collections_banner_section->getFields();