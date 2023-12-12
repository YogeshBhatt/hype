<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$collections_faq_list_section = new FieldsBuilder('collections_faq_list_section');

$collections_faq_list_section
	->addText('collections_faq_list_section_title', [
		'label' => 'Title',
		'instructions' => 'Add title for section',
	])
	->addRepeater('collections_faq_list_section_repeater', [
		'label' => 'FAQ list',
		'layout' => 'block',
	])
		->addText('collections_faq_list_section_repeater_question', [
			'label' => 'Question',
			'instructions' => 'Add question',
		])
		->addTextarea('collections_faq_list_section_repeater_answer', [
			'label' => 'Answer',
			'instructions' => 'Add answer',
		])
	->endRepeater();

return $collections_faq_list_section->getFields();