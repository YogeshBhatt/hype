<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */

?>

<div class="hl__blog-page">
	<?php
	$categories = get_the_category();
	custom_breadcrumbs($categories[0]);
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="hl__blog-post-header">
			<div class="container">
				<?php
				if ( is_singular() ) :
					the_title( '<h1>', '</h1>' );
				else :
					the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				endif;
				?>
			</div>
		</div>
		<div class="hl__blog-post-image">
			<div class="container">
				<?php hyperlabs_post_thumbnail(); ?>
			</div>
		</div>

		<div class="entry-content hl__blog-post-content">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</div>
	</article>
</div>
