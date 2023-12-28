<?php
/**
 * Post per page for archive
 */

 add_filter('woocommerce_get_breadcrumb', 'customize_woocommerce_breadcrumbs', 10, 2);
function customize_woocommerce_breadcrumbs($crumbs, $breadcrumb) {
    if (count($crumbs) > 1 && 'Shop' === $crumbs[1][0]) {
        $crumbs[0][0] = 'HYPELABS'; // Change 'Home' to 'HyperLab'
    }
    return $crumbs;
}
    
function hyperlabs_set_posts_per_page_for_archive( $query ) {
	if ( !is_admin() && $query->is_main_query() && is_archive() && !is_shop() && !is_product_category()) {
		$query->set( 'posts_per_page', 9 );
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        if(isset( $_GET['size'] ) || isset( $_GET['color'] ) ||  isset( $_GET['cat'] ) || isset( $_GET['min_price'] ) && isset( $_GET['max_price'] ))
        {
            $query->set( 'offset', 1 );
        }


	}

    if ( !is_admin() && $query->is_main_query() && is_archive() && is_product_category() ) {
        $query->set( 'posts_per_page', 12);
    }


	if ( (!is_admin() && $query->is_main_query() && is_archive() && is_shop()) || (!is_admin() && $query->is_main_query() && is_archive() && is_product_category()) ) {
        global $product;
		$query->set( 'posts_per_page', 12);

		// Check if the 'size' and 'color' and category parameters are set in the URL
        if ( isset( $_GET['size'] ) || isset( $_GET['color'] ) ||  isset( $_GET['cat'] ) ) {
            $tax_query = array('relation' => 'AND');
          // Size Range
            if ( isset( $_GET['size'] ) && ! empty( $_GET['size'] ) ) {
                $size_values = array_map( 'sanitize_text_field', (array) $_GET['size'] );
                $tax_query[] = array(
                    'taxonomy' => 'pa_size',
                    'field'    => 'slug',
                    'terms'    => $size_values,
                );
            }
			// Color Range
            if ( isset( $_GET['color'] ) && ! empty( $_GET['color'] )) {
                $color_values = array_map( 'sanitize_text_field', (array) $_GET['color'] );
                $tax_query[] = array(
                    'taxonomy' => 'pa_color',
                    'field'    => 'slug',
                    'terms'    => $color_values,
                );
            }
			// Cat Range
			if ( isset( $_GET['cat'] ) && ! empty( $_GET['cat'] )) {
                $cat_values = array_map( 'sanitize_text_field', (array) $_GET['cat'] );
                $tax_query[] = array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $cat_values,
                );
            }
            $query->set( 'tax_query', $tax_query );
        }
		// Price Range
		if ( isset( $_GET['min_price'] ) && isset( $_GET['max_price'] )) {
            //$filter_price   = isset($_GET['filter_price']) ? $_GET['filter_price'] : '0';
                   // $price_array =  explode("-",$filter_price);
            $meta_query[] = array(
                'key'     => '_price',
                'value'   => array($_GET['min_price'], $_GET['max_price'] ),
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            );
            $query->set( 'meta_query', $meta_query );
		}

        // print_r($query);
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        if(isset( $_GET['size'] ) || isset( $_GET['color'] ) ||  isset( $_GET['cat'] ) || isset( $_GET['min_price'] ) && isset( $_GET['max_price'] ))
        {


            $query->set( 'paged', 1 );


        }

	}
}

// // Hook the custom redirect function to the template_redirect action
// add_action( 'template_redirect', 'custom_redirect_no_products' );
add_action( 'pre_get_posts', 'hyperlabs_set_posts_per_page_for_archive' );
add_filter( 'paginate_links', function($link){

    //Remove link page/1/ from the first element and prev element

    if(is_archive() && !is_shop()){
        $link= str_replace('page/1/', '', $link);
    }

    return $link;
} );
add_filter( 'use_widgets_block_editor', '__return_false' );
/*shop page **********************************/
// remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

/* defulat  filter wrapper */
add_action( 'woocommerce_before_shop_loop', 'custom_woocommerce_catalog_ordering_wrap_start', 29 );
function custom_woocommerce_catalog_ordering_wrap_start(){
  echo '<div class="col-md-auto col-12 hl__sort d-flex align-items-center"> <div class="hl__sort-text">Сортувати за:  </div>';

}
add_action( 'woocommerce_before_shop_loop', 'custom_woocommerce_catalog_ordering_wrap_end', 31 );
function custom_woocommerce_catalog_ordering_wrap_end(){
    echo '</div>';
}

/*custom attribute filter on shop page */
add_action( 'woocommerce_before_shop_loop', 'woocommerce_custom_filter', 20 );
function woocommerce_custom_filter(){
    echo '<div class="shop_custom_filter col-md-auto col-12">';
    echo '<div class="hl__filter-button d-flex align-items-center">
        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="1" y="2" width="20" height="2" fill="black"/>
            <rect x="1" y="12" width="20" height="2" fill="black"/>
            <circle cx="3" cy="3" r="3" fill="black"/>
            <circle cx="19" cy="13" r="3" fill="black"/>
        </svg>
        <span>Фільтр</span> </div>';
    echo '</div>';
}

// Get the minimum and maximum product prices
function get_min_max_product_prices() {
    global $wpdb;

    // Query to get the minimum and maximum prices from the post meta table
    $query = "
        SELECT MIN(meta_value) as min_price, MAX(meta_value) as max_price
        FROM {$wpdb->prefix}postmeta
        WHERE meta_key = '_price'
            AND post_id IN (
                SELECT post_id
                FROM {$wpdb->prefix}postmeta
                WHERE meta_key = '_price'
            )
    ";

    // Execute the query
    $result = $wpdb->get_row($query);

    // Return the result
    return $result;
}

/* custom and defult filter wrap*/
add_action( 'woocommerce_before_shop_loop', 'woocommerce_custom_filter_and_deafult_filter_wrapper_start', 19 );
function woocommerce_custom_filter_and_deafult_filter_wrapper_start(){ ?>
   <div class="hl__filter d-flex flex-column">
       <div class="hl__filter-top col-auto d-flex justify-content-end">
            <div class="hl__filter-close">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2.75 2.75001L27.25 27.25M2.75005 27.25L15 15L27.25 2.75" stroke="#939393" stroke-width="2.6" stroke-linecap="square"/>
                  </svg>
            </div>
        </div>

        <form action="#" method="get" class="hl__filter-content col d-flex flex-column justify-content-between">
                <input type="hidden" val="" name=""/>
                <div class="hl__filter-wrap">
                    <div class="hl__filter-block">
                        <div class="row gx-0 align-items-center justify-content-between">
                            <div class="col-auto">
                                <h2>Фільтр</h2>
                            </div>
                            <div class="col-auto">
                            <?php if (!empty($_GET)) { ?>
                                <a class="hl__filter-clear" id="clearFormButton" href="<?php echo site_url('shop');?>">Скинути</a>
                            <?php }else{ ?>
                                <a class="hl__filter-clear" id="clearFormButton" href="javascript:void(0)">Скинути</a>
                                <?php } ?>
                        </div>
                        </div>
                    </div>

                    <div class="hl__filter-block">
                        <div class="hl__filter-block-header">КАТЕГОРІЯ:</div>
                        <div class="swiper swiper__filter-category swiper-initialized swiper-horizontal swiper-backface-hidden">
                            <div class="swiper-wrapper">

                                    <?php
                                        $terms_cat = get_terms( array(
                                            'taxonomy' => 'product_cat',  // Replace with your actual attribute taxonomy
                                            'hide_empty' => true,
                                        ) );
                                        foreach ($terms_cat as $cat) {
                                        $checked = (isset($_GET['cat']) && in_array($cat->slug, (array)$_GET['cat'])) ? 'checked' : '';
                                        echo ' <div class="swiper-slide"> <label class="hl__filter-category-item d-flex align-items-center">
                                        <input class="hl__filter-category-item-checkbox" type="checkbox" name="cat[]" value="' . esc_attr($cat->slug) . '" ' . $checked . '> <div class="hl__filter-category-item-custom-checkbox"> </div><div class="hl__filter-category-item-text"> ' . esc_html($cat->name) . '
                                        </div></label> </div>';
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>

                    <div class="hl__filter-block">
                        <div class="hl__filter-block-header">ЦІНА:</div>

                        <div class="hl__filter-block-content">
                            <div class="hl__range-slider row gx-0 align-items-center">

                                <?php $price_limits = get_min_max_product_prices(); ?>
                                <?php
                                // $min_price = get_minimum_product_price();
                                // $min =wc_price($min_price);
                                // $max_price = get_maximum_product_price();
                                // $max =wc_price($max_price);
                                $minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : $price_limits->min_price;
                                $maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : $price_limits->max_price;?>

                                <div class="col-auto d-flex">
                                    <input type="text" class="hl__range-slider-input" data-min-price="<?php echo $price_limits->min_price; ?>" id="filter_price" name="min_price" value="<?php echo $minPrice; ?>" readonly style="border:0; color:#fff;">
                                    <div class="currency-value-min text-white"></div>
                                    <span class="currency text-white"></span>

                                    <!-- <input type="text" id="hl__range-slider-min" class="hl__range-slider-input" readonly=""> -->
                                </div>

                                <div class="col">
                                    <div class="ctc-slider-range noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr" id="slider-range"></div>
                                </div>

                                <div class="col-auto d-flex justify-content-end">
                                    <input type="text" class="hl__range-slider-input text-end" data-max-price="<?php echo $price_limits->max_price; ?>" id="filter_price_max" name="max_price" value="<?php echo $maxPrice; ?>" readonly style="border:0; color:#fff; ">
                                    <div class="currency-value-max text-white"></div>
                                    <span class="currency text-white"></span>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="hl__filter-block">
                        <div class="hl__filter-block-header">РОЗМІР:</div>
                        <div class="hl__filter-block-content">
                            <div class="swiper swiper__filter-size swiper-initialized swiper-horizontal swiper-backface-hidden">
                                <div class="swiper-wrapper">
                                    <?php
                                        $terms = get_terms( array(
                                            'taxonomy' => 'pa_size',  // Replace with your actual attribute taxonomy
                                            'hide_empty' => true,
                                        ) );
                                        foreach ($terms as $term) {
                                        $checked = (isset($_GET['size']) && in_array($term->slug, (array)$_GET['size'])) ? 'checked' : '';
                                        echo '
                                        <div class="swiper-slide" >
                                            <label class="hl__filter-category-item d-flex align-items-center">
                                                <input class="hl__filter-category-item-checkbox"  type="checkbox" name="size[]" value="' . esc_attr($term->slug) . '" ' . $checked . '>
                                                <div class="hl__filter-category-item-custom-checkbox"></div>
                                                <div class="hl__filter-category-item-text">' . esc_html($term->name) . ' </div>
                                            </label>
                                        </div>';
                                        }
                                        echo ' <div class="swiper-slide" > <label class="hl__filter-category-item d-flex align-items-center"><input type="checkbox" class="hl__filter-category-item-checkbox" value="All" ' . $checked . '>  <div class="hl__filter-category-item-custom-checkbox"></div>
                                        <div class="hl__filter-category-item-text"> All </div></label> </div>';
                                        ?>


                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="hl__filter-block">
                        <div class="hl__filter-block-header">КОЛІР:</div>
                        <div class="hl__filter-block-content">
                            <div class="hl__filter-color d-grid">

                                <?php
                                $terms_color = get_terms( array(
                                    'taxonomy' => 'pa_color',  // Replace with your actual attribute taxonomy
                                    'hide_empty' => true,
                                ) );
                                foreach ($terms_color as $color) {
                                $checked = (isset($_GET['color']) && in_array($color->slug, (array)$_GET['color'])) ? 'checked' : '';
                                echo '<label class="hl__filter-color-item"><input class="hl__filter-color-item-checkbox" type="checkbox" name="color[]" value="' . esc_attr($color->slug) . '" ' . $checked . '> <div class="hl__filter-color-item-checkmark" style="background-color: '. esc_html($color->name) .'"> </div> </label>';
                                }
                            // echo ' <label class="hl__filter-color-item"><input class="hl__filter-color-item-checkbox"  type="checkbox" name="color[]" value="" ' . $checked . '> <div class="hl__filter-color-item-checkmark" style="background-color: #262626"></div> All</label>';
                                ?>
                            </div>
                        </div>

                    </div>
                </div>

                <?php  if(isset($_GET['orderby'])){ ?>
                <input type="hidden" name="orderby" value="<?php echo $_GET['orderby']; ?>" />
                <?php } ?>
                <input type="hidden" name="paged" value="1" />
                <?php  if(isset($_GET['s'])){ ?>
                <input type="hidden" name="s" value="<?php echo $_GET['s']; ?>" />
                <?php } ?>
                <?php  if(isset($_GET['post_type'])){ ?>
                <input type="hidden" name="post_type" value="<?php echo $_GET['post_type']; ?>" />
                <?php } ?>

                <button type="submit" class="hl__button hl__button--green hl__button--full"> Зберегти зміни</button>

        </form>
    </div>

  <div class="filter_wrapper row align-items-center justify-content-between">
 <?php
}

add_action( 'woocommerce_before_shop_loop', 'woocommerce_custom_filter_and_deafult_filter_wrapper_end', 32 );
function woocommerce_custom_filter_and_deafult_filter_wrapper_end(){
    echo '</div>';
}

/* Defualt sorting option chnage */
add_filter( 'woocommerce_catalog_orderby', 'custom_change_sorting_options_order', 5 );
function custom_change_sorting_options_order( $options ){
	$options = array(
		'popularity' => __( 'Популярністю', 'woocommerce' ),
		'price-desc' => __( 'Ціна: від високої до низької', 'woocommerce' ),
		'price'      => __( 'Ціна: від низької до високої', 'woocommerce' ), // I need sorting by price to be the first
		'date'       => __( 'Нове', 'woocommerce' ), // Let's make "Sort by latest" the second one
		'menu_order' => __( 'Всі', 'woocommerce' ), // you can change the order of this element too
	);
	return $options;
}

/*custom relted product count */
function custom_related_products_args( $args ) {
    $args['posts_per_page'] = -1; // Set to -1 to display all related products
    return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'custom_related_products_args' );

/*remove tabs from single product page */
function custom_remove_product_tabs($tabs) {
    unset($tabs['description']);
    unset($tabs['additional_information']);
    unset($tabs['reviews']);
    return $tabs;
}
add_filter('woocommerce_product_tabs', 'custom_remove_product_tabs', 98);

/*remove metas from single product page*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/*sku display before product title in */
function custom_display_sku_before_title() {
    global $product;
    if ($product) {
        $sku = $product->get_sku();
        if (!empty($sku)) {
            echo '<span class="product-sku"> <strong>' . esc_html__('Код продукту: ', 'your-theme-textdomain') . '</strong>' . esc_html($sku) . '</span>';
        }
    }
}
add_action('woocommerce_single_product_summary', 'custom_display_sku_before_title', 4);

function mobile_custom_display_sku_before_title() {
    global $product;
    if ($product) {
        $sku = $product->get_sku();
        if (!empty($sku)) {
            echo '<span class="product-sku d-none phone-product-sku "> <strong>' . esc_html__('Код продукту: ', 'your-theme-textdomain') . '</strong>' . esc_html($sku) . '</span>';
        }
    }
}
add_action('woocommerce_single_product_summary', 'mobile_custom_display_sku_before_title', 6);

/*add text befor price single product page */
function custom_add_text_before_price($price, $product) {
    $text_before_price = 'Price ';
    return $text_before_price . $price;
}

add_filter('woocommerce_get_price_html', 'custom_add_text_before_price', 10, 2);


// add_action('woocommerce_no_products_found','wc_no_products_found_custom_html',10);


/*variation price replace with price */
add_action( 'woocommerce_variable_add_to_cart', 'custom_update_price_with_variation_price' );
function custom_update_price_with_variation_price() {
   global $product;
   $price = $product->get_price_html();
   wc_enqueue_js( "
      $(document).on('found_variation', 'form.cart', function( event, variation ) {
         if(variation.price_html) $('.summary > p.price').html(variation.price_html);
      });
      $(document).on('hide_variation', 'form.cart', function( event, variation ) {
         $('.summary > p.price').html('" . $price . "');
      });
   " );
}

/*short description */
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
add_action('woocommerce_single_product_summary','custon_woocommerce_template_single_excerpt',20);
function custon_woocommerce_template_single_excerpt(){
    global $product;
    $description = $product->get_description();
    $short_description = $product->get_short_description();
    echo '<div class="desktop_discription">';
    if(!empty($description)){
        echo '<h2 class="title">Опис</h2>';
        echo '<div class="description">'.$description.'</div>';
    }
    if(!empty($description)){
        echo '<div class="warehouse_product"><h2 class="title mt-4">Склад продукту</h2>';
        echo '<div class="description">'.$short_description.'</div> </div>';
    }
   echo '</div>';

}
add_action('woocommerce_after_add_to_cart_form','mobile_woocommerce_template_single_excerpt',30);
function mobile_woocommerce_template_single_excerpt(){
    global $product;
    $description = $product->get_description();
    $short_description = $product->get_short_description();

    echo '<div class="mobile_discription d-none accordion" id="accordionDiscription"> ';
        if(!empty($description)){
            echo'<div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">';
            echo 'Опис  </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionDiscription">
              <div class="accordion-body">';
            echo $description.' </div> </div> </div>';
        }
        if(!empty($description)){
            echo'<div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">';
            echo 'Склад продукту  </button> </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionDiscription"> <div class="accordion-body">';
            echo $short_description.'</div> </div> </div>';
        }
    echo '</div>';

}
add_action('woocommerce_single_product_summary', 'custom_breadcrum_for_mobile', 3);
function custom_breadcrum_for_mobile(){
    echo '<div class="mobile-breadcrumb">';
    woocommerce_breadcrumb();
    echo '</div>';
}
add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
    $with_html = "<div class='shipping_title'>Delivery  </div>";
    return $with_html;
}
/*checkout page start */
add_filter( 'woocommerce_order_button_text', 'wc_custom_order_button_text' );

function wc_custom_order_button_text() {
    return __( 'Перейти до оплати', 'woocommerce' );
}

add_filter( 'woocommerce_checkout_fields', 'custom_hook_checkout_fields' );
function custom_hook_checkout_fields( $checkout_fields ) {


  unset($checkout_fields['billing']['billing_company']);
  unset($checkout_fields['billing']['billing_address_1']);
  unset($checkout_fields['billing']['billing_address_2']);
  unset($checkout_fields['billing']['billing_city']);
  unset($checkout_fields['billing']['billing_state']);
  unset($checkout_fields['order']['order_comments']);

  $checkout_fields['billing']['billing_postcode']['label'] = 'index';

  $checkout_fields[ 'billing' ][ 'billing_country' ][ 'priority' ] = 6;
  $checkout_fields[ 'billing' ][ 'billing_phone' ][ 'priority' ] = 40;

  //required
  $checkout_fields['billing']['billing_email']['required'] = true;
  $checkout_fields['billing']['billing_postcode']['required'] = false;
  $checkout_fields['billing']['billing_phone']['required'] = true;
  $checkout_fields['billing']['billing_first_name']['required'] = true;
  $checkout_fields['billing']['billing_last_name']['required'] = true;

  return $checkout_fields;
}

/* Limit Woocommerce phone field to 10 digits number
add_action('woocommerce_checkout_process', 'custom_checkout_field_process');
function custom_checkout_field_process() {
    global $woocommerce;
    $pattern = '/^\+\d{2}\s\d{3}\s\d{3}\s\d{3}$/';
    if (!(preg_match($pattern, $_POST['billing_phone'] ))){
        wc_add_notice( "Incorrect Phone Number! Please enter valid phone number"  ,'error' );
    }
}  */

add_action('woocommerce_review_order_before_payment','save_address_details_show');
function save_address_details_show(){ ?>
<div class="hl_delivery_address">
    <h2 class="title">Адреса доставки</h2>
    <p id="save_name"></p>
    <p id="save_address"></p>
    <p id="save_number"></p>
    <p id="save_email"></p>

</div>
   <?php
}

add_action( 'woocommerce_before_checkout_form', 'custom_brudcrum_checkout_page', 9 );
function custom_brudcrum_checkout_page(){ ?>
      <div class="hl__breadcrumbs breadcrumbs_checkout">
        <a href="#"><span id="delivery_info" style="color:black">Iнформація про доставку</span ></a>
        <span class="icon">
            <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 8L1.24343 0L0 1.136L3.01226 3.872L7.53065 8L3.01226 12.128L0.0175129 14.864L1.26095 16L10 8Z" fill="black"/>
            </svg>
        </span>
        <span id="delivery_payment_info"> Оплата</span>
      </div>
 <?php }

/*add new bonus code field */
add_action( 'woocommerce_checkout_before_customer_details', 'custom_checkout_fields_before_billing_details', 5 );
function custom_checkout_fields_before_billing_details(){
    $domain = 'woocommerce';
    $checkout = WC()->checkout;
    woocommerce_form_field( 'bill_custom_bonus_code_field_name', array(
        'type'          => 'text',
        'label'         => __('Enter the bonus code', $domain ),
        'class'         => array('form-row'),
        'priority'      =>5,
    ), $checkout->get_value( 'bill_custom_bonus_code_field_name' ) );
}
// Save custom checkout fields the data to the order
add_action( 'woocommerce_checkout_create_order', 'custom_checkout_field_update_meta', 10, 2 );
function custom_checkout_field_update_meta( $order, $data ){
    if( isset($_POST['bill_custom_bonus_code_field_name']) && ! empty($_POST['bill_custom_bonus_code_field_name']) ){
        $order->update_meta_data( 'bill_custom_bonus_code_field_name', sanitize_text_field( $_POST['bill_custom_bonus_code_field_name'] ) );
    }
}
/* this billing field show on admin side */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta( $order ){
    $bill_custom_bonus_code_field_name = $order->get_meta('bill_custom_bonus_code_field_name'); // Get custom field value

    if( ! empty( $billing_cif ) ) {
        echo '<p><strong>'.__('Bonus code').':</strong><br>' . $bill_custom_bonus_code_field_name . '</p>';
    }
}

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

  /*removed title from shipping plugin array  */
function change_globle_var($arr) {
    $arr['fields_title'] = wcus_i18n('');
	$arr['shipping_type_warehouse'] = wcus_i18n('Ukrposhta');
	$arr['shipping_type_doors'] = wcus_i18n('New post');

    return $arr;
}
 add_filter( 'wcus_checkout_i18n', 'change_globle_var', 10, 1 );


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

/*my-account-page start ************************************************************/

//Add a new endpoint to the My Account page
function custom_panel_endpoint() {
    add_rewrite_endpoint('selected-products', EP_ROOT | EP_PAGES);
    //add_rewrite_endpoint('custom-order', EP_ROOT | EP_PAGES);
}
add_action('init', 'custom_panel_endpoint');

// Add a new link to the My Account menu
function custom_panel_link($menu_links) {
    $newitems = array(
        'edit-address'       => __( 'Personal office', 'woocommerce' ),
        'orders'             => __( 'Order history', 'woocommerce' ),
        'selected-products'  => __( 'Selected products', 'woocommerce' ),
        'edit-account'       => __( 'Password', 'woocommerce' ),
     ); 
     return $newitems;
   
}
add_filter('woocommerce_account_menu_items', 'custom_panel_link',9999);


/*edit-address redirection */
function redirect_to_billing( $wp ) {
    $current_url = home_url(add_query_arg(array(),$wp->request));
    $billing = home_url('/my-account/edit-address/billing');
    /** If user is accessing edit-address endpoint and it's not the billing address**/
    if(is_wc_endpoint_url('edit-address') && $current_url !== $billing){ 
        wp_redirect($billing);
        exit();
    }
}
add_action( 'parse_request', 'redirect_to_billing' , 10);

// billing field for my-account page only
add_filter(  'woocommerce_billing_fields', 'custom_billing_fields', 20, 1 );
function custom_billing_fields( $fields ) {
    // Only on account pages
    if( ! is_account_page() ) return $fields;

    unset($fields['billing_company']);
    ## ---- 2.  Sort billing email and phone fields ---- ##
    $fields['billing_phone']['priority'] = 25;
    $fields['billing_phone']['class'] = array('form-row-last');
    $fields['billing_email']['priority'] = 29;
    $fields['billing_email']['class'] = array('form-row-first');
   
    return $fields;
}
add_filter(  'woocommerce_default_address_fields', 'custom_default_address_fields', 20, 1 );
function custom_default_address_fields( $fields ) {
    // Only on account pages
    if( ! is_account_page() ) return $fields;
    unset($fields['address_2']);
    // Set the order (sorting fields) in the array below
    $sorted_fields = array('first_name','last_name','country','postcode','state','city','address_1');
    $new_fields = array();
    $priority = 0;
    // Reordering billing and shipping fields
    foreach($sorted_fields as $key_field){
        $priority += 10;
        $new_fields[$key_field] = $fields[$key_field];
        $new_fields[$key_field]['priority'] = $priority;
    }
    return $new_fields;
}

//=============================28-12-2023==============================================

//Display list of filters
add_action('woocommerce_before_account_orders', 'custom_order_filter_fun');
function custom_order_filter_fun($has_orders){
if ( $has_orders ) : 
	$order_statuses = array(
        // 'wc-pending'    => _x( 'Pending payment', 'Order status', 'woocommerce' ),
        //'wc-processing' => _x( 'Processing', 'Order status', 'woocommerce' ), //In the way
        //'wc-on-hold'    => _x( 'On hold', 'Order status', 'woocommerce' ),
        'wc-completed'  => _x( 'Delivered', 'Order status', 'woocommerce' ), //Delivered
        'wc-cancelled'  => _x( 'Cancelled', 'Order status', 'woocommerce' ), //Cancelled
        //'wc-refunded'   => _x( 'Refunded', 'Order status', 'woocommerce' ),
        //'wc-failed'     => _x( 'Failed', 'Order status', 'woocommerce' ),
		'wc-processing'  => _x( 'Paid', 'Order status', 'woocommerce' ), 
		'wc-processing_dublicate'  => _x( 'In the way', 'Order status', 'woocommerce' ), 
    ); ?>
	<div class="hl__account-history-sort d-grid align-items-center">
            <div class="hl__account-history-sort-text">Sort by:</div>
                <div class="hl__account-history-sort-content">
                    <div class="swiper swiper__account-history-sort" id="filter_order_history">
                            <div class="swiper-wrapper">
                            <div class="swiper-slide filter_status_name">

                                <a href="#" class="hl__account-history-sort-item <?php echo (!$_GET['order_status'] || $_GET['order_status'] == 'all') ? 'active' : '' ; ?>" data="<?php echo 'all';?>">All</a>
                            </div>
                            <?php foreach($order_statuses as $key => $val_name){ ?>
                                    <div class="swiper-slide filter_status_name">
                                        <a
											class="hl__account-history-sort-item <?php echo $_GET['order_status'] == $key ? 'active' : '' ; ?>"
											href="#"
											data-param="<?php echo $_GET['order_status'];?>"
											data="<?php echo $key;?>"
										><?php echo $val_name;?></a>
                                    </div>
                            <?php } ?>
                        </div>
                </div>
            </div>
        </div>
<?php endif ?>
<?php
}

//orders query listen to URL parameter
add_filter( 'woocommerce_my_account_my_orders_query', 'bbloomer_my_account_orders_filter_by_status' );
function bbloomer_my_account_orders_filter_by_status( $args ) {
	if(isset($_GET['order_status']) && !empty($_GET['order_status']) && $_GET['order_status'] != 'all'){
		$order_status_get = $_GET['order_status'];
		$order_status_replace = str_replace("_dublicate"," ",$order_status_get); //for 2 time process
		$order_status = array($order_status_replace);
	}else{
		//$order_status = array_keys( wc_get_order_statuses() );
		$order_status = array('wc-completed','wc-cancelled','wc-processing');
	}
    $args['status'] = $order_status;
   return $args;
}

//My Account Orders Pagination fix
// add_filter( 'woocommerce_get_endpoint_url', 'my_account_orders_filter_by_status_pagination', 9999, 4 );
// function my_account_orders_filter_by_status_pagination( $url, $endpoint, $value, $permalink ) {
//    if ( 'orders' == $endpoint && isset( $_GET['order_status'] ) && ! empty( $_GET['order_status'] ) ) {

//     echo $permalink;
//       return add_query_arg( 'order_status', $_GET['order_status'], $url );
//    }
//    return $url;
// }

function custom_pagination_base( $link ) {
    // Parse the URL to get its components
    $url_components = parse_url($link);
    parse_str($url_components['query'], $params);
    // Rearrange the parameters
    $page = isset($params['page']) ? $params['page'] : null;
    $filter_status = isset($_GET['order_status']) ? $_GET['order_status'] : null;
    
    // Rebuild the URL
    $new_query = http_build_query(array('page' => $page, 'order_status' => $filter_status));
    $new_url = $url_components['path'] . '?' . $new_query;

    return $new_url;
}

add_filter('paginate_links', 'custom_pagination_base');

/*not requird fields in edit-account panel in my account page*/
add_filter( 'woocommerce_save_account_details_required_fields', 'misha_myaccount_required_fields' );
function misha_myaccount_required_fields( $account_fields ) {
	unset( $account_fields[ 'account_last_name' ] );
	unset( $account_fields[ 'account_first_name' ] ); 
	unset( $account_fields[ 'account_display_name'] );
    unset( $account_fields[ 'account_email'] ); 
	return $account_fields;
} 



