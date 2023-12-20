<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hyperlabs
 */

$page404Image = get_field('page_404_image', 'option');
$page404Title = get_field('page_404_title', 'option');
$page404Button = get_field('page_404_button', 'option');

get_header();
?>

	<div id="hl" class="site">
		<div class="hl__404-page">
			<div class="container d-flex align-items-center justify-content-center">
				<div class="hl__404-wrap">
					<?php if ( $page404Image) : ?>
					<div class="hl__404-image">
						<img src="<?php echo $page404Image['url']; ?>" alt="<?php echo $page404Image['title']; ?>" />
					</div>
					<?php endif;?>
					<?php if ( $page404Title) : ?>
						<div class="hl__404-text"><?php echo $page404Title; ?></div>
					<?php endif;?>
					<?php if ( $page404Button) : ?>
					<div class="hl__404-button">
						<a href="<?php echo $page404Button['url']; ?>" class="hl__button hl__button--black hl__button--full"><?php echo $page404Button['title']; ?></a>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div><!-- #hl -->


	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hyperlabs' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hyperlabs' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'hyperlabs' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$hyperlabs_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'hyperlabs' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$hyperlabs_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
