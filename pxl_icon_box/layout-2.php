<?php
$html_id = pxl_get_element_id($settings);
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link_text', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link_text', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link_text', 'rel', 'nofollow' );
    }
}

if ( ! empty( $settings['link2']['url'] ) ) {
    $widget->add_render_attribute( 'link_text2', 'href', $settings['link2']['url'] );

    if ( $settings['link2']['is_external'] ) {
        $widget->add_render_attribute( 'link_text2', 'target', '_blank' );
    }

    if ( $settings['link2']['nofollow'] ) {
        $widget->add_render_attribute( 'link_text2', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-icon-box pxl-icon-box2 <?php echo esc_attr($settings['style_type']); ?> ">
	<div class="pxl-item-inner <?php echo esc_attr($settings['pxl_animate1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay1']); ?>ms">
		<div class="pxl-meta-content">
			<?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                <div class="pxl-item--icon pxl-mr-15">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                </div>
            <?php endif; ?>
			<div class="content-inner">
                <div class="pxl-heading-text">
                    <?php echo esc_attr($settings['heading']); ?>
                </div>
                <div class="pxl-link">
                    <div class="title pxl-text-link">
                        <a <?php pxl_print_html($widget->get_render_attribute_string( 'link_text' )); ?>>
                            <?php echo esc_attr($settings['title']); ?>
                        </a>
                    </div>
                    <div class="sub-title pxl-text-link">
                        <a <?php pxl_print_html($widget->get_render_attribute_string( 'link_text2' )); ?>>
                            <?php echo esc_attr($settings['sub_title']); ?>
                        </a>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>