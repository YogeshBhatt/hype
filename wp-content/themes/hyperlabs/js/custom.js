jQuery(document).ready(function($) {

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
        console.log('hello');
        // Assuming 'en' is for English, change to your desired language code
        if (lang === 'en') {
            // Set currency to $
            setCurrency('$');
        } else {
            // Set currency to another currency
            setCurrency('₴'); // Replace '€' with the desired currency symbol
        }
    });

    function setCurrency(currency) {
        $(".woocommerce-Price-currencySymbol").text(currency);
    }


     //amount range field
   if($('#filter_price').length > 0){
        $( "#slider-range" ).slider({
            range: true,
            step:10,
            min: 0,
            max: 5000,
            values: [ 0, 5000 ],
            slide: function( event, ui ) {
            $( "#filter_price" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            }
        });

        var filter_price= $('#filter_price').attr('value');
        var replce_ctc = filter_price.split("-").map((i) => Number(i));
        $( "#slider-range" ).slider( "values", replce_ctc );

        $( "#filter_price" ).val($( "#slider-range" ).slider( "values", 0 ) +
                " - " + $( "#slider-range" ).slider( "values", 1 ) );
        //END amount range
   }
});