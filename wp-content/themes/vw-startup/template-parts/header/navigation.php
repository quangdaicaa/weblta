<?php
/**
 * The template part for displaying navigation
 *
 * @package VW Startup 
 * @subpackage vw_startup
 * @since VW Startup 1.0
 */
?> 
<div id="header" class="menubar">
  <div class="header-menu <?php if( get_theme_mod( 'vw_startup_sticky_header', false) != '' || get_theme_mod( 'vw_startup_stickyheader_hide_show', false) != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
    <div class="container">
      <div class="row bg-home">      
        <div class="col-lg-9 col-md-8 col-4">
          <?php if(has_nav_menu('primary')){ ?>
            <div class="toggle-nav mobile-menu">
              <button onclick="vw_startup_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_startup_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-startup'); ?></span></button>
            </div> 
          <?php } ?>
          <div id="mySidenav" class="nav sidenav">
            <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-startup' ); ?>">
              <?php 
                if(has_nav_menu('primary')){
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container_class' => 'main-menu clearfix' ,
                    'menu_class' => 'clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                    'fallback_cb' => 'wp_page_menu',
                  ) ); 
                }
              ?>
              <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_startup_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_startup_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-startup'); ?></span></a>
            </nav>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-8 req-button">
          <?php if ( get_theme_mod('vw_startup_button_text','') != "" ) {?>
            <a href="<?php echo esc_url( get_theme_mod('vw_startup_button_link','') ); ?>"><?php echo esc_html( get_theme_mod('vw_startup_button_text','') ); ?><span class="screen-reader-text"><?php esc_html_e( 'Request a quote','vw-startup' );?></span></a>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>