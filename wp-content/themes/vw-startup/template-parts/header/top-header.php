<?php
/**
 * The template part for displaying top bar
 *
 * @package VW Startup 
 * @subpackage vw_startup
 * @since VW Startup 1.0
 */
?>
<?php if( get_theme_mod( 'vw_startup_topbar_hide_show', false) ==1 || get_theme_mod( 'vw_startup_resp_topbar_hide_show', false) ==1) { ?>
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <?php if ( get_theme_mod('vw_startup_short_line','') != "" ) {?>
            <p><?php echo esc_html( get_theme_mod('vw_startup_short_line','') ); ?></p>
          <?php }?>
        </div>
        <div class="col-lg-5 col-md-5">
          <?php dynamic_sidebar('social-icon'); ?>
        </div>
        <?php if( get_theme_mod('vw_startup_search_hide_show',true) ==1){ ?>
          <div class="search-box col-lg-1 col-md-1">
            <span><a href="#"><i class="<?php echo esc_attr(get_theme_mod('vw_startup_search_icon','fas fa-search')); ?>"></i></a></span>
          </div>
        <?php }?>
      </div>
      <div class="serach_outer">
        <div class="closepop"><a href="#maincontent"><i class="<?php echo esc_attr(get_theme_mod('vw_startup_search_close_icon','fa fa-window-close')); ?>"></i></a></div>
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
<?php }?>