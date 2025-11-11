<?php
/**
 * @package Case-Themes
 */
get_header(); ?>
<div class="container">
    <div class="row content-row">
        <div id="pxl-content-area" class="pxl-content-area col-12">
            <main id="pxl-content-main">
                <div class="pxl-error-inner">
                    <div class="pxl-error-image"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/image-404.jpg'); ?>" /></div>
                    <h3 class="pxl-error-title">
                        <?php echo esc_html__('Oops! Page Not Found.', 'seon'); ?>
                    </h3>
                    <a class="btn-submit" href="<?php echo esc_url(home_url('/')); ?>">
                        <span><?php echo esc_html__('back to home page', 'seon'); ?></span>
                    </a>
                </div>
            </main>
        </div>
    </div>
</div>
<?php get_footer();
