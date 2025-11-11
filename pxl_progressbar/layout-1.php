<?php $html_id = pxl_get_element_id($settings);
if(isset($settings['progressbar']) && !empty($settings['progressbar'])):
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '61x61'; ?>
    <div class="pxl-progressbar pxl-progressbar-1 <?php echo esc_attr($settings['style']); ?>">
        <?php foreach ($settings['progressbar'] as $key => $progressbar):
            $image = isset($progressbar['image']) ? $progressbar['image'] : '';
        ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <?php if(!empty($image['id'])) { 
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => $image_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                    <div class="pxl-image pxl-mr-30">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                <?php } ?>
                <div class="pxl-item-content">
                    <div class="pxl-item-text">
                        <span class="pxl-item-text-blue"><?php echo pxl_print_html($progressbar['text_layout1']); ?></span>
                        <span class="pxl-item-text-white"><?php echo pxl_print_html($progressbar['text_layout2']); ?></span>
                    </div>
                    <div class="pxl-progressbar--wrap">
                        <div class="pxl--progressbar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($progressbar['percent']['size']); ?>"></div>
                    </div>
                    <div class="pxl--meta pxl-flex-middle">
                        <h5 class="pxl--title pxl-flex-grow el-empty pxl-mr-20"><?php echo pxl_print_html($progressbar['title']); ?></h5>
                        <div class="pxl--percentage"><?php echo esc_attr($progressbar['percent']['size']); ?>%</div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>