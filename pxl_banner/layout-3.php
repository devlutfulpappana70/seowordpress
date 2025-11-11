<div class="pxl-banner pxl-banner3">
	<div class="pxl-box-inner">
		<div class="container">
			<div class="row">
				<div class="pxl-section1 col-7">
					<?php if(!empty($settings['banner_image']['id'])) : 
						$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; 
						$img = pxl_get_image_by_size( array(
							'attach_id'  => $settings['banner_image']['id'],
							'thumb_size' => $image_size,
						));
						$thumbnail = $img['thumbnail'];
						?>
						<div class="pxl-item--imgprimary <?php echo esc_attr($settings['pxl_animate_img1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_img1']); ?>ms">
							<?php echo pxl_print_html($thumbnail); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="pxl-section2 col-5">
					<div class="pxl-divider"></div>
					<?php if(!empty($settings['banner_image2']['id'])) : 
						$image_size2 = !empty($settings['img_size2']) ? $settings['img_size2'] : 'full'; 
						$img_2 = pxl_get_image_by_size( array(
							'attach_id'  => $settings['banner_image2']['id'],
							'thumb_size' => $image_size2,
						));
						$thumbnail_2 = $img_2['thumbnail']; ?>
						<div class="pxl-item--imgsecondary <?php echo esc_attr($settings['pxl_animate_img2']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_img2']); ?>ms"><?php echo pxl_print_html($thumbnail_2); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>