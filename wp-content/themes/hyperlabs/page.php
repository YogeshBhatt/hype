<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */

get_header();
?>

<?php
if ( is_front_page() ) :
	?>
	<div class="hl__main-page">
		<?php get_template_part('template-parts/home-page-parts/into-section'); ?>
		<?php get_template_part('template-parts/home-page-parts/marquee-text-section-1'); ?>
		<?php get_template_part('template-parts/home-page-parts/categories-list-section'); ?>
		<?php get_template_part('template-parts/home-page-parts/product-slider-1'); ?>
		<?php get_template_part('template-parts/home-page-parts/banner-section'); ?>
		<?php get_template_part('template-parts/home-page-parts/promo-banner-section'); ?>
		<?php get_template_part('template-parts/home-page-parts/product-slider-2'); ?>
		<?php get_template_part('template-parts/home-page-parts/marquee-text-banner-section'); ?>
		<?php get_template_part('template-parts/home-page-parts/news-section'); ?>
		<?php get_template_part('template-parts/home-page-parts/banner-section-2'); ?>
	</div>
<?php
else :
	// Содержимое для всех остальных страниц
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
endif;
?>

<?php
get_footer();
