<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$woocommerce_categories_repeater = new FieldsBuilder('categories_list_section');

$woocommerce_categories_repeater
    ->addRepeater('categories_repeater', [
        'label' => 'WooCommerce Categories',
        'button_label' => 'Add Category'
    ])
        ->addTaxonomy('category', [
            'label' => 'Select Category',
            'taxonomy' => 'product_cat',
            'field_type' => 'select',
            'add_term' => 0,
        ])
    ->endRepeater()
    ->setLocation('page_template', '==', 'landing.php');

add_action('acf/init', function() use ($woocommerce_categories_repeater) {
    acf_add_local_field_group($woocommerce_categories_repeater->build());
});
