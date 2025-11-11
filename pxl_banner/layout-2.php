<div class="pxl-banner pxl-banner2">
	<div class="pxl-box-inner <?php echo esc_attr($settings['pxl_animate_img1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_img1']); ?>ms">
		<span class="pxl-bg-color"></span>
		<?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
            <div class="pxl-item--icon pxl-mr-20">
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="pxl-item--icon">
                <?php $img_icon  = pxl_get_image_by_size( array(
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => '50x35',
                    ) );
                    $thumbnail_icon    = $img_icon['thumbnail'];
                echo pxl_print_html($thumbnail_icon); ?>
            </div>
        <?php endif; ?>
		<?php if(!empty($settings['banner_image']['id'])) : 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '1000x978'; 
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image']['id'],
				'thumb_size' => $image_size,
			));
			$thumbnail = $img['thumbnail'];
			?>
			<div class="pxl-item--imgprimary">
				<?php echo pxl_print_html($thumbnail); ?>
			</div>
		<?php endif; ?>
	</div>
</div>