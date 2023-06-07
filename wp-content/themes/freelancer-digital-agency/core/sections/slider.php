<?php if ( get_theme_mod('freelancer_digital_agency_blog_box_enable') ) : ?>

<?php $freelancer_digital_agency_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('freelancer_digital_agency_blog_slide_category'),
  'posts_per_page' => get_theme_mod('freelancer_digital_agency_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $freelancer_digital_agency_arr_posts = new WP_Query( $freelancer_digital_agency_args );
    if ( $freelancer_digital_agency_arr_posts->have_posts() ) :
      while ( $freelancer_digital_agency_arr_posts->have_posts() ) :
        $freelancer_digital_agency_arr_posts->the_post();
        ?>
        <div class="blog_inner_box">
          <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            endif;
          ?>
          <div class="blog_box pt-3 pt-md-0">
            <?php if ( get_theme_mod('freelancer_digital_agency_slider_extra_heading') ) : ?>
              <h5><?php echo esc_html(get_theme_mod('freelancer_digital_agency_slider_extra_heading'));?></h5>
            <?php endif; ?>
            <?php if ( get_theme_mod('freelancer_digital_agency_title_unable_disable',true) ) : ?>
              <h3 class="my-3"><?php the_title(); ?></a></h3>
            <?php endif; ?>
              <p class="mb-0"><?php echo wp_trim_words( get_the_content(), 25 ); ?></p>
            <?php if ( get_theme_mod('freelancer_digital_agency_button_unable_disable',true) ) : ?>
              <p class="slider-button mt-4">
                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('Read More','freelancer-digital-agency'); ?></a>
              </p>
            <?php endif; ?>
            <?php if ( get_theme_mod('freelancer_digital_agency_header_phone_number') || get_theme_mod('freelancer_digital_agency_header_email') ) : ?>
              <div class="call-info-box">
                <h4><?php esc_html_e('Any Question','freelancer-digital-agency'); ?></h4>
                <div class="call-info">
                  <p class="mb-0"><i class="fas fa-phone mr-2"></i><?php echo esc_html( get_theme_mod('freelancer_digital_agency_header_phone_number' ) ); ?></p>
                  <p class="mb-0"><i class="fas fa-paper-plane mr-2"></i><?php echo esc_html( get_theme_mod('freelancer_digital_agency_header_email' ) ); ?></p>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="social-links">
            <?php $freelancer_digital_agency_settings = get_theme_mod( 'freelancer_digital_agency_social_links_settings' ); ?>
            <?php if ( is_array($freelancer_digital_agency_settings) || is_object($freelancer_digital_agency_settings) ){ ?>
              <?php foreach( $freelancer_digital_agency_settings as $freelancer_digital_agency_setting ) { ?>
                <a href="<?php echo esc_url( $freelancer_digital_agency_setting['link_url'] ); ?>">
                    <i class="<?php echo esc_attr( $freelancer_digital_agency_setting['link_text'] ); ?>"></i>
                </a>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>