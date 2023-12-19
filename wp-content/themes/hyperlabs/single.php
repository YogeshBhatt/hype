<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hyperlabs
 */

get_header();
?>

	<div id="hl" class="site">
		<div class="hl__blog-page">
			<?php
			$categories = get_the_category();
				custom_breadcrumbs($categories[0]);
			?>
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; // End of the loop.
			?>
		</div>
	</div><!-- #hl -->

<?php
get_footer();
