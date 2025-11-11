<?php
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link_service', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link_service', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link_service', 'rel', 'nofollow' );
    }
}
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-service-custom pxl-service-custom1 <?php echo esc_attr($settings['pxl_animate1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay1']); ?>ms">
	<div class="pxl-box-inner <?php echo esc_attr($settings['style']); ?>">
		<?php if(!empty($settings['service_image']['id'])) : 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '30x30'; 
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['service_image']['id'],
				'thumb_size' => $image_size,
			));
			$thumbnail = $img['thumbnail'];
			?>
			<div class="pxl-img-title">
				<div class="pxl-item--imgprimary pxl-mr-20">
					<?php echo pxl_print_html($thumbnail); ?>
				</div>
				<div class="pxl-item-title">
					<a class="pxl-link" <?php pxl_print_html($widget->get_render_attribute_string( 'link_service' )); ?>>
						<?php echo esc_attr($settings['title']); ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
		<div class="pxl-item-desc">
			<?php echo esc_attr($settings['desc']); ?>
		</div>
	</div>
</div>