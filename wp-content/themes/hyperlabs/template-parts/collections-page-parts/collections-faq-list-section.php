<?php
/**
 * Template part for collections faq-list section
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @pac*/

$collectionsFaqListSectionTitle = get_field('collections_faq_list_section_title');
$collectionsFaqListSectionRepeater = get_field('collections_faq_list_section_repeater');
?>

<?php if ($collectionsFaqListSectionTitle || $collectionsFaqListSectionRepeater) : ?>
<div class="hl__collections-faq">
	<div class="container">
		<?php if ($collectionsFaqListSectionTitle) : ?>
			<div class="hl__collections-faq-header row justify-content-center">
				<div class="col-auto">
					<h2><?php echo $collectionsFaqListSectionTitle; ?></h2>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($collectionsFaqListSectionRepeater) : ?>
			<div class="hl__collections-faq-content">
				<?php foreach ($collectionsFaqListSectionRepeater as $collectionsFaqListSectionRepeaterItem) : ?>
					<div class="hl__collections-faq-item">
						<div class="hl__collections-faq-item-header">
							<?php echo $collectionsFaqListSectionRepeaterItem['collections_faq_list_section_repeater_question']; ?>
						</div>
						<div class="hl__collections-faq-item-text d-grid">
							<div class="hl__collections-faq-item-text-wrap">
								<?php echo $collectionsFaqListSectionRepeaterItem['collections_faq_list_section_repeater_answer']; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>