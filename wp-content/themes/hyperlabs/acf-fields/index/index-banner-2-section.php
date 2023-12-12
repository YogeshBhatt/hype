<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$index_banner_2_section = new FieldsBuilder('index_banner_2_section');

$index_banner_2_section
	->addImage('inddex_banner_2_background_image', [
		'label' => 'Background image',
		'instructions' => 'Upload the background image for the banner',
		'preview_size' => 'thumbnail',
		'library' => 'all',
		'mime_types' => 'jpg, jpeg, png, svg',
	])
	->addText('index_banner_2_subtitle', [
		'label' => 'Subtitle',
		'instructions' => 'Enter the subtitle for the banner',
		'placeholder' => 'Enter the subtitle for the banner',
		'maxlength' => '',
	])
	->addText('index_banner_2_title', [
		'label' => 'Title',
		'instructions' => 'Enter the title for the banner',
		'placeholder' => 'Enter the title for the banner',
		'maxlength' => '',
	])
	->addLink('index_banner_2_button', [
		'label' => 'Button',
		'instructions' => 'Enter the button for the banner',
	]);

return $index_banner_2_section->getFields();