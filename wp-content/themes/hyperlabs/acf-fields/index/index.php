<?php
// all fields for index page

use StoutLogic\AcfBuilder\FieldsBuilder;

$index_page_settings = new FieldsBuilder('index_page_settings');


$index_intro_fields = include('index-intro-section.php');
$marquee_text_fields = include('index-marquee-text-section.php');
$categories_list_fields = include('index-categories-list-section.php');
$product_slider_1_fields = include('index-product-slider-1.php');
$index_banner_fields = include('index-banner-section.php');
$index_promo_banner_fields = include('index-promo-banner-section.php');
$product_slider_2_fields = include('index-product-slider-2.php');
$marquee_text_banner_fields = include('index-marquee-text-banner-section.php');
$news_section_fields = include('index-news-section.php');
$index_banner_2_fields = include('index-banner-2-section.php');


$index_page_settings
	->addTab('Intro - section 1')
		->addFields($index_intro_fields)
	->addTab('Marquee text - section 2')
		->addFields($marquee_text_fields)
	->addTab('Categories list - section 3')
		->addFields($categories_list_fields)
	->addTab('Product slider 1 - section 4')
		->addFields($product_slider_1_fields)
	->addTab('Banner - section 5')
		->addFields($index_banner_fields)
	->addTab('Promo banner - section 6')
		->addFields($index_promo_banner_fields)
	->addTab('Product slider 2 - section 7')
		->addFields($product_slider_2_fields)
	->addTab('Marquee text banner - section 8')
		->addFields($marquee_text_banner_fields)
	->addTab('News - section 9')
		->addFields($news_section_fields)
	->addTab('Banner 2 - section 10')
		->addFields($index_banner_2_fields)
	->setLocation('page_type', '==', 'front_page');

add_action('acf/init', function() use ($index_page_settings) {
	acf_add_local_field_group($index_page_settings->build());
});