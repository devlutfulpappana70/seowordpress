<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll');
$arrows = $widget->get_setting('arrows', false);  
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
$infinite = $widget->get_setting('infinite', false);  
$speed = $widget->get_setting('speed', 500);
$drap = $widget->get_setting('drap', false);  
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); 
?>
<?php if(isset($settings['carousel']) && !empty($settings['carousel']) && count($settings['carousel'])): 
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '700x550'; ?>
    <div class="pxl-swiper-slider pxl-carousel-custom pxl-carousel-custom1 pxl-carousel-layout1 <?php echo esc_attr($settings['pxl_animate']); ?>" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'seon'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['carousel'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $category = isset($value['category']) ? $value['category'] : '';
                        $tag = isset($value['tag']) ? $value['tag'] : '';
                        $chart_title = isset($value['chart_title']) ? $value['chart_title'] : '';
                        $chart_line_width = isset($value['chart_line_width']) ? $value['chart_line_width'] : '';
                        $chart_line_cap = isset($value['chart_line_cap']) ? $value['chart_line_cap'] : '';
                        $percentage_value = isset($value['percentage_value']) ? $value['percentage_value'] : '';
                        $counter_number = isset($value['counter_number']) ? $value['counter_number'] : '';
                        $counter_suffix = isset($value['counter_suffix']) ? $value['counter_suffix'] : '';
                        $chart_size = isset($value['chart_size']) ? $value['chart_size'] : '';
                        $bar_color_to = isset($value['bar_color_to']) ? $value['bar_color_to'] : '';
                        $bar_color_from = isset($value['bar_color_from']) ? $value['bar_color_from'] : '';
                        $track_color = isset($value['track_color']) ? $value['track_color'] : '';
                        $link_text = isset($value['link_text']) ? $value['link_text'] : '';
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
                        $link_attributes = $widget->get_render_attribute_string( $link_key ); 
                        ?>
                         <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner">
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => $image_size,
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail']; ?>
                                    <div class="pxl-img-pie-chart">
                                        <div class="pxl-item--image hover-imge-effect2">
                                            <div class="pxl-img-overlay"></div>
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                        <?php if(!empty($value['percentage_value'])) : ?>
                                            <div class="pxl-pie-chart pxl-counter">
                                                <div class="pxl-item--value pxl-percentage" style="min-height: <?php echo esc_attr($value['chart_size']['size']); ?>px;" data-size="<?php echo esc_attr($value['chart_size']['size']); ?>" data-bar-color-to="<?php if(!empty($value['bar_color_to'])) { echo esc_attr($value['bar_color_to']); } else { echo '#005cf8'; } ?>" data-bar-color-from="<?php if(!empty($value['bar_color_from'])) { echo esc_attr($value['bar_color_from']); } else { echo '#00ddb4'; } ?>" data-track-color="rgba(0,0,0,0)" data-line-width="<?php echo esc_attr($value['chart_line_width']['size']); ?>" data-line-cap="<?php echo esc_attr($value['chart_line_cap']); ?>" data-percent="-<?php echo esc_attr($value['percentage_value']); ?>">
                                                    <div class="pxl-item-divider"></div>
                                                    <div class="pxl-item--holder">
                                                        <?php if(!empty($value['counter_number'])) : ?>
                                                            <div class="pxl--counter-number">
                                                                <span class="pxl-counter--value" data-duration="2000" data-to-value="<?php echo esc_attr($value['counter_number']); ?>" data-delimiter="">1</span>
                                                                <span class="pxl--counter-suffix"><?php echo esc_attr($value['counter_suffix']); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="pxl-chart-title"><?php echo pxl_print_html($chart_title); ?></div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-item-content">
                                    <h5 class="pxl-item--title title-hover-line">
                                        <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                            <?php echo pxl_print_html($title); ?>
                                        </a>
                                    </h5>
                                    <div class="pxl-holder--inner">
                                        <div class="pxl-category pxl-list pxl-mr-5"><?php echo pxl_print_html($category); ?></div>
                                        <div class="pxl-tag pxl-list"><?php echo pxl_print_html($tag); ?></div>
                                    </div>
                                    <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                                </div>
                                <div class="pxl-btn-link">
                                    <a class="btn" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                        <span><?php echo pxl_print_html($value['link_text'])?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <?php if($pagination !== false): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>

            <?php if($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-4">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
<?php endif; ?>
