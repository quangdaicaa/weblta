<?php
/**
 * The template part for displaying header
 *
 * @package VW Startup 
 * @subpackage vw_startup
 * @since VW Startup 1.0
 */
?>
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12 align-self-center">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_startup_logo_title_hide_show',true) ==1){ ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_startup_logo_title_hide_show',true) ==1){ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_startup_tagline_hide_show',true) ==1){ ?>
              <p class="site-description">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-8 col-md-12 contact-info align-self-center">
        <div class="row">
          <div class="col-lg-4 col-md-4"> 
            <div class="row">
              <?php if ( get_theme_mod('vw_startup_location','') != "" ) {?>
                <div class="col-lg-2 col-md-2 col-3">
                  <i class="<?php echo esc_attr(get_theme_mod('vw_startup_location_icon','fas fa-map-marker-alt')); ?>"></i>
                </div>
                <div class="col-lg-10 col-md-10 col-9 contents">
                  <p><?php echo esc_html( get_theme_mod('vw_startup_location','') ); ?></p>
                </div>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 call"> 
            <div class="row">
              <?php if ( get_theme_mod('vw_startup_call','') != "" ) {?>
                <div class="col-lg-2 col-md-2 col-3">
                  <i class="<?php echo esc_attr(get_theme_mod('vw_startup_call_icon','fas fa-phone-volume')); ?>"></i>
                </div>
                <div class="col-lg-10 col-md-10 col-9 contents">
                  <p><a href="tel:<?php echo esc_attr( get_theme_mod('vw_startup_call','') ); ?>"><?php echo esc_html(get_theme_mod('vw_startup_call',''));?></a></p>
                </div>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4"> 
            <div class="row">
              <?php if ( get_theme_mod('vw_startup_email','') != "" ) {?>
                <div class="col-lg-2 col-md-2 col-3">
                  <i class="<?php echo esc_attr(get_theme_mod('vw_startup_email_icon','fas fa-envelope-open')); ?>"></i>
                </div>
                <div class="col-lg-10 col-md-10 col-9 contents">
                  <p><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_startup_email',''));?>"><?php echo esc_html(get_theme_mod('vw_startup_email',''));?></a></p>
                </div>
              <?php }?>
            </div>
          </div>        
        </div>
      </div>
    </div>
  </div>
</div>