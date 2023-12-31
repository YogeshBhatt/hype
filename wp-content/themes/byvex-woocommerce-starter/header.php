<?php

/**
 * @package byvex-woocommerce-starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="h-100">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class('h-100'); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site h-100 d-flex flex-column">
		<a class="skip-link text-decoration-none d-block text-center visually-hidden-focusable" href="#content"><?php esc_html_e('Skip to content', 'byvex-woocommerce-starter'); ?></a>

		<?php get_template_part('template-parts/site-header'); ?>

		<div id="content" class="site-content">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
