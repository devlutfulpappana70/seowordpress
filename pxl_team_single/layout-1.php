<?php
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-team-single pxl-team-single1">
	<div class="pxl-meta-inner">
		<div class="row pxl-team-lv1">
			<div class="col-6 pxl-item-layout1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
				<?php if(!empty($settings['image']['id'])) : 
					$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; 
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
			<div class="col-6 pxl-item-layout2 <?php echo esc_attr($settings['pxl_animate2']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay2']); ?>ms">
				<div class="pxl-inner-title">
					<h3 class="pxl-item-heading"><?php echo esc_attr($settings['title_heading']); ?></h3>
					<div class="pxl-sub-title">
						<span>
							<?php echo esc_attr($settings['sub_title']); ?>
						</span>
					</div>
				</div>

				<?php
				if(isset($settings['progressbar']) && !empty($settings['progressbar'])): ?>
				    <div class="pxl-progressbar pxl-progressbar-1">
				        <?php foreach ($settings['progressbar'] as $key => $progressbar): ?>
				            <div class="pxl--item">
				                <div class="pxl--meta pxl-flex-middle">
				                    <h5 class="pxl--title pxl-flex-grow el-empty pxl-mr-20"><?php echo pxl_print_html($progressbar['title']); ?></h5>
				                    <div class="pxl--percentage"><?php echo esc_attr($progressbar['percent']['size']); ?>%</div>
				                </div>
				                <div class="pxl-progressbar--wrap">
				                    <div class="pxl--progressbar" role="progressbar" data-valuetransitiongoal="<?php echo esc_attr($progressbar['percent']['size']); ?>"></div>
				                </div>
				            </div>
				        <?php endforeach; ?>
				    </div>
				<?php endif; ?>

				<div class="pxl-item-text">
					<div class="row">
						<div class="col-6">
							<div class="pxl-text text1">
								<?php echo esc_attr($settings['text1']); ?>
							</div>
						</div>
						<div class="col-6">
							<div class="pxl-text text2 pxl-pl-20">
								<?php echo esc_attr($settings['text2']); ?>
							</div>
						</div>
					</div>
				</div>

				<?php
				$is_new = \Elementor\Icons_Manager::is_migration_allowed();
				if(isset($settings['social']) && !empty($settings['social']) && count($settings['social'])): ?>
				    <div class="pxl-icon-list">
				        <?php foreach ($settings['social'] as $key => $value):
				            $icon_key = $widget->get_repeater_setting_key( 'pxl_social', 'social', $key );
				            $widget->add_render_attribute( $icon_key, [
				                'class' => $value['pxl_social'],
				                'aria-hidden' => 'true',
				            ] );
				            $link_key = $widget->get_repeater_setting_key( 'social_link', 'value', $key );
				            if ( ! empty( $value['social_link']['url'] ) ) {
				                $widget->add_render_attribute( $link_key, 'href', $value['social_link']['url'] );

				                if ( $value['social_link']['is_external'] ) {
				                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
				                }

				                if ( $value['social_link']['nofollow'] ) {
				                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
				                }
				            }
				            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
				            <?php if ( ! empty( $value['pxl_social'] ) ) : ?>
				                <a class="elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
				                    <?php if ( $is_new ):
				                        \Elementor\Icons_Manager::render_icon( $value['pxl_social'], [ 'aria-hidden' => 'true' ] );
				                    elseif(!empty($value['pxl_social'])): ?>
				                        <i class="<?php echo esc_attr( $value['pxl_social'] ); ?>" aria-hidden="true"></i>
				                    <?php endif; ?>
				                </a>
				            <?php endif; ?>
				        <?php endforeach; ?>
				    </div>
				<?php endif; ?>
			</div>    
		</div>
	</div>
</div>