<?php
/**
 * Advance IT Company: Block Patterns
 *
 * @package  Advance IT Company
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'advance-it-company',
		array( 'label' => __( ' Advance IT Company', 'advance-it-company' ) )
	);
}
/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'advance-it-company/banner-section',
		array(
			'title'      => __( 'Banner Section', 'advance-it-company' ),
			'categories' => array( 'advance-it-company' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/banner.png\",\"id\":16,\"dimRatio\":30,\"customOverlayColor\":\"#0e0a63\",\"align\":\"full\",\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover alignfull banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-30 has-background-dim\" style=\"background-color:#0e0a63\"></span><img class=\"wp-block-cover__image-background wp-image-16\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"7.9%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:7.9%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"50%\",\"className\":\"banner-section-content  mx-md-5\"} -->\n<div class=\"wp-block-column banner-section-content  mx-md-5\" style=\"flex-basis:50%\"><!-- wp:heading {\"level\":1} -->\n<h1><strong>LOREM IPSUM DOLOR SIT AMET CONSECTETUR ADIPISCING ELIT</strong></h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"color\":{\"background\":\"#179cd7\"},\"border\":{\"radius\":\"0px\"},\"typography\":{\"fontSize\":\"14px\"}},\"className\":\"banner-section-btn\"} -->\n<div class=\"wp-block-button has-custom-font-size banner-section-btn\" style=\"font-size:14px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background\" style=\"border-radius:0px;background-color:#179cd7\"><strong>Read More</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"25%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:25%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);


    register_block_pattern(
		'advance-it-company/service-section',
		array(
			'title'      => __( 'service-section', 'advance-it-company' ),
			'categories' => array( 'advance-it-company' ),
			'content'    => "<!-- wp:group {\"align\":\"wide\",\"className\":\"work-service-section px-md-2  mt-5 mt-sm-4 \"} -->\n<div class=\"wp-block-group alignwide work-service-section px-md-2 mt-5 mt-sm-4\"><!-- wp:columns {\"align\":\"full\",\"className\":\"service-section  mx-md-5 mx-1\"} -->\n<div class=\"wp-block-columns alignfull service-section  mx-md-5 mx-1\"><!-- wp:column {\"width\":\"\",\"className\":\"work-section\"} -->\n<div class=\"wp-block-column work-section\"><!-- wp:heading {\"level\":5,\"style\":{\"color\":{\"background\":\"#abda37\"},\"typography\":{\"fontSize\":\"12px\"}},\"className\":\"p-2 text-dark d-inline\"} -->\n<h5 class=\"p-2 text-dark d-inline has-background\" style=\"background-color:#abda37;font-size:12px\"><strong>HOW IT WORKS</strong></h5>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":\"32px\",\"fontStyle\":\"normal\",\"fontWeight\":\"600\"},\"color\":{\"text\":\"#179cd7\"}}} -->\n<h2 class=\"has-text-color\" style=\"color:#179cd7;font-size:32px;font-style:normal;font-weight:600\">LOREM IPSUM DOLOR SIT AMET</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#272b46\"},\"typography\":{\"fontSize\":\"14px\"}}} -->\n<p class=\"has-text-color\" style=\"color:#272b46;font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"id\":21,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/How-it-work.png\" alt=\"\" class=\"wp-image-21\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"work-icon-content\"} -->\n<div class=\"wp-block-column work-icon-content\"><!-- wp:columns -->\n<div class=\"wp-block-columns mb-2\"><!-- wp:column {\"style\":{\"color\":{\"background\":\"#ebf9ff\"}},\"className\":\"work-box p-3 my-2 mx-0\"} -->\n<div class=\"wp-block-column work-box p-3 my-2 mx-0 has-background\" style=\"background-color:#ebf9ff\"><!-- wp:image {\"align\":\"center\",\"id\":28,\"width\":56,\"height\":56,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/works1.png\" alt=\"\" class=\"wp-image-28\" width=\"56\" height=\"56\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"style\":{\"typography\":{\"fontSize\":\"16px\"},\"color\":{\"text\":\"#272b46\"}}} -->\n<h4 class=\"has-text-align-center has-text-color\" style=\"color:#272b46;font-size:16px\"><strong>TITILE1</strong></h4>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"13px\"},\"color\":{\"text\":\"#272b46\"}}} -->\n<p class=\"has-text-align-center has-text-color\" style=\"color:#272b46;font-size:13px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"style\":{\"color\":{\"background\":\"#ebf9ff\"}},\"className\":\"work-box p-3 my-2 mx-0\"} -->\n<div class=\"wp-block-column work-box p-3 my-2 mx-0 has-background\" style=\"background-color:#ebf9ff\"><!-- wp:image {\"align\":\"center\",\"id\":29,\"width\":56,\"height\":56,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/works2.png\" alt=\"\" class=\"wp-image-29\" width=\"56\" height=\"56\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"style\":{\"typography\":{\"fontSize\":\"16px\"},\"color\":{\"text\":\"#272b46\"}}} -->\n<h4 class=\"has-text-align-center has-text-color\" style=\"color:#272b46;font-size:16px\"><strong>TITLE2</strong></h4>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"13px\"},\"color\":{\"text\":\"#272b46\"}}} -->\n<p class=\"has-text-align-center has-text-color\" style=\"color:#272b46;font-size:13px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns mb-2\"><!-- wp:column {\"style\":{\"color\":{\"background\":\"#ebf9ff\"}},\"className\":\"work-box p-3 my-2 mx-0\"} -->\n<div class=\"wp-block-column work-box p-3 my-2 mx-0 has-background\" style=\"background-color:#ebf9ff\"><!-- wp:image {\"align\":\"center\",\"id\":30,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/works3.png\" alt=\"\" class=\"wp-image-30\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"style\":{\"typography\":{\"fontSize\":\"16px\"},\"color\":{\"text\":\"#272b46\"}}} -->\n<h4 class=\"has-text-align-center has-text-color\" style=\"color:#272b46;font-size:16px\"><strong>TITLE3</strong></h4>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"13px\"},\"color\":{\"text\":\"#272b46\"}}} -->\n<p class=\"has-text-align-center has-text-color\" style=\"color:#272b46;font-size:13px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"style\":{\"color\":{\"background\":\"#ebf9ff\"}},\"className\":\"work-box p-3 my-2 mx-0\"} -->\n<div class=\"wp-block-column work-box p-3 my-2 mx-0 has-background\" style=\"background-color:#ebf9ff\"><!-- wp:image {\"align\":\"center\",\"id\":31,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/theme-block-pattern/images/works4.png\" alt=\"\" class=\"wp-image-31\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"style\":{\"typography\":{\"fontSize\":\"16px\"},\"color\":{\"text\":\"#272b46\"}}} -->\n<h4 class=\"has-text-align-center has-text-color\" style=\"color:#272b46;font-size:16px\"><strong>TITLE4</strong></h4>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"13px\"},\"color\":{\"text\":\"#272b46\"}}} -->\n<p class=\"has-text-align-center has-text-color\" style=\"color:#272b46;font-size:13px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}