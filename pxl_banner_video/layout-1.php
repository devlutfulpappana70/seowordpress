<?php
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link_video', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link_video', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link_video', 'rel', 'nofollow' );
    }
}
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-banner-video pxl-banner-video1">
	<div class="pxl-box-inner <?php echo esc_attr($settings['pxl_animate_img1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_img1']); ?>ms">
		<?php if(!empty($settings['banner_image']['id'])) : 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; 
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image']['id'],
				'thumb_size' => $image_size,
			));
			$thumbnail = $img['thumbnail'];
			?>
			<div class="pxl-item--imgprimary">
				<?php echo pxl_print_html($thumbnail); ?>
			</div>
		<?php endif; ?>
		<div class="pxl-video">
			<a class="pxl-btn-video pxl-action-popup" <?php pxl_print_html($widget->get_render_attribute_string( 'link_video' )); ?>>
				<span class="pxl-icon-video">
					<i class="caseicon-play1"></i>
				</span>
				<span class="pxl-item-text-video">					
				</span>
			</a>
		</div>
	</div>
</div>