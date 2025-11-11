<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Case-Themes
 */
$post_tag = seon()->get_theme_opt( 'post_tag', true );
$post_social_share = seon()->get_theme_opt( 'post_social_share', false );
$tags_list = get_the_tag_list();
$sg_post_title = seon()->get_theme_opt('sg_post_title', 'default');
$post_author_info = seon()->get_theme_opt( 'post_author_info', false );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl---post'); ?>>
    <?php if (has_post_thumbnail()) {
        echo '<div class="pxl-item--image">'; ?>
            <?php the_post_thumbnail('seon-large'); ?>
        <?php echo '</div>';
    }?>
    <div class="pxl-item--holder">
        <?php seon()->blog->get_post_metas(); ?>
    </div>
    <?php if(is_singular('post') && $sg_post_title == 'custom_text') { ?>
        <h2 class="pxl-item--title">
            <?php the_title(); ?>
        </h2>
    <?php } ?>
    <div class="pxl-item--content clearfix">
        <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>

    <?php if($post_tag && $tags_list || $post_social_share ) :  ?>
        <div class="pxl--post-footer">
            <?php if($post_tag) { seon()->blog->get_tagged_in(); } ?>
            <?php if($post_social_share) { seon()->blog->get_socials_share(); } ?>
        </div>
    <?php endif; ?>
    <?php if($post_author_info) { seon()->blog->get_post_author_info(); } ?>
</article><!-- #post -->