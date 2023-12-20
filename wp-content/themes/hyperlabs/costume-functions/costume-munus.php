<?php
class Header_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$url = esc_attr($item->url);
		$title = esc_html($item->title);

		// Получаем пользовательский класс и добавляем '-item'
		$item_class = !empty($args->menu_class) ? $args->menu_class . '-item' : 'menu-item';

		// Преобразуем массив классов элемента в строку
		$wp_classes = join(' ', apply_filters('nav_menu_css_class', array_filter($item->classes), $item, $args));
		$wp_classes = $wp_classes ? ' ' . $wp_classes : '';

		$output .= "<div class='{$item_class}{$wp_classes} col-auto'><a href='{$url}'>{$title}</a></div>";
	}
}

class Footer_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$url = esc_attr($item->url);
		$title = esc_html($item->title);

		$item_class = !empty($args->menu_class) ? $args->menu_class . '-item' : 'menu-item';
		$link_class = !empty($args->menu_class) ? $args->menu_class : 'menu-link';

		$wp_classes = join(' ', apply_filters('nav_menu_css_class', array_filter($item->classes), $item, $args));
		$wp_classes = $wp_classes ? ' ' . $wp_classes : '';

		$output .= "<div class='{$item_class}{$wp_classes}'><a class='{$link_class}' href='{$url}'>{$title}</a></div>";
	}
}

class Header_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$url = esc_attr($item->url);
		$title = esc_html($item->title);

		$item_class = !empty($args->menu_class) ? $args->menu_class . '-item' : 'menu-item';

		$wp_classes = join(' ', apply_filters('nav_menu_css_class', array_filter($item->classes), $item, $args));
		$wp_classes = $wp_classes ? ' ' . $wp_classes : '';

		$output .= "<div class='{$item_class}{$wp_classes}'><a href='{$url}'>{$title}</a></div>";
	}
}