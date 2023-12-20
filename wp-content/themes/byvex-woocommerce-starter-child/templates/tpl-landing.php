<?php

/**
 * Template Name: Landing Page template
 */

add_action('before_footer_content', function () {
?>
	<div class="hl__main-page">
		<div class="hl__main-screen">
			<div class="hl__main-screen-image">
				<img src="images/main/main.png" alt="main screen image" width="1920" height="1050" />
			</div>
			<div class="hl__main-screen-text">
				<div class="container">
					<div class="hl__main-screen-text-wrap d-flex flex-column align-items-start">
						<div class="hl__main-screen-text1">Start shopping</div>
						<div class="hl__main-screen-text2">Support</div>
						<div class="hl__main-screen-text2 align-self-end">Ukraine</div>
						<div class="hl__main-screen-text3 align-self-end">
							BUY NFT - AND HELP UKRAINE
						</div>
						<a href="#" class="hl__main-screen-donate d-flex align-items-center justify-content-center">
							<img class="hl__main-screen-donate-text" src="images/svg/donate.svg" alt="Donate to Ukraine" />
							<img class="hl__main-screen-donate-arrow" src="images/svg/donate-arrow.svg" alt="Donate to Ukraine" />
						</a>
					</div>
				</div>
				<a href="#" class="hl__badge hl__main-screen-badge1">
					<div class="hl__badge-image">
						<img src="images/main/badge-img1.png" alt="Main badge 1" width="86" height="86" />
					</div>
					<div class="hl__badge-content">
						<div class="hl__badge-name">Светр “BANDERACIAGA”</div>
						<div class="hl__badge-price">1089,00 ₴</div>
					</div>
				</a>
				<a href="#" class="hl__badge hl__main-screen-badge2">
					<div class="hl__badge-image">
						<img src="images/main/badge-img2.png" alt="Main badge 2" width="86" height="86" />
					</div>
					<div class="hl__badge-content">
						<div class="hl__badge-name">Шарф “BANDERACIAGA”</div>
						<div class="hl__badge-price">1600,00 ₴</div>
					</div>
				</a>
			</div>
		</div>
		<div class="hl__marquee" id="marquee">
			<div class="hl__marquee-content">
				<span>10% скидки за отзыв о нас в соц.сетях</span>
				<span>10% скидки за отзыв о нас в соц.сетях</span>
			</div>
		</div>
		<div class="hl__double-screen d-flex">
			<div class="hl__double-screen-item col-6 d-flex align-items-center justify-content-center">
				<div class="hl__double-screen-image">
					<img src="images/main/double-screen-img1.png" alt="Bestsellers" />
				</div>
				<a href="#" class="hl__badge hl__double-screen-badge1">
					<div class="hl__badge-image">
						<img src="images/main/badge-img3.png" alt="Double screen badge" width="86" height="86" />
					</div>
					<div class="hl__badge-content">
						<div class="hl__badge-name">Водонепроникна корсетка</div>
						<div class="hl__badge-price">3300,00 ₴</div>
					</div>
				</a>
				<div class="hl__double-screen-text">Хіт Продажу</div>
			</div>
			<div class="hl__double-screen-item col-6 d-flex align-items-center justify-content-center">
				<div class="hl__double-screen-image">
					<img src="images/main/double-screen-img2.png" alt="New collection" />
				</div>
				<a href="#" class="hl__badge hl__double-screen-badge2">
					<div class="hl__badge-image">
						<img src="images/main/badge-img3.png" alt="Double screen badge" width="86" height="86" />
					</div>
					<div class="hl__badge-content">
						<div class="hl__badge-name">Водонепроникна корсетка</div>
						<div class="hl__badge-price">3300,00 ₴</div>
					</div>
				</a>
				<div class="hl__double-screen-text">Нова колекція</div>
			</div>
		</div>
		<div class="hl__slider-small">
			<div class="container">
				<div class="hl__slider-small-header row align-items-center justify-content-between">
					<div class="col-auto">
						<h2>Новинки</h2>
					</div>
					<div class="col-auto">
						<div class="swiper__main-small-cntrl d-flex align-items-center">
							<div class="swiper__main-small-prev">
								<img src="images/svg/swiper-arrow-right.svg" alt="swiper right arrow" />
							</div>
							<div class="swiper__main-small-next">
								<img src="images/svg/swiper-arrow-right.svg" alt="swiper right arrow" />
							</div>
						</div>
					</div>
				</div>
				<div class="swiper swiper__main-small">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="hl__product">
								<div class="hl__product-images">
									<div class="hl__product-images-big-image">
										<img src="" alt="Кроп-светр “Незламна" />
									</div>
									<div class="hl__product-images-thumbnails">
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img1.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img3.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
									</div>
								</div>
								<div class="hl__product-info">
									<div class="hl__product-name">
										Кроп-светр <strong>“Незламна”</strong>
									</div>
									<div class="hl__product-price">
										<span>1940,00 ₴</span>
									</div>
									<a href="#" class="hl__product-add d-inline-flex align-items-center">
										<img src="images/svg/more-arrow.svg" alt="Arrow for more" />
										<span>Додати зараз</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__product">
								<div class="hl__product-images">
									<div class="hl__product-images-big-image">
										<img src="" alt="Кроп-светр “Незламна" />
									</div>
									<div class="hl__product-images-thumbnails">
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img1.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img3.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
									</div>
								</div>
								<div class="hl__product-info">
									<div class="hl__product-name">
										Кроп-светр <strong>“Незламна”</strong>
									</div>
									<div class="hl__product-price">
										<span>1940,00 ₴</span>
									</div>
									<a href="#" class="hl__product-add d-inline-flex align-items-center">
										<img src="images/svg/more-arrow.svg" alt="Arrow for more" />
										<span>Додати зараз</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__product">
								<div class="hl__product-images">
									<div class="hl__product-images-big-image">
										<img src="" alt="Кроп-светр “Незламна" />
									</div>
									<div class="hl__product-images-thumbnails">
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img1.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img3.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
									</div>
								</div>
								<div class="hl__product-info">
									<div class="hl__product-name">
										Кроп-светр <strong>“Незламна”</strong>
									</div>
									<div class="hl__product-price">
										<span>1940,00 ₴</span>
										<span>1940,00 ₴</span>
									</div>
									<a href="#" class="hl__product-add d-inline-flex align-items-center">
										<img src="images/svg/more-arrow.svg" alt="Arrow for more" />
										<span>Додати зараз</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__product">
								<div class="hl__product-images">
									<div class="hl__product-images-big-image">
										<img src="" alt="Кроп-светр “Незламна" />
									</div>
									<div class="hl__product-images-thumbnails">
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img1.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img3.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
									</div>
								</div>
								<div class="hl__product-info">
									<div class="hl__product-name">
										Кроп-светр <strong>“Незламна”</strong>
									</div>
									<div class="hl__product-price">
										<span>1940,00 ₴</span>
									</div>
									<a href="#" class="hl__product-add d-inline-flex align-items-center">
										<img src="images/svg/more-arrow.svg" alt="Arrow for more" />
										<span>Додати зараз</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__product">
								<div class="hl__product-images">
									<div class="hl__product-images-big-image">
										<img src="" alt="Кроп-светр “Незламна" />
									</div>
									<div class="hl__product-images-thumbnails">
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img1.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img3.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
									</div>
								</div>
								<div class="hl__product-info">
									<div class="hl__product-name">
										Кроп-светр <strong>“Незламна”</strong>
									</div>
									<div class="hl__product-price">
										<span>1940,00 ₴</span>
									</div>
									<a href="#" class="hl__product-add d-inline-flex align-items-center">
										<img src="images/svg/more-arrow.svg" alt="Arrow for more" />
										<span>Додати зараз</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__product">
								<div class="hl__product-images">
									<div class="hl__product-images-big-image">
										<img src="" alt="Кроп-светр “Незламна" />
									</div>
									<div class="hl__product-images-thumbnails">
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img1.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img3.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
										<div class="hl__product-images-thumbnail-item">
											<img src="images/main/swiper-small-img2.png" alt="Кроп-светр “Незламна" class="hl__product-images-thumbnail-item-img" />
										</div>
									</div>
								</div>
								<div class="hl__product-info">
									<div class="hl__product-name">
										Кроп-светр <strong>“Незламна”</strong>
									</div>
									<div class="hl__product-price">
										<span>1940,00 ₴</span>
									</div>
									<a href="#" class="hl__product-add d-inline-flex align-items-center">
										<img src="images/svg/more-arrow.svg" alt="Arrow for more" />
										<span>Додати зараз</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-scrollbar__main-small"></div>
			</div>
		</div>
		<div class="hl__info-banner">
			<div class="hl__info-banner-top">
				<div class="hl__info-banner-image">
					<img src="images/main/info-banner-img.png" alt="Banner" />
				</div>
				<a href="#" class="hl__badge hl__info-banner-badge1">
					<div class="hl__badge-image">
						<img src="images/main/badge-img4.png" alt="Double screen badge" width="86" height="86" />
					</div>
					<div class="hl__badge-content">
						<div class="hl__badge-name">Водонепроникна корсетка</div>
						<div class="hl__badge-price">3300,00 ₴</div>
					</div>
				</a>
				<a href="#" class="hl__badge hl__info-banner-badge2">
					<div class="hl__badge-image">
						<img src="images/main/badge-img4.png" alt="Double screen badge" width="86" height="86" />
					</div>
					<div class="hl__badge-content">
						<div class="hl__badge-name">Водонепроникна корсетка</div>
						<div class="hl__badge-price">3300,00 ₴</div>
					</div>
				</a>
				<a href="#" class="hl__badge hl__info-banner-badge3">
					<div class="hl__badge-image">
						<img src="images/main/badge-img4.png" alt="Double screen badge" width="86" height="86" />
					</div>
					<div class="hl__badge-content">
						<div class="hl__badge-name">Водонепроникна корсетка</div>
						<div class="hl__badge-price">3300,00 ₴</div>
					</div>
				</a>
				<a href="#" class="hl__badge hl__info-banner-badge4">
					<div class="hl__badge-image">
						<img src="images/main/badge-img4.png" alt="Double screen badge" width="86" height="86" />
					</div>
					<div class="hl__badge-content">
						<div class="hl__badge-name">Водонепроникна корсетка</div>
						<div class="hl__badge-price">3300,00 ₴</div>
					</div>
				</a>
			</div>
			<div class="hl__info-banner-bottom">
				<div class="container">
					<div class="row">
						<div class="hl__info-banner-bottom-header col-6">
							<span>КУПУЙТЕ В Hype Laboratories</span>
							<span>І ДОПОМАГАЙТЕ УКРАЇНІ</span>
						</div>
						<div class="hl__info-banner-bottom-text col-6">
							Компанія Hype Laboratories — та сама лабораторія, яку так
							боїться росія. Проте замість смертельних вірусів і летальної
							зброї, вона виготовляє стиль та майбутнє для українських
							дітей. Купуючи NFT, ви долучаєтесь до благодійної місії з
							будівництва навчальних таборів для дітей-переселенців та
							інвалідів в Україні. Це не просто NFT, це цінний історичний
							артефакт, який з кожним днем буде ціннішим. Наш мерч
							наповнений свободою на молекулярному рівні.
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hl__promo">
			<div class="container">
				<div class="hl__promo-background">
					<div class="hl__promo-background-top">
						<img src="images/main/promo-img-top.png" alt="Promo background" />
					</div>
					<div class="hl__promo-background-bottom">
						<img src="images/main/promo-img-bottom.png" alt="Promo background" />
					</div>
				</div>
				<div class="hl__promo-text">
					<div class="hl__promo-text1">Sign up and get a</div>
					<div class="hl__promo-text2">promo code</div>
					<div class="hl__promo-text3">
						<span>10%</span> знижки при першій покупці
					</div>
				</div>
			</div>
		</div>
		<div class="hl__slider-big">
			<div class="container">
				<div class="hl__slider-big-header">
					<h2><span>Хіти</span> продажу</h2>
				</div>
				<div class="swiper swiper__main-big">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="hl__hit">
								<div class="hl__hit-image">
									<div class="hl__hit-image-wrap">
										<img src="images/main/swiper-big-img1.png" alt="Кроп-светр “Незламна" />
									</div>
									<a href="#" class="hl__hit-buy">
										<span>Купити зараз</span>
									</a>
								</div>
								<div class="hl__hit-info">
									<div class="hl__hit-name">
										Водонепроникний <span>анорак</span>
									</div>
									<div class="hl__hit-price">
										<span>2800,00 ₴</span>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__hit">
								<div class="hl__hit-image">
									<div class="hl__hit-image-wrap">
										<img src="images/main/swiper-big-img2.png" alt="Кроп-светр “Незламна" />
									</div>
									<a href="#" class="hl__hit-buy">
										<span>Купити зараз</span>
									</a>
								</div>
								<div class="hl__hit-info">
									<div class="hl__hit-name">
										Худі з Федоровим
										<span>на фоні красноярську у вогні</span>
									</div>
									<div class="hl__hit-price">
										<span>2800,00 ₴</span>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__hit">
								<div class="hl__hit-image">
									<div class="hl__hit-image-wrap">
										<img src="images/main/swiper-big-img3.png" alt="Кроп-светр “Незламна" />
									</div>
									<a href="#" class="hl__hit-buy">
										<span>Купити зараз</span>
									</a>
								</div>
								<div class="hl__hit-info">
									<div class="hl__hit-name">
										Водонепроникний <span>анорак</span>
									</div>
									<div class="hl__hit-price">
										<span>2800,00 ₴</span>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__hit">
								<div class="hl__hit-image">
									<div class="hl__hit-image-wrap">
										<img src="images/main/swiper-big-img1.png" alt="Кроп-светр “Незламна" />
									</div>
									<a href="#" class="hl__hit-buy">
										<span>Купити зараз</span>
									</a>
								</div>
								<div class="hl__hit-info">
									<div class="hl__hit-name">
										Водонепроникний <span>анорак</span>
									</div>
									<div class="hl__hit-price">
										<span>2800,00 ₴</span>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__hit">
								<div class="hl__hit-image">
									<div class="hl__hit-image-wrap">
										<img src="images/main/swiper-big-img2.png" alt="Кроп-светр “Незламна" />
									</div>
									<a href="#" class="hl__hit-buy">
										<span>Купити зараз</span>
									</a>
								</div>
								<div class="hl__hit-info">
									<div class="hl__hit-name">
										Худі з Федоровим
										<span>на фоні красноярську у вогні</span>
									</div>
									<div class="hl__hit-price">
										<span>2800,00 ₴</span>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__hit">
								<div class="hl__hit-image">
									<div class="hl__hit-image-wrap">
										<img src="images/main/swiper-big-img3.png" alt="Кроп-светр “Незламна" />
									</div>
									<a href="#" class="hl__hit-buy">
										<span>Купити зараз</span>
									</a>
								</div>
								<div class="hl__hit-info">
									<div class="hl__hit-name">
										Водонепроникний <span>анорак</span>
									</div>
									<div class="hl__hit-price">
										<span>2800,00 ₴</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-scrollbar__main-big"></div>
			</div>
		</div>
		<div class="hl__new-collection">
			<div class="hl__new-collection-back">
				<img src="images/main/new-collection-back.png" alt="New collection back" />
			</div>
			<div class="hl__new-collection-marquee" id="marquee-yellow">
				<div class="hl__new-collection-marquee-content d-flex align-items-center">
					<span class="d-flex align-items-center">Hype Laboratories</span>
					<span class="d-flex align-items-center">Hype Laboratories</span>
					<span class="d-flex align-items-center">Hype Laboratories</span>
					<span class="d-flex align-items-center">Hype Laboratories</span>
					<span class="d-flex align-items-center">Hype Laboratories</span>
					<span class="d-flex align-items-center">Hype Laboratories</span>
				</div>
			</div>
			<div class="hl__new-collection-girl">
				<img src="images/main/new-collection-girl.png" alt="New collection girl" />
			</div>
			<div class="hl__new-collection-plastic">
				<img src="images/main/new-collection-plastic.png" alt="New collection plastic" />
			</div>
			<div class="hl__new-collection-marquee" id="marquee-blue">
				<div class="hl__new-collection-marquee-content d-flex align-items-center">
					<span class="d-flex align-items-center">Нова колекція Зима 2024</span>
					<span class="d-flex align-items-center">Нова колекція Зима 2024</span>
					<span class="d-flex align-items-center">Нова колекція Зима 2024</span>
					<span class="d-flex align-items-center">Нова колекція Зима 2024</span>
					<span class="d-flex align-items-center">Нова колекція Зима 2024</span>
					<span class="d-flex align-items-center">Нова колекція Зима 2024</span>
				</div>
			</div>
		</div>
		<div class="hl__hot-news">
			<div class="container">
				<div class="hl__hot-news-header row align-items-center justify-content-between">
					<div class="col-auto">
						<h2>Гарячі новини</h2>
					</div>
					<div class="col-auto">
						<div class="swiper__main-hot-news-cntrl d-flex align-items-center">
							<div class="swiper__main-hot-news-prev">
								<img src="images/svg/swiper-arrow-right-green.svg" alt="swiper right arrow" />
							</div>
							<div class="swiper__main-hot-news-next">
								<img src="images/svg/swiper-arrow-right-green.svg" alt="swiper right arrow" />
							</div>
						</div>
					</div>
				</div>
				<div class="swiper swiper__main-hot-news">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="hl__blog-item">
								<div class="hl__blog-item-img">
									<img src="images/main/hot-news-img1.png" alt="News image" />
								</div>
								<div class="hl__blog-item-content">
									<div class="hl__blog-item-date">28 Січня</div>
									<div class="hl__blog-item-title">
										Підтримайте українські меми
									</div>
									<div class="hl__blog-item-text">
										Протягом багатьох років народ України мав багато різних
										викликів — від політичних заворушень та економічної
										нестабільності до нищівної війни з росією.
									</div>
									<a href="#" class="hl__blog-item-more d-inline-flex align-items-center">
										<img src="images/svg/swiper-arrow-right-green.svg" alt="Arrow for more" />
										<span>Читати більше</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__blog-item">
								<div class="hl__blog-item-img">
									<img src="images/main/hot-news-img2.png" alt="News image" />
								</div>
								<div class="hl__blog-item-content">
									<div class="hl__blog-item-date">28 Січня</div>
									<div class="hl__blog-item-title">
										Підтримайте українські меми
									</div>
									<div class="hl__blog-item-text">
										Протягом багатьох років народ України мав багато різних
										викликів — від політичних заворушень та економічної
										нестабільності до нищівної війни з росією.
									</div>
									<a href="#" class="hl__blog-item-more d-inline-flex align-items-center">
										<img src="images/svg/swiper-arrow-right-green.svg" alt="Arrow for more" />
										<span>Читати більше</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__blog-item">
								<div class="hl__blog-item-img">
									<img src="images/main/hot-news-img1.png" alt="News image" />
								</div>
								<div class="hl__blog-item-content">
									<div class="hl__blog-item-date">28 Січня</div>
									<div class="hl__blog-item-title">
										Підтримайте українські меми
									</div>
									<div class="hl__blog-item-text">
										Протягом багатьох років народ України мав багато різних
										викликів — від політичних заворушень та економічної
										нестабільності до нищівної війни з росією.
									</div>
									<a href="#" class="hl__blog-item-more d-inline-flex align-items-center">
										<img src="images/svg/swiper-arrow-right-green.svg" alt="Arrow for more" />
										<span>Читати більше</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__blog-item">
								<div class="hl__blog-item-img">
									<img src="images/main/hot-news-img2.png" alt="News image" />
								</div>
								<div class="hl__blog-item-content">
									<div class="hl__blog-item-date">28 Січня</div>
									<div class="hl__blog-item-title">
										Підтримайте українські меми
									</div>
									<div class="hl__blog-item-text">
										Протягом багатьох років народ України мав багато різних
										викликів — від політичних заворушень та економічної
										нестабільності до нищівної війни з росією.
									</div>
									<a href="#" class="hl__blog-item-more d-inline-flex align-items-center">
										<img src="images/svg/swiper-arrow-right-green.svg" alt="Arrow for more" />
										<span>Читати більше</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__blog-item">
								<div class="hl__blog-item-img">
									<img src="images/main/hot-news-img1.png" alt="News image" />
								</div>
								<div class="hl__blog-item-content">
									<div class="hl__blog-item-date">28 Січня</div>
									<div class="hl__blog-item-title">
										Підтримайте українські меми
									</div>
									<div class="hl__blog-item-text">
										Протягом багатьох років народ України мав багато різних
										викликів — від політичних заворушень та економічної
										нестабільності до нищівної війни з росією.
									</div>
									<a href="#" class="hl__blog-item-more d-inline-flex align-items-center">
										<img src="images/svg/swiper-arrow-right-green.svg" alt="Arrow for more" />
										<span>Читати більше</span>
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="hl__blog-item">
								<div class="hl__blog-item-img">
									<img src="images/main/hot-news-img2.png" alt="News image" />
								</div>
								<div class="hl__blog-item-content">
									<div class="hl__blog-item-date">28 Січня</div>
									<div class="hl__blog-item-title">
										Підтримайте українські меми
									</div>
									<div class="hl__blog-item-text">
										Протягом багатьох років народ України мав багато різних
										викликів — від політичних заворушень та економічної
										нестабільності до нищівної війни з росією.
									</div>
									<a href="#" class="hl__blog-item-more d-inline-flex align-items-center">
										<img src="images/svg/swiper-arrow-right-green.svg" alt="Arrow for more" />
										<span>Читати більше</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hl__nft">
			<div class="hl__nft-back">
				<img src="images/main/nft-back.png" alt="NFT background" />
			</div>
			<div class="container">
				<div class="row">
					<div class="col-6">
						<div class="hl__nft-text1">
							Українські <span>NFT</span> колекції
						</div>
						<div class="hl__nft-text2">Broadside</div>
						<a href="#" class="hl__button hl__button--green">Перейти в колекцію</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="module">
      import marquee from 'https://cdn.jsdelivr.net/npm/vanilla-marquee/dist/vanilla-marquee.js'
      new marquee(document.getElementById('marquee'), {
        startVisible: true,
        recalcResize: true,
        duplicated: true,
        speed: 30,
        gap: 0,
      })
      new marquee(document.getElementById('marquee-blue'), {
        startVisible: true,
        recalcResize: true,
        duplicated: true,
        speed: 40,
        gap: 0,
      })
      new marquee(document.getElementById('marquee-yellow'), {
        startVisible: true,
        recalcResize: true,
        duplicated: true,
        speed: 15,
        gap: 0,
      })
    </script>
<?php
});

get_template_part('layout');
