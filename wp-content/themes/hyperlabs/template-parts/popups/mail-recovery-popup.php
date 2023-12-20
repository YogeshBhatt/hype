<div class="hl__auth d-flex flex-column" id="forgetPassword">
	<div class="hl__auth-top col-auto d-flex justify-content-end">
		<div class="hl__auth-close" id="forgetPasswordClose">
			<img src="<?php echo get_template_directory_uri(); ?>/images/svg/close.svg" alt="close auth" />
		</div>
	</div>
	<?php echo do_shortcode('[custom-password-lost-form]'); ?>

<!--	<form-->
<!--		class="hl__auth-content col d-flex flex-column justify-content-between"-->
<!--		action=""-->
<!--		method="post"-->
<!--		id="custom-lost-password-form">-->
<!--		<input type="hidden" name="action" value="lostpassword">-->
<!--		<div class="hl__auth-wrap">-->
<!--			<h2>Забули свій пароль?</h2>-->
<!--			<p>-->
<!--				Будь ласка, введіть свою електронну адресу, щоб отримати посилання-->
<!--				для скидання пароля-->
<!--			</p>-->
<!--			<div class="hl__auth-item hl__auth-item--big-margin">-->
<!--				<div class="hl__auth-item-container">-->
<!--					--><?php //wp_nonce_field('custom_lostpassword_nonce', 'custom_lostpassword_nonce_field'); ?>
<!--					<input-->
<!--						type="email"-->
<!--						id="inputForgetPasswordEmail"-->
<!--						class="hl__auth-item-input"-->
<!--						name="user_login"-->
<!--						placeholder=" " />-->
<!--					<label for="inputForgetPasswordEmail" class="hl__auth-item-label"-->
<!--					>Email <span>*</span></label-->
<!--					>-->
<!--				</div>-->
<!--				<div class="hl__auth-item-error">-->
<!--					<img src="--><?php //echo get_template_directory_uri(); ?><!--/images/svg/error.svg" alt="error icon" />-->
<!--					<span>Неверное имя пользователя или адрес электронной почты.</span>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="hl__auth-item hl__auth-item--big-margin">-->
<!--				<button-->
<!--					type="submit"-->
<!--					class="hl__button hl__button--green hl__button--full"-->
<!--					id="forgetPasswordSubmitButton"-->
<!--					disabled>-->
<!--					Отримати новий пароль-->
<!--				</button>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="hl__auth-button">-->
<!--			<button-->
<!--				type="button"-->
<!--				name="submit"-->
<!--				class="hl__button hl__button--transparent hl__button--full"-->
<!--				id="goToAuthFromForgetPassword">-->
<!--				Авторизуватися-->
<!--			</button>-->
<!--		</div>-->
<!--	</form>-->
</div>