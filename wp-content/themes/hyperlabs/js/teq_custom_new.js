
jQuery(document).ready(function($) {
    console.log('hii');
    /*checkout page js */
    $("#bill_custom_bonus_code_field_name_field, #custom_checkout_radio_field, #custom_Backyard_select,#bill_index_field_name_field").appendTo(".checkout-left .first_step_for_delivery_info .woocommerce-billing-fields .woocommerce-billing-fields__field-wrapper");

    $(document).on('click','#secound_payment_enter', function(e){
      console.log('secound step in');
       $('.custom_error').remove();

      var isValid = true;

      var billing_first_name = $('#billing_first_name').val();
      var billing_last_name  = $('#billing_last_name').val();
      var billing_phone      = $('#billing_phone').val();
      var billing_email      = $('#billing_email').val();
      var billing_postcode    = $('#billing_postcode').val();
      
      if(billing_first_name == ""){
        isValid = false;
        $('#billing_first_name').after('<span class="custom_error" style="color:red">Mandatory field for filling</span>');
      }
      if(billing_last_name == ""){
        isValid = false;
        $('#billing_last_name').after('<span class="custom_error" style="color:red">Mandatory field for filling</span>');
      }
     
      if(billing_phone == ""){
        isValid = false;
        $('#billing_phone').after('<span class="custom_error" style="color:red">Mandatory field for filling</span>');
      }
      if(billing_email == ""){
        isValid = false;
        $('#billing_email').after('<span style="color:red" class="custom_error" >Mandatory field for filling</span>');
      }
      if(billing_postcode == ""){
        isValid = false;
        $('#billing_postcode').after('<span style="color:red" class="custom_error" >Mandatory field for filling</span>');
      }
        if(isValid == false){
             e.preventDefault();
          //  $(this).css('pointer-events','none');
        }else{
           // $(this).css('pointer-events','');
            $('.secound_step_for_payment').css('display','block');
            $('.first_step_for_delivery_info').css('display','none');
            $('#delivery_payment_info').css('color','black');

            //address save display on secound step
            $('#save_name').html(billing_first_name +" "+ billing_last_name);
            $('#save_address').html();
            $('#save_number').html(billing_phone);
            $('#save_email').html(billing_email);
        }
    })
 
    //checkout brudcrum
    $(document).on('click','#delivery_info', function(e){
     e.preventDefault();
     $('.secound_step_for_payment').css('display','none');
     $('.first_step_for_delivery_info').css('display','block');
     $('#delivery_payment_info').css('color','gray');
    })

    //     $(document).on('change','input[name="custom_checkout_radio"]', function(e){
    //     var selectedValue = $('input[name="custom_checkout_radio"]:checked').val();
    //    if(selectedValue =="option_one"){
    //     $('#bill_index_field_name_field').show();
    //     $('#billing_email_field').show();
    //     $('.woocommerce-account-fields').show();
        
    //    }else if(selectedValue =="option_two"){
    //     $('#bill_index_field_name_field').hide();
    //     $('#billing_email_field').hide();
    //     $('.woocommerce-account-fields').hide();
    //    }

    // })

});