<?php
$default_settings = [
    'title' => '',
    'title_gradient' => '',
    'sub_title' => '',
    'desc' => '',
    'button_text' => '',
    'button_link' => '',
    'content_monthly' => '',
    'content_year' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
if ( ! empty( $button_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $button_link['url'] );

    if ( $button_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $button_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-pricing pxl-pricing2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-pricing--left">
        <?php if(!empty($sub_title)) : ?>
            <div class="pxl-item--sub">
                <?php echo pxl_print_html($sub_title); ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($title)) : ?>
            <div class="pxl-item--heading">
                <span><?php echo pxl_print_html($title); ?></span>
                <span class="pxl-title-gradient"><?php echo pxl_print_html($title_gradient); ?></span>
            </div>
        <?php endif; ?>
        <?php if(!empty($desc)) : ?>
            <div class="pxl-item--description"><?php echo pxl_print_html($desc); ?></div>
        <?php endif; ?>
        <div class="pxl-pricing--nav">
            <span class="pxl-item--navmonthly"><?php echo esc_html__('Monthly', 'seon'); ?></span>
            <div class="pxl-item--nav"></div>
            <span class="pxl-item--navyear"><?php echo esc_html__('Yearly', 'seon'); ?></span>
        </div>
        <?php if(!empty($button_text)) : ?>
            <div class="pxl-item--button">
                <span><?php echo esc_html__('or', 'seon'); ?></span> <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_attr($button_text); ?></a>
            </div>
        <?php endif; ?>
    </div>
    <div class="pxl-pricing--right">
        <?php if(!empty($content_monthly)) : ?>
            <div class="pxl-pricing--body pxl-pricing--monthly">
                <?php foreach ($content_monthly as $key => $value):
                $popular = isset($value['popular']) ? $value['popular'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $price = isset($value['price']) ? $value['price'] : '';
                $button_text = isset($value['button_text']) ? $value['button_text'] : '';
                $button_link = isset($value['button_link']) ? $value['button_link'] : '';
                $feature = isset($value['feature']) ? $value['feature'] : '';
                $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                if ( ! empty( $button_link['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $button_link['url'] );

                    if ( $button_link['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $button_link['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                if($key == 0 || $key == 1) : ?>
                    <div class="pxl-pricing--item <?php if($key == 0) { echo 'pxl-item--first'; } else { echo 'pxl-item--last'; } ?>">
                        <?php if(!empty($popular )) : ?>
                            <div class="pxl-pricing--popular"><?php echo esc_attr($popular); ?></div>
                        <?php endif; ?>
                        <?php if(!empty($title) || !empty($price)) : ?>
                            <div class="pxl-pricing--meta">
                                <div class="pxl-pricing--meta-inner">
                                    <h3 class="pxl-pricing--title"><?php echo pxl_print_html($title); ?></h3>
                                    <div class="pxl-pricing--price"><?php echo pxl_print_html($price); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <ul class="pxl-pricing--feature">
                            <?php if(!empty($feature)):
                                $career_feature = json_decode($feature, true);
                                foreach ($career_feature as $value): ?>
                                    <li><span><i class="<?php echo esc_attr($value['icon']); ?>"></i></span><?php echo esc_attr($value['content']); ?></li>
                                <?php endforeach;
                            endif; ?>
                        </ul>
                        <?php if(!empty($button_text)) : ?>
                            <div class="pxl-pricing--button">
                                <a class="btn pxl-btn-effect9" <?php echo implode( ' ', [ $link_attributes ] ); ?>><i class="fas fa-cloud-upload-alt pxl-mr-10"></i><?php echo esc_attr($button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($content_year)) : ?>
            <div class="pxl-pricing--body pxl-pricing--year">
                <?php foreach ($content_year as $key_y => $value_y):
                $popular = isset($value_y['popular']) ? $value_y['popular'] : '';
                $title = isset($value_y['title']) ? $value_y['title'] : '';
                $price = isset($value_y['price']) ? $value_y['price'] : '';
                $button_text = isset($value_y['button_text']) ? $value_y['button_text'] : '';
                $button_link = isset($value_y['button_link']) ? $value_y['button_link'] : '';
                $feature = isset($value_y['feature']) ? $value_y['feature'] : '';
                $link_key = $widget->get_repeater_setting_key( 'title', 'value_y', $key_y );
                if ( ! empty( $button_link['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $button_link['url'] );

                    if ( $button_link['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $button_link['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                if($key_y == 0 || $key_y == 1) : ?>
                    <div class="pxl-pricing--item <?php if($key_y == 0) { echo 'pxl-item--first'; } else { echo 'pxl-item--last'; } ?>">
                        <?php if(!empty($popular )) : ?>
                            <div class="pxl-pricing--popular"><?php echo esc_attr($popular); ?></div>
                        <?php endif; ?>
                        <?php if(!empty($title) || !empty($price)) : ?>
                            <div class="pxl-pricing--meta">
                                <div class="pxl-pricing--meta-inner">
                                    <h3 class="pxl-pricing--title"><?php echo pxl_print_html($title); ?></h3>
                                    <div class="pxl-pricing--price"><?php echo pxl_print_html($price); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <ul class="pxl-pricing--feature">
                            <?php if(!empty($feature)):
                                $career_feature = json_decode($feature, true);
                                foreach ($career_feature as $value): ?>
                                    <li>
                                        <span>
                                            <i class="<?php echo esc_attr($value['icon']); ?>"></i>
                                        </span>
                                        <?php echo esc_attr($value['content']); ?>
                                    </li>
                                <?php endforeach;
                            endif; ?>
                        </ul>
                        <?php if(!empty($button_text)) : ?>
                            <div class="pxl-pricing--button">
                                <a class="btn pxl-btn-effect9" <?php echo implode( ' ', [ $link_attributes ] ); ?>><i class="fas fa-cloud-upload-alt pxl-mr-10"></i><?php echo esc_attr($button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>