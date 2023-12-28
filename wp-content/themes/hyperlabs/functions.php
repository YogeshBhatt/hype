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
	wp_enqueue_style( 'hyperlabs-select-styles', get_template_directory_uri() . '/css/nice-select2.css', array('hyperlabs-bootstrap'), _S_VERSION );
	wp_enqueue_style( 'hyperlabs-style', get_template_directory_uri() . '/css/styles.css', array('hyperlabs-bootstrap'), _S_VERSION );
	//	wp_style_add_data( 'hyperlabs-style', 'rtl', 'replace' );
	//custom css file
	wp_enqueue_style( 'hyperlabs-style-custom', get_template_directory_uri() . '/css/custom.css', array('hyperlabs-bootstrap'), _S_VERSION );

	wp_enqueue_style( 'jquery_ui_css', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), time() );
	wp_enqueue_style( 'daterangepicker_css', get_template_directory_uri(). '/css/daterangepicker.min.css', array(), time() );
	wp_enqueue_style( 'select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), time() );
	wp_enqueue_script( 'jquery_ui_js', get_template_directory_uri(). '/js/jquery-ui.min.js', array(), time() );
	wp_enqueue_script( 'daterangepicker_min_js', get_template_directory_uri() . '/js/daterangepicker.min.js', array(), time() );
	wp_enqueue_script( 'select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array(), time() );
	wp_enqueue_script( 'validation-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.9.0/jquery.validate.min.js', array(), time() );

	//custom js
	wp_enqueue_script( 'hyperlabs-custom', get_template_directory_uri() . '/js/custom.js', array(), time(), true );
	wp_enqueue_script( 'hyperlabs-custom-teq', get_template_directory_uri() . '/js/teq_custom_new.js', array(), time(), true );

//	wp_enqueue_script( 'hyperlabs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hyperlabs-swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), _S_VERSION, true );

	if ( is_page_template('templates/collections.php') ) {
		wp_enqueue_script( 'hyperlabs-nouislider', get_template_directory_uri() . '/js/nouislider.min.js', array('hyperlabs-swiper'), _S_VERSION, true );
	}

	wp_enqueue_script( 'hyperlabs-select', get_template_directory_uri() . '/js/nice-select2.js', array('hyperlabs-swiper'), _S_VERSION, true );

	wp_enqueue_script( 'hyperlabs-scripts', get_template_directory_uri() . '/js/scripts.js', array('hyperlabs-swiper'), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array('hyperlabs-swiper'), _S_VERSION, true );

//	if ( is_front_page() ) {
//		wp_enqueue_script( 'hyperlabs-marquee', get_template_directory_uri() . '/js/vanilla-marquee.min.js', array(), _S_VERSION, true );
//	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script('hyperlabs-custom', 'myScriptData', array(
		'siteUrl' => get_site_url(),
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'nonce'    => wp_create_nonce('custom_mini_cart_nonce'),
	));

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

/**
 * Register Custom Navigation Walker
 */
require_once get_template_directory() . '/costume-functions/costume-munus.php';

/**
 * Add SVG to allowed file uploads
 */
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/**
 * costume breadcrumbs function
 */
require_once get_template_directory() . '/costume-functions/costume-breadcrumbs-function.php';

/**
 * costume profile avatar functions
 */
require_once get_template_directory() . '/costume-functions/costume-profile-avatar-function.php';

/**
 * costume search functions
 */
require_once get_template_directory() . '/costume-functions/costume-search-function.php';

/**
 * costume post quantity functions
 */
//require_once get_template_directory() . '/costume-functions/index-news-slider-post.php';

/**
 * Custom login form function
 */
require_once get_template_directory() . '/costume-functions/costume-login-form-function.php';

/**
 * Custom registration form function
 */
require_once get_template_directory() . '/costume-functions/costume-registration-function.php';
/*start our code*/


/*product not found */
remove_action('woocommerce_no_products_found','wc_no_products_found',10);


/**
 * Post per page for archive
 */
// function hyperlabs_set_posts_per_page_for_archive( $query ) {
// 	if ( !is_admin() && $query->is_main_query() && is_archive() ) {
// 		$query->set( 'posts_per_page', 9 );
// 	}
// }
// add_action( 'pre_get_posts', 'hyperlabs_set_posts_per_page_for_archive' );

/**
 * search results
 */
add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );


/**
 * Custom lost password form function
 */
require_once get_template_directory() . '/costume-functions/costume-lost-password-function.php';


function add_to_wishlist() {
    $product_id = $_POST['product_id'];
	// print_r($product_id); exit;
    // Get current user's wishlist
    $user_id = get_current_user_id();
    $wishlist = get_user_meta($user_id, 'my_user_wishlist', true);
    if (!$wishlist) {
        $wishlist = array();
    }

    // Add product to wishlist
    if (!in_array($product_id, $wishlist)) {
        $wishlist[] = $product_id;
        update_user_meta($user_id, 'my_user_wishlist', $wishlist);
        wp_send_json_success('Product added to wishlist');
    } else {
        wp_send_json_error('Product already in wishlist');
    }

	// print_r($wishlist);
    wp_die();
}
add_action('wp_ajax_add_to_wishlist', 'add_to_wishlist');
add_action('wp_ajax_nopriv_add_to_wishlist', 'add_to_wishlist'); // If you want to allow non-logged-in users


//favorite product add here
function custom_selected_products_panel_content() {
    $user_id = get_current_user_id();
    $wishlist = get_user_meta($user_id, 'my_user_wishlist', true);
    
    if (!empty($wishlist) && is_array($wishlist)) {
		echo '<div class="hl__account-layout-right">';
		echo '<div class="hl__account-info-adaptive-menu d-lg-none d-block">';
		echo'<div class="swiper swiper__account-adaptive-menu swiper-initialized swiper-horizontal">';
		echo '<div class="swiper-wrapper" id="swiper-wrapper-35f105101a5812efd5" aria-live="polite" style="transition-duration: 0ms; transition-delay: 0ms;">';
		echo  '<div class="swiper-slide"><a href="#">Персональна інформація </a></div>';
		echo '<div class="swiper-slide"><a href="#">Історія замовлень</a></div>';
		echo   '<div class="swiper-slide"><a href="#" class="active">Вибрані товари</a></div>';
		echo   '<div class="swiper-slide"><a href="#">Пароль</a></div></div>';
		echo '<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>';
		echo '</div>';
		echo '<div class="hl__account-favorite d-grid">';
        foreach ($wishlist as $product_id) {
            $product = wc_get_product($product_id);
            if ($product) {
                // Display the product details
				echo '<div class="hl__product">';
				echo  '<div class="hl__product-images">';
				echo   '<div class="hl__product-images-big-image">';
				echo   '<img src="'.wp_get_attachment_url($product->get_image_id()).'" alt='.$product->get_name().'" />';
				echo '</div>';
				echo '<a href="#" class="hl__product-images-delete remove-from-wishlist" data-product-id="'.$product_id.'">';
				echo '<img src="'.get_template_directory_uri().'/images/svg/delete.svg" alt="delete product from favorites">';
				echo  '</a>';
				echo  '</div>';
				echo  '<div class="hl__product-info">';
				echo  '<div class="hl__product-name">'.$product->get_name().'';
				echo   '</div>';
				echo   '<div class="hl__product-price">';
				echo    '<span>'.wc_price($product->get_price()).'</span>';
				echo   '</div>';
				echo '<a href="'.get_permalink($product_id).'" class="hl__product-add d-inline-flex align-items-center">';
				echo   '<img src="'.get_template_directory_uri().'/images/svg/more-arrow.svg" alt="Arrow for more" />';
				echo    '<span>'._('купити зараз').'</span>';
				echo   '</a>';
				echo '</div>';
				echo '</div>';
            }
        }
		echo '</div>';
		echo '</div>';
    } else {
        echo '<div class="hl__account-empty">';
		echo '<div class="hl__account-empty-wrap">';
        echo '<div class="hl__account-empty-image">';
        echo '<img src="'.get_template_directory_uri().'/images/account/empty-favorites.png" alt="image for empty block in favorite">';
    	echo '</div>';
        echo '<div class="hl__account-empty-text">На даний момент у вас немає вибраних товарів</div>';
        echo '<div class="hl__account-empty-button"><a href="'.get_permalink( wc_get_page_id( 'shop' ) ).'" class="hl__button hl__button--black hl__button--full">Почати покупки</a></div>';
        echo '</div>';
        echo '</div>';
    }
}
add_action('woocommerce_account_selected-products_endpoint', 'custom_selected_products_panel_content');


function remove_from_wishlist() {
	$product_id = $_POST['product_id'];

	$user_id = get_current_user_id();
	$wishlist = get_user_meta($user_id, 'my_user_wishlist', true);

	if (!is_array($wishlist)) {
		$wishlist = array();
	}

	if (($key = array_search($product_id, $wishlist)) !== false) {
		unset($wishlist[$key]);
	}

	update_user_meta($user_id, 'my_user_wishlist', $wishlist);

	wp_send_json_success('Product removed successfully.');
}

add_action('wp_ajax_remove_from_wishlist', 'remove_from_wishlist');
add_action('wp_ajax_nopriv_remove_from_wishlist', 'remove_from_wishlist'); // If you want non-logged in users to use this


//custom order orite product add here

