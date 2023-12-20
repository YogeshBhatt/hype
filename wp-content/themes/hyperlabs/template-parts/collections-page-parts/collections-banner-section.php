<?php
/**
 * Template part for collections banner section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$collectionsBannerImage = get_field('collections_banner_image');
$collectionsBannerSubtitle = get_field('collections_banner_subtitle');
$collectionsBannerTitle = get_field('collections_banner_title');
$collectionsBannerLink = get_field('collections_banner_link');
?>

<?php if ($collectionsBannerImage || $collectionsBannerSubtitle || $collectionsBannerTitle || $collectionsBannerLink) : ?>
<div class="hl__nft">
	<?php if ($collectionsBannerImage) : ?>
		<div class="hl__nft-back">
			<img
				src="<?php echo $collectionsBannerImage['url']; ?>"
				alt="<?php echo $collectionsBannerImage['alt']; ?>" />
		</div>
	<?php endif; ?>
	<?php if ($collectionsBannerSubtitle || $collectionsBannerTitle || $collectionsBannerLink) : ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12">
				<?php if ($collectionsBannerSubtitle) : ?>
					<div class="hl__nft-text1"><?php echo $collectionsBannerSubtitle; ?></div>
				<?php endif; ?>
				<?php if ($collectionsBannerTitle) : ?>
					<div class="hl__nft-text2"><?php echo $collectionsBannerTitle; ?></div>
				<?php endif; ?>
				<?php if ($collectionsBannerLink) : ?>
					<a href="<?php echo $collectionsBannerLink['url']; ?>" class="hl__button hl__button--green"
						><?php echo $collectionsBannerLink['title']; ?></a
					>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>