<?php
	use StoutLogic\AcfBuilder\FieldsBuilder;

	$author_image = new FieldsBuilder('author_image');
	$author_image
		->setLocation('user_form', '==', 'edit');

	$author_image
		->addImage('author_custom_image', [
			'label' => 'Author Image',
			'instructions' => 'Upload an author image',
			'preview_size' => 'thumbnail',
			'mime_types' => 'png, jpg, jpeg, svg',
			'return_format' => 'url'
		]);

	add_action('acf/init', function() use ($author_image) {
		acf_add_local_field_group($author_image->build());
	});