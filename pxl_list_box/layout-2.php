<?php if(isset($settings['lists_v2']) && !empty($settings['lists_v2']) && count($settings['lists_v2'])): 
    $is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
    <div class="pxl-list-box pxl-list-box2">
        <?php foreach ($settings['lists_v2'] as $key => $value): 
            $star = isset($value['star']) ? $value['star'] : '';
            $style = isset($value['style']) ? $value['style'] : '';
            $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
            $icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ] );
            ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <?php if ( $icon_type == 'icon' && ! empty( $value['pxl_icon'] ) ) : ?>
                    <div class="pxl-item--icon pxl-mr-10">
                        <?php if ( $is_new ):
                            \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                        elseif(!empty($value['pxl_icon'])): ?>
                            <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if ( $icon_type == 'image' && !empty($icon_image['id']) ) : 
                    $img_icon  = pxl_get_image_by_size( array(
                        'attach_id'  => $icon_image['id'],
                        'thumb_size' => '30x30',
                    ) );
                    $thumbnail_icon    = $img_icon['thumbnail']; ?>
                    <div class="pxl-item--icon pxl-mr-10">
                        <?php echo pxl_print_html($thumbnail_icon); ?>
                    </div>
                <?php endif; ?>
                <div class="pxl-content">
                    <h5 class="pxl-item--text"><?php echo pxl_print_html($value['text'])?></h5>
                    <div class="pxl-sub-star">
                        <div class="pxl-sub-text"><?php echo pxl_print_html($value['sub_text'])?></div>
                        <div class="pxl-item--star pxl-ml-15 pxl-item--<?php echo esc_attr($star); ?>-star <?php echo esc_attr($style); ?>">
                            <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i>
                            <i class="flaticon-star-1"></i>
                        </div> 
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>