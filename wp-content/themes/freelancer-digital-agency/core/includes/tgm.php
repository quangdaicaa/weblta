<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function freelancer_digital_agency_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'freelancer-digital-agency' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	freelancer_digital_agency_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'freelancer_digital_agency_register_recommended_plugins' );