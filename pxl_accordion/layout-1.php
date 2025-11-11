<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$wg_id = pxl_get_element_id($settings);
if(!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            ?>
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#'.$wg_id.'-'.$pxl_id); ?>">
                    <?php if($settings['style'] == 'style-default') : ?>
                        <span class="pxl-icon pxl-mr-10">
                            <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_12_72)">
                            <path d="M0 10C5 10 10 5 10 0C10 5 15 10 20 10C15 10 10 15 10 20C10 15 5 10 0 10Z"/>
                            </g>
                            </svg> 
                        </span>
                    <?php endif; ?>
                    <?php if($settings['style'] == 'style-lv2') : ?><span class="pxl-icon--action pxl-mr-20"><i></i></span><?php endif; ?>
                    <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                    <?php if($settings['style'] == 'style-lv3') : ?><span class="pxl-icon--action"><i></i></span><?php endif; ?>
                    <?php if($settings['style'] == 'style-default') : ?><span class="pxl-icon--action pxl-ml-20"><i class="far fa-angle-double-right"></i></span><?php endif; ?>
                </<?php pxl_print_html($settings['title_tag']); ?>>
                <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-accordion--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>><?php echo wp_kses_post(nl2br($desc)); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>