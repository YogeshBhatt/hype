jQuery(document).ready(function($) {
// Quantity Increase Button Click Event
$(document).on('click', '.quantity-increase', function(e) {
//   $('.quantity-increase').off('click').on('click', function(e) {
    e.preventDefault();
    var cartKey = $(this).data('cart-key');
    updateCartQuantity(cartKey, 'increase');
});

// Quantity Decrease Button Click Event (Assuming you have a similar block of code)
// $('.quantity-decrease').off('click').on('click', function(e) {
$(document).on('click', '.quantity-decrease', function(e) {
    e.preventDefault();
    var cartKey = $(this).data('cart-key');
    updateCartQuantity(cartKey, 'decrease');
});

// Function to Update Cart Quantity
function updateCartQuantity(cartKey, action) {
    var data = {
        action: 'update_cart_quantity',
        cart_key: cartKey,
        update_action: action,
        nonce: custom_mini_cart_params.nonce,
    };

    $.ajax({
        type: 'POST',
        url: custom_mini_cart_params.ajax_url,
        data: data,
        success: function(response) {
            // Update the mini cart with the refreshed content
            $('.widget_shopping_cart_content').html(response);
        }
    });
}

$(document).on('click', '.remove_from_cart_button', function(e) {
    function isCartEmpty() {
        return true; // Change this to your actual condition
    }

    // Check if the cart is empty on page load
    if (isCartEmpty()) {

        location.reload();
    }
});
    $('.langauge').on('click', function(event) {
        var currency = $( ".gt-current-lang" ).attr( "data-gt-lang" );
        if(currency ===  'uk')
        {
            setCurrency('₴');

        }else{
            setCurrency('$');

        }

    });
    $(document).on('.gt-current-lang', function(event, lang) {
        // Assuming 'en' is for English, change to your desired language code
        if (lang === 'en') {
            // Set currency to $
            setCurrency('$');
            // $('.currency').text('$')
//
        } else {
            // Set currency to another currency
            setCurrency('₴'); // Replace '€' with the desired currency symbol
            // $('.currency').text('₴')

        }
    });

    function setCurrency(currency) {
        $(".woocommerce-Price-currencySymbol").text(currency);
        $(".currency").text(currency);
    }


    //amount range field
    var minValue = parseFloat($("#filter_price").data('min-price'));
    var maxValue = parseFloat($("#filter_price_max").data('max-price'));
    // $('.currency-value-min').text(minValue)
    // $('.currency-value-max').text(maxValue)
    $('.currency').text('₴')

        if($('#filter_price').length > 0){
                $( "#slider-range" ).slider({
                    range: true,
                    step:10,
                    min: minValue,
                    max: maxValue ,
                    values: [ minValue, maxValue ],
                    slide: function( event, ui ) {
                    $( "#filter_price" ).val(ui.values[0] );
                    $('.currency-value-min').text(ui.values[0])
                    $( "#filter_price_max" ).val(ui.values[1]);
                    $('.currency-value-max').text(ui.values[1])
                    }
                });

                var numericValueMin = parseFloat($('#filter_price').attr('value'));
                var numericValueMax = parseFloat($('#filter_price_max').attr('value'));

                var filter_price= $('#filter_price').attr('value')  + " - " + $('#filter_price_max').attr('value');
                $('.currency-value-min').text($('#filter_price').attr('value'))
                $('.currency-value-max').text($('#filter_price_max').attr('value'))
                var replce_ctc = filter_price.split("-").map((i) => Number(i));
                $( "#slider-range" ).slider( "values", replce_ctc );

                $( "#filter_price" ).val($( "#slider-range" ).slider( "values", 0 ));
                $( "#filter_price_max" ).val($( "#slider-range" ).slider( "values", 1 ));
        }

    $("form.woocommerce-ordering select.orderby").select2({
        minimumResultsForSearch: Infinity,
        dropdownParent: $('.filter_wrapper'),
        width: '243px'
    });




    /*single product page jquery */
    let default_values = [];
    $('#attribute_popup p.selected_attribute_list').each(function() {
        let a_key = $(this).attr('data-attribute-list');
        let a_value = $(this).children("span").text().trim();
        default_values[a_key] = (a_value == "") ? "" :a_value;

    });
    console.log(default_values);

    $(document).on('click','.single_product_size',function(){
        Object.keys(default_values).forEach(function (attrb) {
            $('#'+attrb).val(default_values[attrb]);
            $('#'+attrb).change();

            if(attrb != "color" && attrb != "pa_color") {
                if(default_values[attrb] != "") {
                    $("."+attrb).find("li[data-selected-attr='"+default_values[attrb]+"'] a").trigger("click");
                } else {
                    $("."+attrb).find("li").removeClass("selected");
                }
            } else {
                let selected_attr_arr_temp = "";
                Object.keys(default_values).forEach(function (attrb) {
                    if(default_values[attrb] != "" && attrb != "color" && attrb != "pa_color") {
                       // selected_attr_arr_temp += '[data-attribute_'+attrb+'="'+default_values[attrb]+'"]';
                        selected_attr_arr_temp += "[data-attribute_"+attrb+"='"+default_values[attrb]+"']";

                    }
                });

                if(default_values[attrb] != "") {
                    $("."+attrb).find("li[data-selected-attr='"+default_values[attrb]+"']"+selected_attr_arr_temp+" a").trigger("click");
                } else {
                    $("."+attrb).find("li").removeClass("selected");
                }
            }
        });
        $('.first_block').show();
        $('.first_block .title_attr').hide();
        $('.first_block ul.size_select').hide();
        $('.first_block ul.color_select').hide();
        $('.first_block .title_attr.title_'+$(this).attr('data-attribute-list')).show();
        $('.first_block ul.size_select.'+$(this).attr('data-attribute-list')).show();
        $('.first_block ul.color_select.'+$(this).attr('data-attribute-list')).show();
        $('.second_block').hide();
        $("#popup_selected_color").removeClass("d-none");
        let color = "";
        if(typeof default_values['color'] != 'undefined') {
            color = default_values['color'] ;
        } else if(typeof default_values['pa_color'] != 'undefined') {
            color = default_values['pa_color'] ;
        }
        if(color == "") {
            $("#popup_selected_color").addClass("d-none");
        } else {
            $('#popup_selected_color span').css('background-color',color);
        }
        //dynamic price
        setTimeout(function() {
            var price_html = $('.single_variation_wrap .woocommerce-variation-price').html();
            if($('.single_variation_wrap .woocommerce-variation-price').length > 0){
                $('#popup_price').removeClass('d-none');
                $('#popup_price').html(price_html);
            }else{
                $('#popup_price').addClass('d-none');
                $('#popup_price').html("");
            }
        }, 500);
        console.log(default_values);
    });


    $(document).on('click','.single__product_color',function(){
        let selected_attr_arr = "";
        Object.keys(default_values).forEach(function (attrb, index) {
            if(default_values[attrb] != "" && attrb != "color" && attrb != "pa_color") {
                selected_attr_arr += '[data-attribute_'+attrb+'="'+default_values[attrb]+'"]';
            }
        });
        $(".color_li").hide();

        $('.color_li'+selected_attr_arr).show();
        $("#popup_selected_color").addClass("d-none");
    });

    $(document).on('click',".attribute_select li a",function(e) {
        e.preventDefault();
        var name = $(this).parent('li').attr('data-selected-attr').trim();
        $(this).parent().addClass('selected').siblings().removeClass('selected');
        $('#'+$(this).parent().attr("data-attr")).val(name);
        $('#'+$(this).parent().attr("data-attr")).change();
        //dynamic price
        setTimeout(function() {
            var price_html = $('.single_variation_wrap .woocommerce-variation-price').html();
            if($('.single_variation_wrap .woocommerce-variation-price').length > 0){
                $('#popup_price').removeClass('d-none');
                $('#popup_price').html(price_html);
            }else{
                $('#popup_price').addClass('d-none');
                $('#popup_price').html("");
            }
       }, 500);
    });

    $(document).on('click',"#single_attribute_save",function(e) {
        e.preventDefault();
        $('ul.attribute_select').each(function() {
            if($(this).children("li.selected").length > 0) {
                let current_selected_val = $(this).children("li.selected").attr("data-selected-attr");//find('p.attr_val_p').text().trim();
                let current_selected_val_main = $(this).children("li.selected").attr("data-selected-attr");//.find('p.attr_val_p_main').text().trim();
                default_values[$(this).children("li.selected").attr("data-attr")] = current_selected_val;
                if($(this).children("li.selected").attr("data-attr") == "color" || $(this).children("li.selected").attr("data-attr") == 'pa_color') {
                    console.log(current_selected_val_main);
                    $('#attribute_popup p[data-attribute-list="'+$(this).children("li.selected").attr("data-attr")+'"] span').css('background-color',current_selected_val_main);
                } else {
                    $('#attribute_popup p[data-attribute-list="'+$(this).children("li.selected").attr("data-attr")+'"] span').text(current_selected_val_main);
                }

                 //variation image show
                 let current_selected_img = $(this).children("li.selected").find('img').attr('src');
                 $('.first_main_img img').attr("src",current_selected_img);
            }
        });
        $(".hl__fog").trigger('click');
    });

    $(document).on('click',".hl__filter-close",function(e) {
        Object.keys(default_values).forEach(function (attrb) {
            $('#'+attrb).val(default_values[attrb]);$('#'+attrb).change();
        });
    });

    $(document).on('click',".hl__fog",function(e) {
        Object.keys(default_values).forEach(function (attrb) {
            $('#'+attrb).val(default_values[attrb]);$('#'+attrb).change();
        });
    });



});


jQuery(document).ready(function($) {
    $('.hl__minicard_icon').click(function(){
        $('.hl__minicard, .minicard_overflow, body').addClass('open_minicard');
    })
    $('.hl__minicard-close, .minicard_overflow').click(function(){
        $('.hl__minicard, .minicard_overflow, body').removeClass('open_minicard');
    })

    $('.woocommerce-checkout #order_review_heading').click(function(){
        $(this).parent().toggleClass('hl__show_review');
        // $('.woocommerce-checkout .shop_table.woocommerce-checkout-review-order-table').slideToggle();
    })
})


jQuery('.form-row :input').each(function() {
    var $input = jQuery(this);
    var $row   = $input.closest('.form-row');

    // Is the field filled on page load?
    if ($input.val()) {
      $row.addClass('-filled');
    }

    // Enter or leave the "focus" state.
    $input.on('focus', function() {
      $row.addClass('-focus');
    });
    $input.on('blur', function() {
      $row.removeClass('-focus');
    });

    // When the fields input value changes, add or remove the "-filled" state
    $input.on('input', function() {
      if ($input.val()) {
        $row.addClass('-filled');
      } else {
        $row.removeClass('-filled');
      }
    });
  })


