<?php
/**
 * breadcrumbs
 */
function custom_breadcrumbs($category) {
	echo '<div class="hl__breadcrumbs"><div class="container"><div class="hl__breadcrumbs-wrap d-flex align-items-center">';
	echo '<div class="hl__breadcrumbs-item d-flex align-items-center"><a href="' . home_url() . '">' . get_bloginfo('name') . '</a></div>';
	if ($category) {
		$category_link = get_category_link($category->term_id);
		$category_name = $category->name;

		echo '<div class="hl__breadcrumbs-item d-flex align-items-center"><a href="' . esc_url($category_link) . '">' . esc_html($category_name) . '</a></div>';
		if (is_single()) {
			echo '<div class="hl__breadcrumbs-item d-flex align-items-center"><span>' . get_the_title() . '</span></div>';
		}
	} elseif (is_page()) {
		echo '<div class="hl__breadcrumbs-item d-flex align-items-center"><span>' . get_the_title() . '</span></div>';
	}
	echo '</div></div></div>';
}