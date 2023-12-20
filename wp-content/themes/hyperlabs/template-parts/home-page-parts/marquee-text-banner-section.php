<?php
/**
 * Template part for Marquee text banner section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$marqueeTextBannerBackgroundImage = get_field('marquee_text_banner_background_image');
$marqueeTextBannerOverlayImage = get_field('marquee_text_banner_overlay_image');
$marqueeTextBannerImage = get_field('marquee_text_banner_image');
$marqueeBackstageText = get_field('marquee_backstage_text');
$marqueeFrontstageText = get_field('marquee_frontstage_text');
$marqueeTextBannerLink = get_field('marquee_text_banner_link');
?>

<?php if ( $marqueeBackstageText || $marqueeFrontstageText || $marqueeTextBannerImage || $marqueeTextBannerBackgroundImage ) : ?>
<div class="hl__new-collection">
	<?php if ($marqueeTextBannerLink) : ?>
	<a href="<?php echo $marqueeTextBannerLink['url'] ?>">
	<?php endif; ?>
		<?php if ($marqueeTextBannerBackgroundImage) : ?>
			<div class="hl__new-collection-back">
				<img
					src="<?php echo $marqueeTextBannerBackgroundImage['url']; ?>"
					alt="<?php echo $marqueeTextBannerBackgroundImage['title']; ?>" />
			</div>
		<?php endif; ?>
		<?php if ($marqueeBackstageText) : ?>
			<?php $linesBackstageText = explode("\n", $marqueeBackstageText); ?>
			<div class="hl__new-collection-marquee" id="marquee-yellow">
				<div class="hl__new-collection-marquee-content d-flex align-items-center">
					<?php foreach ($linesBackstageText as $line): ?>
						<?php if (trim($line)): ?>
							<span class="d-flex align-items-center"><?= esc_html($line); ?></span>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($marqueeTextBannerImage) : ?>
			<div class="hl__new-collection-girl">
				<img
					src="<?php echo $marqueeTextBannerImage['url']; ?>"
					alt="<?php echo $marqueeTextBannerImage['title']; ?>" />
			</div>
		<?php endif; ?>
		<?php if ($marqueeTextBannerOverlayImage) : ?>
			<div class="hl__new-collection-plastic">
				<img
					src="<?php echo $marqueeTextBannerOverlayImage['url']; ?>"
					alt="<?php echo $marqueeTextBannerOverlayImage['title']; ?>" />
			</div>
		<?php endif; ?>
		<?php if ($marqueeFrontstageText) : ?>
			<?php $linesFrontstageText = explode("\n", $marqueeFrontstageText); ?>
			<div class="hl__new-collection-marquee" id="marquee-blue">
				<div class="hl__new-collection-marquee-content d-flex align-items-center">
					<?php foreach ($linesFrontstageText as $line): ?>
						<?php if (trim($line)): ?>
							<span class="d-flex align-items-center"><?= esc_html($line); ?></span>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($marqueeTextBannerLink) : ?>
		</a>
		<?php endif; ?>
</div>
<?php endif; ?>