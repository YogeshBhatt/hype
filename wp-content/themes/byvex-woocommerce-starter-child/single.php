<?php

/**
 * @package Byvex WooCommerce Starter
 */

get_header();
?>

<div class="container-xxl py-4">
	<?php if (have_posts()) :
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content');

			the_post_navigation();

			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;
		endwhile;
	endif; ?>
</div>

<?php
get_footer();
