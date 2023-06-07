<?php
//about theme info
add_action( 'admin_menu', 'vw_startup_gettingstarted' );
function vw_startup_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Startup', 'vw-startup'), esc_html__('About VW Startup', 'vw-startup'), 'edit_theme_options', 'vw_startup_guide', 'vw_startup_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_startup_admin_theme_style() {
   wp_enqueue_style('vw-startup-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-startup-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_startup_admin_theme_style');

//guidline for about theme
function vw_startup_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-startup' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Startup Theme', 'vw-startup' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-startup'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Startup at 20% Discount','vw-startup'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-startup'); ?> ( <span><?php esc_html_e('vwpro20','vw-startup'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_STARTUP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-startup' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_startup_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-startup' ); ?></button>	
			<button class="tablinks" onclick="vw_startup_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-startup' ); ?></button>
		  	<button class="tablinks" onclick="vw_startup_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-startup' ); ?></button>	
		  	<button class="tablinks" onclick="vw_startup_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-startup' ); ?></button>
		  	<button class="tablinks" onclick="vw_startup_open_tab(event, 'startup_pro')"><?php esc_html_e( 'Get Premium', 'vw-startup' ); ?></button>
		  	<button class="tablinks" onclick="vw_startup_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-startup' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_startup_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_startup_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Startup_Plugin_Activation_Settings::get_instance();
				$vw_startup_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-startup-recommended-plugins">
				    <div class="vw-startup-action-list">
				        <?php if ($vw_startup_actions): foreach ($vw_startup_actions as $key => $vw_startup_actionValue): ?>
				                <div class="vw-startup-action" id="<?php echo esc_attr($vw_startup_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_startup_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_startup_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_startup_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-startup'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_startup_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-startup' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e(' VW Startup is a creative and stylish WordPress theme for multipurpose and innovative startups. Create your personal website, blog, business ventures or build online startup business or establish yourself as a successful entrepreneur with the help of this theme. The theme is for IT companies and technical startups, agencies and digital marketing companies which can use it as a business theme. It is very well malleable and adaptive according to the purpose it is being used for. The theme is built on Bootstrap framework for its easy usage. It is jam-packed with loads of sophisticated features which are fun to experiment with for newbies and webmasters equally. The VW Startup is a responsive theme which looks stunning on all devices. Its cross-browser compatibility makes it load smoothly on all web browsers. The theme is translation ready and supports RTL writing to reach maximum audience. It is customizable giving you a good chance to change it according to your needs. Banners and sliders are used to make site more impactful. The VW Startup is designed keeping in mind the SEO factor. The theme loads fast and has easy navigation offering a good user experience. With social media integration, content on your site can be made shareable.','vw-startup'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-startup' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-startup' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STARTUP_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-startup' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-startup'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-startup'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-startup'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-startup'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-startup'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STARTUP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-startup'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-startup'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-startup'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_STARTUP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-startup'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-startup' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-startup'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-startup'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Section','vw-startup'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_service_section') ); ?>" target="_blank"><?php esc_html_e('Services Section','vw-startup'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-startup'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-startup'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-startup'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-startup'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-startup'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-startup'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-startup'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-startup'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-startup'); ?></span><?php esc_html_e(' Go to ','vw-startup'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-startup'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-startup'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-startup'); ?></span><?php esc_html_e(' Go to ','vw-startup'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-startup'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-startup'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-startup'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-startup/" target="_blank"><?php esc_html_e('Documentation','vw-startup'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Startup_Plugin_Activation_Settings::get_instance();
				$vw_startup_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-startup-recommended-plugins">
				    <div class="vw-startup-action-list">
				        <?php if ($vw_startup_actions): foreach ($vw_startup_actions as $key => $vw_startup_actionValue): ?>
				                <div class="vw-startup-action" id="<?php echo esc_attr($vw_startup_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_startup_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_startup_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_startup_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-startup'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_startup_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-startup' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-startup'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-startup'); ?></span></b></p>
	              	<div class="vw-startup-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-startup'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />	
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'vw-startup' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-startup'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-startup'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-startup'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-startup'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-startup'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-startup'); ?></a>
									</div> 
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-startup'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-startup'); ?></a>
									</div> 
								</div>
							</div>
					</div>	
				</div>			
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Startup_Plugin_Activation_Settings::get_instance();
			$vw_startup_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-startup-recommended-plugins">
				    <div class="vw-startup-action-list">
				        <?php if ($vw_startup_actions): foreach ($vw_startup_actions as $key => $vw_startup_actionValue): ?>
				                <div class="vw-startup-action" id="<?php echo esc_attr($vw_startup_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_startup_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_startup_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_startup_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-startup' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-startup-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-startup'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-startup' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-startup'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-startup'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-startup'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-startup'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-startup'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-startup'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_startup_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-startup'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-startup'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Startup_Plugin_Activation_Woo_Products::get_instance();
				$vw_startup_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-startup-recommended-plugins">
					    <div class="vw-startup-action-list">
					        <?php if ($vw_startup_actions): foreach ($vw_startup_actions as $key => $vw_startup_actionValue): ?>
					                <div class="vw-startup-action" id="<?php echo esc_attr($vw_startup_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_startup_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_startup_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_startup_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-startup' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-startup-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-startup'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-startup'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-startup'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-startup'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-startup'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-startup'); ?></span></b></p>
	              	<div class="vw-startup-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-startup'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-startup'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="startup_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-startup' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('The startup WordPress theme is a smart, creative, stylish theme giving a strong platform to startups to introduce themselves in the most professional way to the world. The theme is made for innovative startups, online business ventures, entrepreneurs, IT companies and tech stratups. It can be made to be used for personal website or blog. The theme is designed to give maximum exposure to your new business and will help establish yourself in this highly competitive environment. The theme is responsive looking absolute marvel on varying device screens. It is made cross-browser compatible to load smoothly on all browsers. It is translation ready with RTL support. The startup WP theme has clean and secure code complying with WordPress standards. The social media icons included in the theme makes your content shareable on various networking platforms like Facebook, twitter etc. It follows proper design structure to get higher SEO rank among your rival sites.','vw-startup'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_STARTUP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-startup'); ?></a>
					<a href="<?php echo esc_url( VW_STARTUP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-startup'); ?></a>
					<a href="<?php echo esc_url( VW_STARTUP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-startup'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-startup' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-startup'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-startup'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-startup'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-startup'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-startup'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-startup'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-startup'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-startup'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-startup'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-startup'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-startup'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-startup'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-startup'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'vw-startup'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-startup'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-startup'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-startup'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-startup'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-startup'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-startup'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-startup'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_STARTUP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-startup'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-startup'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-startup'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STARTUP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-startup'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-startup'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-startup'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STARTUP_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-startup'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-startup'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-startup'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STARTUP_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-startup'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-startup'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-startup'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STARTUP_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-startup'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-startup'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-startup'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_STARTUP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-startup'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>