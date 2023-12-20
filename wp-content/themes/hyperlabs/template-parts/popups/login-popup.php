<?php
$loginFormTitle = get_field('login_form_title', 'option');
$loginFormDescription = get_field('login_form_description', 'option');
$loginFormRecoveryLinkText = get_field('login_recovery_link_text', 'option');
$loginFormCheckboxText = get_field('login_checkbox_text', 'option');
$loginFormButtonTitle = get_field('login_button_title', 'option');
$loginFormInformation = get_field('login_information', 'option');
$loginFormRegButtonTitle = get_field('reg_button_title', 'option');
?>


<div class="hl__auth d-flex flex-column" id="auth">
	<div class="hl__auth-top col-auto d-flex justify-content-end">
		<div class="hl__auth-close" id="authClose">
			<img src="<?php echo get_template_directory_uri(); ?>/images/svg/close.svg" alt="close auth" />
		</div>
	</div>

	<form
		class="hl__auth-content col d-flex flex-column justify-content-between"
		id="customLoginForm"
		method="post"
		action="<?php echo site_url('/wp-login.php'); ?>">
		<div class="hl__auth-wrap">
			<?php if ( $loginFormTitle ) : ?>
				<h2><?php echo $loginFormTitle; ?></h2>
			<?php endif; ?>
			<?php if ( $loginFormDescription ) : ?>
				<p><?php echo $loginFormDescription; ?></p>
			<?php endif; ?>
			<div class="hl__auth-item hl__auth-item--big-margin">
				<div class="hl__auth-item-container">
					<input
						type="email"
						id="inputAuthEmail"
						class="hl__auth-item-input"
						placeholder=""
						name="log"
					/>
					<label for="inputAuthEmail" class="hl__auth-item-label">Email <span>*</span></label>
				</div>
				<div class="hl__auth-item-error" id="emailError">
					<img src="<?php echo get_template_directory_uri(); ?>/images/svg/error.svg" alt="error icon" />
					<span>Обов'язкове поле для заповнення</span>
				</div>
			</div>
			<div class="hl__auth-item">
				<div class="hl__auth-item-container">
					<input
						type="password"
						id="inputAuthPassword"
						class="hl__auth-item-input"
						placeholder=""
						name="pwd"
					/>
					<label for="inputAuthPassword" class="hl__auth-item-label"
					>Пароль<span>*</span></label
					>
				</div>
				<div class="hl__auth-item-error" id="passwordError">
					<img src="<?php echo get_template_directory_uri(); ?>/images/svg/error.svg" alt="error icon" />
					<span>Обов'язкове поле для заповнення</span>
				</div>
			</div>
			<div class="hl__auth-item">
				<div id="goToForgetPassword"><?php echo $loginFormRecoveryLinkText; ?></div>
			</div>
			<div class="hl__auth-item">
				<input
					type="checkbox"
					id="rememberme"
					class="hl__auth-item-checkbox"
					name="rememberme"
					value="forever"
				/>
				<label
					for="rememberme"
					class="hl__auth-item-checkbox-label">
					<img src="<?php echo get_template_directory_uri(); ?>/images/svg/check.svg" alt="check mark for checkbox" />
					<span><?php echo $loginFormCheckboxText; ?></span>
				</label>
			</div>
			<div class="hl__auth-item hl__auth-item--big-margin">
				<input type="hidden" name="redirect_to" value="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>">
				<button
					type="submit"
					class="hl__button hl__button--green hl__button--full"
					id="authSubmitButton"
				><?php echo $loginFormButtonTitle; ?></button>
			</div>
			<?php if ( $loginFormInformation ) : ?>
				<div class="hl__auth-item hl__auth-item--big-margin">
					<?php echo $loginFormInformation; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="hl__auth-button">
			<button
				type="button"
				class="hl__button hl__button--transparent hl__button--full"
				id="goToRegistration"><?php echo $loginFormRegButtonTitle; ?></button>
		</div>
	</form>
</div>