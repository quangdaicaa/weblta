<?php
/**
 * VW Startup: Block Patterns
 *
 * @package VW Startup
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-startup',
		array( 'label' => __( 'VW Startup', 'vw-startup' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-startup/slider-section',
		array(
			'title'      => __( 'Slider Section', 'vw-startup' ),
			'categories' => array( 'vw-startup' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider.png\",\"id\":2636,\"dimRatio\":70,\"customGradient\":\"linear-gradient(100deg,rgb(0,0,0) 51%,rgba(0,0,0,0.36) 72%)\",\"align\":\"full\",\"className\":\"sliderbox\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-70 has-background-dim has-background-gradient sliderbox\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider.png)\"><span aria-hidden=\"true\" class=\"wp-block-cover__gradient-background\" style=\"background:linear-gradient(100deg,rgb(0,0,0) 51%,rgba(0,0,0,0.36) 72%)\"></span><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"mx-md-5 mx-0\"} -->\n<div class=\"wp-block-columns alignwide mx-md-5 mx-0\"><!-- wp:column {\"verticalAlignment\":\"center\",\"className\":\"ms-5\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center ms-5\"><!-- wp:group {\"className\":\"sliderbox-content ms-lg-3\"} -->\n<div class=\"wp-block-group sliderbox-content ms-lg-3\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":1,\"className\":\"mb-2\",\"style\":{\"typography\":{\"fontSize\":40}}} -->\n<h1 class=\"mb-2\" style=\"font-size:40px\">LOREM IPSUM IS SIMPLY DUMMY TEXT&nbsp;</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"fontSize\":\"normal\"} -->\n<p class=\"has-normal-font-size\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard&nbsp;</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":3,\"style\":{\"color\":{\"background\":\"#64c5aa\"}},\"textColor\":\"white\",\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link has-white-color has-text-color has-background\" style=\"border-radius:3px;background-color:#64c5aa\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-startup/services-section',
		array(
			'title'      => __( 'Services Section', 'vw-startup' ),
			'categories' => array( 'vw-startup' ),
			'content'    => "<!-- wp:group {\"align\":\"wide\",\"className\":\"mt-5 services-box mx-2\"} -->\n<div class=\"wp-block-group alignwide mt-5 services-box mx-2\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"className\":\"mb-2\"} -->\n<h2 class=\"has-text-align-center mb-2\"><strong>OUR SERVICES</strong></h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"fontSize\":\"medium\",\"style\":{\"color\":{\"text\":\"#5b5b5b\"}}} -->\n<p class=\"has-text-align-center text-center has-text-color has-medium-font-size\" style=\"color:#5b5b5b\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"align\":\"full\",\"className\":\"mx-md-4 mx-0 mt-4\"} -->\n<div class=\"wp-block-columns alignfull mx-md-4 mx-0 mt-4\"><!-- wp:column {\"className\":\"service-img\"} -->\n<div class=\"wp-block-column service-img\"><!-- wp:image {\"id\":2606,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service1.png\" alt=\"\" class=\"wp-image-2606\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"text-center\",\"style\":{\"color\":{\"text\":\"#2b3546\"},\"typography\":{\"fontSize\":17}}} -->\n<h3 class=\"has-text-align-center text-center has-text-color\" style=\"color:#2b3546;font-size:17px\"><strong>OUR SERVICE TITLE 1</strong></h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"service-img\"} -->\n<div class=\"wp-block-column service-img\"><!-- wp:image {\"id\":2607,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service2.png\" alt=\"\" class=\"wp-image-2607\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"text-center\",\"style\":{\"color\":{\"text\":\"#2b3546\"},\"typography\":{\"fontSize\":17}}} -->\n<h3 class=\"has-text-align-center text-center has-text-color\" style=\"color:#2b3546;font-size:17px\"><strong>OUR SERVICE TITLE 2</strong></h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"service-img\"} -->\n<div class=\"wp-block-column service-img\"><!-- wp:image {\"id\":2608,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service3.png\" alt=\"\" class=\"wp-image-2608\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"text-center\",\"style\":{\"color\":{\"text\":\"#2b3546\"},\"typography\":{\"fontSize\":17}}} -->\n<h3 class=\"has-text-align-center text-center has-text-color\" style=\"color:#2b3546;font-size:17px\"><strong>OUR SERVICE TITLE 3</strong></h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"service-img\"} -->\n<div class=\"wp-block-column service-img\"><!-- wp:image {\"id\":2609,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/service4.png\" alt=\"\" class=\"wp-image-2609\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"text-center\",\"style\":{\"color\":{\"text\":\"#2b3546\"},\"typography\":{\"fontSize\":17}}} -->\n<h3 class=\"has-text-align-center text-center has-text-color\" style=\"color:#2b3546;font-size:17px\"><strong>OUR SERVICE TITLE 4</strong></h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
		)
	);
}