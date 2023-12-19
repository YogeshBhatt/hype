<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hyperlabs
 */

?>

</div>
<?php get_template_part('template-parts/site-footer'); ?>
<?php get_template_part('template-parts/login-popup'); ?>
<?php get_template_part('template-parts/registration-popup'); ?>

<?php if ( is_front_page() ): ?>
	<script type="module">
		import marquee from 'https://cdn.jsdelivr.net/npm/vanilla-marquee/dist/vanilla-marquee.js';

		const $marquee = document.getElementById('marquee');
		const $marqueeBlue = document.getElementById('marquee-blue');
		const $marqueeYellow = document.getElementById('marquee-yellow');

		if (typeof ($marquee) !== 'undefined' && $marquee != null) {
			setTimeout(function () {
				// console.log('test 1', $marquee)

				new marquee(document.getElementById('marquee'), {
					startVisible: true,
					recalcResize: true,
					duplicated: true,
					speed: 30,
					gap: 0,
				})
			}, 200)
		}

		if (typeof ($marqueeBlue) !== 'undefined' && $marqueeBlue != null) {
			setTimeout(function () {
				// console.log('test 3', $marqueeBlue)

				new marquee(document.getElementById('marquee-blue'), {
					startVisible: true,
					recalcResize: true,
					duplicated: true,
					speed: 40,
					gap: 0,
				})
			}, 200)
		}

		if (typeof ($marqueeYellow) !== 'undefined' && $marqueeYellow != null) {
			setTimeout(function () {
				// console.log('test 4', $marqueeYellow)

				new marquee(document.getElementById('marquee-yellow'), {
					startVisible: true,
					recalcResize: true,
					duplicated: true,
					speed: 15,
					gap: 0,
				})
			}, 200)
		}
	</script>
<?php endif; ?>

<?php wp_footer(); ?>
<script>

    // Function to retrieve language data
    function getLangData() {
       var langValue = jQuery('html').attr('lang');
		if(langValue == 'en')
		{
			jQuery(".currency").text('$');
		}else{
			jQuery(".currency").text('₴');
		}
    }

    // Set a timeout for 3 seconds after page reload
    jQuery(document).ready(function() {
      setTimeout(function() {
        getLangData();
      }, 2000); // 3000 milliseconds = 3 seconds
    });
  </script>
</body>
</html>
