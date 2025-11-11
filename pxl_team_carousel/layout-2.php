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

if ( ! empty( $settings['wg_btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['wg_btn_link']['url'] );

    if ( $settings['wg_btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['wg_btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
} ?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): 
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '700x580'; ?>
    <div class="pxl-swiper-slider pxl-team pxl-team-carousel2 pxl-team-layout2" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'seon'); ?>"<?php endif; ?>>
        <div class="pxl-inner-content">
            <?php if(!empty($settings['wg_heading']) || $settings['wg_desc']) : ?>
                <div class="pxl-post-content1">
                    <div class="pxl-content--inner">
                        <div class="pxl-widget--desc pxl-empty <?php echo esc_attr($settings['pxl_animate_desc']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_desc']); ?>ms"><?php echo esc_attr($settings['wg_desc']); ?></div>
                        <h3 class="pxl-widget--title pxl-empty <?php echo esc_attr($settings['pxl_animate_title']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_title']); ?>ms"><?php echo esc_attr($settings['wg_heading']); ?></h3>
                        <?php if(!empty($settings['wg_btn_text'])) : ?>
                            <div class="pxl-widget--button <?php echo esc_attr($settings['pxl_animate_btn']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_btn']); ?>ms">
                                <a class="pxl-btn" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                                    <span class="pxl--btn-text"><?php echo esc_attr($settings['wg_btn_text']); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="pxl-post-content2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <div class="pxl-carousel-inner">
                    <?php if($arrows !== false): ?>
                        <div class="pxl-swiper-arrow-wrap style-5">
                            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="fas fa-arrow-left"></i></div>
                            <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="fas fa-arrow-right"></i></div>
                        </div>
                    <?php endif; ?>

                    <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                        <div class="pxl-swiper-wrapper">
                            <?php foreach ($settings['team'] as $key => $value):
                                $title = isset($value['title']) ? $value['title'] : '';
                                $position = isset($value['position']) ? $value['position'] : '';
                                $image = isset($value['image']) ? $value['image'] : '';
                                $social = isset($value['social']) ? $value['social'] : '';
                                $link_key = $widget->get_repeater_setting_key( 'item_link', 'value', $key );
                                if ( ! empty( $value['item_link']['url'] ) ) {
                                    $widget->add_render_attribute( $link_key, 'href', $value['item_link']['url'] );

                                    if ( $value['item_link']['is_external'] ) {
                                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                                    }

                                    if ( $value['item_link']['nofollow'] ) {
                                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                                    }
                                }
                                $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>

                                 <div class="pxl-swiper-slide">
                                    <div class="pxl-item--inner">
                                        <?php if(!empty($image['id'])) { 
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => $image_size,
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail']; ?>
                                            <div class="pxl-item--image">
                                                <?php if ( ! empty( $value['item_link']['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                                    <?php echo wp_kses_post($thumbnail); ?>
                                                <?php if ( ! empty( $value['item_link']['url'] ) ) { ?></a><?php } ?>
                                                
                                                <?php if(!empty($social)): ?>
                                                    <div class="pxl-item--social">
                                                        <span class="pxl-social--button"><i class="fas fa-share-alt"></i></span>
                                                        <div class="pxl-social-inner">
                                                            <?php  $team_social = json_decode($social, true);
                                                            foreach ($team_social as $value): ?>
                                                                <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php } ?>
                                        <div class="pxl-item--holder">
                                            <div class="pxl-holder--inner">
                                                <h3 class="pxl-item--title"><?php echo pxl_print_html($title); ?></h3>
                                                <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <?php if($pagination !== false): ?>
                        <div class="pxl-swiper-dots style-1"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
