<?php
/**
 * Template part for Promo Banner section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$indexPromoBannerImage1 = get_field('index_promo_banner_image_1');
$indexPromoBannerImage2 = get_field('index_promo_banner_image_2');
$indexPromoBannerSubtitle = get_field('index_promo_banner_subtitle');
$indexPromoBannerTitle = get_field('index_promo_banner_title');
$indexPromoBannerText = get_field('index_promo_banner_text');
?>

<?php if ( $indexPromoBannerSubtitle || $indexPromoBannerTitle || $indexPromoBannerText) : ?>
	<div class="hl__promo">
		<div class="container">
			<?php if ( $indexPromoBannerImage1 || $indexPromoBannerImage2 ) : ?>
				<div class="hl__promo-background">
					<?php if ( $indexPromoBannerImage1 ) : ?>
						<div class="hl__promo-background-top">
							<img
								src="<?php echo $indexPromoBannerImage1['url']; ?>"
								alt="<?php echo $indexPromoBannerImage1['title']; ?>" />
						</div>
					<?php endif; ?>
					<?php if ( $indexPromoBannerImage2 ) : ?>
						<div class="hl__promo-background-bottom">
							<img
								src="<?php echo $indexPromoBannerImage2['url']; ?>"
								alt="<?php echo $indexPromoBannerImage2['title']; ?>" />
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="hl__promo-text">
				<?php if ( $indexPromoBannerSubtitle ) : ?>
					<div class="hl__promo-text1"><?php echo $indexPromoBannerSubtitle; ?></div>
				<?php endif; ?>
				<?php if ( $indexPromoBannerTitle ) : ?>
					<div class="hl__promo-text2"><?php echo $indexPromoBannerTitle; ?></div>
				<?php endif; ?>
				<?php if ( $indexPromoBannerText ) : ?>
					<div class="hl__promo-text3"><?php echo $indexPromoBannerText; ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>