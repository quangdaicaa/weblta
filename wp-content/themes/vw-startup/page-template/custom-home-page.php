<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_startup_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_startup_slider_hide_show', false) != '' || get_theme_mod( 'vw_startup_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <?php if(get_theme_mod('vw_startup_slider_type', 'Default slider') == 'Default slider' ){ ?>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_startup_slider_speed',4000)) ?>"> 
          <?php $vw_startup_slider_page = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'vw_startup_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $vw_startup_slider_page[] = $mod;
              }
            }
            if( !empty($vw_startup_slider_page) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $vw_startup_slider_page,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>     
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/slider.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h1 class="wow rollIn delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <p class="wow rollIn delay-1000" data-wow-duration="2s"><?php $vw_startup_excerpt = get_the_excerpt(); echo esc_html( vw_startup_string_limit_words( $vw_startup_excerpt, esc_attr(get_theme_mod('vw_startup_slider_excerpt_number','30')))); ?></p>
                    <?php if( get_theme_mod('vw_startup_slider_button_text','READ MORE') != ''){ ?>
                      <div class="more-btn wow rollIn delay-1000" data-wow-duration="2s">     
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_startup_slider_button_text',__('READ MORE','vw-startup')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_startup_slider_button_text',__('READ MORE','vw-startup')));?></span></a>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
              <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
            <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-startup' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-startup' );?></span>
          </a>
        </div>  
        <div class="clearfix"></div>
          <?php } else if(get_theme_mod('vw_startup_slider_type', 'Advance slider') == 'Advance slider'){?>
            <?php echo do_shortcode(get_theme_mod('vw_startup_advance_slider_shortcode')); ?>
          <?php } ?>
    </section>
  <?php }?>

  <?php do_action( 'vw_startup_after_slider' ); ?>

  <?php if( get_theme_mod('vw_startup_section_title') != '' || get_theme_mod('vw_startup_section_short_text') != '' || get_theme_mod('vw_startup_service_category') != ''){ ?>
    <section id="services" class="wow slideInRight delay-1000" data-wow-duration="2s">
      <div class="container">
        <?php if( get_theme_mod('vw_startup_section_title') != ''){ ?>     
          <h2><?php echo esc_html(get_theme_mod('vw_startup_section_title','')); ?></h2>
        <?php }?>
        <?php if( get_theme_mod('vw_startup_section_short_text') != ''){ ?>     
          <p><?php echo esc_html(get_theme_mod('vw_startup_section_short_text','')); ?></p>
        <?php }?>
        <div class="row">
          <?php 
            $vw_startup_catData1=  get_theme_mod('vw_startup_service_category');
            if($vw_startup_catData1){
            $page_query = new WP_Query(array( 'category_name' => esc_html($vw_startup_catData1 ,'vw-startup')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-3 col-md-6">
                  <div class="service-section">
                    <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    <div class="overlay-box">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3><span class="screen-reader-text"><?php the_title(); ?></span></a>
                    </div>
                  </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'vw_startup_after_service' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>