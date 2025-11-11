<div class="pxl-banner pxl-banner4">
	<div class="pxl-box-inner <?php echo esc_attr($settings['pxl_animate_img1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_img1']); ?>ms">
		<?php if(!empty($settings['banner_image']['id'])) : 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; 
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image']['id'],
				'thumb_size' => $image_size,
			));
			$thumbnail = $img['thumbnail'];
			?>
			<?php echo pxl_print_html($thumbnail); ?>
		<?php endif; ?>
		<?php if(!empty($settings['banner_image2']['id'])) : 
			$image_size2 = !empty($settings['img_size2']) ? $settings['img_size2'] : 'full'; 
			$img_2 = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image2']['id'],
				'thumb_size' => $image_size2,
			));
			$thumbnail_2 = $img_2['thumbnail']; ?>
			<?php echo pxl_print_html($thumbnail_2); ?>
		<?php endif; ?>
	</div>
</div>