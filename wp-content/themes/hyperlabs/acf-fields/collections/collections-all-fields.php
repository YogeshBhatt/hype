<?php
// all fields for index page

use StoutLogic\AcfBuilder\FieldsBuilder;

$collections_page_settings = new FieldsBuilder('collections_page_settings');


$collections_intro_fields = include('collections-intro-fields.php');
$collections_product_slider_fields = include('collections-product-slider.php');
$collections_categories_list_fields = include('collections-categories-list-section.php');
$collections_banner_fields = include('collections-banner-fields.php');
$collections_faq_list_fields = include('collections-faq-list-fields.php');


$collections_page_settings
	->addTab('Intro - section 1')
		->addFields($collections_intro_fields)
	->addTab('Product slider - section 2')
		->addFields($collections_product_slider_fields)
	->addTab('Categories list - section 3')
		->addFields($collections_categories_list_fields)
	->addTab('Banner - section 4')
		->addFields($collections_banner_fields)
	->addTab('FAQ list - section 5')
		->addFields($collections_faq_list_fields)
	->setLocation('page_template', '==', 'templates/collections.php');

add_action('acf/init', function() use ($collections_page_settings) {
	acf_add_local_field_group($collections_page_settings->build());
});