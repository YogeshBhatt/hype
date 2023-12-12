<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */

?>

<section class="no-results not-found">
	<div class="container">
		<div class="text-center">
			<img src="wp-content/uploads/2023/12/not-found.png" alt="">
			<header class="page-header mt-4">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'hyperlabs' ); ?></h1>
			</header><!-- .page-header -->
		</div>

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hyperlabs' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>

				<div class="text-center mt-4">
					<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hyperlabs' ); 
						$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
						?>
					<a href="<?php echo $shop_page_url ?>" class="hl__button hl__button--black mx-auto mt-4">Перейти в колекцію</a>
				</div>
				<?php
				// get_search_form();

			else :
				?>

				<div class="text-center">
					<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hyperlabs' ); 
						$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
					?>
					<a href="<?php echo $shop_page_url ?>" class="hl__button hl__button--black mx-auto">Перейти в колекцію</a>
				</div>
				<?php
				// get_search_form();

			endif;
			?>
		</div> 
	</div><!-- .page-content -->
</section><!-- .no-results -->
