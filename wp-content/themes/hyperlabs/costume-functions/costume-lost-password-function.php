<?php
/**
 * lost password form
 */
function render_password_lost_form($attributes, $content = null) {
	// Parse shortcode attributes
	$default_attributes = array('show_title' => false);



	if (is_user_logged_in()) {
	} else {
		?>
		<form class="hl__auth-content col d-flex flex-column justify-content-between"
		      action=""
		      method="post"
		      id="custom-lost-password-form">
			<input type="hidden" name="action" value="lostpassword">
			<div class="hl__auth-wrap">
				<h2><?php _e('Forgot Your Password?', 'personalize-login'); ?></h2>
				<p>
					<?php _e("Lost your password? Please enter your email address. You will receive a link to create a new password via email.", 'personalize-login'); ?>
				</p>
				<div class="hl__auth-item hl__auth-item--big-margin">
					<div class="hl__auth-item-container">
						<?php wp_nonce_field('custom_lostpassword_nonce', 'custom_lostpassword_nonce_field'); ?>
						<input type="email" id="inputForgetPasswordEmail" class="hl__auth-item-input" name="user_login" placeholder=" " />
						<label for="inputForgetPasswordEmail" class="hl__auth-item-label">Email <span>*</span></label>
					</div>
					<div class="hl__auth-item-error">
						<img src="<?php echo get_template_directory_uri(); ?>/images/svg/error.svg" alt="error icon" />
						<span>Обов'язкове поле для заповнення</span>
					</div>
				</div>
				<div class="hl__auth-item hl__auth-item--big-margin">
					<button type="submit" class="hl__button hl__button--green hl__button--full" id="forgetPasswordSubmitButton">Отримати новий пароль</button>
				</div>
			</div>
		</form>
		<?php
	}
}

add_shortcode('custom-password-lost-form', 'render_password_lost_form');

function custom_handle_password_lost() {
	if ('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['action']) && $_POST['action'] == 'lostpassword') {
		$errors = retrieve_password();

		if (!is_wp_error($errors)) {
			wp_redirect(home_url('?password-recovery=success'));
			exit;
		} else {
			wp_redirect(home_url('?send-form=error'));
			exit;
		}
	}
}
add_action('init', 'custom_handle_password_lost');