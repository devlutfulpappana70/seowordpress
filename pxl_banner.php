<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_banner',
        'title' => esc_html__('Case Banner', 'seon'),
        'icon' => 'eicon-posts-ticker',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'seon-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'seon' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'seon' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_banner/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'seon' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_banner/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'seon' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_banner/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'seon' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_banner/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'seon'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'seon' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Image', 'seon' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'banner_image',
                            'label' => esc_html__('Primary Image', 'seon' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'seon' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'banner_image2',
                            'label' => esc_html__('Secondary Image', 'seon' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['3','4'],
                            ],
                        ),
                        array(
                            'name' => 'img_size2',
                            'label' => esc_html__('Image Size2', 'seon' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['3','4'],
                            ],
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'seon' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'pxl_animate_img1',
                            'label' => esc_html__('Animate - Primary Image', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => seon_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_img1',
                            'label' => esc_html__('Animate Delay - Primary Image', 'seon' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                        array(
                            'name' => 'pxl_animate_img2',
                            'label' => esc_html__('Animate2 - Primary Image', 'seon' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => seon_widget_animate(),
                            'default' => '',
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate_delay_img2',
                            'label' => esc_html__('Animate Delay2 - Primary Image', 'seon' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                    ),
                ),

            ),
        ),
    ),
    seon_get_class_widget_path()
);