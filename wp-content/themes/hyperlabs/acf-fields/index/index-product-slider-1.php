<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$index_product_slider_1 = new FieldsBuilder('index_product_slider_1');

$index_product_slider_1
	->addText('index_product_slider_section_title', [
		'label' => 'Section Title',
		'instructions' => 'Enter the title for the section',
		'placeholder' => 'Add the title here',
	])
	->addText('product_link_text', [
		'label' => 'Product Link Text',
		'instructions' => 'Enter the text for the product link',
		'placeholder' => 'Add the text here',
	])
	->addTaxonomy('index_product_slider_tag', [
		'label' => 'Product Tag',
		'taxonomy' => 'product_tag',
		'field_type' => 'select', // Set the field type to 'select'
		'return_format' => 'id',
		'multiple' => 0, // Disable multiple selections
	])
	->addSelect('quantity_of_products', [
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

return $index_product_slider_1->getFields();