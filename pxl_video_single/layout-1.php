<?php
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link_video', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'link_video', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'link_video', 'rel', 'nofollow' );
    }
}
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-video-single pxl-video-single1">
	<div class="pxl-meta-inner">
		<div class="pxl-item-layout1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
			<?php if(!empty($settings['image']['id'])) : 
				$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '800x800'; 
				$img = pxl_get_image_by_size( array(
					'attach_id'  => $settings['image']['id'],
					'thumb_size' => $image_size,
				));
				$thumbnail = $img['thumbnail'];
				?>
				<div class="pxl-item--imgprimary">
					<?php echo pxl_print_html($thumbnail); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="pxl-item-content <?php echo esc_attr($settings['pxl_animate2']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay2']); ?>ms">
			<?php
			if(isset($settings['progressbar']) && !empty($settings['progressbar'])): ?>
			    <div class="pxl-progressbar pxl-progressbar-1">
			        <?php foreach ($settings['progressbar'] as $key => $progressbar): ?>
			            <div class="pxl--item">
			            	<div class="row">
			            		<div class="col-4">
			            			<div class="pxl--meta pxl-flex-middle">
					                    <h5 class="pxl--title pxl-flex-grow el-empty"><?php echo pxl_print_html($progressbar['title']); ?></h5>
					                </div>
			            		</div>
			            		<div class="col-6">
			            			<div class="pxl-progressbar--wrap">
					                    <div class="pxl--progressbar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($progressbar['percent']['size']); ?>"></div>
					                </div>	
			            		</div>
			            	</div>
			            </div>
			        <?php endforeach; ?>
			    </div>
			<?php endif; ?>
			<div class="pxl-item-video pxl-video-player">
				<?php if(!empty($settings['image_video']['id'])) : 
					$img_2 = pxl_get_image_by_size( array(
						'attach_id'  => $settings['image_video']['id'],
						'thumb_size' => '270x300',
					));
					$thumbnail_2 = $img_2['thumbnail']; ?>
					<div class="pxl-image-video">
						<?php echo pxl_print_html($thumbnail_2); ?>
						<span class="pxl-space"><i class="far fa-asterisk"></i></span>
					</div>
				<?php endif; ?>
				<a class="pxl-btn-video pxl-action-popup" <?php pxl_print_html($widget->get_render_attribute_string( 'link_video' )); ?>>
					<i class="caseicon-play1"></i>
				</a>
			</div>
		</div>
	</div>
</div>