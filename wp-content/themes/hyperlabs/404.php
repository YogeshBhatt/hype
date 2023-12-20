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

<?php
get_footer();
