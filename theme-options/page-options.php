<?php
 
add_action( 'pxl_post_metabox_register', 'seon_page_options_register' );
function seon_page_options_register( $metabox ) {
 
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'seon' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'seon' ),
					'icon'   => 'el el-cog',
					'fields' => array_merge(
						seon_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
							array(
					            'id'=> 'post_video_link',
					            'type' => 'text',
					            'title' => esc_html__('Video Link', 'seon'),
					            'validate' => 'url',
					            'default' => '',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'margin',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'seon' ),
								'default'        => array(
									'margin-top'    => '',
									'margin-bottom' => '',
									'units'          => 'px',
								)
							),
					    )
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'seon' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'seon' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        seon_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						seon_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'header_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Header Display', 'seon'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'seon'),
				                    'hide'  => esc_html__('Hide', 'seon'),
				                ),
				                'default'  => 'show',
				            ),
				            array(
				           		'id'       => 'logo_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo', 'seon'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'seon' ),
				                'options'  => seon_get_nav_menu_slug(),
				                'default' => '',
				            ),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'seon'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'seon'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'seon'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'seon'),
				                ),
				                'default'  => '-1',
				            ),
				            array(
				                'id'       => 'header_margin',
				                'type'     => 'spacing',
				                'mode'     => 'margin',
				                'title'    => esc_html__('Margin', 'seon'),
				                'width'    => false,
				                'unit'     => 'px',
				                'output'    => array('#pxl-header-elementor .pxl-header-elementor-main'),
				            ),
				        )
				    )
					 
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'seon' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        seon_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'seon' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						seon_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
					            'id' => 'page_title_name',
					            'type' => 'text',
					            'title' => esc_html__('Page Title', 'seon'),
					        ),
					        array(
					            'id' => 'sub_page_title',
					            'type' => 'text',
					            'title' => esc_html__('Sub Page Title', 'seon'),
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'margin',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'seon' ),
								'default'        => array(
									'margin-top'    => '',
									'margin-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'seon' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        seon_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'footer_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Display', 'seon'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'seon'),
				                    'hide'  => esc_html__('Hide', 'seon'),
				                ),
				                'default'  => 'show',
				            ),
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'seon'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'seon'),
				                    'on' => esc_html__('On', 'seon'),
				                    'off' => esc_html__('Off', 'seon'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				                'id'       => 'back_top_top_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Back to Top Style', 'seon'),
				                'options'  => array(
				                    'style-default' => esc_html__('Default', 'seon'),
				                    'style-round' => esc_html__('Round', 'seon'),
				                ),
				                'default'  => 'style-default',
				            ),
						)
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'seon' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id'          => 'body_bg_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Body Background Color', 'seon'),
					            'transparent' => false,
					            'default'     => ''
					        ),
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'seon'),
					            'transparent' => false,
					            'default'     => ''
					        ),
					        array(
					            'id'          => 'gradient_color',
					            'type'        => 'color_gradient',
					            'title'       => esc_html__('Gradient Color', 'seon'),
					            'transparent' => false,
					            'default'  => array(
					                'from' => '',
					                'to'   => '', 
					            ),
					        ),
					    )
				    )
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'seon' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id' => 'body_custom_class',
					            'type' => 'text',
					            'title' => esc_html__('Body Custom Class', 'seon'),
					        ),
					    )
				    )
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'seon' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'seon' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'portfolio_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'seon'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'margin',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'seon' ),
								'default'        => array(
									'margin-top'    => '',
									'margin-bottom' => '',
									'units'          => 'px',
								)
							),
						)
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'seon' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'seon' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'seon'),
					            'validate' => 'url',
					            'default' => '',
					        ),
							array(
					            'id'=> 'service_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'seon'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'seon'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'seon'),
					                'image'  => esc_html__('Image', 'seon'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'seon'),
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'service_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'seon'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'margin',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'seon' ),
								'default'        => array(
									'margin-top'    => '',
									'margin-bottom' => '',
									'units'          => 'px',
								)
							),
						),
						seon_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],

		'pxl-template' => [ //post_type
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Options', 'seon' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'seon' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'seon'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'seon'), 
								'header'       => esc_html__('Header Desktop', 'seon'),
								'header-mobile'       => esc_html__('Header Mobile', 'seon'),
								'footer'       => esc_html__('Footer', 'seon'), 
								'mega-menu'    => esc_html__('Mega Menu', 'seon'), 
								'page-title'   => esc_html__('Page Title', 'seon'), 
								'tab' => esc_html__('Tab', 'seon'),
								'hidden-panel' => esc_html__('Hidden Panel', 'seon'),
								'popup' => esc_html__('Popup', 'seon'),
								'page' => esc_html__('Page', 'seon'),
								'slider' => esc_html__('Slider', 'seon'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'seon'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'seon'), 
								'px-header--transparent'       => esc_html__('Transparent', 'seon'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),

				        array(
							'id'    => 'header_mobile_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'seon'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'seon'), 
								'px-header--transparent'       => esc_html__('Transparent', 'seon'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header-mobile' ),
				        ),

				        array(
							'id'    => 'hidden_panel_position',
							'type'  => 'select',
							'title' => esc_html__('Hidden Panel Position', 'seon'),
				            'options' => [
				            	'top'       	   => esc_html__('Top', 'seon'),
				            	'right'       	   => esc_html__('Right', 'seon'),
				            ],
				            'default' => 'right',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_height',
				            'type'        => 'text',
				            'title'       => esc_html__('Hidden Panel Height', 'seon'),
				            'subtitle'       => esc_html__('Enter number.', 'seon'),
				            'transparent' => false,
				            'default'     => '',
				            'force_output' => true,
				            'required' => array( 0 => 'hidden_panel_position', 1 => 'equals', 2 => 'top' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_boxcolor',
				            'type'        => 'color',
				            'title'       => esc_html__('Box Color', 'seon'),
				            'transparent' => false,
				            'default'     => '',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
					),
				    
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 