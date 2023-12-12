<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$marquee_text = new FieldsBuilder('marquee_text_section');

$marquee_text
		->addRepeater('marquee_text_repeater')
	    ->addText('marquee_text_item', [
	        'label' => 'Marquee Text',
	        'instructions' => 'Enter the text for the marquee',
	        'placeholder' => 'Enter your scrolling text here',
	        'maxlength' => '', // Maximum number of characters, if necessary
	    ])
		->endRepeater();

return $marquee_text->getFields();