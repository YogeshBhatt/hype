
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

    /* my account order filter**********************************/
    var url = window.location.href; 
    var status = "";

    var getUrlParameter = function getUrlParameter(sParam) {
			var sPageURL = window.location.search.substring(1),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;
			console.log(sPageURL);
			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
				}
			}
			return false;
		};
    $('#filter_order_history .filter_status_name a').each(function(){
      $(this).click(function(e){
          e.preventDefault();
          $("#filter_order_history .filter_status_name").removeClass('active'); 
          $(this).addClass('active');
          status = $(this).attr('data');
          console.log(status);
          if(getUrlParameter('order_status') != false) {
            var text = 'order_status='+getUrlParameter('order_status');
              url = url.replace(text, 'order_status='+status);
            window.location.href = url;
          } else {
            if (window.location.href.indexOf("?") > -1) {
                window.location.href = url+'&order_status='+status;
            }else{
              window.location.href = url+'?order_status='+status;
            }
          }
      })
   })
   /* END my account order filter**********************************/
   $("#billing_edit_address").validate({
        rules: {
          checkboxAccountAgreement: "required",
        },
        messages: {
          checkboxAccountAgreement: "checkbox requied"
        },
        // errorElement : 'div',
        // errorLabelContainer: '.errorTxt'

        errorPlacement: function(error, element) {
          $(element).parent().parent().find('div.custom_error_checkbox').append(error)
          // error.append('.custom_error_checkbox div');
        },
   });


});