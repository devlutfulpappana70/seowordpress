<?php
$arrows = $widget->get_setting('arrows', false);  
$infinite = $widget->get_setting('infinite', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap', false);  
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => 1,
    'slides_to_show_xxl'            => 1,
    'slides_to_show_lg'             => 1,
    'slides_to_show_md'             => 1,
    'slides_to_show_sm'             => 1,
    'slides_to_show_xs'             => 1,
    'slides_to_scroll'              => 1,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
];
$opts_thumb = [
    'slide_direction'               => 'horizontal',
    'slides_to_show'                => 'auto', 
    'slide_mode'                    => 'slide',
    'loop'                          => false,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$widget->add_render_attribute( 'thumb', [
    'class'         => 'pxl-swiper-thumbs',
    'data-settings' => wp_json_encode($opts_thumb)
]);
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel2" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'seon'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'thumb' )); ?>>
                <div class="pxl-swiper-wrapper swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $image_thumb = isset($value['image']) ? $value['image'] : ''; 
                        if($key < 6) : ?>
                            <div class="pxl-swiper-slide swiper-slide">
                                <?php if(!empty($image_thumb['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image_thumb['id'],
                                        'thumb_size' => '100x100',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--thumb">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        if($key < 6) : ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                    <?php if(!empty($image['id'])) { 
                                        $img = pxl_get_image_by_size( array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => '132x132',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail'];?>
                                        <div class="pxl-item--avatar">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                            <div class="pxl-item--icon">
                                                <span></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                    <div class="pxl-item--meta">
                                        <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h3>
                                        <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                    </div>
                               </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <?php if($pagination !== false || $arrows !== false): ?>
            <div class="pxl-swiper-bottom">
                <?php if($pagination !== false): ?>
                    <div class="pxl-swiper-dots style-1"></div>
                <?php endif; ?>
                <?php if($arrows !== false): ?>
                    <div class="pxl-swiper-arrow-wrap style-3">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="fal fa-arrow-left"></i></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="fal fa-arrow-right"></i></div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
    </div>
<?php endif; ?>
