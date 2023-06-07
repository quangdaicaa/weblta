<?php
/**
 * VW Startup Theme Customizer
 *
 * @package VW Startup
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_startup_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_startup_custom_controls' );

function vw_startup_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'blogname', array( 
        'selector' => '.logo .site-title a', 
        'render_callback' => 'vw_startup_customize_partial_blogname', 
    )); 

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
        'selector' => 'p.site-description', 
        'render_callback' => 'vw_startup_customize_partial_blogdescription', 
    ));

    //add home page setting pannel
	$VWStartupParentPanel = new VW_Startup_WP_Customize_Panel( $wp_customize, 'vw_startup_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-startup' ),
		'priority' => 10,
	));

	$wp_customize->add_panel( $VWStartupParentPanel );

	$HomePageParentPanel = new VW_Startup_WP_Customize_Panel( $wp_customize, 'vw_startup_homepage_panel', array(
		'title' => __( 'Homepage Settings', 'vw-startup' ),
		'panel' => 'vw_startup_panel_id',
	));

	$wp_customize->add_panel( $HomePageParentPanel );

	//Topbar section
	$wp_customize->add_section('vw_startup_topbar',array(
		'title'	=> __('Topbar Section','vw-startup'),
		'description'	=> __('Add TopBar Content here','vw-startup'),
		'priority'	=> null,
		'panel' => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting( 'vw_startup_topbar_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-startup' ),
      'section' => 'vw_startup_topbar'
    )));

    $wp_customize->add_setting('vw_startup_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_startup_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-startup' ),
        'section' => 'vw_startup_topbar'
    )));

    $wp_customize->add_setting('vw_startup_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control('vw_startup_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-startup'),
        'section' => 'vw_startup_topbar',
        'choices' => array(
        	'Default' => __('Default','vw-startup'),
            'Normal' => __('Normal','vw-startup')
        ),
	) );

	$wp_customize->add_setting('vw_startup_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_startup_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-startup'),
		'section'  => 'vw_startup_topbar',
	)));

	$wp_customize->add_setting('vw_startup_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_startup_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-startup'),
		'section'  => 'vw_startup_topbar',
	)));

	$wp_customize->add_setting('vw_startup_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_startup_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-startup'),
		'section'  => 'vw_startup_topbar',
	)));

	$wp_customize->add_setting('vw_startup_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_startup_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-startup'),
		'section'  => 'vw_startup_topbar',
	)));

    $wp_customize->add_setting( 'vw_startup_search_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_search_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Search','vw-startup' ),
      'section' => 'vw_startup_topbar'
    )));

    $wp_customize->add_setting('vw_startup_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Startup_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_startup_search_icon',array(
		'label'	=> __('Add Search Icon','vw-startup'),
		'transport' => 'refresh',
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_startup_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Startup_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_startup_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-startup'),
		'transport' => 'refresh',
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_startup_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_search_font_size',array(
		'label'	=> __('Search Font Size','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_startup_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-startup' ),
		'section'     => 'vw_startup_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_startup_location', array( 
        'selector' => '.contact-info .contents p', 
        'render_callback' => 'vw_startup_customize_partial_vw_startup_location', 
    ));

    $wp_customize->add_setting('vw_startup_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Startup_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_startup_location_icon',array(
		'label'	=> __('Add Location Icon','vw-startup'),
		'transport' => 'refresh',
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_startup_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_startup_location',array(
		'label'	=> __('Add Location Address','vw-startup'),
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_location',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_startup_call_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Startup_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_startup_call_icon',array(
		'label'	=> __('Add Call Number Icon','vw-startup'),
		'transport' => 'refresh',
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_call_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_startup_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'vw_startup_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_startup_call',array(
		'label'	=> __('Add Call Number','vw-startup'),
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_startup_email_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Startup_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_startup_email_icon',array(
		'label'	=> __('Add Email Icon','vw-startup'),
		'transport' => 'refresh',
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_startup_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('vw_startup_email',array(
		'label'	=> __('Add Email Address','vw-startup'),
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_startup_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_startup_button_text',array(
		'label'	=> __('Add Button Text','vw-startup'),
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_button_text',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('vw_startup_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_startup_button_link',array(
		'label'	=> __('Add Button url','vw-startup'),
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_button_link',
		'type'		=> 'url'
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_startup_short_line', array( 
        'selector' => '.top-bar p', 
        'render_callback' => 'vw_startup_customize_partial_vw_startup_short_line', 
    ));

	$wp_customize->add_setting('vw_startup_short_line',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_startup_short_line',array(
		'label'	=> __('Add Text','vw-startup'),
		'section'	=> 'vw_startup_topbar',
		'setting'	=> 'vw_startup_short_line',
		'type'		=> 'text'
	));	

	//Social links
	$wp_customize->add_section(
		'vw_startup_social_links', array(
			'title'		=>	__('Social Links', 'vw-startup'),
			'priority'	=>	null,
			'panel'		=>	'vw_startup_homepage_panel'
		)
	);

	$wp_customize->add_setting('vw_startup_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_social_icons',array(
		'label' =>  __('Steps to setup social icons','vw-startup'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Icon Widget area.</p>
			<p>3. Add social icons url and save.</p>','vw-startup'),
		'section'=> 'vw_startup_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vw_startup_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vw_startup_social_links',
		'type'=> 'hidden'
	));

	//Slider
	$wp_customize->add_section( 'vw_startup_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-startup' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/startup-wordpress-theme/">GO PRO</a>','vw-startup'),
		'priority'   => null,
		'panel' => 'vw_startup_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_startup_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-startup' ),
      'section' => 'vw_startup_slidersettings'
    )));

    $wp_customize->add_setting('vw_startup_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	) );
	$wp_customize->add_control('vw_startup_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-startup'),
        'section' => 'vw_startup_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-startup'),
            'Advance slider' => __('Advance slider','vw-startup'),
        ),
	));

	$wp_customize->add_setting('vw_startup_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-startup'),
		'section'=> 'vw_startup_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_startup_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_startup_slider_hide_show',array(
        'selector'        => '#slider .inner_carousel h1',
        'render_callback' => 'vw_startup_customize_partial_vw_startup_slider_hide_show',
    ));

	for ( $count = 1; $count <= 3; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_startup_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_startup_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_startup_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-startup' ),
			'description' => __('Background image size (1500 x 550)','vw-startup'),
			'section'  => 'vw_startup_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_startup_default_slider'
		) );
	}

	$wp_customize->add_setting('vw_startup_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_startup_default_slider'
	));

	//content layout
	$wp_customize->add_setting('vw_startup_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Startup_Image_Radio_Control($wp_customize, 'vw_startup_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-startup'),
        'section' => 'vw_startup_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
    ),'active_callback' => 'vw_startup_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('vw_startup_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-startup'),
		'description'	=> __('Enter a value in %. Example:20%','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_startup_default_slider'
	));

	$wp_customize->add_setting('vw_startup_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-startup'),
		'description'	=> __('Enter a value in %. Example:20%','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_startup_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_startup_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-startup' ),
		'section'     => 'vw_startup_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_startup_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vw_startup_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('vw_startup_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_startup_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_startup_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-startup' ),
	'section'     => 'vw_startup_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_startup_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-startup'),
      '0.1' =>  esc_attr('0.1','vw-startup'),
      '0.2' =>  esc_attr('0.2','vw-startup'),
      '0.3' =>  esc_attr('0.3','vw-startup'),
      '0.4' =>  esc_attr('0.4','vw-startup'),
      '0.5' =>  esc_attr('0.5','vw-startup'),
      '0.6' =>  esc_attr('0.6','vw-startup'),
      '0.7' =>  esc_attr('0.7','vw-startup'),
      '0.8' =>  esc_attr('0.8','vw-startup'),
      '0.9' =>  esc_attr('0.9','vw-startup')
	),'active_callback' => 'vw_startup_default_slider'
	));

	//Slider height
	$wp_customize->add_setting('vw_startup_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_slider_height',array(
		'label'	=> __('Slider Height','vw-startup'),
		'description'	=> __('Specify the slider height (px).','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_startup_default_slider'
	));

	$wp_customize->add_setting( 'vw_startup_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_startup_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_startup_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-startup'),
		'section' => 'vw_startup_slidersettings',
		'type'  => 'number',
		'active_callback' => 'vw_startup_default_slider'
	) );

	//About Us Section
	$wp_customize->add_section('vw_startup_about', array(
		'title'       => __('About Us Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_about_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','vw-startup'),
		'section'=> 'vw_startup_about',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_about',
		'type'=> 'hidden'
	));

	//portfolio Section
	$wp_customize->add_section('vw_startup_portfolio', array(
		'title'       => __('Portfolio Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_portfolio_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_portfolio_text',array(
		'description' => __('<p>1. More options for portfolio section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for portfolio section.</p>','vw-startup'),
		'section'=> 'vw_startup_portfolio',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_portfolio_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_portfolio_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_portfolio',
		'type'=> 'hidden'
	));

	// Services
	$wp_customize->add_section('vw_startup_service_section',array(
		'title'	=> __('Services Section','vw-startup'),
		'description' => __('For more options of service section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/startup-wordpress-theme/">GO PRO</a>','vw-startup'),
		'panel' => 'vw_startup_homepage_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'vw_startup_section_title', array( 
        'selector' => '#services h2', 
        'render_callback' => 'vw_startup_customize_partial_vw_startup_section_title',
    ));

	$wp_customize->add_setting('vw_startup_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_startup_section_title',array(
		'label'	=> __('Section Title','vw-startup'),
		'section'=> 'vw_startup_service_section',
		'setting'=> 'vw_startup_section_title',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_startup_section_short_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_startup_section_short_text',array(
		'label'	=> __('Section Short Text','vw-startup'),
		'section'=> 'vw_startup_service_section',
		'setting'=> 'vw_startup_section_short_text',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_startup_service_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_startup_sanitize_choices',
	));
	$wp_customize->add_control('vw_startup_service_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Post','vw-startup'),
		'description' => __('Image size (293 x 225)','vw-startup'),
		'section' => 'vw_startup_service_section',
	));

	//team Section
	$wp_customize->add_section('vw_startup_team', array(
		'title'       => __('Team Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_team_text',array(
		'description' => __('<p>1. More options for team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for team section.</p>','vw-startup'),
		'section'=> 'vw_startup_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_team',
		'type'=> 'hidden'
	));

	//expert Section
	$wp_customize->add_section('vw_startup_expert', array(
		'title'       => __('Expert Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_expert_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_expert_text',array(
		'description' => __('<p>1. More options for expert section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for expert section.</p>','vw-startup'),
		'section'=> 'vw_startup_expert',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_expert_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_expert_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_expert',
		'type'=> 'hidden'
	));

	//video Section
	$wp_customize->add_section('vw_startup_video', array(
		'title'       => __('Video Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_video_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_video_text',array(
		'description' => __('<p>1. More options for video section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for video section.</p>','vw-startup'),
		'section'=> 'vw_startup_video',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_video_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_video_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_video',
		'type'=> 'hidden'
	));

	//how-we-work Section
	$wp_customize->add_section('vw_startup_how_we_work', array(
		'title'       => __('How We Work Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_how_we_work_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_how_we_work_text',array(
		'description' => __('<p>1. More options for how we work section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for how we work section.</p>','vw-startup'),
		'section'=> 'vw_startup_how_we_work',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_how_we_work_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_how_we_work_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_how_we_work',
		'type'=> 'hidden'
	));

	//testimonial record Section
	$wp_customize->add_section('vw_startup_tesimonial_record', array(
		'title'       => __('Testimonial Record Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_tesimonial_record_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_tesimonial_record_text',array(
		'description' => __('<p>1. More options for testimonial record section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial record section.</p>','vw-startup'),
		'section'=> 'vw_startup_tesimonial_record',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_tesimonial_record_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_tesimonial_record_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_tesimonial_record',
		'type'=> 'hidden'
	));

 	//latest post Section
	$wp_customize->add_section('vw_startup_latest_post', array(
		'title'       => __('Latest Post Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_latest_post_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_latest_post_text',array(
		'description' => __('<p>1. More options for latest post section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest post section.</p>','vw-startup'),
		'section'=> 'vw_startup_latest_post',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_latest_post_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_latest_post_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_latest_post',
		'type'=> 'hidden'
	));

	//partners Section
	$wp_customize->add_section('vw_startup_partners', array(
		'title'       => __('Partners Section', 'vw-startup'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-startup'),
		'priority'    => null,
		'panel'       => 'vw_startup_homepage_panel',
	));

	$wp_customize->add_setting('vw_startup_partners_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_partners_text',array(
		'description' => __('<p>1. More options for partners section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partners section.</p>','vw-startup'),
		'section'=> 'vw_startup_partners',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_startup_partners_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_partners_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_startup_guide') ." '>More Info</a>",
		'section'=> 'vw_startup_partners',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_startup_footer',array(
		'title'	=> __('Footer','vw-startup'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/startup-wordpress-theme/">GO PRO</a>','vw-startup'),
		'panel' => 'vw_startup_homepage_panel',
	));	

	$wp_customize->add_setting('vw_startup_footer_background_color', array(
		'default'           => '#2b3546',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_startup_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-startup'),
		'section'  => 'vw_startup_footer',
	)));

	$wp_customize->add_setting('vw_startup_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_startup_footer_background_image',array(
        'label' => __('Footer Background Image','vw-startup'),
        'section' => 'vw_startup_footer'
	)));

	// footer padding
	$wp_customize->add_setting('vw_startup_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-startup' ),
    ),
		'section'=> 'vw_startup_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control('vw_startup_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-startup'),
        'section' => 'vw_startup_footer',
        'choices' => array(
        	'Left' => __('Left','vw-startup'),
            'Center' => __('Center','vw-startup'),
            'Right' => __('Right','vw-startup')
        ),
	) );

	$wp_customize->add_setting('vw_startup_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control('vw_startup_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-startup'),
        'section' => 'vw_startup_footer',
        'choices' => array(
        	'Left' => __('Left','vw-startup'),
            'Center' => __('Center','vw-startup'),
            'Right' => __('Right','vw-startup')
        ),
	) );

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_startup_footer_text', array( 
        'selector' => '.copyright p', 
        'render_callback' => 'vw_startup_customize_partial_vw_startup_footer_text', 
    ));
	
	$wp_customize->add_setting('vw_startup_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_startup_footer_text',array(
		'label'	=> __('Copyright Text','vw-startup'),
		'section'=> 'vw_startup_footer',
		'setting'=> 'vw_startup_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_startup_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Startup_Image_Radio_Control($wp_customize, 'vw_startup_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-startup'),
        'section' => 'vw_startup_footer',
        'settings' => 'vw_startup_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

    // footer social icon
  	$wp_customize->add_setting( 'vw_startup_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_footer_icon',array(
		'label' => esc_html__( 'Footer Social Icon','vw-startup' ),
		'section' => 'vw_startup_footer'
    )));

	$wp_customize->add_setting( 'vw_startup_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-startup' ),
      	'section' => 'vw_startup_footer'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_startup_scroll_to_top_icon', array( 
        'selector' => '.scrollup i', 
        'render_callback' => 'vw_startup_customize_partial_vw_startup_scroll_to_top_icon', 
    ));

    $wp_customize->add_setting('vw_startup_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Startup_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_startup_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-startup'),
		'transport' => 'refresh',
		'section'	=> 'vw_startup_footer',
		'setting'	=> 'vw_startup_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_startup_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-startup'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_startup_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-startup' ),
		'section'     => 'vw_startup_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_startup_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Startup_Image_Radio_Control($wp_customize, 'vw_startup_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-startup'),
        'section' => 'vw_startup_footer',
        'settings' => 'vw_startup_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));


	//Blog Post
	$wp_customize->add_panel( $VWStartupParentPanel );

	$BlogPostParentPanel = new VW_Startup_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-startup' ),
		'panel' => 'vw_startup_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_startup_post_settings', array(
		'title' => __( 'Post Settings', 'vw-startup' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_startup_toggle_postdate', array( 
        'selector' => '.post-main-box h2 a', 
        'render_callback' => 'vw_startup_customize_partial_vw_startup_toggle_postdate', 
    ));

	$wp_customize->add_setting( 'vw_startup_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-startup' ),
        'section' => 'vw_startup_post_settings'
    )));

    $wp_customize->add_setting( 'vw_startup_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_toggle_author',array(
		'label' => esc_html__( 'Author','vw-startup' ),
		'section' => 'vw_startup_post_settings'
    )));

    $wp_customize->add_setting( 'vw_startup_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-startup' ),
		'section' => 'vw_startup_post_settings'
    )));

     $wp_customize->add_setting( 'vw_startup_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_toggle_time',array(
		'label' => esc_html__( 'Time','vw-startup' ),
		'section' => 'vw_startup_post_settings'
    )));

    $wp_customize->add_setting( 'vw_startup_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-startup' ),
		'section' => 'vw_startup_post_settings'
    )));

    $wp_customize->add_setting( 'vw_startup_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-startup' ),
		'section'     => 'vw_startup_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_startup_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-startup' ),
		'section'     => 'vw_startup_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'vw_startup_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-startup' ),
		'section'     => 'vw_startup_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_startup_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_startup_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-startup'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-startup'),
		'section'=> 'vw_startup_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('vw_startup_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Startup_Image_Radio_Control($wp_customize, 'vw_startup_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-startup'),
        'section' => 'vw_startup_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_startup_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
    ));
    $wp_customize->add_control('vw_startup_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-startup'),
        'section' => 'vw_startup_post_settings',
        'choices' => array(
            'Content' => __('Content','vw-startup'),
            'Excerpt' => __('Excerpt','vw-startup'),
            'No Content' => __('No Content','vw-startup')
        ),
    ) );

    $wp_customize->add_setting('vw_startup_excerpt_suffix',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_startup_excerpt_suffix',array(
        'label' => __('Add Excerpt Suffix','vw-startup'),
        'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-startup' ),
        ),
        'section'=> 'vw_startup_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'vw_startup_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-startup' ),
      'section' => 'vw_startup_post_settings'
    )));

	$wp_customize->add_setting( 'vw_startup_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_startup_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_startup_blog_pagination_type', array(
        'section' => 'vw_startup_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-startup' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-startup' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-startup' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_startup_button_settings', array(
		'title' => __( 'Button Settings', 'vw-startup' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_startup_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_startup_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-startup' ),
		'section'     => 'vw_startup_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// font size button
	$wp_customize->add_setting('vw_startup_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_button_font_size',array(
		'label'	=> __('Button Font Size','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-startup' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_startup_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_startup_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control('vw_startup_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-startup'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-startup'),
            'Capitalize' => __('Capitalize','vw-startup'),
            'Lowercase' => __('Lowercase','vw-startup'),
        ),
		'section'=> 'vw_startup_button_settings',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_startup_blog_button_text', array( 
        'selector' => '.post-main-box .content-bttn a', 
        'render_callback' => 'vw_startup_customize_partial_vw_startup_blog_button_text', 
    ));

    $wp_customize->add_setting('vw_startup_blog_button_text',array(
		'default'=> esc_html__( 'Read More', 'vw-startup' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_blog_button_text',array(
		'label'	=> __('Add Button Text','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_startup_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-startup' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_startup_related_post_title', array( 
        'selector' => '.related-post h3', 
        'render_callback' => 'vw_startup_customize_partial_vw_startup_related_post_title', 
    ));

    $wp_customize->add_setting( 'vw_startup_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_related_post',array(
		'label' => esc_html__( 'Related Post','vw-startup' ),
		'section' => 'vw_startup_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_startup_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_startup_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_startup_sanitize_float'
	));
	$wp_customize->add_control('vw_startup_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_startup_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-startup' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_startup_single_post_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-startup'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-startup'),
		'section'=> 'vw_startup_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_startup_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-startup' ),
		'section' => 'vw_startup_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_startup_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-startup' ),
		'section' => 'vw_startup_single_blog_settings'
    )));

    $wp_customize->add_setting( 'vw_startup_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','vw-startup' ),
		'section' => 'vw_startup_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vw_startup_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','vw-startup' ),
		'section' => 'vw_startup_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_startup_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-startup'),
		'description'	=> __('Enter a value in %. Example:50%','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_single_blog_settings',
		'type'=> 'text'
	));

		// Grid layout setting
	$wp_customize->add_section( 'vw_startup_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-startup' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_startup_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_grid_postdate',array(
        'label' => esc_html__( 'Post Date','vw-startup' ),
        'section' => 'vw_startup_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vw_startup_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_grid_author',array(
		'label' => esc_html__( 'Author','vw-startup' ),
		'section' => 'vw_startup_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vw_startup_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_grid_comments',array(
		'label' => esc_html__( 'Comments','vw-startup' ),
		'section' => 'vw_startup_grid_layout_settings'
    )));

 	// other settings
	$OtherParentPanel = new VW_Startup_WP_Customize_Panel( $wp_customize, 'vw_startup_other_panel_id', array(
		'title' => __( 'Others Settings', 'vw-startup' ),
		'panel' => 'vw_startup_panel_id',
	));

	$wp_customize->add_panel( $OtherParentPanel );

	$wp_customize->add_section( 'vw_startup_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-startup' ),
		'priority'   => 30,
		'panel' => 'vw_startup_other_panel_id'
	) );

	$wp_customize->add_setting('vw_startup_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Startup_Image_Radio_Control($wp_customize, 'vw_startup_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-startup'),
        'description' => __('Here you can change the width layout of Website.','vw-startup'),
        'section' => 'vw_startup_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_startup_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_startup_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_startup_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-startup'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-startup'),
        'section' => 'vw_startup_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-startup'),
            'Right Sidebar' => __('Right Sidebar','vw-startup'),
            'One Column' => __('One Column','vw-startup'),
            'Three Columns' => __('Three Columns','vw-startup'),
            'Four Columns' => __('Four Columns','vw-startup'),
            'Grid Layout' => __('Grid Layout','vw-startup')
        ),
	));

	$wp_customize->add_setting('vw_startup_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control('vw_startup_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-startup'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-startup'),
        'section' => 'vw_startup_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-startup'),
            'Right Sidebar' => __('Right Sidebar','vw-startup'),
            'One Column' => __('One Column','vw-startup')
        ),
	) );

	$wp_customize->add_setting( 'vw_startup_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','vw-startup' ),
		'section' => 'vw_startup_left_right'
    )));

	//Wow Animation
	$wp_customize->add_setting( 'vw_startup_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_animation',array(
        'label' => esc_html__( 'Animations','vw-startup' ),
        'description' => __('Here you can disable overall site animation effect','vw-startup'),
        'section' => 'vw_startup_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_startup_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-startup' ),
        'section' => 'vw_startup_left_right'
    )));

	$wp_customize->add_setting('vw_startup_preloader_bg_color', array(
		'default'           => '#64c5aa',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_startup_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-startup'),
		'section'  => 'vw_startup_left_right',
	)));

	$wp_customize->add_setting('vw_startup_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_startup_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-startup'),
		'section'  => 'vw_startup_left_right',
	)));

    //404 Page Setting
	$wp_customize->add_section('vw_startup_404_page',array(
		'title'	=> __('404 Page Settings','vw-startup'),
		'panel' => 'vw_startup_other_panel_id',
	));	

	$wp_customize->add_setting('vw_startup_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_startup_404_page_title',array(
		'label'	=> __('Add Title','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_startup_404_page_content',array(
		'label'	=> __('Add Text','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_startup_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-startup'),
		'panel' => 'vw_startup_other_panel_id',
	));	

	$wp_customize->add_setting('vw_startup_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_startup_no_results_page_title',array(
		'label'	=> __('Add Title','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_startup_no_results_page_content',array(
		'label'	=> __('Add Text','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_startup_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-startup'),
		'panel' => 'vw_startup_other_panel_id',
	));	

	$wp_customize->add_setting('vw_startup_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_social_icon_width',array(
		'label'	=> __('Icon Width','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_social_icon_height',array(
		'label'	=> __('Icon Height','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_startup_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-startup' ),
		'section'     => 'vw_startup_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_startup_responsive_media',array(
		'title'	=> __('Responsive Media','vw-startup'),
		'panel' => 'vw_startup_other_panel_id',
	));

	$wp_customize->add_setting( 'vw_startup_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-startup' ),
      'section' => 'vw_startup_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_startup_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-startup' ),
      'section' => 'vw_startup_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_startup_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-startup' ),
      'section' => 'vw_startup_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_startup_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-startup' ),
      'section' => 'vw_startup_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_startup_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_startup_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-startup' ),
      'section' => 'vw_startup_responsive_media'
    )));

    $wp_customize->add_setting('vw_startup_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_startup_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-startup'),
		'section'  => 'vw_startup_responsive_media',
	)));

    $wp_customize->add_setting('vw_startup_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Startup_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_startup_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-startup'),
		'transport' => 'refresh',
		'section'	=> 'vw_startup_responsive_media',
		'setting'	=> 'vw_startup_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_startup_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Startup_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_startup_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-startup'),
		'transport' => 'refresh',
		'section'	=> 'vw_startup_responsive_media',
		'setting'	=> 'vw_startup_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	
    //Woocommerce settings
	$wp_customize->add_section('vw_startup_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-startup'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_startup_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_startup_customize_partial_vw_startup_woocommerce_shop_page_sidebar', ) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_startup_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-startup' ),
		'section' => 'vw_startup_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_startup_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control('vw_startup_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-startup'),
        'section' => 'vw_startup_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-startup'),
            'Right Sidebar' => __('Right Sidebar','vw-startup'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_startup_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_startup_customize_partial_vw_startup_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_startup_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_startup_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Startup_Toggle_Switch_Custom_Control( $wp_customize, 'vw_startup_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-startup' ),
		'section' => 'vw_startup_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_startup_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_startup_sanitize_float'
	));
	$wp_customize->add_control('vw_startup_products_per_page',array(
		'label'	=> __('Products Per Page','vw-startup'),
		'description' => __('Display on shop page','vw-startup'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_startup_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_startup_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control('vw_startup_products_per_row',array(
		'label'	=> __('Products Per Row','vw-startup'),
		'description' => __('Display on shop page','vw-startup'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_startup_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_startup_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_startup_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-startup' ),
		'section'     => 'vw_startup_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_startup_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-startup' ),
		'section'     => 'vw_startup_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_startup_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_startup_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_startup_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-startup' ),
		'section'     => 'vw_startup_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_startup_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_startup_sanitize_choices'
	));
	$wp_customize->add_control('vw_startup_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-startup'),
        'section' => 'vw_startup_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-startup'),
            'right' => __('Right','vw-startup'),
        ),
	) );

	$wp_customize->add_setting('vw_startup_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_startup_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-startup'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-startup'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-startup' ),
        ),
		'section'=> 'vw_startup_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_startup_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_startup_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_startup_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-startup' ),
		'section'     => 'vw_startup_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Startup_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Startup_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_startup_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Startup_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_startup_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Startup_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_startup_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_startup_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_startup_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Startup_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Startup_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Startup_Customize_Section_Pro($manager,'vw_startup_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Startup Pro Theme', 'vw-startup' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-startup' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/startup-wordpress-theme/'),
		)));

		$manager->add_section(new VW_Startup_Customize_Section_Pro($manager,'vw_startup_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-startup' ),
			'pro_text' => esc_html__( 'Docs', 'vw-startup' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-startup/')
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-startup-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-startup-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Startup_Customize::get_instance();