<?php
// 'pxl-splitting',
// 'pxl-typography-animation',
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('Case Heading', 'seon' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'seon' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"], Highlight text with shortcode: [highlight text="Text"] and Highlight image with shortcode: [highlight_image id_image="123"]',
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'seon' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'sub_number',
                            'label' => esc_html__('Sub Number', 'seon' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'seon' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'seon' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'seon' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'seon' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'seon' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'seon' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                                '{{WRAPPER}} .pxl-heading .pxl-item--title.style-outline .pxl-text-line-backdrop svg' => 'stroke:{{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'seon' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Title Shadow', 'seon' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Bottom Spacer', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'h_title_style',
                            'label' => esc_html__('Style', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-outline' => 'Outline',
                                'style-shape' => 'Shape',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'color_shape1',
                            'label' => esc_html__('Color Shape 1', 'seon' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title.style-shape .pxl-heading--shape::before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'h_title_style' => ['style-shape'],
                            ],
                        ),
                        array(
                            'name' => 'color_shape2',
                            'label' => esc_html__('Color Shape 2', 'seon' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title.style-shape .pxl-heading--shape::after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'h_title_style' => ['style-shape'],
                            ],
                        ),
                        array(
                            'name' => 'shape_space_top',
                            'label' => esc_html__('Shape Top Spacer', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title.style-shape .pxl-heading--shape' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'h_title_style' => ['style-shape'],
                            ],
                        ),
                        array(
                            'name' => 'align_items',
                            'label' => esc_html__('Shape Align Items', 'seon' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'flex-start' => [
                                    'title' => esc_html__( 'Flex Start', 'seon' ),
                                    'icon' => 'far fa-arrow-alt-to-top',
                                ],
                                'Center' => [
                                    'title' => esc_html__( 'Center', 'seon' ),
                                    'icon' => 'far fa-arrows-alt-v',
                                ],
                                'flex-end' => [
                                    'title' => esc_html__( 'Flex End', 'seon' ),
                                    'icon' => 'far fa-arrow-alt-to-bottom',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title.style-shape' => 'align-items: {{VALUE}};',
                            ],
                            'condition' => [
                                'h_title_style' => ['style-shape'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case Animate', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => seon_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'seon' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_sub',
                    'label' => esc_html__('Sub Title', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'sub_title_style',
                                'label' => esc_html__('Style', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'px-sub-title-default' => 'Default',
                                    'px-sub-title-primary' => 'Primary',
                                    'px-sub-title-style1' => 'Style1',
                                    'px-sub-title-style2' => 'Style2',
                                    'px-sub-title-style3' => 'Style3',
                                ],
                                'default' => 'px-sub-title-default',
                            ),
                            array(
                                'name' => 'sub_title_color',
                                'label' => esc_html__('Color', 'seon' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'background: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_typography',
                                'label' => esc_html__('Typography', 'seon' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle, {{WRAPPER}} .pxl-heading .pxl-item--subtitle span',
                            ),

                            array(
                                'name' => 'sub_title_space_top',
                                'label' => esc_html__('Top Spacer', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_space_bottom',
                                'label' => esc_html__('Bottom Spacer', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'pxl_animate_sub',
                                'label' => esc_html__('Case Animate', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => seon_widget_animate(),
                                'default' => '',
                            ),
                            array(
                                'name' => 'pxl_animate_delay_sub',
                                'label' => esc_html__('Animate Delay', 'seon' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => '0',
                                'description' => 'Enter number. Default 0ms',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_style_highlight',
                    'label' => esc_html__('Highlight Text', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'highlight_style',
                                'label' => esc_html__('Style', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'highlight-default' => 'Default',
                                    'highlight-text-gradient' => 'Text Gradient',
                                ],
                                'default' => 'highlight-default',
                            ),
                            array(
                                'name' => 'highlight_color',
                                'label' => esc_html__('Color', 'seon' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-default'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_color_from',
                                'label' => esc_html__('Color From', 'seon' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => '--gradient-color-from: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-text-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_color_to',
                                'label' => esc_html__('Color To', 'seon' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => '--gradient-color-to: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-text-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_typography',
                                'label' => esc_html__('Typography', 'seon' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--highlight',
                            ),
                            array(
                                'name' => 'highlight_text_image',
                                'label' => esc_html__( 'Text Image', 'seon' ),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-image: url( {{URL}} );',
                                ],  
                            ),
                            array(
                                'name' => 'highlight_image_position',
                                'label' => esc_html__( 'Text Image Position', 'seon' ),
                                'type'         => \Elementor\Controls_Manager::SELECT,
                                'options'      => array(
                                    ''              => esc_html__( 'Default', 'seon' ),
                                    'center center' => esc_html__( 'Center Center', 'seon' ),
                                    'center left'   => esc_html__( 'Center Left', 'seon' ),
                                    'center right'  => esc_html__( 'Center Right', 'seon' ),
                                    'top center'    => esc_html__( 'Top Center', 'seon' ),
                                    'top left'      => esc_html__( 'Top Left', 'seon' ),
                                    'top right'     => esc_html__( 'Top Right', 'seon' ),
                                    'bottom center' => esc_html__( 'Bottom Center', 'seon' ),
                                    'bottom left'   => esc_html__( 'Bottom Left', 'seon' ),
                                    'bottom right'  => esc_html__( 'Bottom Right', 'seon' ),
                                    'initial'       =>  esc_html__( 'Custom', 'seon' ),
                                ),
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-position: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_text_image[url]!' => ''
                                ]        
                            ),
                            array(
                                'name' => 'highlight_image_size',
                                'label' => esc_html__( 'Text Image Size', 'seon' ),
                                'type'         => \Elementor\Controls_Manager::SELECT,
                                'hide_in_inner' => true,
                                'options'      => array(
                                    ''              => esc_html__( 'Default', 'seon' ),
                                    'auto' => esc_html__( 'Auto', 'seon' ),
                                    'cover'   => esc_html__( 'Cover', 'seon' ),
                                    'contain'  => esc_html__( 'Contain', 'seon' ),
                                    'initial'    => esc_html__( 'Custom', 'seon' ),
                                ),
                                'default'      => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-size: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_text_image[url]!' => ''
                                ]        
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_highlight_img',
                    'label' => esc_html__('Highlight Image', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'h_img_width',
                                'label' => esc_html__('Width', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-image--highlight' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'h_img_height',
                                'label' => esc_html__('Height', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-image--highlight' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                                'separator' => 'after',
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_number',
                    'label' => esc_html__('Number', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'number_color',
                                'label' => esc_html__('Color', 'seon' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--number' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'number_typography',
                                'label' => esc_html__('Typography', 'seon' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--number',
                            ),
                            array(
                                'name' => 'number_width',
                                'label' => esc_html__('Number Width', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--number' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'number_top',
                                'label' => esc_html__('Number Top', 'seon' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 3000,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--number' => 'top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    seon_get_class_widget_path()
);