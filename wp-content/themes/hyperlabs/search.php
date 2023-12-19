<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package hyperlabs
 */

get_header();
?>

	<div id="hl" class="site">

		<?php if ( have_posts() ) : ?>

			<div class="hl__blog-header pt-5">
				<div class="container">
					<h2><?php echo esc_attr( get_search_query() ); ?></h2>
				</div>
			</div>

		<?php if ( 'product' === get_post_type() ) : ?>
			<div class="hl__catalog-content">
				<div class="container">
					<div class="hl__catalog-wrap d-grid">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php if ( 'product' === get_post_type() ) : ?>
								<?php
								$product = wc_get_product( get_the_ID() );
								if ( $product ) :
									?>
									<div class="hl__product">
										<div class="hl__product-images">
											<div class="hl__product-images-big-image">
												<?php if ( has_post_thumbnail() ) : ?>
													<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" />
												<?php endif; ?>
											</div>
											<!-- Ваш код для миниатюр изображений продукта -->
										</div>
										<div class="hl__product-info">
											<div class="hl__product-name">
												<?php the_title(); ?>
											</div>
											<div class="hl__product-price">
												<span><?php echo wc_price( $product->get_price() ); ?></span>
											</div>
											<a
												href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
												class="hl__product-add d-inline-flex align-items-center">
												<img src="<?php echo esc_url( get_template_directory_uri() . '/images/svg/more-arrow.svg' ); ?>" alt="Arrow for more" />
												<span><?php esc_html_e( 'Add Now', 'textdomain' ); ?></span>
											</a>
										</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>

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
	</div><!-- #hl -->

<?php
get_footer();
