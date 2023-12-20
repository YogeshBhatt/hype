<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?><?php if ( have_posts() ) : ?>

			<h1><?php printf(__('Search Results for: %s', 'textdomain'), get_search_query()); ?></h1>

			<h2>Products</h2>
			<ul>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( 'product' === get_post_type() ) : ?>
						<li <?php post_class(); ?>>

							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<?php endif; ?>

							<div><?php the_excerpt(); ?></div>

						</li>
					<?php endif; ?>
				<?php endwhile; ?>
			</ul>

			<h2>News</h2>
			<ul>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( 'news' === get_post_type() ) : ?>
						<li <?php post_class(); ?>>

							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<?php endif; ?>

							<div><?php the_excerpt(); ?></div>

						</li>
					<?php endif; ?>

				<?php endwhile; ?>
			</ul>

		<?php else : ?>

			<h1><?php printf(__('No results found for: %s', 'textdomain'), get_search_query()); ?></h1>

		<?php endif; ?>
		<div class="entry-meta">
			<?php
			hyperlabs_posted_on();
			hyperlabs_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php hyperlabs_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
    <?php
	/*
	<footer class="entry-footer">
		<?php hyperlabs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	*/
	?>
</article><!-- #post-<?php the_ID(); ?> -->
