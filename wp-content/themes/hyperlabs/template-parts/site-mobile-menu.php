<?php
if ( function_exists('get_field') ) {
	$siteHeaderLogo = get_field('site_header_logo', 'option');
}
?>

<!--TODO: add cart & profile links-->

<div class="hl__burger-menu d-flex flex-column">
	<div class="hl__burger-menu-top col-auto d-flex justify-content-end">
		<div class="hl__burger-menu-close">
			<img src="<?php echo get_template_directory_uri(); ?>/images/svg/close.svg" alt="close burger menu" />
		</div>
	</div>
	<div class="hl__burger-menu-content col d-flex flex-column">
		<div class="col-auto d-flex justify-content-center">
			<div class="hl__header-lang col-auto">
				<a href="#"><span>UKR</span> / <span>ENG</span></a>
			</div>
		</div>

		<?php
		if ( has_nav_menu( 'header-menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'header-menu',
					'menu_id'        => 'header-menu-mobile',
					'container' => false,
					'items_wrap' => '<div class="col d-flex flex-column align-items-center justify-content-center">%3$s</div>',
					'menu_class' => 'hl__burger-menu',
					'walker' => new Header_Mobile_Walker_Nav_Menu()
				)
			);
		}
		?>

		<div class="col-auto d-flex justify-content-center">
			<div class="hl__header-icons col-auto row gx-3 align-items-center">
				<div class="hl__header-icons-item col-auto">
					<a
						href="#"
						class="d-flex align-items-center justify-content-center">
						<svg
							fill="black"
							version="1.1"
							xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink"
							width="18"
							height="18"
							viewBox="0 0 37.164 37.164"
							xml:space="preserve">
                  <g>
	                  <path
		                  d="M37.164,12.23c0-1.386-1.124-2.509-2.509-2.509h-6.327l-4.046-8.396C23.832,0.39,22.707,0,21.77,0.446
		c-0.936,0.452-1.328,1.577-0.877,2.513l3.258,6.762H13.013l3.258-6.762c0.452-0.936,0.058-2.061-0.877-2.513
		C14.458,0,13.333,0.388,12.882,1.325L8.836,9.721H2.509C1.123,9.721,0,10.844,0,12.23c0,0.779,0.362,1.467,0.92,1.927l3.496,21.169
		c0.15,0.909,0.936,1.576,1.857,1.576h24.617c0.922,0,1.707-0.667,1.856-1.576l3.496-21.169
		C36.803,13.696,37.164,13.009,37.164,12.23z M29.295,33.139H7.868l-3.038-18.4h27.503L29.295,33.139z" />
                  </g>
                </svg>
					</a>
				</div>
				<div class="hl__header-icons-item col-auto">
					<div
						class="hl__open-search d-flex align-items-center justify-content-center">
						<svg
							width="20"
							height="21"
							viewBox="0 0 20 21"
							fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.29006 2.5C13.3098 2.5 16.5802 5.77031 16.5802 9.79006C16.5802 11.5289 15.9679 13.1272 14.948 14.3816L18 17.4335L16.9335 18.5L13.8815 15.448C12.6272 16.4679 11.0289 17.0802 9.29009 17.0802C5.27031 17.0802 2 13.8098 2 9.79006C2 5.77031 5.27031 2.5 9.29006 2.5ZM9.29006 15.5718C12.4781 15.5718 15.0718 12.9781 15.0718 9.79006C15.0718 6.602 12.4782 4.00828 9.29006 4.00828C6.10197 4.00828 3.50828 6.602 3.50828 9.79006C3.50828 12.9781 6.102 15.5718 9.29006 15.5718Z"
								fill="black"
								stroke="white"
								stroke-width="0.5" />
						</svg>
					</div>
				</div>
				<div class="hl__header-icons-item col-auto">
					<a
						href="#"
						class="d-flex align-items-center justify-content-center">
						<svg
							width="20"
							height="21"
							viewBox="0 0 20 21"
							fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M10 8.61765C11.1695 8.61765 12.1177 7.66955 12.1177 6.5C12.1177 5.33045 11.1695 4.38235 10 4.38235C8.83041 4.38235 7.88237 5.33045 7.88237 6.5C7.88237 7.66955 8.83041 8.61765 10 8.61765ZM10 10.5C12.2091 10.5 14 8.70913 14 6.5C14 4.29086 12.2091 2.5 10 2.5C7.79089 2.5 6 4.29086 6 6.5C6 8.70913 7.79089 10.5 10 10.5Z"
								fill="black" />
							<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M5.95332 13.5721C5.40963 13.5721 4.96888 14.0359 4.96888 14.6081V19.5H3V14.6081C3 12.8916 4.32224 11.5 5.95332 11.5H14.0467C15.6778 11.5 17 12.8916 17 14.6081V19.5H15.0311V14.6081C15.0311 14.0359 14.5904 13.5721 14.0467 13.5721H5.95332Z"
								fill="black" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="hl__burger-menu d-flex flex-column">
	<div class="hl__burger-menu-top col-auto d-flex justify-content-end">
		<div class="hl__burger-menu-close">
			<img src="<?php echo get_template_directory_uri(); ?>/images/svg/close.svg" alt="close burger menu" />
		</div>
	</div>
	<div class="hl__burger-menu-content col d-flex flex-column">
		<div class="col-auto d-flex justify-content-center">
			<div class="hl__header-lang col-auto">
				<a href="#"><span>UKR</span> / <span>ENG</span></a>
			</div>
		</div>
		<div
			class="col d-flex flex-column align-items-center justify-content-center">
			<div class="hl__burger-menu-item">
				<a href="#">Про нас</a>
			</div>
			<div class="hl__burger-menu-item">
				<a href="#">Магазин</a>
			</div>
			<div class="hl__burger-menu-item">
				<a href="#">Колекції</a>
			</div>
			<div class="hl__burger-menu-item">
				<a href="#">Блог</a>
			</div>
		</div>
		<div class="col-auto d-flex justify-content-center">
			<div class="hl__header-icons col-auto row gx-3 align-items-center">
				<div class="hl__header-icons-item col-auto">
					<a
						href="#"
						class="d-flex align-items-center justify-content-center">
						<svg
							fill="black"
							version="1.1"
							xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink"
							width="18"
							height="18"
							viewBox="0 0 37.164 37.164"
							xml:space="preserve">
                  <g>
	                  <path
		                  d="M37.164,12.23c0-1.386-1.124-2.509-2.509-2.509h-6.327l-4.046-8.396C23.832,0.39,22.707,0,21.77,0.446
		c-0.936,0.452-1.328,1.577-0.877,2.513l3.258,6.762H13.013l3.258-6.762c0.452-0.936,0.058-2.061-0.877-2.513
		C14.458,0,13.333,0.388,12.882,1.325L8.836,9.721H2.509C1.123,9.721,0,10.844,0,12.23c0,0.779,0.362,1.467,0.92,1.927l3.496,21.169
		c0.15,0.909,0.936,1.576,1.857,1.576h24.617c0.922,0,1.707-0.667,1.856-1.576l3.496-21.169
		C36.803,13.696,37.164,13.009,37.164,12.23z M29.295,33.139H7.868l-3.038-18.4h27.503L29.295,33.139z" />
                  </g>
                </svg>
					</a>
				</div>
				<div class="hl__header-icons-item col-auto">
					<div
						class="hl__open-search d-flex align-items-center justify-content-center">
						<svg
							width="20"
							height="21"
							viewBox="0 0 20 21"
							fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.29006 2.5C13.3098 2.5 16.5802 5.77031 16.5802 9.79006C16.5802 11.5289 15.9679 13.1272 14.948 14.3816L18 17.4335L16.9335 18.5L13.8815 15.448C12.6272 16.4679 11.0289 17.0802 9.29009 17.0802C5.27031 17.0802 2 13.8098 2 9.79006C2 5.77031 5.27031 2.5 9.29006 2.5ZM9.29006 15.5718C12.4781 15.5718 15.0718 12.9781 15.0718 9.79006C15.0718 6.602 12.4782 4.00828 9.29006 4.00828C6.10197 4.00828 3.50828 6.602 3.50828 9.79006C3.50828 12.9781 6.102 15.5718 9.29006 15.5718Z"
								fill="black"
								stroke="white"
								stroke-width="0.5" />
						</svg>
					</div>
				</div>
				<div class="hl__header-icons-item col-auto">
					<a
						href="#"
						class="d-flex align-items-center justify-content-center">
						<svg
							width="20"
							height="21"
							viewBox="0 0 20 21"
							fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M10 8.61765C11.1695 8.61765 12.1177 7.66955 12.1177 6.5C12.1177 5.33045 11.1695 4.38235 10 4.38235C8.83041 4.38235 7.88237 5.33045 7.88237 6.5C7.88237 7.66955 8.83041 8.61765 10 8.61765ZM10 10.5C12.2091 10.5 14 8.70913 14 6.5C14 4.29086 12.2091 2.5 10 2.5C7.79089 2.5 6 4.29086 6 6.5C6 8.70913 7.79089 10.5 10 10.5Z"
								fill="black" />
							<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M5.95332 13.5721C5.40963 13.5721 4.96888 14.0359 4.96888 14.6081V19.5H3V14.6081C3 12.8916 4.32224 11.5 5.95332 11.5H14.0467C15.6778 11.5 17 12.8916 17 14.6081V19.5H15.0311V14.6081C15.0311 14.0359 14.5904 13.5721 14.0467 13.5721H5.95332Z"
								fill="black" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

