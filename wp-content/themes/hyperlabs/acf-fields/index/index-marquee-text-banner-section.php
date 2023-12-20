<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$marquee_text_banner = new FieldsBuilder('marquee_text_banner');

$marquee_text_banner
	->addImage('marquee_text_banner_background_image', [
		'label' => 'Background image',
		'instructions' => 'Upload the background image for the marquee',
		'preview_size' => 'thumbnail',
		'library' => 'all',
		'mime_types' => 'jpg, jpeg, png, svg',
	])
	->addImage('marquee_text_banner_overlay_image', [
		'label' => 'Overlay image',
		'instructions' => 'Upload the overlay image for the marquee',
		'preview_size' => 'thumbnail',
		'library' => 'all',
		'mime_types' => 'jpg, jpeg, png, svg',
	])
	->addImage('marquee_text_banner_image', [
		'label' => 'Banner image',
		'instructions' => 'Upload the banner image for the marquee banner section',
		'preview_size' => 'thumbnail',
		'library' => 'all',
		'mime_types' => 'jpg, jpeg, png, svg',
	])
	->addTextarea('marquee_backstage_text', [
		'label' => 'Backstage text',
		'instructions' => 'Enter the backstage text for the marquee',
		'placeholder' => 'Enter your scrolling backstage text here',
		'maxlength' => '',
	])
	->addTextarea('marquee_frontstage_text', [
		'label' => 'Frontstage text',
		'instructions' => 'Enter the frontstage text for the marquee',
		'placeholder' => 'Enter your scrolling frontstage text here',
		'maxlength' => '',
	])
	->addLink('marquee_text_banner_link', [
		'label' => 'Banner link',
		'instructions' => 'Enter the link for the banner',
	]);


return $marquee_text_banner->getFields();