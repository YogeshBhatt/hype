<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */

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
			<div class="hl__blog-post-header-info d-flex align-items-center flex-wrap">
				<div class="hl__blog-post-header-info-data"> <?php echo get_the_date(); ?></div>
				<?php
				$author_id = get_the_author_meta('ID');
				$author_custom_image_url = get_field('author_custom_image', 'user_' . $author_id);

				$author_name = get_the_author();
				?>
				<div class="hl__blog-post-header-info-author d-flex align-items-center">
					<?php if ($author_custom_image_url):?>
						<div class="hl__blog-post-header-info-author-img" style="position:relative;width:32px;height:32px;border-radius:50%;overflow:hidden;">
							<img style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" src="<?php echo esc_url($author_custom_image_url); ?>" alt="<?php echo esc_attr($author_name); ?> image" />
						</div>
					<?php endif; ?>
					<div class="hl__blog-post-header-info-author-name">
						<?php echo esc_html($author_name); ?>
					</div>
				</div>
			</div>
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
