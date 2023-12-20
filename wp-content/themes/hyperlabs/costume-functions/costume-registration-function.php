<?php
/**
 * registration form
 */
function red_add_new_user() {
	if (isset($_POST["email"]) && wp_verify_nonce($_POST['red_csrf'], 'red-csrf')) {
		$user_login     = sanitize_user($_POST["email"]); // Используйте email в качестве логина
		$user_email     = sanitize_email($_POST["email"]);
		$user_first     = sanitize_text_field($_POST["first_name"]);
		$user_last      = sanitize_text_field($_POST["last_name"]);
		$user_pass      = $_POST["password"];
		$pass_confirm   = $_POST["password_confirm"];
		$country        = $_POST["country"];
		$gender         = $_POST["gender"];
		$mailing_list   = isset($_POST["mailing_list"]) ? 'yes' : 'no';

		if (username_exists($user_login)) {
			red_errors()->add('username_unavailable', __('Username already taken'));
		}
		if (!is_email($user_email)) {
			red_errors()->add('email_invalid', __('Invalid email'));
		}
		if (email_exists($user_email)) {
			red_errors()->add('email_used', __('Email already registered'));
		}
		if (empty($user_pass)) {
			red_errors()->add('password_empty', __('Please enter a password'));
		}
		if ($user_pass != $pass_confirm) {
			red_errors()->add('password_mismatch', __('Passwords do not match'));
		}

		$errors = red_errors()->get_error_messages();
		if (empty($errors)) {
			$new_user_id = wp_insert_user(array(
				'user_login'    => $user_login,
				'user_pass'     => $user_pass,
				'user_email'    => $user_email,
				'first_name'    => $user_first,
				'last_name'     => $user_last,
				'user_registered' => date('Y-m-d H:i:s'),
				'role'          => 'customer'
			));

			if (!is_wp_error($new_user_id)) {

				wp_set_current_user($new_user_id);
				wp_set_auth_cookie($new_user_id);

				do_action('wp_login', $user_login, get_userdata($new_user_id));

//				update_user_meta($new_user_id, 'billing_country', sanitize_text_field($country));
//				update_user_meta($new_user_id, 'shipping_country', sanitize_text_field($country));

				wp_redirect(home_url('?registered=true'));
				exit;
			} else {
				wp_redirect(home_url('?send-form=error'));
				error_log($new_user_id->get_error_message());
			}
		}
	}
}
add_action('init', 'red_add_new_user');

function red_errors(){
	static $wp_error;
	return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}