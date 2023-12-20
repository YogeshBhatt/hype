<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */
$categories = get_the_category();

$blogNewsLinkText = get_field('news_link_text') ? get_field('news_link_text') : 'Читати більше';

function custom_trim_by_chars($content, $char_limit) {
	if (mb_strlen($content) > $char_limit) {
		$content = mb_substr($content, 0, $char_limit);
		$content = mb_substr($content, 0, mb_strrpos($content, ' '));
		$content .= '...';
	}
	return $content;
}

get_header();
?>

	<div id="hl" class="site">
		<div class="hl__blog-page">
			<?php custom_breadcrumbs($categories[0]); ?>
			<?php if ( have_posts() ) : ?>
				<div class="hl__blog-header">
					<div class="container">
						<h2><?php echo $categories[0]->name; ?></h2>
					</div>
				</div>
				<div class="hl__blog-content">
					<div class="container">
						<div class="hl__blog-wrap d-grid">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								?>
								<div class="hl__blog-item">
									<div class="hl__blog-item-img">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail(); ?>
										<?php else: ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/empty.jpg" alt="No image" />
										<?php endif; ?>
									</div>
									<div class="hl__blog-item-content">
										<div class="hl__blog-item-date"><?php echo get_the_date(); ?></div>
										<div class="hl__blog-item-title">
											<?php echo custom_trim_by_chars(get_the_title(), 60); ?>
										</div>
										<div class="hl__blog-item-text">
											<?php echo custom_trim_by_chars(get_the_excerpt(), 160); ?>
										</div>
										<a
											href="<?php the_permalink(); ?>"
											class="hl__blog-item-more d-inline-flex align-items-center">
											<img
												src="<?php echo get_template_directory_uri(); ?>/images/svg/swiper-arrow-right.svg"
												alt="Arrow for more" />
											<span><?php echo $blogNewsLinkText; ?></span>
										</a>
									</div>
								</div>
							<?php
							endwhile;
							?>
						</div>
					</div>
				</div>
				<?php
				global $wp_query;
				$total_pages = $wp_query->max_num_pages;

				if ( $total_pages > 1 ) : ?>
					<div class="hl__blog-pagination">
						<div class="container">
							<div class="hl__pagination d-flex align-items-center justify-content-center">
								<?php
								echo paginate_links( array(
									'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
									'total'        => $total_pages,
									'current'      => max( 1, get_query_var( 'paged' ) ),
									'format'       => '?paged=%#%',
									'show_all'     => false,
									'type'         => 'plain',
									'end_size'     => 2,
									'mid_size'     => 1,
									'prev_next'    => true,
									'prev_text'    => __('« Попередній'),
									'next_text'    => __('Далі »'),
									'add_args'     => false,
									'add_fragment' => '',
								) );
								?>
							</div>
						</div>
					</div>
				<?php endif; ?>

			<?php endif; ?>
		</div>
	</div>

<?php
get_footer();
