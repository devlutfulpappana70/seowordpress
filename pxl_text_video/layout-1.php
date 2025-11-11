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
<div class="pxl-text-video pxl-text-video1">
	<div class="pxl-meta-inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		<div class="pxl-inner-video pxl-mr-10">
			<a class="pxl-btn-video pxl-action-popup" <?php pxl_print_html($widget->get_render_attribute_string( 'link_video' )); ?>>
				<i class="caseicon-play1"></i>
			</a>
		</div>
		<div class="pxl-item-title">
			<?php echo esc_attr($settings['title']); ?>
		</div>
	</div>
</div>