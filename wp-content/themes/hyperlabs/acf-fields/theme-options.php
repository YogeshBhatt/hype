<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$theme_settings = new FieldsBuilder('theme_settings');

$theme_settings
	->addTab('Header options', ['placement' => 'left'])
		->addImage('site_header_logo', [
			'label' => 'Logo for header',
			'preview_size' => 'medium',
			'instructions' => 'Upload your site logo here',
			'mime_types' => 'png, jpg, jpeg, svg',
			'return_format' => 'array',
		])
	->addTab('Footer options', ['placement' => 'left'])
		->addImage('site_footer_logo', [
			'label' => 'Logo for footer',
			'preview_size' => 'medium',
			'instructions' => 'Upload your site logo here',
			'mime_types' => 'png, jpg, jpeg, svg',
			'return_format' => 'array',
		])
		->addTextarea('site_footer_text', [
			'label' => 'Footer text',
			'placeholder' => 'Enter footer text here',
			'instructions' => 'Enter footer text here',
			'new_lines' => 'br',
		])
	->addTextarea('site_footer_copyright', [
		'label' => 'Footer copyright text',
		'placeholder' => 'Enter footer text here',
		'instructions' => 'Enter footer text here',
		'new_lines' => 'br',
	])
	->addTab('Footer contacts', ['placement' => 'left'])
		->addText('footer_contacts_title', [
			'label' => 'Title for footer contacts',
			'placeholder' => 'Enter title for footer contacts here',
			'instructions' => 'Enter title for footer contacts here',
		])
	->addRepeater('footer_contacts', [
		'label' => 'Footer contacts',
		'button_label' => 'Add new contact',
		'layout' => 'block',
	])
		->addSelect('content_type', [
			'label' => 'Content Type',
			'instructions' => 'Select the type of content.',
			'choices' => [
				'text' => 'Text',
				'link' => 'Link',
			],
			'allow_null' => 0,
			'multiple' => 0,
		])
		->addTextarea('footer_text', [
			'label' => 'Footer Text',
			'instructions' => 'Add your footer text here.',
			'new_lines' => 'br',
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '==',
						'value' => 'text',
					],
				],
			],
		])
	->addLink('footer_contact_link', [
		'label' => 'Link for contact',
		'placeholder' => 'Enter link for contact here',
		'instructions' => 'Enter link for contact here',
		'conditional_logic' => [
			[
				[
					'field' => 'content_type',
					'operator' => '==',
					'value' => 'link',
				],
			],
		],
	])
		->addRepeater('footer_contact_social', [
			'label' => 'Add social link',
			'button_label' => 'Add nw social link',
			'layout' => 'block',
			'conditional_logic' => [
				[
					[
						'field' => 'content_type',
						'operator' => '==',
						'value' => 'link',
					],
				],
			],
		])
			->addText('footer_contact_social_link', [
				'label' => 'Title for social link',
				'placeholder' => 'Enter title for social link here',
				'instructions' => 'Enter title for social link here',
			])
			->addImage('footer_contact_social_icon', [
				'label' => 'Icon for social link',
				'preview_size' => 'medium',
				'instructions' => 'Upload your icon for social link here',
				'mime_types' => 'png, jpg, jpeg, svg',
				'return_format' => 'array',
			])
		->endRepeater()
	->endRepeater()
	->addTab('Footer social list', ['placement' => 'left'])
		->addRepeater('footer_social_list', [
			'label' => 'Add social link',
			'button_label' => 'Add nw social link',
			'layout' => 'block',
		])
			->addText('footer_social_list_link', [
				'label' => 'Title for social link',
				'placeholder' => 'Enter title for social link here',
				'instructions' => 'Enter title for social link here',
			])
			->addImage('footer_social_list_icon', [
				'label' => 'Icon for social link',
				'preview_size' => 'medium',
				'instructions' => 'Upload your icon for social link here',
				'mime_types' => 'png, jpg, jpeg, svg',
				'return_format' => 'array',
			])
	->endRepeater()
	->setLocation('options_page', '==', 'theme-settings');

add_action('acf/init', function() use ($theme_settings) {
	acf_add_local_field_group($theme_settings->build());

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => 'Theme settings',
			'menu_title' => 'Theme settings',
			'menu_slug'  => 'theme-settings',
			'capability' => 'edit_posts',
			'redirect'   => false
		]);
	}
});
