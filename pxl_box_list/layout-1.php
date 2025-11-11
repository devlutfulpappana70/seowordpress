<?php
if(isset($settings['box_list']) && !empty($settings['box_list']) && count($settings['box_list'])): ?>
    <div class="pxl-box-list pxl-box-list1">
        <div class="pxl-item-shape <?php echo esc_attr($settings['pxl_animate1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay1']); ?>ms"></div>
        <?php foreach ($settings['box_list'] as $key => $value):
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            ?>
            <div class="pxl-item-inner <?php echo esc_attr($settings['pxl_animate2']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay2']); ?>ms">
                <?php if(!empty($image['id'])) { 
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => 'full',
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                    <div class="pxl-image pxl-mr-28">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                <?php } ?>
                <div class="pxl-meta">
                    <h4 class="pxl-item-title">
                        <?php echo pxl_print_html($title); ?>
                    </h4>
                    <div class="pxl-item-desc">
                        <?php echo pxl_print_html($desc); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>