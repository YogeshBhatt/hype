<?php
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
	$productId = get_the_ID();
	echo '<button class= "hl__button hl__button--green hl_button_bg__white mt-4 add-to-wishlist" data-product-id="'.$productId.'">Додати в обране</button>';
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
					$productid = $product->id;
					$brand_terms = get_the_terms($productid, $value['name'] );
			
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
						<p class="single_product_size single__product_color selected_attribute_list right-arrow <?php echo $value['name'];?>" data-attr-color="<?php echo $default_variation_attributes[$value['name']]; ?>" data-attribute-list="<?php echo $value['name'];?>"><?php echo $name;?>:<span class="color" style="background-color: <?php if(isset($default_variation_attributes[$value['name']])) echo $default_variation_attributes[$value['name']]; else echo '';?>"></span></p>
					<?php endif;?>
				<?php }?>
			<?php //} ?>

			<?php //if(!empty($color_attribute_value)){ ?>
            <!-- <p class="single__product_color selected_attribute_list right-arrow" data-attribute-list="color">Колір:<span><?php //echo $default_variation_attributes['color'];?></span></p> -->
			<?php //} ?>

        </div>
    </div>

    <div class="hl__filter d-flex flex-column variation_popup" id="single_attribute">
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