<?php
/**
 *
 * @package Case-Themes
 */
get_header();
$seon_sidebar_pos = seon()->get_theme_opt( 'blog_sidebar_pos', 'right' );
$seon_sidebar = seon()->get_sidebar_args(['type' => 'blog', 'content_col'=> '8']);
?>
<div class="container">
    <div class="row <?php echo esc_attr($seon_sidebar['wrap_class']) ?> pxl-post-listing">
        <section id="pxl-content-area" class="<?php echo esc_attr($seon_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/content-search' );
                    }
                    seon()->page->get_pagination();
                } else {
                    get_template_part( 'template-parts/content/content', 'none' );
                } ?>
            </main>
        </section>
        <?php if ($seon_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($seon_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
