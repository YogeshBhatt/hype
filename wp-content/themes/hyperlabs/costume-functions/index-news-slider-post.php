<?php
/**
 * Post per page for archive
 */
function hyperlabs_set_posts_per_page_for_archive( $query ) {
	if ( !is_admin() && $query->is_main_query() && is_archive() ) {
		$query->set( 'posts_per_page', 9 );
	}
}
add_action( 'pre_get_posts', 'hyperlabs_set_posts_per_page_for_archive' );