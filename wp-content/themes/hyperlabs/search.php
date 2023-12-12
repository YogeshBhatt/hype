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
				wc_get_template_part( 'content', 'product_custom' );

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

<?php
get_sidebar();
get_footer();
