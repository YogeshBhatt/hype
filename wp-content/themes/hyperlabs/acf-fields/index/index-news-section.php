<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$index_news_section = new FieldsBuilder('index_news_section');

$index_news_section
	->addText('index_news_section-title', [
		'label' => 'Section Title',
		'instructions' => 'Enter the title for the section',
		'placeholder' => 'Add the title here',
	])
	->addText('news_link_text', [
		'label' => 'News Link Text',
		'instructions' => 'Enter the text for the news link',
		'placeholder' => 'Add the text here',
	])
	->addText('index_news_section_tag', [
		'label' => 'News Tag',
		'instructions' => 'Enter the news tag for the slider',
		'placeholder' => 'Add the product tag here',
	])
	->addSelect('quantity_of_news', [
		'label' => 'Quantity of News',
		'instructions' => 'Select the quantity of news to display',
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

return $index_news_section->getFields();