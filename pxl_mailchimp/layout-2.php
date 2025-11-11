<div class="pxl-mailchimp-from2">
	<div class="pxl-item-inner">
		<div class="pxl-item-meta">
			<div class="pxl-item-title">
				<span><?php echo esc_attr($settings['title']); ?></span>
				<span class="pxl-title-decoration"><?php echo esc_attr($settings['title_decoration']); ?></span>
			</div>
			<div class="pxl-item-position">
				<?php echo esc_attr($settings['position']); ?>
			</div>
		</div>
		<?php if(class_exists('MC4WP_Container')) : ?>
			<div class="pxl-mailchimp pxl-mailchimp-l1 <?php echo esc_attr($settings['style']); ?>">
				<?php echo do_shortcode('[mc4wp_form]'); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
