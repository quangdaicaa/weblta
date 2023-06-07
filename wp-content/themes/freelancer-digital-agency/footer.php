<footer>
  <div class="container">
    <?php
      if ( is_active_sidebar('freelancer-digital-agency-footer-sidebar')) {
        echo '<div class="row sidebar-area footer-area">';
          dynamic_sidebar('freelancer-digital-agency-footer-sidebar');
        echo '</div>';
      }
    ?>
    <div class="row">
      <div class="col-md-12">
        <p class="mb-0 py-3 text-center text-md-left">
          <?php
            if (!get_theme_mod('freelancer_digital_agency_footer_text') ) { ?>
              <?php esc_html_e('Digital Agency WordPress Theme ','freelancer-digital-agency'); ?>
            <?php } else {
              echo esc_html(get_theme_mod('freelancer_digital_agency_footer_text'));
            }
          ?>
          <?php if ( get_theme_mod('freelancer_digital_agency_copyright_enable', true) == true ) : ?>
            <?php 
            /* translators: %s: Misbah WP */ 
            printf( esc_html__( 'by %s', 'freelancer-digital-agency' ), 'Misbah WP' ); ?>
            <a href="<?php echo esc_url('https://wordpress.org'); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'freelancer-digital-agency' ), 'WordPress' ); ?></a>
          <?php endif; ?>
        </p>
      </div>
    </div>
    <?php if ( get_theme_mod('freelancer_digital_agency_scroll_enable_setting', true) == true ) : ?>
      <div class="scroll-up">
        <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
      </div>
    <?php endif; ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
