<?php
if ( ! empty( $settings['button_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['button_link']['url'] );

    if ( $settings['button_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['button_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr($settings['pxl_animate']); if(!empty($settings['popular'])) { echo ' pxl-pricing-popular'; } ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if(!empty($settings['popular'])) : ?>
        <div class="pxl-item--popular"><span><?php echo esc_attr($settings['popular']); ?></span></div>
    <?php endif; ?>
    <h4 class="pxl-item--title"><span><?php echo esc_attr($settings['title']); ?></span></h4>
    <h5 class="pxl-item--subtitle"><?php echo esc_attr($settings['sub_title']); ?></h5>
    <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
        <ul class="pxl-item--feature">
            <?php foreach ($settings['feature'] as $key => $value): ?>
                <li class="<?php echo esc_attr($value['active']); ?>"><i class="caseicon-check"></i><?php echo pxl_print_html($value['feature_text'])?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="pxl-item--meta">
        <div class="pxl-item-content">
            <div class="pxl-item--price"><?php echo pxl_print_html($settings['price']); ?></div>
            <div class="pxl-item--time"><?php echo pxl_print_html($settings['time']); ?></div>
        </div>
        <?php if(!empty($settings['button_text'])) : ?>
            <div class="pxl-item--button">
                <a class="btn pxl-btn-effect5" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_attr($settings['button_text']); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>