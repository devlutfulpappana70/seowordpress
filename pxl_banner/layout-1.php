<div class="pxl-banner pxl-banner1">
	<div class="pxl-box-inner <?php echo esc_attr($settings['pxl_animate_img1']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_img1']); ?>ms">
		<?php if(!empty($settings['banner_image']['id'])) : 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '800x900'; 
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