<?php
/**
 * @package Case-Themes
 */
$archive_readmore = seon()->get_theme_opt( 'archive_readmore', true );
$archive_readmore_text = seon()->get_theme_opt('archive_readmore_text', esc_html__('Explore more', 'seon'));
$featured_img_size = seon()->get_theme_opt('featured_img_size', '970x440');
$post_video_link = get_post_meta( $post->ID, 'post_video_link', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl---post pxl-item--archive pxl-item--standard'); ?>>
    <div class="pxl-item-inner">
        <?php if (has_post_thumbnail()) {
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => get_post_thumbnail_id($post->ID),
                'thumb_size' => $featured_img_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            echo '<div class="pxl-item--image">'; ?>
                <a href="<?php echo esc_url( get_permalink()); ?>"><?php echo pxl_print_html($thumbnail); ?></a>
                <?php if($archive_readmore) : ?>
                    <div class="pxl-item-readmore-icon">
                        <a class="btn--readmore-icon" href="<?php echo esc_url( get_permalink()); ?>">
                            <span class="btn--icon">
                                <i class="fas fa-long-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="pxl-post-video pxl-video-player">
                    <?php if(!empty($post_video_link)) : ?>
                        <a class="pxl-btn-video pxl-action-popup" href="<?php echo esc_url($post_video_link); ?>">
                            <i class="caseicon-play1"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php echo '</div>';
        } ?>
        <div class="pxl-item--holder">
            <?php seon()->blog->get_archive_meta(); ?>
            <h2 class="pxl-item--title">
                <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                    <?php if(is_sticky()) { ?>
                        <i class="caseicon-check-mark pxl-mr-4"></i>
                    <?php } ?>
                    <?php the_title(); ?>
                </a>
            </h2>
            <div class="pxl-item--excerpt">
                <?php
                    seon()->blog->get_excerpt();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
            <?php if($archive_readmore) : ?>
                <div class="pxl-item--readmore">
                    <a class="btn-readmore" href="<?php echo esc_url( get_permalink()); ?>">
                        <span class="btn--text">
                            <?php echo seon_html($archive_readmore_text); ?>
                        </span>
                        <span class="btn-icon">
                            <i class="fal fa-long-arrow-right pxl-ml-5"></i>
                        </span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>