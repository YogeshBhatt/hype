<!-- <?php $menu_locations = get_nav_menu_locations(); ?>
<header id="masthead" class="site-header shadow bg-white" role="banner">
	<nav class="navbar navbar-expand-md">
		<div class="container-xxl">

			<a class="navbar-brand fw-bold m-0 p-0 text-truncate" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
				<?php if (get_header_image()) : ?>
					<img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
				<?php endif; ?>
				<?php if (!get_header_image()) : ?>
					<?php bloginfo('name'); ?>
				<?php endif; ?>
			</a>

			<?php if (isset($menu_locations['primary'])) { ?>
				<?php $nav_items = wp_get_nav_menu_items($menu_locations['primary']); ?>
				<?php if ($nav_items) { ?>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-nav" aria-controls="primary-nav" title="<?php echo esc_attr('Toggle Menu'); ?>" aria-expanded="false">
						<span class="navbar-toggler-icon"></span>
					</button>
				<?php } ?>

				<?php
				if ($nav_items) {
					$child_items  = array();
					// pull all child menu items into separate object
					foreach ($nav_items as $key => $item) {
						if ($item->menu_item_parent) {
							array_push($child_items, $item);
							unset($nav_items[$key]);
						}
					}
					// push child items into their parent item in the original object
					foreach ($nav_items as $item) {
						foreach ($child_items as $key => $child) {
							if ($child->menu_item_parent == $item->ID) {
								if (!$item->child_items) {
									$item->child_items = [];
								}
								array_push($item->child_items, $child);
								unset($child_items[$key]);
							}
						}
					}
				?>
					<div class="collapse navbar-collapse" id="primary-nav">
						<ul class="navbar-nav ms-auto">
							<?php foreach ($nav_items as $menu_item) {
								$current = ($menu_item->object_id == get_queried_object_id()) ? 'active' : '';
								if ($menu_item->child_items) { ?>
									<li class="nav-item dropdown"><a href="<?php echo esc_url($menu_item->url); ?>" class="nav-link dropdown-toggle <?php echo esc_attr($current); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html($menu_item->title); ?></a>
										<ul class="dropdown-menu dropdown-menu-end">
											<?php foreach ($menu_item->child_items as $item) {
												$currentChild = ($item->object_id == get_queried_object_id()) ? 'active' : ''; ?>
												<li><a class="dropdown-item <?php echo esc_attr($currentChild); ?>" href="<?php echo esc_url($item->url); ?>"><?php echo esc_html($item->title); ?></a></li>
											<?php } ?>
										</ul>
									</li>
								<?php } else { ?>
									<li class="nav-item"><a href="<?php echo esc_url($menu_item->url); ?>" class="nav-link <?php echo esc_attr($current); ?>"><?php echo esc_html($menu_item->title); ?></a></li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>
			<?php } ?>


		</div>
	</nav>
</header> -->

<header class="hl__header">
	<div class="container">
		<div class="row align-items-center">
			<div class="col d-lg-block d-none">
				<div class="hl__header-menu row">
					<div class="hl__header-menu-item col-auto">
						<a href="#">Про нас</a>
					</div>
					<div class="hl__header-menu-item col-auto">
						<a href="#">Магазин</a>
					</div>
					<div class="hl__header-menu-item col-auto">
						<a href="#">Колекції</a>
					</div>
					<div class="hl__header-menu-item col-auto">
						<a href="#">Блог</a>
					</div>
				</div>
			</div>
			<div class="col d-lg-none">
				<div class="hl__header-burger-ico">
					<img src="images/svg/burger.svg" alt="burger menu icon" />
				</div>
			</div>
			<div class="col-auto">
				<a href="#">
					<img src="images/global/logo.png" alt="Hyperlabs logo" width="100" height="44" />
				</a>
			</div>
			<div class="col">
				<div class="hl__header-right row align-items-center justify-content-end">
					<div class="hl__header-icons col-auto row gx-3 align-items-center">
						<div class="hl__header-icons-item col-auto order-lg-0 order-1">
							<a href="#">
								<svg fill="white" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 37.164 37.164" xml:space="preserve">
									<g>
										<path d="M37.164,12.23c0-1.386-1.124-2.509-2.509-2.509h-6.327l-4.046-8.396C23.832,0.39,22.707,0,21.77,0.446
		c-0.936,0.452-1.328,1.577-0.877,2.513l3.258,6.762H13.013l3.258-6.762c0.452-0.936,0.058-2.061-0.877-2.513
		C14.458,0,13.333,0.388,12.882,1.325L8.836,9.721H2.509C1.123,9.721,0,10.844,0,12.23c0,0.779,0.362,1.467,0.92,1.927l3.496,21.169
		c0.15,0.909,0.936,1.576,1.857,1.576h24.617c0.922,0,1.707-0.667,1.856-1.576l3.496-21.169
		C36.803,13.696,37.164,13.009,37.164,12.23z M29.295,33.139H7.868l-3.038-18.4h27.503L29.295,33.139z" />
									</g>
								</svg>
							</a>
						</div>
						<div class="hl__header-icons-item col-auto order-lg-1 order-0">
							<div class="hl__open-search">
								<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9.29006 2.5C13.3098 2.5 16.5802 5.77031 16.5802 9.79006C16.5802 11.5289 15.9679 13.1272 14.948 14.3816L18 17.4335L16.9335 18.5L13.8815 15.448C12.6272 16.4679 11.0289 17.0802 9.29009 17.0802C5.27031 17.0802 2 13.8098 2 9.79006C2 5.77031 5.27031 2.5 9.29006 2.5ZM9.29006 15.5718C12.4781 15.5718 15.0718 12.9781 15.0718 9.79006C15.0718 6.602 12.4782 4.00828 9.29006 4.00828C6.10197 4.00828 3.50828 6.602 3.50828 9.79006C3.50828 12.9781 6.102 15.5718 9.29006 15.5718Z" fill="white" stroke="white" stroke-width="0.5" />
								</svg>
							</div>
						</div>
						<div class="hl__header-icons-item col-auto order-lg-2 d-lg-block d-none">
							<a href="#">
								<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M10 8.61765C11.1695 8.61765 12.1177 7.66955 12.1177 6.5C12.1177 5.33045 11.1695 4.38235 10 4.38235C8.83041 4.38235 7.88237 5.33045 7.88237 6.5C7.88237 7.66955 8.83041 8.61765 10 8.61765ZM10 10.5C12.2091 10.5 14 8.70913 14 6.5C14 4.29086 12.2091 2.5 10 2.5C7.79089 2.5 6 4.29086 6 6.5C6 8.70913 7.79089 10.5 10 10.5Z" fill="white" />
									<path fill-rule="evenodd" clip-rule="evenodd" d="M5.95332 13.5721C5.40963 13.5721 4.96888 14.0359 4.96888 14.6081V19.5H3V14.6081C3 12.8916 4.32224 11.5 5.95332 11.5H14.0467C15.6778 11.5 17 12.8916 17 14.6081V19.5H15.0311V14.6081C15.0311 14.0359 14.5904 13.5721 14.0467 13.5721H5.95332Z" fill="white" />
								</svg>
							</a>
						</div>
					</div>
					<div class="hl__header-lang col-auto d-lg-block d-none">
						<a href="#"><span>UKR</span> / <span>ENG</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hl__search">
		<div class="hl__search-form">
			<div class="container">
				<div class="hl__search-form-wrap row gx-0 align-items-center">
					<div class="hl__search-form-input col">
						<input type="text" placeholder="Пошук" />
					</div>
					<div class="hl__search-form-close col-auto">
						<img src="images/svg/close-search.svg" alt="Clear search form" />
					</div>
				</div>
			</div>
		</div>
		<div class="hl__search-popular">
			<div class="container">
				<div class="hl__search-header">ПОПУЛЯРНІ ПОШУКИ</div>
				<div class="hl__search-popular-content">
					<div class="swiper swiper__search-popular">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Кроп-топ</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Жилет</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Светр</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Унісекс светр</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Футболка</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Унісекс шорти</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Футболка з Зеленським</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Худі</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Худі з Зеленською</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Шарф</span></a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="hl__search-popular-item d-flex align-items-center justify-content-center"><span>Бейсболка</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hl__search-trends">
			<div class="container">
				<div class="hl__search-header">ТРЕНДОВІ ПРОДУКТИ</div>
				<div class="hl__search-trends-content">
					<a href="#" class="hl__search-trends-item d-flex align-items-center gap-3">
						<div class="hl__search-trends-item-image">
							<img src="images/main/trends-img1.png" alt="trends image" />
						</div>
						<div class="hl__search-trends-item-info">
							<div class="hl__search-trends-item-name">
								Кроп-светр “Незламна”
							</div>
							<div class="hl__search-trends-item-price">1600,00 ₴</div>
						</div>
					</a>
					<a href="#" class="hl__search-trends-item d-flex align-items-center gap-3">
						<div class="hl__search-trends-item-image">
							<img src="images/main/trends-img2.png" alt="trends image" />
						</div>
						<div class="hl__search-trends-item-info">
							<div class="hl__search-trends-item-name">
								Худі з рефлективним принтом “Цитати Президента”
							</div>
							<div class="hl__search-trends-item-price">1600,00 ₴</div>
						</div>
					</a>
					<a href="#" class="hl__search-trends-item d-flex align-items-center gap-3">
						<div class="hl__search-trends-item-image">
							<img src="images/main/trends-img3.png" alt="trends image" />
						</div>
						<div class="hl__search-trends-item-info">
							<div class="hl__search-trends-item-name">
								Водонепроникний анорак
							</div>
							<div class="hl__search-trends-item-price">1600,00 ₴</div>
						</div>
					</a>
					<a href="#" class="hl__search-trends-item d-flex align-items-center gap-3">
						<div class="hl__search-trends-item-image">
							<img src="images/main/trends-img4.png" alt="trends image" />
						</div>
						<div class="hl__search-trends-item-info">
							<div class="hl__search-trends-item-name">
								Бейсболка з хусткою “BANDERACIAGA”
							</div>
							<div class="hl__search-trends-item-price">1600,00 ₴</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</header>