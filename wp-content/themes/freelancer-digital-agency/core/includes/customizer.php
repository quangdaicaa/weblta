<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'freelancer_digital_agency_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'freelancer-digital-agency' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'freelancer-digital-agency' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'freelancer-digital-agency' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'freelancer-digital-agency' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );

	// PANEL

	Kirki::add_panel( 'freelancer_digital_agency_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'freelancer-digital-agency' ),
	) );

	// Scroll Top

	Kirki::add_section( 'freelancer_digital_agency_section_scroll', array(
	    'title'          => esc_html__( 'Additional Settings', 'freelancer-digital-agency' ),
	    'description'    => esc_html__( 'Scroll To Top', 'freelancer-digital-agency' ),
	    'panel'          => 'freelancer_digital_agency_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'freelancer_digital_agency_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_section_scroll',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'freelancer_digital_agency_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'freelancer-digital-agency' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'freelancer-digital-agency' ),
	    'panel'          => 'freelancer_digital_agency_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_enable_post_heading',
		'section'     => 'freelancer_digital_agency_section_post',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'freelancer-digital-agency' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'freelancer_digital_agency_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// HEADER SECTION

	Kirki::add_section( 'freelancer_digital_agency_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'freelancer-digital-agency' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'freelancer-digital-agency' ),
	    'panel'          => 'freelancer_digital_agency_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_enable_search',
		'section'     => 'freelancer_digital_agency_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'freelancer-digital-agency' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_search_box_enable',
		'section'     => 'freelancer_digital_agency_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'freelancer_digital_agency_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'freelancer-digital-agency' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'freelancer-digital-agency' ),
        'panel'          => 'freelancer_digital_agency_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_enable_heading',
		'section'     => 'freelancer_digital_agency_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'freelancer-digital-agency' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_button_unable_disable',
		'label'       => esc_html__( 'Slide Button Enable / Disable', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_slider_heading',
		'section'     => 'freelancer_digital_agency_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'freelancer-digital-agency' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'freelancer_digital_agency_slider_extra_heading' ,
        'label'    => esc_html__( 'Extra Heading',  'freelancer-digital-agency' ),
        'section'  => 'freelancer_digital_agency_blog_slide_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'freelancer_digital_agency_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'freelancer_digital_agency_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'freelancer-digital-agency' ),
		'priority'    => 10,
		'choices'     => freelancer_digital_agency_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_header_phone_number_heading',
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Phone Number', 'freelancer-digital-agency' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'freelancer_digital_agency_header_phone_number',
		'section'  => 'freelancer_digital_agency_blog_slide_section',
		'default'  => '',
		'sanitize_callback' => 'freelancer_digital_agency_sanitize_phone_number',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_enable_email_heading',
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Email Address', 'freelancer-digital-agency' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'freelancer_digital_agency_header_email',
		'section'  => 'freelancer_digital_agency_blog_slide_section',
		'default'  => '',
		'sanitize_callback' => 'sanitize_email',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_enable_socail_link',
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'freelancer-digital-agency' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'freelancer_digital_agency_blog_slide_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'freelancer-digital-agency' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'freelancer-digital-agency' ),
		'settings'     => 'freelancer_digital_agency_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'freelancer-digital-agency' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'freelancer-digital-agency' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'freelancer-digital-agency' ),
				'description' => esc_html__( 'Add the social icon url here.', 'freelancer-digital-agency' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	//OUR PROJECTS SECTION

	Kirki::add_section( 'freelancer_digital_agency_project_section', array(
	    'title'          => esc_html__( 'Our Projects Settings', 'freelancer-digital-agency' ),
	    'description'    => esc_html__( 'Here you can add projects post.', 'freelancer-digital-agency' ),
	    'panel'          => 'freelancer_digital_agency_panel_id',
	    'priority'       => 160,
	) );
	
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_enable_heading',
		'section'     => 'freelancer_digital_agency_project_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Our Projects',  'freelancer-digital-agency' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_project_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_project_section',
		'default'     => '0',
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable',  'freelancer-digital-agency' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'freelancer_digital_agency_project_short_heading' ,
        'label'    => esc_html__( 'Short Heading',  'freelancer-digital-agency' ),
        'section'  => 'freelancer_digital_agency_project_section',
    ] );
    
	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'freelancer_digital_agency_project_heading' ,
        'label'    => esc_html__( 'Heading',  'freelancer-digital-agency' ),
        'section'  => 'freelancer_digital_agency_project_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'freelancer_digital_agency_project_left_number',
		'label'       => esc_html__( 'Number of post to show', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_project_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'freelancer_digital_agency_project_left_category',
		'label'       => esc_html__( 'Select the category to show post', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_project_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'freelancer-digital-agency' ),
		'priority'    => 10,
		'choices'     => freelancer_digital_agency_get_categories_select(),
	] );

	// FOOTER SECTION

	Kirki::add_section( 'freelancer_digital_agency_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'freelancer-digital-agency' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'freelancer-digital-agency' ),
        'panel'          => 'freelancer_digital_agency_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_footer_text_heading',
		'section'     => 'freelancer_digital_agency_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'freelancer-digital-agency' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'freelancer_digital_agency_footer_text',
		'section'  => 'freelancer_digital_agency_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'freelancer_digital_agency_footer_enable_heading',
		'section'     => 'freelancer_digital_agency_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'freelancer-digital-agency' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'freelancer_digital_agency_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'freelancer-digital-agency' ),
		'section'     => 'freelancer_digital_agency_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'freelancer-digital-agency' ),
			'off' => esc_html__( 'Disable', 'freelancer-digital-agency' ),
		],
	] );
}