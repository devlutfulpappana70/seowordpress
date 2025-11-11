<?php
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link_tel', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link_tel', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link_tel', 'rel', 'nofollow' );
    }
}
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-call pxl-call1">
	<div class="pxl-box-inner">
		<?php if(!empty($settings['call_image']['id'])) : 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '900x750'; 
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['call_image']['id'],
				'thumb_size' => $image_size,
			));
			$thumbnail = $img['thumbnail'];
			?>
			<div class="pxl-item--image <?php echo esc_attr($settings['pxl_animate_img1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_img1']); ?>ms">
				<?php echo pxl_print_html($thumbnail); ?>
				<div class="pxl-item-title"><?php echo esc_attr($settings['title']); ?></div>
			</div>
		<?php endif; ?>
		<div class="pxl-item-content <?php echo esc_attr($settings['pxl_animate_img2']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_img2']); ?>ms">
			<div class="pxl-item-phone"><?php echo esc_attr($settings['title_phone']); ?></div>
			<div class="pxl-item-map"><?php echo esc_attr($settings['title_map']); ?></div>
			<div class="pxl-item-link">
				<a class="pxl-btn-tel" <?php pxl_print_html($widget->get_render_attribute_string( 'link_tel' )); ?>>
					<?php echo esc_attr($settings['title_link']); ?>
				</a>
			</div>
		</div>
	</div>
</div>