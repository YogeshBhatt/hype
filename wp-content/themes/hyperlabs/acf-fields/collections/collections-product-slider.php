<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$collections_product_slider = new FieldsBuilder('collections_product_slider');

$collections_product_slider
	->addText('collections_product_slider_section_title', [
		'label' => 'Section Title',
		'instructions' => 'Enter the title for the section',
		'placeholder' => 'Add the title here',
	])
	->addText('collections_product_link_text', [
		'label' => 'Product Link Text',
		'instructions' => 'Enter the text for the product link',
		'placeholder' => 'Add the text here',
	])
	->addText('collections_product_slider_tag', [
		'label' => 'Product Tag',
		'instructions' => 'Enter the product tag for the slider',
		'placeholder' => 'Add the product tag here',
	])
	->addSelect('quantity_of_collections_products', [
		'label' => 'Quantity of Products',
		'instructions' => 'Select the quantity of products to display',
		'choices' => [
			'6' => '6',
			'8' => '8',
			'10' => '10',
			'12' => '12',
			'14' => '14',
			'16' => '16',
		],
		'default_value' => '6',
	]);

return $collections_product_slider->getFields();