<?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): ?>
    <div class="pxl-meta pxl-meta2">
    	<div class="pxl-meta-inner">
    		<?php foreach ($settings['lists'] as $key => $value): ?>
	            <div class="pxl-item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	                <div class="pxl-item--text">
	                    <?php echo pxl_print_html($value['text'])?>
	                </div>
	                <div class="pxl-sub-title">
	                    <?php echo pxl_print_html($value['sub_title'])?>
	                </div>
	            </div>
	        <?php endforeach; ?>
    	</div>
    </div>
<?php endif; ?>