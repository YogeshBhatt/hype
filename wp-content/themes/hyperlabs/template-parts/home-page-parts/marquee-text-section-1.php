<?php
/**
 * Template part for marquee text section 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/


	$marqueeText = get_field('marquee_text_repeater');
?>

<?php if ( $marqueeText ) : ?>
	<div class="hl__marquee" id="marquee">
		<div class="hl__marquee-content">
			<?php foreach ($marqueeText as $text): ?>
				<span><?php echo $text['marquee_text_item']; ?></span>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>