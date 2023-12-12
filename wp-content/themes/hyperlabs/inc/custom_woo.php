<?php
/**
 * Post per page for archive
 */
function hyperlabs_set_posts_per_page_for_archive( $query ) {
	if ( !is_admin() && $query->is_main_query() && is_archive() && !is_shop() ) {
		$query->set( 'posts_per_page', 9 );
	}
	if ( !is_admin() && $query->is_main_query() && is_archive() && is_shop() ) {
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
		if ( isset( $_GET['filter_price'] )) {
            $filter_price   = isset($_GET['filter_price']) ? $_GET['filter_price'] : '0';
            if ($filter_price != 0 && !empty($filter_price)) {
                    $price_array =  explode("-",$filter_price);
                    $meta_query[] = array(
                        'key'     => '_price',
                        'value'   => array($price_array[0], $price_array[1] ),
                        'type'    => 'NUMERIC',
                        'compare' => 'BETWEEN',
                    );
                    $query->set( 'meta_query', $meta_query );
           }
		}
	}
}
add_action( 'pre_get_posts', 'hyperlabs_set_posts_per_page_for_archive' );

add_filter( 'use_widgets_block_editor', '__return_false' );	
/*shop page **********************************/
// remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

/* defulat  filter wrapper */
add_action( 'woocommerce_before_shop_loop', 'custom_woocommerce_catalog_ordering_wrap_start', 29 );
function custom_woocommerce_catalog_ordering_wrap_start(){
  echo '<div class="col-md-auto col-12">';

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
             <div class="filter_body">';
                <form action="#" method="get">

                   <fieldset>
                      <legend>Categories:</legend>
                       <?php
                        $terms_cat = get_terms( array(
                            'taxonomy' => 'product_cat',  // Replace with your actual attribute taxonomy
                            'hide_empty' => true,
                        ) );
                        foreach ($terms_cat as $cat) {
                        $checked = (isset($_GET['cat']) && in_array($cat->slug, (array)$_GET['cat'])) ? 'checked' : '';
                        echo '<label><input type="checkbox" name="cat[]" value="' . esc_attr($cat->slug) . '" ' . $checked . '> ' . esc_html($cat->name) . '</label><br>';
                        }
                        ?>
                   </fieldset>
                    <fieldset>
                    <?php  $filter_price = isset($_GET['filter_price']) ? $_GET['filter_price'] : '0 - 5000';?>
                        <input type="text" id="filter_price" name="filter_price" value="<?php echo $filter_price; ?>" readonly style="border:0; color:#f6931f; font-weight:bold;">
                       <div class="ctc-slider-range" id="slider-range"></div>
                     </fieldset>
                    <fieldset>
                      <legend>Size:</legend>
                       <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'pa_size',  // Replace with your actual attribute taxonomy
                            'hide_empty' => false,
                        ) );
                        foreach ($terms as $term) {
                        $checked = (isset($_GET['size']) && in_array($term->slug, (array)$_GET['size'])) ? 'checked' : '';
                        echo '<label><input type="checkbox" name="size[]" value="' . esc_attr($term->slug) . '" ' . $checked . '> ' . esc_html($term->name) . '</label><br>';
                        }
                       echo ' <label><input type="checkbox" name="size[]" value="" ' . $checked . '> All</label><br>';
                       ?>
                   </fieldset>
                   <fieldset>
                      <legend>Color:</legend>
                       <?php
                        $terms_color = get_terms( array(
                            'taxonomy' => 'pa_color',  // Replace with your actual attribute taxonomy
                            'hide_empty' => false,
                        ) );
                        foreach ($terms_color as $color) {
                        $checked = (isset($_GET['color']) && in_array($color->slug, (array)$_GET['color'])) ? 'checked' : '';
                        echo '<label><input type="checkbox" name="color[]" value="' . esc_attr($color->slug) . '" ' . $checked . '> ' . esc_html($color->name) . '</label><br>';
                        }
                        echo ' <label><input type="checkbox" name="color[]" value="" ' . $checked . '> All</label><br>';
                        ?>
                   </fieldset>

                 
                  <input type="submit" value="Save changes">
                </form>
            </div>
      </div>
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
		'popularity' => __( 'Popularity', 'woocommerce' ),
		'price-desc' => __( 'price: high to low', 'woocommerce' ),
		'price'      => __( 'price: low to high', 'woocommerce' ), // I need sorting by price to be the first
		'date'       => __( 'New', 'woocommerce' ), // Let's make "Sort by latest" the second one
		'menu_order' => __( 'All', 'woocommerce' ), // you can change the order of this element too
	);
	return $options;
}

