<?php 
 
if(!function_exists('seon_get_post_grid')){
    function seon_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                seon_get_post_grid_layout1($posts, $settings);
                break;

            case 'portfolio-1':
                seon_get_portfolio_grid_layout1($posts, $settings);
                break;

            case 'service-1':
                seon_get_service_grid_layout1($posts, $settings);
                break;

            case 'service-2':
                seon_get_service_grid_layout2($posts, $settings);
                break;

            default:
                return false;
                break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function seon_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '600x393';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; 
            $author = get_user_by('id', $post->post_author);
            $author_avatar = get_avatar( $post->post_author, 60, '', $author->display_name, array( 'class' => '' ) );
            $user_position = get_user_meta(get_the_author_meta( 'ID' ), 'user_position', true);
            $post_video_link = get_post_meta($post->ID, 'post_video_link', true); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
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
        <?php
        endforeach;
    endif;
}

// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function seon_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '540x616';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                if($img_id) {
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-post--featured hover-imge-effect3">
                            <a class="pxl-featured-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                        <div class="pxl-post--overlay"></div>
                        <div class="pxl-post--holder">
                            <a class="pxl-holder-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                            <div class="pxl-holder--inner">
                                <?php if($show_button == 'true'): ?>
                                    <div class="pxl-post--icon">
                                        <a class="pxl-iem-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <i class="flaticon-right-up"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl-content">
                                    <?php if($show_category == 'true'): ?>
                                        <div class="pxl-category">
                                            <div class="pxl-post--category link-none">
                                                <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl-title">
                                        <h5 class="pxl-post--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}

// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function seon_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";   
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $gradient_color = seon()->get_opt( 'gradient_color' );
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner pxl-not-active <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="pxl-item--icon">
                            <div class="pxl-inner-icon">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                        $icon_img = pxl_get_image_by_size( array(
                            'attach_id'  => $service_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                        <div class="pxl-item--icon">
                            <div class="pxl-inner-icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--holder">
                        <h3 class="pxl-item--title">
                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                        </h3>
                        <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                            <div class="pxl-item--content">
                                <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function seon_get_service_grid_layout2($posts = [], $settings = []){ 
    extract($settings);

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";   
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $gradient_color = seon()->get_opt( 'gradient_color' );
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner pxl-not-active <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-inner-content">
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="pxl-item--icon">
                                <div class="pxl-inner-icon">
                                    <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="pxl-item--icon">
                                <div class="pxl-inner-icon">
                                    <?php echo wp_kses_post($icon_thumbnail); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-item--holder">
                            <h3 class="pxl-item--title">
                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                            </h3>
                            <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                                <div class="pxl-item--content">
                                    <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="pxl-inner-content-hover">
                        <div class="pxl-item-meta">
                            <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                <div class="pxl-item--icon">
                                    <div class="pxl-inner-icon">
                                        <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                $icon_img = pxl_get_image_by_size( array(
                                    'attach_id'  => $service_icon_img['id'],
                                    'thumb_size' => 'full',
                                ));
                                $icon_thumbnail = $icon_img['thumbnail'];
                                ?>
                                <div class="pxl-item--icon">
                                    <div class="pxl-inner-icon">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="pxl-item--holder">
                                <h3 class="pxl-item--title">
                                    <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                </h3>
                                <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                                    <div class="pxl-item--content">
                                        <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if($show_button == 'true') : ?>
                                <div class="pxl-post--readmore">
                                    <a class="btn-readmore-1" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                        <span><?php if(!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Read more', 'seon');
                                        } ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
// End Service Grid
//-------------------------------------------------

// Start Product Grid
//--------------------------------------------------
// End Product Grid
//--------------------------------------------------

add_action( 'wp_ajax_seon_load_more_post_grid', 'seon_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_seon_load_more_post_grid', 'seon_load_more_post_grid' );
function seon_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'seon'));
        }
    
        $settings = isset($_POST['settings']) ? $_POST['settings'] : null;
       
        $source = isset($settings['source']) ? $settings['source'] : '';
        $term_slug = isset($settings['term_slug']) ? $settings['term_slug'] : '';
        if( !empty($term_slug) && $term_slug !='*'){
            $term_slug = str_replace('.', '', $term_slug);
            $source = [$term_slug.'|'.$settings['tax'][0]]; 
        }
        if( isset($_POST['handler_click']) && sanitize_text_field(wp_unslash( $_POST[ 'handler_click' ] )) == 'filter'){
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        }else{
            set_query_var('paged', $settings['paged']);
        }
        extract(pxl_get_posts_of_grid($settings['post_type'], [
                'source' => $source,
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => isset($settings['post_ids'])?$settings['post_ids']: [],
                'post_not_in' => isset($settings['post_not_in'])?$settings['post_not_in']: [],
            ],
            $settings['tax']
        ));

        ob_start();
            seon_get_post_grid($posts, $settings);
        $html = ob_get_clean();

        $pagin_html = '';
        if( isset($settings['pagination_type']) && $settings['pagination_type'] == 'pagination' ){ 
            ob_start();
                seon()->page->get_pagination( $query,  true );
            $pagin_html = ob_get_clean();
        }
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'seon'),
                'data' => array(
                    'html' => $html,
                    'pagin_html' => $pagin_html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}
 