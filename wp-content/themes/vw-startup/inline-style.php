<?php
	
	/*-----------------------First highlight color-------------------*/

	$vw_startup_first_color = get_theme_mod('vw_startup_first_color');

	$vw_startup_custom_css = '';

	if($vw_startup_first_color != false){
		$vw_startup_custom_css .='.search-box i, .req-button a, .more-btn a, .overlay-box:hover, input[type="submit"], .footer .tagcloud a:hover, .footer-2, .scrollup i, .sidebar input[type="submit"], .sidebar .tagcloud a:hover, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .hvr-sweep-to-right:before, .pagination span, .pagination a, .toggle-nav i, #comments a.comment-reply-link, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more:hover, .sidebar a.custom_read_more:hover, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a, #preloader, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button{';
			$vw_startup_custom_css .='background-color: '.esc_attr($vw_startup_first_color).';';
		$vw_startup_custom_css .='}';
	}
	if($vw_startup_first_color != false){
		$vw_startup_custom_css .='#comments input[type="submit"].submit, .sidebar ul li::before, .sidebar ul.cart_list li::before, .sidebar ul.product_list_widget li::before{';
			$vw_startup_custom_css .='background-color: '.esc_attr($vw_startup_first_color).'!important;';
		$vw_startup_custom_css .='}';
	}
	if($vw_startup_first_color != false){
		$vw_startup_custom_css .='a, .top-bar .custom-social-icons i:hover, .contact-info i, .footer h3, .sidebar th, .sidebar td, .sidebar td#prev a, .sidebar caption, .post-info i, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .woocommerce-message::before, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer li a:hover, .sidebar ul li a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .contact-info p a:hover, .logo .site-title a:hover, .post-navigation span.meta-nav:hover, #slider .inner_carousel h1 a:hover, .footer .wp-block-search .wp-block-search__label{';
			$vw_startup_custom_css .='color: '.esc_attr($vw_startup_first_color).';';
		$vw_startup_custom_css .='}';
	}
	if($vw_startup_first_color != false){
		$vw_startup_custom_css .='.post-main-box:hover, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover{';
			$vw_startup_custom_css .='border-color: '.esc_attr($vw_startup_first_color).'!important;';
		$vw_startup_custom_css .='}';
	}
	if($vw_startup_first_color != false){
		$vw_startup_custom_css .='.woocommerce-message, .main-navigation ul ul{';
			$vw_startup_custom_css .='border-top-color: '.esc_attr($vw_startup_first_color).';';
		$vw_startup_custom_css .='}';
	}
	if($vw_startup_first_color != false){
		$vw_startup_custom_css .='.main-navigation ul ul, .header-fixed{';
			$vw_startup_custom_css .='border-bottom-color: '.esc_attr($vw_startup_first_color).';';
		$vw_startup_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_startup_theme_lay = get_theme_mod( 'vw_startup_width_option','Full Width');
    if($vw_startup_theme_lay == 'Boxed'){
		$vw_startup_custom_css .='body{';
			$vw_startup_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_startup_custom_css .='}';
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='right: 100px;';
		$vw_startup_custom_css .='}';
		$vw_startup_custom_css .='.scrollup.left i{';
			$vw_startup_custom_css .='left: 100px;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_theme_lay == 'Wide Width'){
		$vw_startup_custom_css .='body{';
			$vw_startup_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_startup_custom_css .='}';
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='right: 30px;';
		$vw_startup_custom_css .='}';
		$vw_startup_custom_css .='.scrollup.left i{';
			$vw_startup_custom_css .='left: 30px;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_theme_lay == 'Full Width'){
		$vw_startup_custom_css .='body{';
			$vw_startup_custom_css .='max-width: 100%;';
		$vw_startup_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_startup_theme_lay = get_theme_mod( 'vw_startup_slider_opacity_color','0.5');
	if($vw_startup_theme_lay == '0'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.1'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.1';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.2'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.2';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.3'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.3';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.4'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.4';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.5'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.5';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.6'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.6';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.7'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.7';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.8'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.8';
		$vw_startup_custom_css .='}';
		}else if($vw_startup_theme_lay == '0.9'){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='opacity:0.9';
		$vw_startup_custom_css .='}';
		}

	/*---------------------Slider Content Layout -------------------*/

	$vw_startup_theme_lay = get_theme_mod( 'vw_startup_slider_content_option','Left');
    if($vw_startup_theme_lay == 'Left'){
		$vw_startup_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_startup_custom_css .='text-align:left; left:17%; right:45%;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_theme_lay == 'Center'){
		$vw_startup_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_startup_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_theme_lay == 'Right'){
		$vw_startup_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_startup_custom_css .='text-align:right; left:45%; right:17%;';
		$vw_startup_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_startup_slider_content_padding_top_bottom = get_theme_mod('vw_startup_slider_content_padding_top_bottom');
	$vw_startup_slider_content_padding_left_right = get_theme_mod('vw_startup_slider_content_padding_left_right');
	if($vw_startup_slider_content_padding_top_bottom != false || $vw_startup_slider_content_padding_left_right != false){
		$vw_startup_custom_css .='#slider .carousel-caption{';
			$vw_startup_custom_css .='top: '.esc_attr($vw_startup_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_startup_slider_content_padding_top_bottom).';left: '.esc_attr($vw_startup_slider_content_padding_left_right).';right: '.esc_attr($vw_startup_slider_content_padding_left_right).';';
		$vw_startup_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_startup_slider_height = get_theme_mod('vw_startup_slider_height');
	if($vw_startup_slider_height != false){
		$vw_startup_custom_css .='#slider img{';
			$vw_startup_custom_css .='height: '.esc_attr($vw_startup_slider_height).';';
		$vw_startup_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_startup_theme_lay = get_theme_mod( 'vw_startup_blog_layout_option','Default');
    if($vw_startup_theme_lay == 'Default'){
		$vw_startup_custom_css .='.post-main-box{';
			$vw_startup_custom_css .='';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_theme_lay == 'Center'){
		$vw_startup_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$vw_startup_custom_css .='text-align:center;';
		$vw_startup_custom_css .='}';
		$vw_startup_custom_css .='.post-info{';
			$vw_startup_custom_css .='margin-top:10px;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_theme_lay == 'Left'){
		$vw_startup_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$vw_startup_custom_css .='text-align:Left;';
		$vw_startup_custom_css .='}';
	}

	/*-----------------Responsive Media -----------------------*/

	$vw_startup_resp_topbar = get_theme_mod( 'vw_startup_resp_topbar_hide_show',false);
	if($vw_startup_resp_topbar == true && get_theme_mod( 'vw_startup_topbar_hide_show', false) == false){
    	$vw_startup_custom_css .='.top-bar{';
			$vw_startup_custom_css .='display:none;';
		$vw_startup_custom_css .='} ';
	}
    if($vw_startup_resp_topbar == true){
    	$vw_startup_custom_css .='@media screen and (max-width:575px) {';
		$vw_startup_custom_css .='.top-bar{';
			$vw_startup_custom_css .='display:block;';
		$vw_startup_custom_css .='} }';
	}else if($vw_startup_resp_topbar == false){
		$vw_startup_custom_css .='@media screen and (max-width:575px) {';
		$vw_startup_custom_css .='.top-bar{';
			$vw_startup_custom_css .='display:none;';
		$vw_startup_custom_css .='} }';
	}

	$vw_startup_resp_stickyheader = get_theme_mod( 'vw_startup_stickyheader_hide_show',false);
	if($vw_startup_resp_stickyheader == true && get_theme_mod( 'vw_startup_sticky_header',false) != true){
    	$vw_startup_custom_css .='.header-fixed{';
			$vw_startup_custom_css .='position:static;';
		$vw_startup_custom_css .='} ';
	}
    if($vw_startup_resp_stickyheader == true){
    	$vw_startup_custom_css .='@media screen and (max-width:575px) {';
		$vw_startup_custom_css .='.header-fixed{';
			$vw_startup_custom_css .='position:fixed;';
		$vw_startup_custom_css .='} }';
	}else if($vw_startup_resp_stickyheader == false){
		$vw_startup_custom_css .='@media screen and (max-width:575px){';
		$vw_startup_custom_css .='.header-fixed{';
			$vw_startup_custom_css .='position:static;';
		$vw_startup_custom_css .='} }';
	}

	$vw_startup_resp_slider = get_theme_mod( 'vw_startup_resp_slider_hide_show',false);
	if($vw_startup_resp_slider == true && get_theme_mod( 'vw_startup_slider_hide_show', false) == false){
    	$vw_startup_custom_css .='#slider{';
			$vw_startup_custom_css .='display:none;';
		$vw_startup_custom_css .='} ';
	}
    if($vw_startup_resp_slider == true){
    	$vw_startup_custom_css .='@media screen and (max-width:575px) {';
		$vw_startup_custom_css .='#slider{';
			$vw_startup_custom_css .='display:block;';
		$vw_startup_custom_css .='} }';
	}else if($vw_startup_resp_slider == false){
		$vw_startup_custom_css .='@media screen and (max-width:575px) {';
		$vw_startup_custom_css .='#slider{';
			$vw_startup_custom_css .='display:none;';
		$vw_startup_custom_css .='} }';
	}

	$vw_startup_resp_sidebar = get_theme_mod( 'vw_startup_sidebar_hide_show',true);
    if($vw_startup_resp_sidebar == true){
    	$vw_startup_custom_css .='@media screen and (max-width:575px) {';
		$vw_startup_custom_css .='.sidebar{';
			$vw_startup_custom_css .='display:block;';
		$vw_startup_custom_css .='} }';
	}else if($vw_startup_resp_sidebar == false){
		$vw_startup_custom_css .='@media screen and (max-width:575px) {';
		$vw_startup_custom_css .='.sidebar{';
			$vw_startup_custom_css .='display:none;';
		$vw_startup_custom_css .='} }';
	}

	$vw_startup_resp_scroll_top = get_theme_mod( 'vw_startup_resp_scroll_top_hide_show',true);
	if($vw_startup_resp_scroll_top == true && get_theme_mod( 'vw_startup_hide_show_scroll',true) != true){
    	$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='visibility:hidden !important;';
		$vw_startup_custom_css .='} ';
	}
    if($vw_startup_resp_scroll_top == true){
    	$vw_startup_custom_css .='@media screen and (max-width:575px) {';
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='visibility:visible !important;';
		$vw_startup_custom_css .='} }';
	}else if($vw_startup_resp_scroll_top == false){
		$vw_startup_custom_css .='@media screen and (max-width:575px){';
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='visibility:hidden !important;';
		$vw_startup_custom_css .='} }';
	}

	$vw_startup_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_startup_resp_menu_toggle_btn_bg_color');
	if($vw_startup_resp_menu_toggle_btn_bg_color != false){
		$vw_startup_custom_css .='.toggle-nav i{';
			$vw_startup_custom_css .='background-color: '.esc_attr($vw_startup_resp_menu_toggle_btn_bg_color).';';
		$vw_startup_custom_css .='}';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_startup_topbar_padding_top_bottom = get_theme_mod('vw_startup_topbar_padding_top_bottom');
	if($vw_startup_topbar_padding_top_bottom != false){
		$vw_startup_custom_css .='.top-bar{';
			$vw_startup_custom_css .='padding-top: '.esc_attr($vw_startup_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_startup_topbar_padding_top_bottom).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_navigation_menu_font_size = get_theme_mod('vw_startup_navigation_menu_font_size');
	if($vw_startup_navigation_menu_font_size != false){
		$vw_startup_custom_css .='.main-navigation a{';
			$vw_startup_custom_css .='font-size: '.esc_attr($vw_startup_navigation_menu_font_size).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_nav_menus_font_weight = get_theme_mod( 'vw_startup_navigation_menu_font_weight','Default');
    if($vw_startup_nav_menus_font_weight == 'Default'){
		$vw_startup_custom_css .='.main-navigation a{';
			$vw_startup_custom_css .='';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_nav_menus_font_weight == 'Normal'){
		$vw_startup_custom_css .='.main-navigation a{';
			$vw_startup_custom_css .='font-weight: normal;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_header_menus_color = get_theme_mod('vw_startup_header_menus_color');
	if($vw_startup_header_menus_color != false){
		$vw_startup_custom_css .='.main-navigation a{';
			$vw_startup_custom_css .='color: '.esc_attr($vw_startup_header_menus_color).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_header_menus_hover_color = get_theme_mod('vw_startup_header_menus_hover_color');
	if($vw_startup_header_menus_hover_color != false){
		$vw_startup_custom_css .='.main-navigation a:hover{';
			$vw_startup_custom_css .='color: '.esc_attr($vw_startup_header_menus_hover_color).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_header_submenus_color = get_theme_mod('vw_startup_header_submenus_color');
	if($vw_startup_header_submenus_color != false){
		$vw_startup_custom_css .='.main-navigation ul ul a{';
			$vw_startup_custom_css .='color: '.esc_attr($vw_startup_header_submenus_color).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_header_submenus_hover_color = get_theme_mod('vw_startup_header_submenus_hover_color');
	if($vw_startup_header_submenus_hover_color != false){
		$vw_startup_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_startup_custom_css .='color: '.esc_attr($vw_startup_header_submenus_hover_color).';';
		$vw_startup_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_startup_sticky_header_padding = get_theme_mod('vw_startup_sticky_header_padding');
	if($vw_startup_sticky_header_padding != false){
		$vw_startup_custom_css .='.header-fixed{';
			$vw_startup_custom_css .='padding: '.esc_attr($vw_startup_sticky_header_padding).';';
		$vw_startup_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_startup_search_padding_top_bottom = get_theme_mod('vw_startup_search_padding_top_bottom');
	$vw_startup_search_padding_left_right = get_theme_mod('vw_startup_search_padding_left_right');
	$vw_startup_search_font_size = get_theme_mod('vw_startup_search_font_size');
	$vw_startup_search_border_radius = get_theme_mod('vw_startup_search_border_radius');
	if($vw_startup_search_padding_top_bottom != false || $vw_startup_search_padding_left_right != false || $vw_startup_search_font_size != false || $vw_startup_search_border_radius != false){
		$vw_startup_custom_css .='.search-box i{';
			$vw_startup_custom_css .='padding-top: '.esc_attr($vw_startup_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_startup_search_padding_top_bottom).';padding-left: '.esc_attr($vw_startup_search_padding_left_right).';padding-right: '.esc_attr($vw_startup_search_padding_left_right).';font-size: '.esc_attr($vw_startup_search_font_size).';border-radius: '.esc_attr($vw_startup_search_border_radius).'px;';
		$vw_startup_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_startup_button_padding_top_bottom = get_theme_mod('vw_startup_button_padding_top_bottom');
	$vw_startup_button_padding_left_right = get_theme_mod('vw_startup_button_padding_left_right');
	if($vw_startup_button_padding_top_bottom != false || $vw_startup_button_padding_left_right != false){
		$vw_startup_custom_css .='.blogbutton-small{';
			$vw_startup_custom_css .='padding-top: '.esc_attr($vw_startup_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_startup_button_padding_top_bottom).';padding-left: '.esc_attr($vw_startup_button_padding_left_right).';padding-right: '.esc_attr($vw_startup_button_padding_left_right).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_button_border_radius = get_theme_mod('vw_startup_button_border_radius');
	if($vw_startup_button_border_radius != false){
		$vw_startup_custom_css .='.blogbutton-small, .hvr-sweep-to-right:before{';
			$vw_startup_custom_css .='border-radius: '.esc_attr($vw_startup_button_border_radius).'px;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_button_font_size = get_theme_mod('vw_startup_button_font_size',14);
	$vw_startup_custom_css .='.blogbutton-small{';
		$vw_startup_custom_css .='font-size: '.esc_attr($vw_startup_button_font_size).';';
	$vw_startup_custom_css .='}';

	$vw_startup_theme_lay = get_theme_mod( 'vw_startup_button_text_transform','Uppercase');
	if($vw_startup_theme_lay == 'Capitalize'){
		$vw_startup_custom_css .='.blogbutton-small{';
			$vw_startup_custom_css .='text-transform:Capitalize;';
		$vw_startup_custom_css .='}';
	}
	if($vw_startup_theme_lay == 'Lowercase'){
		$vw_startup_custom_css .='.blogbutton-small{';
			$vw_startup_custom_css .='text-transform:Lowercase;';
		$vw_startup_custom_css .='}';
	}
	if($vw_startup_theme_lay == 'Uppercase'){
		$vw_startup_custom_css .='.blogbutton-small{';
			$vw_startup_custom_css .='text-transform:Uppercase;';
		$vw_startup_custom_css .='}';
	} 


	/*------------- Single Blog Page------------------*/

	$vw_startup_featured_image_border_radius = get_theme_mod('vw_startup_featured_image_border_radius', 0);
	if($vw_startup_featured_image_border_radius != false){
		$vw_startup_custom_css .='.service-image img, .feature-box img{';
			$vw_startup_custom_css .='border-radius: '.esc_attr($vw_startup_featured_image_border_radius).'px;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_featured_image_box_shadow = get_theme_mod('vw_startup_featured_image_box_shadow',0);
	if($vw_startup_featured_image_box_shadow != false){
		$vw_startup_custom_css .='.service-image img, .feature-box img, #content-vw img{';
			$vw_startup_custom_css .='box-shadow: '.esc_attr($vw_startup_featured_image_box_shadow).'px '.esc_attr($vw_startup_featured_image_box_shadow).'px '.esc_attr($vw_startup_featured_image_box_shadow).'px #cccccc;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_single_blog_post_navigation_show_hide = get_theme_mod('vw_startup_single_blog_post_navigation_show_hide',true);
	if($vw_startup_single_blog_post_navigation_show_hide != true){
		$vw_startup_custom_css .='.post-navigation{';
			$vw_startup_custom_css .='display: none;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_comment_width = get_theme_mod('vw_startup_single_blog_comment_width');
	if($vw_startup_comment_width != false){
		$vw_startup_custom_css .='#comments textarea{';
			$vw_startup_custom_css .='width: '.esc_attr($vw_startup_comment_width).';';
		$vw_startup_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_startup_footer_background_color = get_theme_mod('vw_startup_footer_background_color');
	if($vw_startup_footer_background_color != false){
		$vw_startup_custom_css .='.footer{';
			$vw_startup_custom_css .='background-color: '.esc_attr($vw_startup_footer_background_color).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_copyright_font_size = get_theme_mod('vw_startup_copyright_font_size');
	if($vw_startup_copyright_font_size != false){
		$vw_startup_custom_css .='.copyright p{';
			$vw_startup_custom_css .='font-size: '.esc_attr($vw_startup_copyright_font_size).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_copyright_padding_top_bottom = get_theme_mod('vw_startup_copyright_padding_top_bottom');
	if($vw_startup_copyright_padding_top_bottom != false){
		$vw_startup_custom_css .='.footer-2{';
			$vw_startup_custom_css .='padding-top: '.esc_attr($vw_startup_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_startup_copyright_padding_top_bottom).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_copyright_alignment = get_theme_mod('vw_startup_copyright_alignment');
	if($vw_startup_copyright_alignment != false){
		$vw_startup_custom_css .='.copyright p{';
			$vw_startup_custom_css .='text-align: '.esc_attr($vw_startup_copyright_alignment).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_footer_widgets_heading = get_theme_mod( 'vw_startup_footer_widgets_heading','Left');
    if($vw_startup_footer_widgets_heading == 'Left'){
		$vw_startup_custom_css .='.footer h3, .footer h3 .wp-block-search .wp-block-search__label{';
		$vw_startup_custom_css .='text-align: left;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_footer_widgets_heading == 'Center'){
		$vw_startup_custom_css .='.footer h3, .footer h3 .wp-block-search .wp-block-search__label{';
			$vw_startup_custom_css .='text-align: center;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_footer_widgets_heading == 'Right'){
		$vw_startup_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_startup_custom_css .='text-align: right;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_footer_widgets_content = get_theme_mod( 'vw_startup_footer_widgets_content','Left');
    if($vw_startup_footer_widgets_content == 'Left'){
		$vw_startup_custom_css .='.footer li{';
		$vw_startup_custom_css .='text-align: left;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_footer_widgets_content == 'Center'){
		$vw_startup_custom_css .='.footer li{';
			$vw_startup_custom_css .='text-align: center;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_footer_widgets_content == 'Right'){
		$vw_startup_custom_css .='.footer li{';
			$vw_startup_custom_css .='text-align: right;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_footer_padding = get_theme_mod('vw_startup_footer_padding');
	if($vw_startup_footer_padding != false){
		$vw_startup_custom_css .='.footer{';
			$vw_startup_custom_css .='padding: '.esc_attr($vw_startup_footer_padding).' 0;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_footer_icon = get_theme_mod('vw_startup_footer_icon');
	if($vw_startup_footer_icon == false){
		$vw_startup_custom_css .='.copyright p{';
			$vw_startup_custom_css .='width:100%; text-align:center; float:none;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_footer_background_image = get_theme_mod('vw_startup_footer_background_image');
	if($vw_startup_footer_background_image != false){
		$vw_startup_custom_css .='.footer{';
			$vw_startup_custom_css .='background: url('.esc_attr($vw_startup_footer_background_image).');';
		$vw_startup_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_startup_scroll_to_top_font_size = get_theme_mod('vw_startup_scroll_to_top_font_size');
	if($vw_startup_scroll_to_top_font_size != false){
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='font-size: '.esc_attr($vw_startup_scroll_to_top_font_size).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_scroll_to_top_padding = get_theme_mod('vw_startup_scroll_to_top_padding');
	$vw_startup_scroll_to_top_padding = get_theme_mod('vw_startup_scroll_to_top_padding');
	if($vw_startup_scroll_to_top_padding != false){
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='padding-top: '.esc_attr($vw_startup_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_startup_scroll_to_top_padding).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_scroll_to_top_width = get_theme_mod('vw_startup_scroll_to_top_width');
	if($vw_startup_scroll_to_top_width != false){
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='width: '.esc_attr($vw_startup_scroll_to_top_width).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_scroll_to_top_height = get_theme_mod('vw_startup_scroll_to_top_height');
	if($vw_startup_scroll_to_top_height != false){
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='height: '.esc_attr($vw_startup_scroll_to_top_height).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_scroll_to_top_border_radius = get_theme_mod('vw_startup_scroll_to_top_border_radius');
	if($vw_startup_scroll_to_top_border_radius != false){
		$vw_startup_custom_css .='.scrollup i{';
			$vw_startup_custom_css .='border-radius: '.esc_attr($vw_startup_scroll_to_top_border_radius).'px;';
		$vw_startup_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_startup_social_icon_font_size = get_theme_mod('vw_startup_social_icon_font_size');
	if($vw_startup_social_icon_font_size != false){
		$vw_startup_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_startup_custom_css .='font-size: '.esc_attr($vw_startup_social_icon_font_size).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_social_icon_padding = get_theme_mod('vw_startup_social_icon_padding');
	if($vw_startup_social_icon_padding != false){
		$vw_startup_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_startup_custom_css .='padding: '.esc_attr($vw_startup_social_icon_padding).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_social_icon_width = get_theme_mod('vw_startup_social_icon_width');
	if($vw_startup_social_icon_width != false){
		$vw_startup_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_startup_custom_css .='width: '.esc_attr($vw_startup_social_icon_width).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_social_icon_height = get_theme_mod('vw_startup_social_icon_height');
	if($vw_startup_social_icon_height != false){
		$vw_startup_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_startup_custom_css .='height: '.esc_attr($vw_startup_social_icon_height).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_social_icon_border_radius = get_theme_mod('vw_startup_social_icon_border_radius');
	if($vw_startup_social_icon_border_radius != false){
		$vw_startup_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_startup_custom_css .='border-radius: '.esc_attr($vw_startup_social_icon_border_radius).'px;';
		$vw_startup_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_startup_products_padding_top_bottom = get_theme_mod('vw_startup_products_padding_top_bottom');
	if($vw_startup_products_padding_top_bottom != false){
		$vw_startup_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_startup_custom_css .='padding-top: '.esc_attr($vw_startup_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_startup_products_padding_top_bottom).'!important;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_products_padding_left_right = get_theme_mod('vw_startup_products_padding_left_right');
	if($vw_startup_products_padding_left_right != false){
		$vw_startup_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_startup_custom_css .='padding-left: '.esc_attr($vw_startup_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_startup_products_padding_left_right).'!important;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_products_box_shadow = get_theme_mod('vw_startup_products_box_shadow');
	if($vw_startup_products_box_shadow != false){
		$vw_startup_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_startup_custom_css .='box-shadow: '.esc_attr($vw_startup_products_box_shadow).'px '.esc_attr($vw_startup_products_box_shadow).'px '.esc_attr($vw_startup_products_box_shadow).'px #ddd;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_products_border_radius = get_theme_mod('vw_startup_products_border_radius');
	if($vw_startup_products_border_radius != false){
		$vw_startup_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_startup_custom_css .='border-radius: '.esc_attr($vw_startup_products_border_radius).'px;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_products_btn_padding_top_bottom = get_theme_mod('vw_startup_products_btn_padding_top_bottom');
	if($vw_startup_products_btn_padding_top_bottom != false){
		$vw_startup_custom_css .='.woocommerce a.button{';
			$vw_startup_custom_css .='padding-top: '.esc_attr($vw_startup_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_startup_products_btn_padding_top_bottom).' !important;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_products_btn_padding_left_right = get_theme_mod('vw_startup_products_btn_padding_left_right');
	if($vw_startup_products_btn_padding_left_right != false){
		$vw_startup_custom_css .='.woocommerce a.button{';
			$vw_startup_custom_css .='padding-left: '.esc_attr($vw_startup_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_startup_products_btn_padding_left_right).' !important;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_products_button_border_radius = get_theme_mod('vw_startup_products_button_border_radius');
	if($vw_startup_products_button_border_radius != false){
		$vw_startup_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_startup_custom_css .='border-radius: '.esc_attr($vw_startup_products_button_border_radius).'px;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_woocommerce_sale_position = get_theme_mod( 'vw_startup_woocommerce_sale_position','right');
    if($vw_startup_woocommerce_sale_position == 'left'){
		$vw_startup_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_startup_custom_css .='left: -10px; right: auto;';
		$vw_startup_custom_css .='}';
	}else if($vw_startup_woocommerce_sale_position == 'right'){
		$vw_startup_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_startup_custom_css .='left: auto; right: 0;';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_woocommerce_sale_font_size = get_theme_mod('vw_startup_woocommerce_sale_font_size');
	if($vw_startup_woocommerce_sale_font_size != false){
		$vw_startup_custom_css .='.woocommerce span.onsale{';
			$vw_startup_custom_css .='font-size: '.esc_attr($vw_startup_woocommerce_sale_font_size).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_woocommerce_sale_border_radius = get_theme_mod('vw_startup_woocommerce_sale_border_radius', 100);
	if($vw_startup_woocommerce_sale_border_radius != false){
		$vw_startup_custom_css .='.woocommerce span.onsale{';
			$vw_startup_custom_css .='border-radius: '.esc_attr($vw_startup_woocommerce_sale_border_radius).'px;';
		$vw_startup_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_startup_logo_padding = get_theme_mod('vw_startup_logo_padding');
	if($vw_startup_logo_padding != false){
		$vw_startup_custom_css .='.logo{';
			$vw_startup_custom_css .='padding: '.esc_attr($vw_startup_logo_padding).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_logo_margin = get_theme_mod('vw_startup_logo_margin');
	if($vw_startup_logo_margin != false){
		$vw_startup_custom_css .='.logo{';
			$vw_startup_custom_css .='margin: '.esc_attr($vw_startup_logo_margin).';';
		$vw_startup_custom_css .='}';
	}

	// Site title Font Size
	$vw_startup_site_title_font_size = get_theme_mod('vw_startup_site_title_font_size');
	if($vw_startup_site_title_font_size != false){
		$vw_startup_custom_css .='.logo h1 a, .logo p.site-title a{';
			$vw_startup_custom_css .='font-size: '.esc_attr($vw_startup_site_title_font_size).';';
		$vw_startup_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_startup_site_tagline_font_size = get_theme_mod('vw_startup_site_tagline_font_size');
	if($vw_startup_site_tagline_font_size != false){
		$vw_startup_custom_css .='.logo p.site-description{';
			$vw_startup_custom_css .='font-size: '.esc_attr($vw_startup_site_tagline_font_size).';';
		$vw_startup_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_startup_preloader_bg_color = get_theme_mod('vw_startup_preloader_bg_color');
	if($vw_startup_preloader_bg_color != false){
		$vw_startup_custom_css .='#preloader{';
			$vw_startup_custom_css .='background-color: '.esc_attr($vw_startup_preloader_bg_color).';';
		$vw_startup_custom_css .='}';
	}

	$vw_startup_preloader_border_color = get_theme_mod('vw_startup_preloader_border_color');
	if($vw_startup_preloader_border_color != false){
		$vw_startup_custom_css .='.loader-line{';
			$vw_startup_custom_css .='border-color: '.esc_attr($vw_startup_preloader_border_color).'!important;';
		$vw_startup_custom_css .='}';
	}