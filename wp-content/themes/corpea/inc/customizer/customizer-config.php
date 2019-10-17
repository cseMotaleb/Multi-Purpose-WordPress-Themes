<?php

$panel_to_section = array(
	'id'           => 'corpea_panel_options',
	'title'        => esc_html( 'Corpea Options', 'corpea' ),
	'description'  => esc_html__( 'Corpea Option Theme Options', 'corpea' ),
	'priority'     => 10,
	'sections'     => array(

		array(
			'id'              => 'header_setting',
			'title'           => esc_html__( 'Header Settings', 'corpea' ),
			'description'     => esc_html__( 'Header Settings', 'corpea' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'header_color',
					'label'    => esc_html__( 'Header background Color', 'corpea' ),
					'type'     => 'rgba',
					'priority' => 10,
					'default'  => '#222538',
				),
				array(
					'settings' => 'header_padding_top',
					'label'    => esc_html__( 'Header Top Padding', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 0,
				),
				array(
					'settings' => 'header_padding_bottom',
					'label'    => esc_html__( 'Header Bottom Padding', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 0,
				),
				array(
					'settings' => 'header_margin_bottom',
					'label'    => esc_html__( 'Header Bottom Margin', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 0,
				),
				array(
					'settings' => 'header_fixed',
					'label'    => esc_html__( 'Sticky Header', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'sticky_header_color',
					'label'    => esc_html__( 'Sticky background Color', 'corpea' ),
					'type'     => 'rgba',
					'priority' => 10,
					'default'  => '#222538',
				),
				array(
					'settings' => 'header_transparent',
					'label'    => esc_html__( 'Header Transparent', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				
			)//fields
		),//header_setting


		array(
			'id'              => 'logo_setting',
			'title'           => esc_html__( 'All Logo', 'corpea' ),
			'description'     => esc_html__( 'All Logo', 'corpea' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(
				array(
					'settings' => 'logo_style',
					'label'    => esc_html__( 'Select Header Style', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'logoimg',
					'choices'  => array(
						'logoimg' => esc_html( 'Logo image', 'corpea' ),
						'logotext' => esc_html( 'Logo text', 'corpea' ),
					)
				),
				array(
					'settings' => 'logo',
					'label'    => esc_html__( 'Upload Logo', 'corpea' ),
					'type'     => 'upload',
					'priority' => 10,
					'default' => get_template_directory_uri().'/images/logo.png',
				),
				array(
					'settings' => 'logo_width',
					'label'    => esc_html__( 'Logo Width', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 97,
				),
				array(
					'settings' => 'logo_height',
					'label'    => esc_html__( 'Logo Height', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
				),
				array(
					'settings' => 'logo_text',
					'label'    => esc_html__( 'Custom Logo Text', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => 'corpea',
				),
				array(
					'settings' => 'logo-404',
					'label'    => esc_html__( 'Coming Soon Logo', 'corpea' ),
					'type'     => 'upload',
					'priority' => 10,
					'default'  => get_template_directory_uri().'/images/logo-404.png',
				),		
			)//fields
		),//logo_setting
		
		array(
			'id'              => 'sub_header_banner',
			'title'           => esc_html__( 'Sub Header Banner', 'corpea' ),
			'description'     => esc_html__( 'sub header banner', 'corpea' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(

				array(
					'settings' => 'sub_header_padding_top',
					'label'    => esc_html__( 'Sub-Header Padding Top', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 90,
				),
				array(
					'settings' => 'sub_header_padding_bottom',
					'label'    => esc_html__( 'Sub-Header Padding Bottom', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 90,
				),
				array(
					'settings' => 'sub_header_margin_bottom',
					'label'    => esc_html__( 'Sub-Header Margin Bottom', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 60,
				),
				array(
					'settings' => 'sub_header_banner_img',
					'label'    => esc_html__( 'Sub-Header Background Image', 'corpea' ),
					'type'     => 'upload',
					'priority' => 10,
				),
				array(
					'settings' => 'sub_header_title',
					'label'    => esc_html__( 'Title Settings', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				array(
					'settings' => 'sub_header_title_size',
					'label'    => esc_html__( 'Header Title Font Size', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => '50',
				),
				array(
					'settings' => 'sub_header_title_color',
					'label'    => esc_html__( 'Header Title Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#222538',
				),
			)//fields
		),//sub_header_banner


		array(
			'id'              => 'typo_setting',
			'title'           => esc_html__( 'Typography Setting', 'corpea' ),
			'description'     => esc_html__( 'Typography Setting', 'corpea' ),
			'priority'        => 10,
			'fields'         => array(

				array(
					'settings' => 'font_title_body',
					'label'    => esc_html__( 'Body Font Options', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//body font
				array(
					'settings' => 'body_google_font',
					'label'    => esc_html__( 'Select Google Font', 'corpea' ),
					'type'     => 'select',
					'default'  => 'Roboto',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'body_font_weight',
					'google_font_weight_default' => '400'
				),
				array(
					'settings' => 'body_font_size',
					'label'    => esc_html__( 'Body Font Size', 'corpea' ),
					'type'     => 'number',
					'default'  => '14',
				),
				array(
					'settings' => 'body_font_height',
					'label'    => esc_html__( 'Body Font Line Height', 'corpea' ),
					'type'     => 'number',
					'default'  => '24',
				),
				array(
					'settings' => 'body_font_weight',
					'label'    => esc_html__( 'Body Font Weight', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '400',
					'choices'  => array(
						'' => esc_html( 'Select', 'corpea' ),
						'100' => esc_html( '100', 'corpea' ),
						'200' => esc_html( '200', 'corpea' ),
						'300' => esc_html( '300', 'corpea' ),
						'400' => esc_html( '400', 'corpea' ),
						'500' => esc_html( '500', 'corpea' ),
						'600' => esc_html( '600', 'corpea' ),
						'700' => esc_html( '700', 'corpea' ),
						'800' => esc_html( '800', 'corpea' ),
						'900' => esc_html( '900', 'corpea' ),
					)
				),
				array(
					'settings' => 'body_font_color',
					'label'    => esc_html__( 'Body Font Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#7d91aa',
				),
				array(
					'settings' => 'font_title_menu',
					'label'    => esc_html__( 'Menu Font Options', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Menu font
				array(
					'settings' => 'menu_google_font',
					'label'    => esc_html__( 'Select Google Font', 'corpea' ),
					'type'     => 'select',
					'default'  => 'Roboto',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'menu_font_weight',
					'google_font_weight_default' => '300'
				),
				array(
					'settings' => 'menu_font_size',
					'label'    => esc_html__( 'Menu Font Size', 'corpea' ),
					'type'     => 'number',
					'default'  => '16',
				),
				array(
					'settings' => 'menu_font_height',
					'label'    => esc_html__( 'Menu Font Line Height', 'corpea' ),
					'type'     => 'number',
					'default'  => '54',
				),
				array(
					'settings' => 'menu_font_weight',
					'label'    => esc_html__( 'Menu Font Weight', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '300',
					'choices'  => array(
						'' => esc_html( 'Select', 'corpea' ),
						'100' => esc_html( '100', 'corpea' ),
						'200' => esc_html( '200', 'corpea' ),
						'300' => esc_html( '300', 'corpea' ),
						'400' => esc_html( '400', 'corpea' ),
						'500' => esc_html( '500', 'corpea' ),
						'600' => esc_html( '600', 'corpea' ),
						'700' => esc_html( '700', 'corpea' ),
						'800' => esc_html( '800', 'corpea' ),
						'900' => esc_html( '900', 'corpea' ),
					)
				),
				array(
					'settings' => 'menu_font_color',
					'label'    => esc_html__( 'Menu Font Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#191919',
				),

				array(
					'settings' => 'font_title_h1',
					'label'    => esc_html__( 'Heading 1 Font Options', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Heading 1
				array(
					'settings' => 'h1_google_font',
					'label'    => esc_html__( 'Google Font', 'corpea' ),
					'type'     => 'select',
					'default'  => 'Roboto',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'menu_font_weight',
					'google_font_weight_default' => '700'
				),
				array(
					'settings' => 'h1_font_size',
					'label'    => esc_html__( 'Font Size', 'corpea' ),
					'type'     => 'number',
					'default'  => '42',
				),
				array(
					'settings' => 'h1_font_height',
					'label'    => esc_html__( 'Font Line Height', 'corpea' ),
					'type'     => 'number',
					'default'  => '48',
				),
				array(
					'settings' => 'h1_font_weight',
					'label'    => esc_html__( 'Font Weight', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '700',
					'choices'  => array(
						'' => esc_html( 'Select', 'corpea' ),
						'100' => esc_html( '100', 'corpea' ),
						'200' => esc_html( '200', 'corpea' ),
						'300' => esc_html( '300', 'corpea' ),
						'400' => esc_html( '400', 'corpea' ),
						'500' => esc_html( '500', 'corpea' ),
						'600' => esc_html( '600', 'corpea' ),
						'700' => esc_html( '700', 'corpea' ),
						'800' => esc_html( '800', 'corpea' ),
						'900' => esc_html( '900', 'corpea' ),
					)
				),
				array(
					'settings' => 'h1_font_color',
					'label'    => esc_html__( 'Font Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#333',
				),

				array(
					'settings' => 'font_title_h2',
					'label'    => esc_html__( 'Heading 2 Font Options', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Heading 2
				array(
					'settings' => 'h2_google_font',
					'label'    => esc_html__( 'Google Font', 'corpea' ),
					'type'     => 'select',
					'default'  => 'Roboto',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'menu_font_weight',
					'google_font_weight_default' => '700'
				),
				array(
					'settings' => 'h2_font_size',
					'label'    => esc_html__( 'Font Size', 'corpea' ),
					'type'     => 'number',
					'default'  => '36',
				),
				array(
					'settings' => 'h2_font_height',
					'label'    => esc_html__( 'Font Line Height', 'corpea' ),
					'type'     => 'number',
					'default'  => '36',
				),
				array(
					'settings' => 'h2_font_weight',
					'label'    => esc_html__( 'Font Weight', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '600',
					'choices'  => array(
						'' => esc_html( 'Select', 'corpea' ),
						'100' => esc_html( '100', 'corpea' ),
						'200' => esc_html( '200', 'corpea' ),
						'300' => esc_html( '300', 'corpea' ),
						'400' => esc_html( '400', 'corpea' ),
						'500' => esc_html( '500', 'corpea' ),
						'600' => esc_html( '600', 'corpea' ),
						'700' => esc_html( '700', 'corpea' ),
						'800' => esc_html( '800', 'corpea' ),
						'900' => esc_html( '900', 'corpea' ),
					)
				),
				array(
					'settings' => 'h2_font_color',
					'label'    => esc_html__( 'Font Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#222538',
				),

				array(
					'settings' => 'font_title_h3',
					'label'    => esc_html__( 'Heading 3 Font Options', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Heading 3
				array(
					'settings' => 'h3_google_font',
					'label'    => esc_html__( 'Google Font', 'corpea' ),
					'type'     => 'select',
					'default'  => 'Roboto',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'menu_font_weight',
					'google_font_weight_default' => '600'
				),
				array(
					'settings' => 'h3_font_size',
					'label'    => esc_html__( 'Font Size', 'corpea' ),
					'type'     => 'number',
					'default'  => '26',
				),
				array(
					'settings' => 'h3_font_height',
					'label'    => esc_html__( 'Font Line Height', 'corpea' ),
					'type'     => 'number',
					'default'  => '28',
				),
				array(
					'settings' => 'h3_font_weight',
					'label'    => esc_html__( 'Font Weight', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '600',
					'choices'  => array(
						'' => esc_html( 'Select', 'corpea' ),
						'100' => esc_html( '100', 'corpea' ),
						'200' => esc_html( '200', 'corpea' ),
						'300' => esc_html( '300', 'corpea' ),
						'400' => esc_html( '400', 'corpea' ),
						'500' => esc_html( '500', 'corpea' ),
						'600' => esc_html( '600', 'corpea' ),
						'700' => esc_html( '700', 'corpea' ),
						'800' => esc_html( '800', 'corpea' ),
						'900' => esc_html( '900', 'corpea' ),
					)
				),
				array(
					'settings' => 'h3_font_color',
					'label'    => esc_html__( 'Font Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#222538',
				),

				array(
					'settings' => 'font_title_h4',
					'label'    => esc_html__( 'Heading 4 Font Options', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Heading 4
				array(
					'settings' => 'h4_google_font',
					'label'    => esc_html__( 'Heading4 Google Font', 'corpea' ),
					'type'     => 'select',
					'default'  => 'Roboto',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'menu_font_weight',
					'google_font_weight_default' => '600'
				),
				array(
					'settings' => 'h4_font_size',
					'label'    => esc_html__( 'Heading4 Font Size', 'corpea' ),
					'type'     => 'number',
					'default'  => '18',
				),
				array(
					'settings' => 'h4_font_height',
					'label'    => esc_html__( 'Heading4 Font Line Height', 'corpea' ),
					'type'     => 'number',
					'default'  => '26',
				),
				array(
					'settings' => 'h4_font_weight',
					'label'    => esc_html__( 'Heading4 Font Weight', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '600',
					'choices'  => array(
						'' => esc_html( 'Select', 'corpea' ),
						'100' => esc_html( '100', 'corpea' ),
						'200' => esc_html( '200', 'corpea' ),
						'300' => esc_html( '300', 'corpea' ),
						'400' => esc_html( '400', 'corpea' ),
						'500' => esc_html( '500', 'corpea' ),
						'600' => esc_html( '600', 'corpea' ),
						'700' => esc_html( '700', 'corpea' ),
						'800' => esc_html( '800', 'corpea' ),
						'900' => esc_html( '900', 'corpea' ),
					)
				),
				array(
					'settings' => 'h4_font_color',
					'label'    => esc_html__( 'Heading4 Font Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#222538',
				),

				array(
					'settings' => 'font_title_h5',
					'label'    => esc_html__( 'Heading 5 Font Options', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),

				//Heading 5
				array(
					'settings' => 'h5_google_font',
					'label'    => esc_html__( 'Heading5 Google Font', 'corpea' ),
					'type'     => 'select',
					'default'  => 'Roboto',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'menu_font_weight',
					'google_font_weight_default' => '600'
				),
				array(
					'settings' => 'h5_font_size',
					'label'    => esc_html__( 'Heading5 Font Size', 'corpea' ),
					'type'     => 'number',
					'default'  => '14',
				),
				array(
					'settings' => 'h5_font_height',
					'label'    => esc_html__( 'Heading5 Font Line Height', 'corpea' ),
					'type'     => 'number',
					'default'  => '24',
				),
				array(
					'settings' => 'h5_font_weight',
					'label'    => esc_html__( 'Heading5 Font Weight', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '600',
					'choices'  => array(
						'' => esc_html( 'Select', 'corpea' ),
						'100' => esc_html( '100', 'corpea' ),
						'200' => esc_html( '200', 'corpea' ),
						'300' => esc_html( '300', 'corpea' ),
						'400' => esc_html( '400', 'corpea' ),
						'500' => esc_html( '500', 'corpea' ),
						'600' => esc_html( '600', 'corpea' ),
						'700' => esc_html( '700', 'corpea' ),
						'800' => esc_html( '800', 'corpea' ),
						'900' => esc_html( '900', 'corpea' ),
					)
				),
				array(
					'settings' => 'h5_font_color',
					'label'    => esc_html__( 'Heading5 Font Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#333',
				),

			)//fields
		),//typo_setting

		array(
			'id'              => 'layout_styling',
			'title'           => esc_html__( 'Layout & Styling', 'corpea' ),
			'description'     => esc_html__( 'Layout & Styling', 'corpea' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'boxfull_en',
					'label'    => esc_html__( 'Select BoxWidth of FullWidth', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'fullwidth',
					'choices'  => array(
						'boxwidth' => esc_html__( 'BoxWidth', 'corpea' ),
						'fullwidth' => esc_html__( 'FullWidth', 'corpea' ),
					)
				),

				array(
					'settings' => 'body_bg_color',
					'label'    => esc_html__( 'Body Background Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#FBFBFB',
				),
				array(
					'settings' => 'body_bg_img',
					'label'    => esc_html__( 'Body Background Image', 'corpea' ),
					'type'     => 'image',
					'priority' => 10,
				),
				array(
					'settings' => 'body_bg_attachment',
					'label'    => esc_html__( 'Body Background Attachment', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'fixed',
					'choices'  => array(
						'scroll' => esc_html__( 'Scroll', 'corpea' ),
						'fixed' => esc_html__( 'Fixed', 'corpea' ),
						'inherit' => esc_html__( 'Inherit', 'corpea' ),
					)
				),
				array(
					'settings' => 'body_bg_repeat',
					'label'    => esc_html__( 'Body Background Repeat', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'no-repeat',
					'choices'  => array(
						'repeat' => esc_html__( 'Repeat', 'corpea' ),
						'repeat-x' => esc_html__( 'Repeat Horizontally', 'corpea' ),
						'repeat-y' => esc_html__( 'Repeat Vertically', 'corpea' ),
						'no-repeat' => esc_html__( 'No Repeat', 'corpea' ),
					)
				),
				array(
					'settings' => 'body_bg_size',
					'label'    => esc_html__( 'Body Background Size', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'cover',
					'choices'  => array(
						'cover' => esc_html__( 'Cover', 'corpea' ),
						'contain' => esc_html__( 'Contain', 'corpea' ),
					)
				),
				array(
					'settings' => 'body_bg_position',
					'label'    => esc_html__( 'Body Background Position', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'left top',
					'choices'  => array(
						'left top' => esc_html__('left top', 'corpea'),
						'left center' => esc_html__('left center', 'corpea'),
						'left bottom' => esc_html__('left bottom', 'corpea'),
						'right top' => esc_html__('right top', 'corpea'),
						'right center' => esc_html__('right center', 'corpea'),
						'right bottom' => esc_html__('right bottom', 'corpea'),
						'center top' => esc_html__('center top', 'corpea'),
						'center center' => esc_html__('center center', 'corpea'),
						'center bottom' => esc_html__('center bottom', 'corpea'),
					)
				),
				array(
					'settings' => 'custom_preset_en',
					'label'    => esc_html__( 'Set Custom Color', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'major_color',
					'label'    => esc_html__( 'Major Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#50a2ff',
				),
				array(
					'settings' => 'hover_color',
					'label'    => esc_html__( 'Hover Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#1481ff',
				),
			

				# button color section(new)
				array(
					'settings' => 'button_color_title',
					'label'    => esc_html__( 'Button Color Settings', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				
				array(
					'settings' => 'button_bg_color',
					'label'    => esc_html__( 'Background Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#50a2ff',
				),

				array(
					'settings' => 'button_hover_bg_color',
					'label'    => esc_html__( 'Hover Background Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#1481ff',
				),
				array(
					'settings' => 'button_text_color',
					'label'    => esc_html__( 'Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#fff',
				),
				array(
					'settings' => 'button_hover_text_color',
					'label'    => esc_html__( 'Hover Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#fff',
				),
				array(
					'settings' => 'button_radius',
					'label'    => esc_html__( 'Border Radius', 'corpea' ),
					'type'     => 'range',
					'priority' => 10,
					'default'  => '4',
				),
				# end button color section.

				# navbar color section start.
				array(
					'settings' => 'menu_color_title',
					'label'    => esc_html__( 'Menu Color Settings', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				array(
					'settings' => 'navbar_text_color',
					'label'    => esc_html__( 'Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#a3d3f1',
				),

				array(
					'settings' => 'navbar_hover_text_color',
					'label'    => esc_html__( 'Hover Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#50a2ff',
				),

				array(
					'settings' => 'navbar_active_text_color',
					'label'    => esc_html__( 'Active Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#50a2ff',
				),

				array(
					'settings' => 'sub_menu_color_title',
					'label'    => esc_html__( 'Sub-Menu Color Settings', 'corpea' ),
					'type'     => 'title',
					'priority' => 10,
				),
				array(
					'settings' => 'sub_menu_bg',
					'label'    => esc_html__( 'Background Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#ffffff',
				),
				array(
					'settings' => 'sub_menu_text_color',
					'label'    => esc_html__( 'Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#191919',
				),
				array(
					'settings' => 'sub_menu_text_color_hover',
					'label'    => esc_html__( 'Hover Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#50a2ff',
				),
				#End of the navbar color section


			)//fields
		),//Layout & Styling


		array(
			'id'              => 'social_media_settings',
			'title'           => esc_html__( 'Social Media', 'corpea' ),
			'description'     => esc_html__( 'Social Media', 'corpea' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(
				array(
					'settings' => 'wp_facebook',
					'label'    => esc_html__( 'Add Facebook URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_twitter',
					'label'    => esc_html__( 'Add Twitter URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_google_plus',
					'label'    => esc_html__( 'Add Goole Plus URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_pinterest',
					'label'    => esc_html__( 'Add Pinterest URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_youtube',
					'label'    => esc_html__( 'Add Youtube URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_linkedin',
					'label'    => esc_html__( 'Add Linkedin URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_linkedin_user',
					'label'    => esc_html__( 'Linkedin Username( For Share )', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),

				array(
					'settings' => 'wp_instagram',
					'label'    => esc_html__( 'Add Instagram URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_dribbble',
					'label'    => esc_html__( 'Add Dribbble URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_behance',
					'label'    => esc_html__( 'Add Behance URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_flickr',
					'label'    => esc_html__( 'Add Flickr URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_vk',
					'label'    => esc_html__( 'Add Vk URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_skype',
					'label'    => esc_html__( 'Add Skype URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
			)//fields
		),//social_media

		array(
			'id'              => 'coming_soon',
			'title'           => esc_html__( 'Coming Soon', 'corpea' ),
			'description'     => esc_html__( 'Coming Soon', 'corpea' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(

				array(
					'settings' => 'comingsoon_en',
					'label'    => esc_html__( 'Enable Coming Soon', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),

				array(
					'settings' => 'comingsoontitle',
					'label'    => esc_html__( 'Add Coming Soon Title', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => esc_html__( 'Coming Soon', 'corpea' ),
				),

				array(
					'settings' => 'comingsoon_date',
					'label'    => esc_html__( 'Coming Soon date', 'corpea' ),
					'type'     => 'date',
					'priority' => 10,
					'default'  => '2020-08-09',
				),
				array(
					'settings' => 'newsletter',
					'label'    => esc_html__( 'Add mailchimp Form Shortcode Here', 'corpea' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'coming_description',
					'label'    => esc_html__( 'Coming Soon Description', 'corpea' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => esc_html__('We are come back soon', 'corpea'),
				),
				array(
					'settings' => 'comingsoon_twitter',
					'label'    => esc_html__( 'Add Twitter URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_google_plus',
					'label'    => esc_html__( 'Add Google Plus URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_pinterest',
					'label'    => esc_html__( 'Add Pinterest URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_youtube',
					'label'    => esc_html__( 'Add Youtube URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_linkedin',
					'label'    => esc_html__( 'Add Linkedin URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_dribbble',
					'label'    => esc_html__( 'Add Dribbble URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_instagram',
					'label'    => esc_html__( 'Add Instagram URL', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
			)//fields
		),//coming_soon
		array(
			'id'              => '404_settings',
			'title'           => esc_html__( '404 Page', 'corpea' ),
			'description'     => esc_html__( '404 page background and text settings', 'corpea' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(
				array(
					'settings' => '404_title',
					'label'    => esc_html__( '404 Page Title', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => esc_html__('The page doesn’t exist.', 'corpea')
				),
				array(
					'settings' => '404_description',
					'label'    => esc_html__( '404 Page Description', 'corpea' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => ''
				),
				array(
					'settings' => '404_btn_text',
					'label'    => esc_html__( '404 Button Text', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => esc_html__('Go Back', 'corpea')
				),
			)
		),

		array(
			'id'              => 'blog_setting',
			'title'           => esc_html__( 'Blog Setting', 'corpea' ),
			'description'     => esc_html__( 'Blog Setting', 'corpea' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'blog_column',
					'label'    => esc_html__( 'Select Blog Column', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '4',
					'choices'  => array(
						'12' => esc_html( 'Column 1', 'corpea' ),
						'6' => esc_html( 'Column 2', 'corpea' ),
						'4' => esc_html( 'Column 3', 'corpea' ),
						'3' => esc_html( 'Column 4', 'corpea' ),
					)
				),
				array(
					'settings' => 'blog_date',
					'label'    => esc_html__( 'Enable Blog Date', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_author',
					'label'    => esc_html__( 'Enable Blog Author', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_category',
					'label'    => esc_html__( 'Enable Blog Category', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_tags',
					'label'    => esc_html__( 'Enable Tags', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),				
				array(
					'settings' => 'blog_hit',
					'label'    => esc_html__( 'Enable Blog Hit Count', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_intro_text_en',
					'label'    => esc_html__( 'Enable Intro Text', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				
				array(
					'settings' => 'blog_text_pro',
					'label'    => esc_html__( 'blog_text_pro', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				
				
				array(
					'settings' => 'blog_continue_en',
					'label'    => esc_html__( 'Enable Blog Readmore', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_social_share',
					'label'    => esc_html__( 'Enable Blog Social Share', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_comment',
					'label'    => esc_html__( 'Enable Comment', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_post_text_limit',
					'label'    => esc_html__( 'Post character Limit', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '220',
				),
				array(
					'settings' => 'blog_continue',
					'label'    => esc_html__( 'Continue Reading', 'corpea' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => 'Read More',
				),
			)//fields
		),//blog_setting



		array(
			'id'              => 'blog_single_setting',
			'title'           => esc_html__( 'Blog Single Page Setting', 'corpea' ),
			'description'     => esc_html__( 'Blog Single Page Setting', 'corpea' ),
			'priority'        => 10,
			'fields'         => array(
				
				array(
					'settings' => 'blog_date_single',
					'label'    => esc_html__( 'Enable Blog Date', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_author_single',
					'label'    => esc_html__( 'Enable Blog Author', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_category_single',
					'label'    => esc_html__( 'Enable Blog Category', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_tags_single',
					'label'    => esc_html__( 'Enable Tags', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),				
				array(
					'settings' => 'blog_hit_single',
					'label'    => esc_html__( 'Enable Blog Hit Count', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_comment_single',
					'label'    => esc_html__( 'Enable Comment', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
							
			) #fields
		), 
		#blog_single_page_setting



		array(
			'id'              => 'bottom_setting',
			'title'           => esc_html__( 'Bottom Setting', 'corpea' ),
			'description'     => esc_html__( 'Bottom Setting', 'corpea' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'bottom_en',
					'label'    => esc_html__( 'Enable Bottom Area', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'bottom_column',
					'label'    => esc_html__( 'Select Bottom Column', 'corpea' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '3',
					'choices'  => array(
						'12' => esc_html( 'Column 1', 'corpea' ),
						'6' => esc_html( 'Column 2', 'corpea' ),
						'4' => esc_html( 'Column 3', 'corpea' ),
						'3' => esc_html( 'Column 4', 'corpea' ),
					)
				),
				array(
					'settings' => 'bottom_color',
					'label'    => esc_html__( 'Bottom background Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#2c2f40',
				),
				array(
					'settings' => 'bottom_text_color',
					'label'    => esc_html__( 'Bottom Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#7d91aa',
				),	
				array(
					'settings' => 'bottom_link_color',
					'label'    => esc_html__( 'Bottom Link Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#7d91aa',
				),				
				array(
					'settings' => 'bottom_hover_color',
					'label'    => esc_html__( 'Bottom link hover color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#50a2ff',
				),
				array(
					'settings' => 'bottom_padding_top',
					'label'    => esc_html__( 'Bottom Top Padding', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 80,
				),	
				array(
					'settings' => 'bottom_padding_bottom',
					'label'    => esc_html__( 'Bottom Padding Bottom', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 45,
				),					
			)//fields
		),//bottom_setting		
		array(
			'id'              => 'footer_setting',
			'title'           => esc_html__( 'Footer Setting', 'corpea' ),
			'description'     => esc_html__( 'Footer Setting', 'corpea' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'footer_en',
					'label'    => esc_html__( 'Disable Copyright Area', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'copyright_en',
					'label'    => esc_html__( 'Disable copyright text', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				
	
				
				array(
					'settings' => 'bottom_footer_menu',
					'label'    => esc_html__( 'Disable Footer Menu', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'copyright_text',
					'label'    => esc_html__( 'Copyright Text', 'corpea' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => esc_html__( '© 2017 Corpea Pro. All Rights Reserved.', 'corpea' ),
				),
				
				array(
					'settings' => 'copyright2_en',
					'label'    => esc_html__( 'Disable copyright text2', 'corpea' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
					array(
					'settings' => 'copyright_textse',
					'label'    => esc_html__( 'Copyright Text2', 'corpea' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => esc_html__( '© 2018 Corpea Pro. All Rights Reserved.', 'corpea' ),
				),
				
				array(
					'settings' => 'copyright_text_color',
					'label'    => esc_html__( 'Footer Text Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#7d91aa',
				),				
				array(
					'settings' => 'copyright_link_color',
					'label'    => esc_html__( 'Footer Link Color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#7d91aa',
				),				
				array(
					'settings' => 'copyright_hover_color',
					'label'    => esc_html__( 'Footer link hover color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#50a2ff',
				),
				array(
					'settings' => 'copyright_bg_color',
					'label'    => esc_html__( 'Footer background color', 'corpea' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#222538',
				),
				array(
					'settings' => 'copyright_padding_top',
					'label'    => esc_html__( 'Footer Top Padding', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 25,
				),	
				array(
					'settings' => 'copyright_padding_bottom',
					'label'    => esc_html__( 'Footer Bottom Padding', 'corpea' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 25,
				),					
			)//fields
		),//footer_setting

		array(
			'id'              => 'google_map_setting',
			'title'           => esc_html__( 'Google Map Setting', 'corpea' ),
			'priority'        => 11,
			'fields'         => array(
					array(
						'settings' => 'google_map_api',
						'label'    => esc_html__( 'Google Map API Key', 'corpea' ),
						'type'     => 'text',
						'priority' => 10,
						'default'  => '',
					),
				)
		)// Google Map API Key
		
	),
);//corpea_panel_options


$framework = new THM_Customize( $panel_to_section );
