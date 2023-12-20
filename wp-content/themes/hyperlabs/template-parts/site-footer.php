<?php
if ( function_exists('get_field') ) {
	$siteFooterLogo = get_field('site_footer_logo', 'option');
	$siteFooterText = get_field('site_footer_text', 'option');
	$siteFooterContactTitle = get_field('footer_contacts_title', 'option');
	$siteFooterContactItems = get_field('footer_contacts', 'option');
	$siteFooterSocialItems = get_field('footer_social_list', 'option');
	$siteFooterCopyright = get_field('site_footer_copyright', 'option');
}

$locations = get_nav_menu_locations();

$menu_id_1 = $locations['footer-menu-1'];
$menu_object_1 = wp_get_nav_menu_object($menu_id_1);

$menu_id_2 = $locations['footer-menu-2'];
$menu_object_2 = wp_get_nav_menu_object($menu_id_2);
?>

<div class="hl__footer">
	<div class="container">
		<div class="row justify-content-lg-between justify-content-start">
			<?php if ( $siteFooterLogo || $siteFooterText) : ?>
				<div class="col-auto d-lg-block d-none order-lg-0">
					<?php if ( $siteFooterLogo ) : ?>
						<a href="/" class="hl__footer-logo">
							<img src="<?php echo $siteFooterLogo['url']; ?>" alt="Footer logo" />
						</a>
					<?php endif; ?>
					<?php if ( $siteFooterText ) : ?>
						<div class="hl__footer-text">
							<?php echo $siteFooterText; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ( $menu_object_1 ) :
				$menu_name = $menu_object_1->name;
			?>
				<div class="col-auto hl__footer-block hl__footer-block--small-screen order-1">
					<div class="hl__footer-header"><?php echo $menu_name; ?></div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu-1',
							'menu_id'        => 'footer-menu-1',
							'container' => false,
							'items_wrap' => '<div class="%2$s-list">%3$s</div>',
							'menu_class' => 'hl__footer-link',
							'walker' => new Footer_Walker_Nav_Menu()
						)
					);
					?>
			</div>
			<?php endif; ?>
			<div class="col-auto hl__footer-block order-lg-2 order-0">
				<?php if ( $siteFooterContactTitle ) : ?>
					<div class="hl__footer-header"><?php echo $siteFooterContactTitle; ?></div>
				<?php endif; ?>
				<?php if ( $siteFooterContactItems ) : ?>
					<?php foreach ( $siteFooterContactItems as $item ) : ?>
						<?php $content_type = $item['content_type']; ?>

						<?php if ( $content_type == 'text' ) : ?>
							<?php $text = $item['footer_text']; ?>
							<div class="hl__footer-link-item"><?php echo esc_html($text); ?></div>

						<?php elseif ( $content_type == 'link' ) : ?>
							<?php $link = $item['footer_contact_link']; ?>
							<?php if ( $link ) : ?>
								<?php $link_url = esc_url($link['url']); ?>
								<?php $link_title = esc_html($link['title']); ?>
								<div class="hl__footer-link-item<?php if ( !empty($item['footer_contact_social']) ) : ?> d-flex align-items-center gap-2<?php endif; ?>">
									<a href="<?php echo $link_url; ?>" class="hl__footer-link"><?php echo $link_title; ?></a>
									<?php if ( !empty($item['footer_contact_social']) ) : ?>
										<div class="hl__footer-soc d-flex align-items-center gap-2"">
											<?php foreach ( $item['footer_contact_social'] as $social ) : ?>
												<?php $social_link = $social['footer_contact_social_link']; ?>
												<?php $social_icon = $social['footer_contact_social_icon']; ?>
												<?php if ( $social_icon ) : ?>
													<?php $social_icon_url = esc_url($social_icon['url']); ?>
													<?php $social_icon_alt = esc_attr($social_icon['alt']); ?>
													<a href="<?php echo $social_link; ?>" class="hl__footer-soc-link"><img src="<?php echo $social_icon_url; ?>" alt="<?php echo $social_icon_alt; ?>" /></a>
												<?php endif; ?>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<?php if ( $menu_object_2 ) :
				$menu_name = $menu_object_2->name;
				?>
				<div class="col-xl-auto col-12 hl__footer-block hl__footer-block--adpative order-4">
					<div class="hl__footer-header"><?php echo $menu_name; ?></div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu-2',
							'menu_id'        => 'footer-menu-2',
							'container' => false,
							'items_wrap' => '<div class="%2$s-list">%3$s</div>',
							'menu_class' => 'hl__footer-link',
							'walker' => new Footer_Walker_Nav_Menu()
						)
					);
					?>
				</div>
			<?php endif; ?>
			<?php
			if ($siteFooterSocialItems) {
				echo '<div class="col-xl-auto col-12 hl__footer-block order-5">';
				echo '<div class="hl__footer-soc d-flex align-items-center gap-4">';

				foreach ($siteFooterSocialItems as $item) {
					$social_link = esc_attr($item['footer_social_list_link']);
					$social_icon = $item['footer_social_list_icon'];

					if ($social_icon) {
						$social_icon_url = esc_url($social_icon['url']);
						$social_icon_alt = esc_attr($social_icon['alt']); // Используйте заголовок соцсети, если он есть, в противном случае alt-текст из ACF
						echo '<a href="' . $social_link . '" class="hl__footer-soc-link"><img src="' . $social_icon_url . '" alt="' . $social_icon_alt . '" /></a>';
					}
				}

				echo '</div>';
				echo '</div>';
			}
			?>
		</div>
	<?php if ( $siteFooterCopyright ) : ?>
		<div class="hl__footer-rights d-lg-flex d-none justify-content-center">
			<?php echo $siteFooterCopyright; ?>
		</div>
	<?php endif; ?>
	</div>
</div>