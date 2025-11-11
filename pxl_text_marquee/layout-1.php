<?php
$is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
<?php if(isset($settings['item_content']) && !empty($settings['item_content']) && count($settings['item_content'])): ?>
    <div class="pxl-text-marquee pxl-text-marquee1">
        <?php foreach ($settings['item_content'] as $key => $value):
            $text = isset($value['text']) ? $value['text'] : '';
            $icon_image = isset($value['icon_image']) ? $value['icon_image'] : ''; 
            $color_type = isset($value['color_type']) ? $value['color_type'] : ''; ?>
            <div class="pxl-text--marquee">
                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                    <?php if(!empty($icon_image['id'])) { 
                        $img_logo = pxl_get_image_by_size( array(
                            'attach_id'  => $icon_image['id'],
                            'thumb_size' => 'full',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail_logo = $img_logo['thumbnail'];?>
                        <div class="pxl-item--logo">
                            <?php echo wp_kses_post($thumbnail_logo); ?>
                        </div>
                    <?php } ?>
                    <div class="pxl-item--text pxl-empty <?php echo esc_attr($color_type); ?>"><?php echo esc_attr($text); ?></div>
               </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
