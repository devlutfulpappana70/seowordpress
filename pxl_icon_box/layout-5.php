<div class="pxl-icon-box pxl-icon-box5 <?php echo esc_attr($settings['style_type']); ?> ">
	<div class="pxl-item-inner <?php echo esc_attr($settings['pxl_animate1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay1']); ?>ms">
		<div class="pxl-meta-content">
			<?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                <div class="pxl-item--icon pxl-mr-15">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                </div>
            <?php endif; ?>
            <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
                <div class="pxl-item--icon pxl-mr-15">
                    <?php $img_icon  = pxl_get_image_by_size( array(
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => 'full',
                        ) );
                        $thumbnail_icon    = $img_icon['thumbnail'];
                    ?>
                    <?php echo pxl_print_html($thumbnail_icon);?>
                </div>
            <?php endif; ?>
			<div class="title pxl-text-link">
                <?php echo esc_attr($settings['title']); ?>
            </div>
		</div>
	</div>
</div>