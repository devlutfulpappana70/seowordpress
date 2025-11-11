<?php
/**
 * @package Case-Themes
 */

get_header();
$seon_sidebar = seon()->get_sidebar_args(['type' => 'blog', 'content_col'=> '8']); 
$page_title = seon()->get_opt('page_title_name');
$sub_page_title = seon()->get_opt('sub_page_title'); ?>
<div class="container">
    <div class="row <?php echo esc_attr($seon_sidebar['wrap_class']) ?>" >
        <?php if(!empty($page_title) || !empty($sub_page_title)) : ?>
            <div class="pxl-content-top col-12">
                <div class="pxl-sub-page--title pxl-empty"><?php echo esc_attr($sub_page_title); ?></div>
                <h1 class="pxl-page--title pxl-empty"><?php echo esc_attr($page_title); ?></h1>
            </div>
        <?php endif; ?>
        <div id="pxl-content-area" class="<?php echo esc_attr($seon_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/archive/standard' );
                    }
                    seon()->page->get_pagination();
                } else {
                    get_template_part( 'template-parts/content/content', 'none' );
                } ?>
            </main>
        </div>
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
