<?php
$html_id = pxl_get_element_id($settings);
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

$template = (int)$widget->get_setting('popup_template','0');
if($template > 0 ){
    if ( !has_action( 'pxl_anchor_target_page_popup_'.$template) ){
        add_action( 'pxl_anchor_target_page_popup_'.$template, 'seon_hook_anchor_page_popup' );
    } 
}

?>
<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-button <?php echo esc_attr($settings['btn_action'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> class="btn <?php if(!empty($settings['btn_icon'])) { echo 'pxl-icon-active'; } ?> <?php echo esc_attr($settings['btn_style'].' pxl-icon--'.$settings['icon_align']); ?>">
        <?php if(!empty($settings['btn_icon'])) { \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); } ?>
        <span class="pxl--btn-text" data-text="<?php echo esc_attr($settings['text']); ?>">
            <?php echo pxl_print_html($settings['text']);?>
        </span>
    </a>
</div>