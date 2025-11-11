<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = (int)$widget->get_setting('col_md', '');
if($col_md == 'custom') {
    $col_md = $widget->get_setting('col_md_custom', '');
}
$col_lg = (int)$widget->get_setting('col_lg', '');
if($col_lg == 'custom') {
    $col_lg = $widget->get_setting('col_lg_custom', '');
}
$col_xl = (int)$widget->get_setting('col_xl', '');
if($col_xl == 'custom') {
    $col_xl = $widget->get_setting('col_xl_custom', '');
}
$col_xxl = (int)$widget->get_setting('col_xxl', '');
if($col_xxl == 'custom') {
    $col_xxl = $widget->get_setting('col_xxl_custom', '');
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows', false);  
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', 500);

$img_size = $widget->get_setting('img_size');
$show_author = $widget->get_setting('show_author');
$show_category = $widget->get_setting('show_category');
$show_date = $widget->get_setting('show_date');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl,  
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,  
    'slides_gutter'                 => 30, 
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
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-post-carousel pxl-post-carousel1 pxl-blog-style1 <?php echo esc_attr($pxl_animate); ?>" <?php if($settings['drap'] !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'seon'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                        $image_size = !empty($img_size) ? $img_size : '600x393';
                        foreach ($posts as $key => $post):
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        $author = get_user_by('id', $post->post_author);
                        $author_avatar = get_avatar( $post->post_author, 60, '', $author->display_name, array( 'class' => '' ) );
                        $user_position = get_user_meta(get_the_author_meta( 'ID' ), 'user_position', true);
                        $post_video_link = get_post_meta($post->ID, 'post_video_link', true); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner">
                               <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img          = pxl_get_image_by_size( array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size
                                    ) );
                                    $thumbnail    = $img['thumbnail'];
                                    ?>
                                    <div class="pxl-post--featured">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                        <?php if(!empty($post_video_link)) : ?>
                                            <div class="pxl-item-video">
                                                <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup"><i class="caseicon-play1"></i></a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_date == 'true') : ?>
                                            <div class="pxl-item--date ">
                                                <div class="day"><?php $date_formart = get_option('date_format');
                                                echo get_the_date('d', $post->ID); ?></div>
                                                <div class="month"><?php $date_formart = get_option('date_format');
                                                echo get_the_date('M', $post->ID); ?></div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl-item-content">
                                    <h3 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                                    <div class="pxl-post--meta">
                                        <?php if($show_author == 'true'): ?>
                                            <div class="pxl-post--author pxl-flex">
                                                <div class="pxl-author--img pxl-mr-8">
                                                    <?php pxl_print_html($author_avatar); ?>
                                                </div>
                                                <div class="pxl-author-meta">
                                                    <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($show_category == 'true'): ?>
                                            <div class="pxl-item--category">
                                                <i class="pxl-mr-10">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_24_41)">
                                                    <path d="M13.587 6.70598L7.29051 0.4095C7.03499 0.1575 6.68498 0 6.3 0H1.40001C0.626489 0 0 0.626489 0 1.40001V6.3C0 6.6885 0.1575 7.03851 0.413011 7.29051L6.71301 13.5905C6.96501 13.8425 7.31502 14 7.70001 14C8.08499 14 8.43852 13.8425 8.69052 13.5905L13.5905 8.69052C13.8425 8.43501 14 8.08503 14 7.70001C14 7.31151 13.8425 6.96149 13.587 6.70598ZM2.45001 3.50001C1.869 3.50001 1.40001 3.03102 1.40001 2.45001C1.40001 1.869 1.869 1.40001 2.45001 1.40001C3.03102 1.40001 3.50001 1.869 3.50001 2.45001C3.50001 3.03102 3.03099 3.50001 2.45001 3.50001Z" fill="#5A5A5A"/>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_24_41">
                                                    <rect width="14" height="14" fill="white"/>
                                                    </clipPath>
                                                    </defs>
                                                    </svg> 
                                                </i>
                                                <?php the_terms( $post->ID, 'category', '', ' ' ); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
            </div>
            
            <?php if($pagination !== false): ?>
                <div class="pxl-swiper-dots-wrap">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>

            <?php if($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-3">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="fal fa-arrow-left"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="fal fa-arrow-right"></i></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>