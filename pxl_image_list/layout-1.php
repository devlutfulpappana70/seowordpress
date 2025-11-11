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
<?php if(isset($settings['image_lists']) && !empty($settings['image_lists']) && count($settings['image_lists'])): 
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '55x55'; ?>
    <div class="pxl-image-list pxl--image-list1 <?php echo esc_attr($settings['style']); ?>">
        <?php foreach ($settings['image_lists'] as $key => $value): 
            $image = isset($value['image']) ? $value['image'] : '';
            $name = isset($value['name']) ? $value['name'] : '';
            ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay1']); ?>ms">
                <?php if(!empty($image['id'])) { 
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => $image_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                    <div class="pxl-image">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                    <div class="pxl-item--name"><?php echo pxl_print_html($name); ?></div>
                <?php } ?>
            </div>
        <?php endforeach; ?>
        <?php if(!empty($settings['button_text'])) : ?>
            <div class="pxl-item--button pxl-ml-15 <?php echo esc_attr($settings['pxl_animate2']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay2']); ?>ms">
                <a class="pxl-btn-link" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>><span><?php echo esc_attr($settings['button_text']); ?></span><i class="caseicon-long-arrow-right-two pxl-ml-5"></i></a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>