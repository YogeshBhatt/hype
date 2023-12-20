<?php
/**
 * Template Name: Woocommerce Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */

get_header();
?>
	<div id="hl" class="site">
		<div class="hl__blog-page">
			<?php while (have_posts()): ?>
			<?php the_post();?>
			<article id="post-<?php the_ID();?>" <?php post_class();?>>
				<header class="entry-header">
					<?php the_title('<h1 class="entry-title">', '</h1>');?>
				</header>

				<?php hyperlabs_post_thumbnail();?>

				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'hyperlabs'),
							'after' => '</div>',
						)
					);
					?>
				</div>
			</article>
			<?php endwhile;?>
		</div>
	</div>
 <?php
get_sidebar();
get_footer();