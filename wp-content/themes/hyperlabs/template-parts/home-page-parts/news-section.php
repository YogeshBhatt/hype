<?php

/**
 * Template part for News section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$newSectionTitle = get_field('index_news_section-title');
$newsLinkText = get_field('news_link_text') ? get_field('news_link_text') : 'Читати більше';
$newsTag = get_field('index_news_section_tag');
$quantityOfNews = get_field('quantity_of_news');

$limit = $quantityOfNews; // Установите желаемое количество постов
$args = array(
	'post_type'      => 'post',
	'tag'            => $newsTag, // Фильтрация постов по тегу "hot"
	'posts_per_page' => $limit,
);

$query = new WP_Query($args);

function custom_trim_by_chars($content, $char_limit) {
	if (mb_strlen($content) > $char_limit) {
		$content = mb_substr($content, 0, $char_limit);
		$content = mb_substr($content, 0, mb_strrpos($content, ' '));
		$content .= '...';
	}
	return $content;
}

?>

<?php if ($query->have_posts()) : ?>
<div class="hl__hot-news">
	<div class="container">
		<div
			class="hl__hot-news-header row align-items-center justify-content-between">
			<?php if ($newSectionTitle): ?>
			<div class="col-auto">
				<h2><?php echo $newSectionTitle; ?></h2>
			</div>
			<?php endif; ?>
			<div class="col-auto">
				<div
					class="swiper__main-hot-news-cntrl d-flex align-items-center">
					<div class="swiper__main-hot-news-prev">
						<img
							src="<?php echo get_template_directory_uri(); ?>/images/svg/swiper-arrow-right-green.svg"
							alt="swiper right arrow" />
					</div>
					<div class="swiper__main-hot-news-next">
						<img
							src="<?php echo get_template_directory_uri(); ?>/images/svg/swiper-arrow-right-green.svg"
							alt="swiper right arrow" />
					</div>
				</div>
			</div>
		</div>
		<div class="swiper swiper__main-hot-news">
			<div class="swiper-wrapper">
				<?php while ($query->have_posts()) : $query->the_post(); ?>
					<div class="swiper-slide">
						<div class="hl__blog-item">
							<?php if (has_post_thumbnail()): ?>
								<div class="hl__blog-item-img">
									<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
								</div>
							<?php endif; ?>

							<div class="hl__blog-item-content">
								<div class="hl__blog-item-date"><?php the_time('d F'); ?></div>
								<div class="hl__blog-item-title"><?php echo custom_trim_by_chars(get_the_title(), 60); ?></div>
								<div class="hl__blog-item-text"><?php echo custom_trim_by_chars(get_the_excerpt(), 150); ?></div>
								<a
									href="<?php the_permalink(); ?>"
									class="hl__blog-item-more d-inline-flex align-items-center">
									<img
										src="<?php echo get_template_directory_uri(); ?>/images/svg/swiper-arrow-right-green.svg"
										alt="Arrow for more" />
									<span><?php echo $newsLinkText; ?></span>
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>