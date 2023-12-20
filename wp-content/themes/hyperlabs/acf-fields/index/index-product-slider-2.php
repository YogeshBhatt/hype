<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$index_product_slider_2 = new FieldsBuilder('index_product_slider_2');

$index_product_slider_2
	->addText('index_product_slider_2_section_title', [
		'label' => 'Section Title',
		'instructions' => 'Enter the title for the section',
		'placeholder' => 'Add the title here',
	])
	->addText('product_link_text_2', [
		'label' => 'Product Link Text',
		'instructions' => 'Enter the text for the product link',
		'placeholder' => 'Add the text here',
	])
	->addTaxonomy('index_product_slider_2_tag', [
		'label' => 'Product Tag',
		'taxonomy' => 'product_tag',
		'field_type' => 'select', // Set the field type to 'select'
		'return_format' => 'id',
		'multiple' => 0, // Disable multiple selections
	])
	->addSelect('quantity_of_products_2', [
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

return $index_product_slider_2->getFields();