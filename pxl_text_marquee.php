<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
pxl_add_custom_widget(
    array(
        'name' => 'pxl_text_marquee',
        'title' => esc_html__('Case Text Marquee', 'seon'),
        'icon' => 'eicon-wordart',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'seon'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'item_content',
                            'label' => esc_html__('Content', 'seon'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'icon_image',
                                    'label' => esc_html__( 'Icon Image', 'seon' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'seon'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'color_type',
                                    'label' => esc_html__('Color Type', 'seon' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'text-normal' => 'Normal',
                                        'text-gradient' => 'Gradient',
                                        'text-outline' => 'Outline',
                                    ],
                                    'default' => 'text-normal',
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),

                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__('Style', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Text Color', 'seon' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--text.text-outline' => '-webkit-text-stroke-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Text Typography', 'seon' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-text-marquee .pxl-item--text',
                        ),
                        array(
                            'name' => 'logo_width',
                            'label' => esc_html__('Logo Box Width', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'seon' ),
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-text-marquee .pxl-item--logo' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                seon_widget_animation_settings(),
            ),
        ),
    ),
    seon_get_class_widget_path()
);