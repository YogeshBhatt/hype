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
	// wp_enqueue_script(
	// 	'custom-single-product', // name your script so that you can attach other scripts and de-register, etc.
	// 	get_stylesheet_directory_uri() . '/js/custom.js', // this is the location of your script file
	// 	array('jquery') // this array lists the scripts upon which your script depends
	//  );
	 wp_enqueue_script('quantity-field', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), null, true);
	wp_localize_script('quantity-field', 'myScriptData', array(
		'siteUrl' => get_site_url(),
		'ajaxUrl' => admin_url('admin-ajax.php'),
	));

}

add_action( 'wp_enqueue_scripts', 'hyperlabs_scripts' );

function enqueue_custom_mini_cart_script() {
    wp_enqueue_script('custom-mini-cart-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);
    wp_localize_script('custom-mini-cart-script', 'custom_mini_cart_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('custom_mini_cart_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_mini_cart_script');



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
// Add your custom product image and gallery structure
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action('woocommerce_before_single_product_summary', 'custom_product_image_gallery', 20);
function custom_product_image_gallery() {
    global $product;
	$gallery_ids = $product->get_gallery_image_ids(); ?>
			<div class="hl__product-screen-images">
				<div class="col-auto">
					<div class="swiper__main-small-cntrl d-flex align-items-center">

						<div class="swiper__main-hot-news-nex">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="20" cy="20" r="20" fill="#A5FD48"/>
								<path d="M26 20L17.2434 12L16 13.136L19.0123 15.872L23.5306 20L19.0123 24.128L16.0175 26.864L17.2609 28L26 20Z" fill="black"/>
							</svg>
						</div>

						<div class="swiper__main-hot-news-prev">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="20" cy="20" r="20" fill="#A5FD48"/>
								<path d="M26 20L17.2434 12L16 13.136L19.0123 15.872L23.5306 20L19.0123 24.128L16.0175 26.864L17.2609 28L26 20Z" fill="black"/>
							</svg>
						</div>

					</div>
				</div>

				<div class="swiper swiper__product-big">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="hl__swiper-product-big-item first_main_img">
							<img src="<?php  echo wp_get_attachment_image_url($product->get_image_id(), 'full') ;?>" alt="<?php the_title_attribute(); ?>" />
							</div>
						</div>
						<?php if ( $gallery_ids ): ?>
							<?php foreach ($gallery_ids as $id): ?>
							<div class="swiper-slide">
								<div class="hl__swiper-product-big-item">
								<img src="<?php echo wp_get_attachment_url($id,'full'); ?>" alt="<?php the_title_attribute(); ?>" class="hl__product-images-thumbnail-item-img" />
								</div>
							</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="swiper swiper__product-small">
					<div class="swiper-wrapper">
					<div class="swiper-slide">
							<div class="hl__swiper-product-small-item">
							<img src="<?php  echo wp_get_attachment_image_url($product->get_image_id()) ;?>" alt="<?php the_title_attribute(); ?>" />
							</div>
						</div>
						<?php if ( $gallery_ids ): ?>
							<?php foreach ($gallery_ids as $id): ?>
							<div class="swiper-slide">
							<div class="hl__swiper-product-small-item">
								<img src="<?php echo wp_get_attachment_url($id); ?>" alt="<?php the_title_attribute(); ?>" class="hl__product-images-thumbnail-item-img" />
							</div>
							</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>

				</div>
			</div>
	<?php
}

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Додати до кошика', 'woocommerce' );
}

//favorite button add
add_action('woocommerce_after_add_to_cart_button','custom_favorite_product_button');
function custom_favorite_product_button(){
	echo '<button class= "hl__button hl__button--green hl_button_bg__white mt-4">Додати в обране</button>';
}
/*product not found */
remove_action('woocommerce_no_products_found','wc_no_products_found',10);


/*add short description befor price single product page */
function custom_attribute_popup_html() {
	$product = wc_get_product(get_the_id());
	$product_type = $product->get_type();
	if ($product_type === 'variable') {
    $product_id = $product->get_id();
	$color_attribute_value_simple = $product->get_attribute('color');
	$color_attribute_value_dynamic = $product->get_attribute('pa_color');

	$all_attribute = $product->get_attributes();

	// $size_attribute_value = $product->get_attribute('size');
	// if (strpos($size_attribute_value, '|') !== false) {
	// 	$size_attribute    =explode("|", $size_attribute_value);
	// } else {
	// 	$size_attribute    =explode(",", $size_attribute_value);
	// }

	$variations = $product->get_available_variations();

	$default_variation_attributes = $product->get_default_attributes();
	?>
    <div class="col-md-auto col-12 product_variation" id="attribute_popup">
        <div class="hl__filter-button d-flex align-items-center" >


			<?php
			$variationArray = [];
			$variationSlugArray = [];
			foreach($all_attribute as $key => $value)
			{
				// $attribute_data = $value->get_data();
				// if($value['name'] != 'color' && $value['name'] != 'pa_color') {
					$brand_terms = get_terms( $value['name'] );
					if (str_contains($value['name'], 'pa_')) {
						foreach($brand_terms as $k => $v)
						{
							$variationArray[$v->taxonomy][$k] = $v->name;
							$variationSlugArray[$v->taxonomy][$k] = $v->slug;
						}
					}else{
						$variations_arr = $product->get_available_variations();
						foreach($variations_arr as $k => $v)
						{

							$variationArray[$value['name']][$k] = $v['attributes']['attribute_'.$value['name']];
							$variationSlugArray[$value['name']][$k] = $v['attributes']['attribute_'.$value['name']];
						}
					}
				// }
				?>
				<?php //if($value['name'] != 'color' && $value['name'] != 'pa_color') {
					if(str_contains($value['name'], 'pa_'))
					{
						$name = str_replace("pa_","", $value['name']);

					}else{
						$name = $value['name'];
					}
					?>
					<?php if($value['name'] != 'color' && $value['name'] != 'pa_color'):?>
						<p class="single_product_size selected_attribute_list right-arrow <?php echo $value['name'];?>" data-attribute-list="<?php echo $value['name'];?>"><?php echo $name;?>: <span><?php if(isset($default_variation_attributes[$value['name']])) echo $default_variation_attributes[$value['name']]; else echo '';?></span></p>
					<?php else:?>
						<p class="single_product_size single__product_color selected_attribute_list right-arrow <?php echo $value['name'];?>" data-attribute-list="<?php echo $value['name'];?>"><?php echo $name;?>:<span class="color" style="background-color: <?php if(isset($default_variation_attributes[$value['name']])) echo $default_variation_attributes[$value['name']]; else echo '';?>"></span></p>
					<?php endif;?>
				<?php }?>
			<?php //} ?>

			<?php //if(!empty($color_attribute_value)){ ?>
            <!-- <p class="single__product_color selected_attribute_list right-arrow" data-attribute-list="color">Колір:<span><?php //echo $default_variation_attributes['color'];?></span></p> -->
			<?php //} ?>

        </div>
    </div>

    <div class="hl__filter d-flex flex-column variation_popup" style="transform: translateX(100%); opacity: 0;" id="single_attribute">
        <div class="hl__filter-top col-auto d-flex justify-content-end">
            <div class="hl__filter-close">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.75 2.75001L27.25 27.25M2.75005 27.25L15 15L27.25 2.75" stroke="#939393" stroke-width="2.6" stroke-linecap="square"/>
                </svg>
            </div>
        </div>

        <form class="hl__filter-content col d-flex flex-column justify-content-between" >
            <div class="hl__filter-wrap">
                <div class="hl__filter-block">
                    <div class="row gx-0 align-items-center justify-content-between">
						  <div class="first_block">
								<div class="col-auto">
									<?php foreach ($variationArray as $variationName => $variationValues):?>
										<h2 class="title title_attr title_<?php echo $variationName;?>"><?php echo str_replace("pa_","", $variationName);?></h2>
									<?php endforeach;?>
								</div>
                          </div>
						  <div class="modal-body">
								<div class="first_block">
										<?php if(!empty($color_attribute_value_simple) || !empty($color_attribute_value_dynamic)){ ?>
										<p id="popup_selected_color" class="sec_title d-flex align-item-center" style="color: white;">Вибрано колір: <span class="selected_color" style="background-color: <?php echo $default_variation_attributes['color'];?>;"></span></p>
										<?php } ?>

										<p class="selected_price d-none" id="popup_price" style="color: white;">
										<span class="price"></span>
										</p>
										<?php foreach ($variationArray as $variationName => $variationValues):?>
										<ul style="color: white;" id="<?php echo $variationName;?>_select" class="<?php echo $variationName;?> attribute_select <?php echo ($variationName == "color" || $variationName == "pa_color") ? "color_select" : "size_select";?>">
											<?php if($variationName == "color" || $variationName == "pa_color"):?>
												<?php
												foreach ( $variations as $v ) {
													$image_id  = $v['image_id'];

													$variation_attribute = $v['attributes'];
													$data_attr = "";
													$display_attr = [];
													foreach ($variation_attribute as $attr_key => $variation_attr) {
														if(!empty($variation_attr)){
															$data_attr .= "data-".$attr_key."=".$variation_attr." ";
															if($attr_key != "attribute_color" && $attr_key != "attribute_pa_color") {
																$display_attr[]= $variation_attr;
															}
														}
													}
													$colorname = "";
													if(isset($v['attributes']['attribute_'.$variationName])){
														$colorname = $v['attributes']['attribute_'.$variationName];
													}
													// $sizename = $v['attributes']['attribute_size'];
													$other_attr_name =implode(", ",$display_attr);
													echo '<li '.$data_attr.' class="color_li" data-attr="'.$variationName.'" data-selected-attr ="'.$colorname.'">';
													echo '<a href="#" id="">'.wp_get_attachment_image($image_id,'full').'</a>';
													echo '<span style="color: white;">'.$colorname." (".rtrim($other_attr_name, ", ").')</span>';
													echo '<p class="attr_val_p" style="display:none">'.$colorname.'</p>';
													echo '<p class="attr_val_p_main" style="display:none">'.$colorname.'</p>';
													echo '</li>';
												}
												?>
											<?php else:?>
												<?php foreach (array_unique($variationValues) as $key => $variationValue):?>
													<li data-selected-attr = "<?php echo (str_contains($variationName, 'pa_'))? $variationSlugArray[$variationName][$key] : $variationValue;?>" data-attr="<?php echo $variationName;?>"><a href="#"><?php echo $variationValue;?></a><p class="attr_val_p" style="display:none"><?php echo (str_contains($variationName, 'pa_'))? $variationSlugArray[$variationName][$key] : $variationValue;?></p><p class="attr_val_p_main" style="display:none"><?php echo $variationValue;?></p></li>
												<?php endforeach;?>
											<?php endif;?>
										</ul>
										<?php endforeach;?>


								</div>

							</div>
						</div>
					</div>
				</div>
				<button class= "hl__button hl__button--green mt-4" id="single_attribute_save">Зберегти зміни</button>
        </form>

    </div>

   <?php }
}
add_action('woocommerce_before_add_to_cart_form', 'custom_attribute_popup_html', 21);

/*product not found */
add_action('woocommerce_no_products_found','wc_no_products_found_custom_html',10);
function wc_no_products_found_custom_html(){
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
	?>
	<div class="woocommerce-no-products-found text-center ">

		<img src="/wp-content/uploads/2023/12/not-found-1.png" alt="">
		<h2 class="my-4">No products were found matching your selection custom</h2>

		<a href="<?php echo $shop_page_url ?>" class="hl__button hl__button--black mx-auto">Перейти в колекцію</a>
    </div>
<?php
}

function custom_mini_cart() {
// 	echo '<a href="#" class="dropdown-back" data-toggle="dropdown"> ';
//     echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
//     echo '</a>';
	echo '<div class="hl__minicard"> <div class="hl__minicard-top col-auto d-flex justify-content-end"> <div class="hl__minicard-close">
		<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M2.75 2.75001L27.25 27.25M2.75005 27.25L15 15L27.25 2.75" stroke="#939393" stroke-width="2.6" stroke-linecap="square"></path></svg>
		</div></div>';

//     echo '<div class="hl_minicard_dropdown">';
    echo '<div class="widget_shopping_cart_content "> ';
	// woocommerce-mini-cart-item mini_cart_item

	woocommerce_mini_cart();
//     echo '</div>';
    echo '</div> </div>';
}
add_shortcode( 'quadlayers-mini-cart', 'custom_mini_cart' );

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

/**
 * Custom woo functions
 */
require_once get_template_directory() . '/costume-functions/costume-woo-functions.php';
function update_cart_quantity() {
	check_ajax_referer('custom_mini_cart_nonce', 'nonce');

	$cart_key = sanitize_text_field($_POST['cart_key']);
	$update_action = sanitize_text_field($_POST['update_action']);
	$cart_item = WC()->cart->get_cart_item($cart_key);

	if ($cart_item) {
		if ($update_action === 'increase') {
			WC()->cart->set_quantity($cart_key, $cart_item['quantity'] + 1);
		} elseif ($update_action === 'decrease') {
			WC()->cart->set_quantity($cart_key, max(1, $cart_item['quantity'] - 1));
		}
	}

	// Output the updated mini cart
	// custom_mini_cart();
	woocommerce_mini_cart();

	wp_die();
}
add_action('wp_ajax_update_cart_quantity', 'update_cart_quantity');
add_action('wp_ajax_nopriv_update_cart_quantity', 'update_cart_quantity');

function custom_content_after_breadcrumb() {
    if ( is_product_category() ) {

		$current_category = get_queried_object();
		//print_r($current_category);
// Check if it's a category page
	if (is_a($current_category, 'WP_Term') && taxonomy_exists('product_cat')) {
		// Get the term ID of the current category
		$term_id = $current_category->term_id;

		// Output the term ID
		$category_thumbnail = get_term_meta($term_id, 'thumbnail_id', true);

	}
       ?>
        <div class="hl__collection-image hl__collection_banner">
            <div class="hl__collection-image-back">
			<?php echo wp_get_attachment_image($category_thumbnail, 'full'); ?>
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
				<div class="col-auto">
					<div class="hl__collection-image-title">"<?php echo $current_category->name; ?>"</div>
				</div>
                </div>
          </div>
        </div>
        <?php
    }
}
add_action('woocommerce_before_main_content', 'custom_content_after_breadcrumb',21);

/*removed title from shipping plugin array  */
function change_globle_var($arr) {
    $arr['fields_title'] = wcus_i18n('');
	$arr['shipping_type_warehouse'] = wcus_i18n('Ukrposhta');
	$arr['shipping_type_doors'] = wcus_i18n('New post');

    return $arr;
}
 add_filter( 'wcus_checkout_i18n', 'change_globle_var', 10, 1 );

/*in checkout page  */
function wpdocs_js_code_example() {
  if(is_checkout()){
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("form").keypress(function(e) {
			//Enter key
					if (e.which == 13) {
						return false;
					}
			});
      });
	</script>
	<?php
 }
}
add_action( 'wp_footer', 'wpdocs_js_code_example' );