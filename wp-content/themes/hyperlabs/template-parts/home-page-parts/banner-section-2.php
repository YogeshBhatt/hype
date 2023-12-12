<?php
/**
 * Template part for displaying banner section 2
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hyperlabs
 */

$indexBanner2BackgroundImage = get_field('inddex_banner_2_background_image');
$indexBanner2Subtitle = get_field('index_banner_2_subtitle');
$indexBanner2Title = get_field('index_banner_2_title');
$indexBanner2Button = get_field('index_banner_2_button');
?>

<?php if ( $indexBanner2BackgroundImage || $indexBanner2Subtitle || $indexBanner2Title || $indexBanner2Button ) : ?>
<div class="hl__nft">
	<?php if ( $indexBanner2BackgroundImage ) : ?>
		<div class="hl__nft-back">
			<img src="<?php echo $indexBanner2BackgroundImage['url']; ?>" alt="<?php echo $indexBanner2BackgroundImage['title']; ?>" />
		</div>
	<?php endif; ?>
	<?php if ( $indexBanner2Subtitle || $indexBanner2Title || $indexBanner2Button ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12">
				<?php if ( $indexBanner2Subtitle ) : ?>
					<div class="hl__nft-text1"><?php echo $indexBanner2Subtitle; ?></div>
				<?php endif; ?>
				<?php if ( $indexBanner2Title ) : ?>
					<div class="hl__nft-text2"><?php echo $indexBanner2Title; ?></div>
				<?php endif; ?>
				<?php if ( $indexBanner2Button ) : ?>
					<a href="<?php echo $indexBanner2Button['url']; ?>" class="hl__button hl__button--green"><?php echo $indexBanner2Button['title']; ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>