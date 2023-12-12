<?php
/**
 * Template Name: The template for collections page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */

get_header();
?>

	<div class="hl__collections-page">
		<?php get_template_part('template-parts/collections-page-parts/intro-section'); ?>
		<?php get_template_part('template-parts/collections-page-parts/preview-slider-section'); ?>
		<?php get_template_part('template-parts/collections-page-parts/categories-list-section'); ?>
		<?php get_template_part('template-parts/collections-page-parts/collections-banner-section'); ?>
		<?php get_template_part('template-parts/collections-page-parts/collections-faq-list-section'); ?>
	</div>

<?php
get_footer();
