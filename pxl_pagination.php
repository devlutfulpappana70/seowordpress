<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pagination',
        'title' => esc_html__('Case Pagination', 'seon'),
        'icon' => 'eicon-apps',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'seon'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        
                    ),
                ),
            ),
        ),
    ),
    seon_get_class_widget_path()
);