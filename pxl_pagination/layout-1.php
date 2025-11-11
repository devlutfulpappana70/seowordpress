<?php
global $post;
$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
$next     = get_adjacent_post( false, '', false );
if ( ! $next && ! $previous ) {
    return;
}
$next_post = get_next_post();
$previous_post = get_previous_post();

if( !empty($next_post) || !empty($previous_post) ) { ?>
    <div class="pxl-pagination1">
        <div class="pxl--item item--prev">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <div class="pxl-item-icon pxl-icon-prev pxl-mr-20">
                    <a class="pxl-icon-link" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                        <i class="fal fa-arrow-left"></i>
                    </a>
                </div>
                <div class="pxl-title-inner pxl-item-prev-title">
                    <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><span><?php echo esc_html__('Prev Service', 'seon'); ?></span></a>
                </div>
            <?php } ?>
        </div>
        
        <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
            <div class="pxl--item item--next">
                <div class="pxl-title-inner pxl-item-next-title">
                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><span><?php echo esc_html__('Next Service', 'seon'); ?></span></a>
                </div>
                <div class="pxl-item-icon pxl-icon-next pxl-ml-20">
                    <a class="pxl-icon-link" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        <?php } ?>

    </div>
<?php } ?>