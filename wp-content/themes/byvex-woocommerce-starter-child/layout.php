<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- <?php wp_body_open(); ?> -->
	<!-- <a class="sr-only" href="#hl">
		<?php echo esc_html__('Skip to content', 'your-textdomain'); ?>
	</a> -->
	<div id="hl">
		<?php get_header(); ?>
		<?php do_action('before_footer_content'); ?>
		<?php get_footer(); ?>
	</div>
</body>

</html>