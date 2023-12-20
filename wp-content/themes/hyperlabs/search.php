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

<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="hl__collection-image">
				<div class="hl__collection-image-back">
					<img src="/wp-content/uploads/2023/12/collection-img.png" alt="collection image">
				</div>

				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-auto">
						<h1 class="page-title hl__collection-image-title">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'hyperlabs' ), '<span>“'. get_search_query() .'”</span>' );
							?>
						</h1>
							<div class=""></div>
						</div>
					</div>
				</div>
			</div>
			<header class="page-header">

			</header><!-- .page-header -->

			<div class="container">
				<ul class="search_products hl__catalog-wrap d-grid ps-0">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				// echo "hello";
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', 'search' );
				// wc_get_template_part( 'content', 'product_custom' );

			endwhile; ?>
			</ul>
			</div>
			<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

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
