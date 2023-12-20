<?php
/**
 * Disable Gravatar note in WP Profile settings and add custom image with ACF
 */
function replace_gravatar_with_acf_image($args, $id_or_email) {
	$user_id = is_numeric($id_or_email) ? $id_or_email : false;
	$user = false;

	if ($id_or_email instanceof WP_User) {
		$user_id = $id_or_email->ID;
	} elseif ($id_or_email instanceof WP_Post) {
		$user_id = $id_or_email->post_author;
	} elseif ($id_or_email instanceof WP_Comment) {
		if (!empty($id_or_email->user_id)) {
			$user_id = $id_or_email->user_id;
		}
	} elseif (is_email($id_or_email)) {
		$user = get_user_by('email', $id_or_email);
		if ($user) {
			$user_id = $user->ID;
		}
	}
	if ($user_id) {
		$custom_image = get_field('author_custom_image', 'user_' . $user_id);
		if ($custom_image) {
			$args['url'] = $custom_image;
			$args['url_2x'] = $custom_image;
			// Убрать ссылку на Gravatar
			add_filter('user_profile_picture_description', '__return_empty_string');
		}
	}

	return $args;
}
add_filter('pre_get_avatar_data', 'replace_gravatar_with_acf_image', 10, 2);