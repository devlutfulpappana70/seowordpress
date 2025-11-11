<?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): 
    $is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
    <div class="pxl-list-down pxl-list-down1">
        <?php foreach ($settings['lists'] as $key => $value): 
            $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
            if ( ! empty( $value['link']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

                if ( $value['link']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ( $value['link']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
            <a class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                <?php if ( ! empty( $value['pxl_icon'] ) ) : ?>
                    <div class="pxl-item--icon">
                        <i class="far fa-file-pdf"></i>
                    </div>
                <?php endif; ?>
                <div class="pxl-item--content">
                    <h6 class="pxl-item--text"><?php echo pxl_print_html($value['text'])?></h6>
                    <span class="pxl-item--sub"><?php echo pxl_print_html($value['sub_text'])?></span>
                </div>
                <div class="pxl-item-link">
                    <i class="far fa-download"></i>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>