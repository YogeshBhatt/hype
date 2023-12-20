<?php
$regFormTitle = get_field('reg_form_title', 'option');
$regFormDescription = get_field('reg_form_description', 'option');
$regFormCheckboxText = get_field('reg_checkbox_text', 'option');
$regFormInformation = get_field('reg_information', 'option');
$regFormButtonTitle = get_field('reg_button_title', 'option');
$regFormLoginButtonTitle = get_field('login_button_title', 'option');
?>

<div class="hl__auth d-flex flex-column" id="registration">
	<div class="hl__auth-top col-auto d-flex justify-content-end">
		<div class="hl__auth-close" id="registrationClose">
			<img src="<?php echo get_template_directory_uri(); ?>/images/svg/close.svg" alt="close registration" />
		</div>
	</div>
	<form
		class="hl__auth-content col d-flex flex-column justify-content-between"
		action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>"
		method="post"
		id="customRegistrationForm">
		<div class="hl__auth-wrap">
			<?php if ( $regFormTitle ) : ?>
				<h2><?php echo $regFormTitle; ?></h2>
			<?php endif; ?>
			<?php if ( $regFormDescription ) : ?>
				<p><?php echo $regFormDescription; ?></p>
			<?php endif; ?>
			<!-- TODO: authorization via social networks -->
			<div class="hl__auth-item hl__auth-item--big-margin">
				<div class="hl__auth-social d-grid">
					<a
						href="#"
						class="hl__auth-social-item d-flex align-items-center justify-content-center">
						<img src="<?php echo get_template_directory_uri(); ?>/images/svg/reg-soc-ico1.svg" alt="google icon" />
						<span>Google</span>
					</a>
					<a
						href="#"
						class="hl__auth-social-item d-flex align-items-center justify-content-center">
						<img src="<?php echo get_template_directory_uri(); ?>/images/svg/reg-soc-ico2.svg" alt="apple icon" />
						<span>Apple ID</span>
					</a>
					<a
						href="#"
						class="hl__auth-social-item d-flex align-items-center justify-content-center">
						<img src="<?php echo get_template_directory_uri(); ?>/images/svg/reg-soc-ico3.svg" alt="facebook icon" />
						<span>Facebook</span>
					</a>
				</div>
			</div>
			<div class="hl__auth-item">
				<div class="hl__auth-item-container">
					<input
						type="text"
						id="inputRegName"
						name="first_name"
						class="hl__auth-item-input"
						placeholder=" " />
					<label for="inputRegName" class="hl__auth-item-label">Ім'я</label>
				</div>
				<div class="hl__auth-item-error" id="emailError">
					<img src="<?php echo get_template_directory_uri(); ?>/images/svg/error.svg" alt="error icon" />
					<span>Обов'язкове поле для заповнення</span>
				</div>
			</div>
			<div class="hl__auth-item">
				<div class="hl__auth-item-container">
					<input
						type="text"
						id="inputRegSurname"
						name="last_name"
						class="hl__auth-item-input"
						placeholder=" " />
					<label for="inputRegSurname" class="hl__auth-item-label"
					>Прізвище</label
					>
				</div>
				<div class="hl__auth-item-error" id="passwordError">
					<img src="<?php echo get_template_directory_uri(); ?>/images/svg/error.svg" alt="error icon" />
					<span>Обов'язкове поле для заповнення</span>
				</div>
			</div>
			<div class="hl__auth-item">
				<select name="gender" id="selectRegGender" name="gender" class="wide">
					<option value="male" selected>Чоловіча</option>
					<option value="female">Жіноча</option>
				</select>
				<label class="hl__auth-item-label hl__auth-item-label--static"
				>Стать</label
				>
			</div>
			<div class="hl__auth-item">
				<select name="gender" id="selectRegCountry" name="country" class="wide">
					<option value="UA" selected>Україна</option>
					<option value="US">США</option>
					<option value="AU">Австралія</option>
				</select>
				<label class="hl__auth-item-label hl__auth-item-label--static"
				>Країна/регіон</label
				>
			</div>
			<div class="hl__auth-item">
				<div class="hl__auth-item-container">
					<input
						type="email"
						id="inputRegEmail"
						name="email"
						class="hl__auth-item-input"
						placeholder=" " />
					<label for="inputRegEmail" class="hl__auth-item-label"
					>Email <span>*</span></label
					>
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
						id="inputRegPassword"
						name="password"
						class="hl__auth-item-input"
						placeholder=" " />
					<label for="inputRegPassword" class="hl__auth-item-label"
					>Пароль <span>*</span></label
					>
				</div>
				<div class="hl__auth-item-error" id="passwordError">
					<img src="<?php echo get_template_directory_uri(); ?>/images/svg/error.svg" alt="error icon" />
					<span>Обов'язкове поле для заповнення</span>
				</div>
			</div>
			<div class="hl__auth-item">
				<div class="hl__auth-item-container">
					<input type="password" id="inputRegPasswordConfirm" name="password_confirm" class="hl__auth-item-input" placeholder=" " />
					<label for="inputRegPasswordConfirm" class="hl__auth-item-label">Підтвердіть пароль <span>*</span></label>
				</div>
				<div class="hl__auth-item-error" id="passwordConfirmError">
					<img src="<?php echo get_template_directory_uri(); ?>/images/svg/error.svg" alt="error icon" />
					<span>Обов'язкове поле для заповнення</span>
				</div>
			</div>

			<div class="hl__auth-item">
				<input
					type="checkbox"
					id="inputRegSubscribe"
					name="mailing_list"
					class="hl__auth-item-checkbox" />
				<label for="inputRegSubscribe" class="hl__auth-item-checkbox-label">
					<img src="<?php echo get_template_directory_uri(); ?>/images/svg/check.svg" alt="check mark for checkbox" />
					<span><?php echo $regFormCheckboxText; ?></span>
				</label>
			</div>
		</div>
		<div class="hl__auth-button">
			<!--TODO: add styles for this block-->
			<?php if ( $regFormInformation ) : ?>
				<div class="hl__auth-item hl__auth-item--no-margin">
					<?php echo $regFormInformation; ?>
			<?php endif; ?>
			<div class="hl__auth-item">
				<button
					type="submit"
					class="hl__button hl__button--green hl__button--full"
					id="regSubmitButton"
					disabled><?php echo $regFormButtonTitle; ?></button>
			</div>
			<div class="hl__auth-item">
				<input type="hidden" name="red_csrf" value="<?php echo wp_create_nonce('red-csrf'); ?>"/>
				<button
					type="button"
					class="hl__button hl__button--transparent hl__button--full"
					id="goToAuth"><?php echo $regFormLoginButtonTitle; ?></button>
			</div>
		</div>
	</form>
</div>