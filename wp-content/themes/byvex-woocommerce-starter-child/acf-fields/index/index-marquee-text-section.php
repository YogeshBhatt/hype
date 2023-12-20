<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$marquee_text = new FieldsBuilder('marquee_text_section');

$marquee_text
    ->addText('marquee_text_field', [
        'label' => 'Marquee Text',
        'instructions' => 'Enter the text for the marquee',
        'placeholder' => 'Enter your scrolling text here',
        'maxlength' => '', // Maximum number of characters, if necessary
    ])
    ->setLocation('page_template', '==', 'landing.php');

add_action('acf/init', function() use ($marquee_text) {
    acf_add_local_field_group($marquee_text->build());
});
