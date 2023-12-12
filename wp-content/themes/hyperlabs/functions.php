<?php
/**
 * hyperlabs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hyperlabs
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hyperlabs_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on hyperlabs, use a find and replace
		* to change 'hyperlabs' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'hyperlabs', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-menu' => esc_html__( 'Header menu', 'hyperlabs' ),
			'footer-menu-1' => esc_html__( 'Footer menu 1', 'hyperlabs' ),
			'footer-menu-2' => esc_html__( 'Footer menu 2', 'hyperlabs' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'hyperlabs_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'hyperlabs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hyperlabs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hyperlabs_content_width', 640 );
}
add_action( 'after_setup_theme', 'hyperlabs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hyperlabs_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hyperlabs' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hyperlabs' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hyperlabs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hyperlabs_scripts() {
	wp_enqueue_style( 'hyperlabs-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;0,800;1,700;1,800&family=Rock+Salt&family=Russo+One&display=swap', array(), null);
	wp_enqueue_style( 'hyperlabs-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'hyperlabs-swiper-styles', get_template_directory_uri() . '/css/swiper-bundle.min.css', array('hyperlabs-bootstrap'), _S_VERSION );
	wp_enqueue_style( 'hyperlabs-style', get_template_directory_uri() . '/css/styles.css', array('hyperlabs-bootstrap'), _S_VERSION );
	//custom css file
	wp_enqueue_style( 'hyperlabs-style-custom', get_template_directory_uri() . '/css/custom.css', array('hyperlabs-bootstrap'), _S_VERSION );

	wp_enqueue_style( 'jquery_ui_css', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), time() );
	wp_enqueue_style( 'daterangepicker_css', get_template_directory_uri(). '/css/daterangepicker.min.css', array(), time() );
    wp_enqueue_script( 'jquery_ui_js', get_template_directory_uri(). '/js/jquery-ui.min.js', array(), time() );
	wp_enqueue_script( 'daterangepicker_min_js', get_template_directory_uri() . '/js/daterangepicker.min.js', array(), time() );

//	wp_style_add_data( 'hyperlabs-style', 'rtl', 'replace' );
//	wp_enqueue_script( 'hyperlabs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hyperlabs-swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), _S_VERSION, true );

	//custom js
	wp_enqueue_script( 'hyperlabs-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );

	if ( is_page_template('templates/collections.php') ) {
		wp_enqueue_script( 'hyperlabs-nouislider', get_template_directory_uri() . '/js/nouislider.min.js', array('hyperlabs-swiper'), _S_VERSION, true );
	}

	wp_enqueue_script( 'hyperlabs-scripts', get_template_directory_uri() . '/js/scripts.js', array('hyperlabs-swiper'), _S_VERSION, true );

//	if ( is_front_page() ) {
//		wp_enqueue_script( 'hyperlabs-marquee', get_template_directory_uri() . '/js/vanilla-marquee.min.js', array(), _S_VERSION, true );
//	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hyperlabs_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
	require get_template_directory() . '/inc/custom_woo.php';
}

// Support for ACF Option page
// if( function_exists('acf_add_options_page') ){
// 	acf_add_options_page();
// }

// Add ACF fields
require_once ABSPATH . 'vendor/autoload.php';

require_once get_template_directory() . '/acf-fields/theme-options.php';
require_once get_template_directory() . '/acf-fields/user-settings.php';
require_once get_template_directory() . '/acf-fields/index/index.php';
require_once get_template_directory() . '/acf-fields/collections/collections-all-fields.php';


//Custom menus

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


//fix svg uploads
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

//Custom Breadcrumbs
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


/**
 * Disable Gravatar note in WP Profile settings and add custom image with ACF
 */
function replace_gravatar_with_acf_image($args, $id_or_email) {
	$user_id = is_numeric($id_or_email) ? $id_or_email : false;
	$user = false;

	if ($id_or_email instanceof WP_User) {
		$user_id = $id_or_email->ID;
	} elseif ($id_or_email instanceof WP_Post) {
		$user_id = $id_or_email->post_author;
	} elseif ($id_or_email instanceof WP_Comment) {
		if (!empty($id_or_email->user_id)) {
			$user_id = $id_or_email->user_id;
		}
	} elseif (is_email($id_or_email)) {
		$user = get_user_by('email', $id_or_email);
		if ($user) {
			$user_id = $user->ID;
		}
	}
	if ($user_id) {
		$custom_image = get_field('author_custom_image', 'user_' . $user_id);
		if ($custom_image) {
			$args['url'] = $custom_image;
			$args['url_2x'] = $custom_image;
			// Убрать ссылку на Gravatar
			add_filter('user_profile_picture_description', '__return_empty_string');
		}
	}

	return $args;
}
add_filter('pre_get_avatar_data', 'replace_gravatar_with_acf_image', 10, 2);

function get_searchwp_live_ajax_data() {
    // Check if the SearchWP Live Ajax Search plugin is active
    if (class_exists('SearchWP_Live_Ajax_Search')) {
        // Use the plugin's function to get the search data
        $search_data = SearchWP_Live_Ajax_Search::instance()->get_search_data();

        // Return the search data
        return $search_data;
    }
    // Return null or false if the plugin is not active
    return null;
}


function popular_product_function() {
    // Your shortcode logic goes here
	$args = array(
		'post_type' => 'product',
		'meta_key' => 'total_sales',
		'orderby' => 'meta_value_num',
		'posts_per_page' => 4,
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	global $product; ?>
	<div>
	<a href="<?php the_permalink(); ?>" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>">
	
		<?php if (has_post_thumbnail( $loop->post->ID )) 
			echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
			else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" width="65px" height="60px" />'; ?>

	<h3><?php the_title(); ?></h3>
	<?php $product = wc_get_product( $loop->post->ID ); ?>
	<h3><?php echo wc_price($product->get_price()); ?></h3>
	</a>
	</div>
	<?php endwhile; ?>
	<?php wp_reset_query(); 
}
add_shortcode('popular_products', 'popular_product_function');