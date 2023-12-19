<?php

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
/**
 * Post per page for archive
 */

 function hook_css() {
    if ( !is_admin() && is_product_category() ) {
       ?>
        <div class="hl__collection-image">
            <div class="hl__collection-image-back">
                <img src="http://122.170.110.131:9106/wp-content/uploads/2023/11/swiper-small-img2.png" alt="collection image">
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                    <div class="hl__collection-image-title"><?php wp_title(); ?></div>
                </div>
                </div>
          </div>
        </div>
        <?php
    }
}
add_action('wp_head', 'hook_css');

function hyperlabs_set_posts_per_page_for_archive( $query ) {
	if ( !is_admin() && $query->is_main_query() && is_archive() && !is_shop() ) {
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


	if ( !is_admin() && $query->is_main_query() && is_archive() && is_shop() ) {
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
                                        echo ' <div class="swiper-slide" > <label class="hl__filter-category-item d-flex align-items-center"><input type="checkbox" class="hl__filter-category-item-checkbox"  name="size[]" value="" ' . $checked . '>  <div class="hl__filter-category-item-custom-checkbox"></div>
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

/*checkout page start */
add_filter( 'woocommerce_order_button_text', 'wc_custom_order_button_text' ); 

function wc_custom_order_button_text() {
    return __( 'Перейти до оплати', 'woocommerce' ); 
}

add_filter( 'woocommerce_checkout_fields', 'custom_hook_checkout_fields' );
function custom_hook_checkout_fields( $checkout_fields ) {
   

  unset($checkout_fields['billing']['billing_company']); 
  unset($checkout_fields['billing']['billing_address_2']); 
  unset($checkout_fields['billing']['billing_city']); 
  unset($checkout_fields['billing']['billing_state']);
  unset($checkout_fields['order']['order_comments']);
  //unset($checkout_fields['billing']['billing_postcode']);

  $checkout_fields['billing']['billing_address_1']['label'] = 'Street / House number / Apartment number';

  

  $checkout_fields[ 'billing' ][ 'billing_country' ][ 'priority' ] = 6;
  $checkout_fields[ 'billing' ][ 'billing_address_1' ][ 'priority' ] = 30;
  $checkout_fields[ 'billing' ][ 'billing_phone' ][ 'priority' ] = 40;

  //required

  $checkout_fields['billing']['billing_email']['required'] = false;
  $checkout_fields['billing']['billing_country']['required'] = false;
  $checkout_fields['billing']['billing_phone']['required'] = true;
  $checkout_fields['billing']['billing_first_name']['required'] = true;
  $checkout_fields['billing']['billing_last_name']['required'] = true;
  $checkout_fields['billing']['billing_address_1']['required'] = false;


  $checkout_fields['billing']['billing_backyard'] = array(
    'label'       => __('Backyard', 'woocommerce'),
    'placeholder' => _x('Select', 'placeholder', 'woocommerce'),
    'required'    => true,
    'clear'       => false,
    'priority'    =>41,
    'type'        => 'select',
    'options'     => array(
        ''          => __('Select', 'woocommerce'),
        'eat-meat' => __('Warsaw', 'woocommerce' ),
        'not-meat' => __('Warsaw 2', 'woocommerce' )
        )
    );
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
} */

add_action('woocommerce_review_order_before_payment','save_address_details_show');
function save_address_details_show(){ ?>
  <h2><b>Адреса доставки</b></h2>
   <p id="save_name"></p>
   <p id="save_address"></p>
   <p id="save_number"></p>
   <p id="save_email"></p>
   <?php
} 

add_action( 'woocommerce_before_checkout_form', 'custom_brudcrum_checkout_page', 9 );
function custom_brudcrum_checkout_page(){ ?>
      <h3>
        <a href="#"><span id="delivery_info" style="color:black">Iнформація про доставку</span ></a>
        <span id="delivery_payment_info" style="color:gray" > > Оплата</span>
      </h3>
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
    ), $checkout->get_value( '_custom_bonus_code_field_name' ) );

    woocommerce_form_field( 'bill_index_field_name', array(
        'type'          => 'text',
        'label'         => __('index', $domain ),
        'class'         => array('form-row'),
        'priority'      =>109,
    ), $checkout->get_value( 'bill_index_field_name' ) );

    woocommerce_form_field( 'custom_checkout_radio', array(
        'type' => 'radio',
        'class' => array( 'form-row' ),
        'label'         => __('', $domain ),
        'options' => array('option_one' => 'Ukrposhta','option_two' => 'New post',),
        'priority'      =>7,
        'default'  => 'option_one',
        ), $checkout->get_value('custom_checkout_radio'));
    
}
// Save custom checkout fields the data to the order
add_action( 'woocommerce_checkout_create_order', 'custom_checkout_field_update_meta', 10, 2 );
function custom_checkout_field_update_meta( $order, $data ){
    if( isset($_POST['bill_custom_bonus_code_field_name']) && ! empty($_POST['bill_custom_bonus_code_field_name']) ){
        $order->update_meta_data( 'bill_custom_bonus_code_field_name', sanitize_text_field( $_POST['bill_custom_bonus_code_field_name'] ) );
    }
    if( isset($_POST['custom_checkout_radio']) && ! empty($_POST['custom_checkout_radio']) ){
        $order->update_meta_data( 'custom_checkout_radio', sanitize_text_field( $_POST['custom_checkout_radio'] ) );
    }
    if( isset($_POST['bill_index_field_name']) && ! empty($_POST['bill_index_field_name']) ){
        $order->update_meta_data( 'bill_index_field_name', sanitize_text_field( $_POST['bill_index_field_name'] ) );
    }
    if( isset($_POST['billing_backyard']) && ! empty($_POST['billing_backyard']) ){
        $order->update_meta_data( 'billing_backyard', sanitize_text_field( $_POST['billing_backyard'] ) );
    }
}



