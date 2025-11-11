<?php
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link_banner', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link_banner', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link_banner', 'rel', 'nofollow' );
    }
}
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-banner-box pxl-banner-box1 <?php echo esc_attr($settings['pxl_animate1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay1']); ?>ms">
	<div class="pxl-box-inner <?php echo esc_attr($settings['style']); ?>">
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
				<span class="pxl-vector1"></span>
				<span class="pxl-vector2"></span>
				<span class="pxl-vector3"></span>
			</div>
		<?php endif; ?>
		<div class="pxl-item-title">
			<?php echo esc_attr($settings['title']); ?>
		</div>
		<div class="pxl-item-sub">
			<?php echo esc_attr($settings['sub_title']); ?>
		</div>
	</div>
	<div class="pxl-banner-btn">
		<a class="pxl-btn" <?php pxl_print_html($widget->get_render_attribute_string( 'link_banner' )); ?>>
			+
		</a>
	</div>
</div>