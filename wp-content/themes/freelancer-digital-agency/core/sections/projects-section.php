<?php if ( get_theme_mod('freelancer_digital_agency_project_section_enable') ) : ?>

<?php $freelancer_digital_agency_left_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('freelancer_digital_agency_project_left_category'),
  'posts_per_page' => get_theme_mod('freelancer_digital_agency_project_left_number'),
); ?>

	<div id="project" class="py-5">
		<div class="container">
			<?php if ( get_theme_mod('freelancer_digital_agency_project_short_heading') ) : ?>
    		<h6 class="text-center"><?php echo esc_html(get_theme_mod('freelancer_digital_agency_project_short_heading'));?></h6>
    	<?php endif; ?>
			<?php if ( get_theme_mod('freelancer_digital_agency_project_heading') ) : ?>
    		<h2 class="text-center mb-5"><?php echo esc_html(get_theme_mod('freelancer_digital_agency_project_heading'));?></h2>
    	<?php endif; ?>
			<div class="row">
				<?php $freelancer_digital_agency_arr_posts = new WP_Query( $freelancer_digital_agency_left_args );
			    if ( $freelancer_digital_agency_arr_posts->have_posts() ) :
			      while ( $freelancer_digital_agency_arr_posts->have_posts() ) :
			        $freelancer_digital_agency_arr_posts->the_post(); ?>
			        <div class="col-lg-4 col-md-4 col-sm-4">
								<div class="services-box mb-4">
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="project-image">
											<?php the_post_thumbnail(); ?>
											<div class="project-post-date">
	                    	<p class="time-box mb-0">  
	                        <?php echo '<span>' . esc_html(get_the_date( 'd' )) . '</span>'; ?>
	                      </p>
	                      <p class="year-box mb-0">
	                        <?php echo ' <span>' .esc_html(get_the_date( 'M' )) . '</span>'; echo ' <span>' . esc_html(get_the_date( 'Y' )) . '</span>';  ?>
	                      </p>
                    	</div>
										</div>
									<?php }?>
									<h3><?php the_title(); ?></h3>
									<p><?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
									<a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('Read More','freelancer-digital-agency'); ?></a>
            		</div>
							</div>
			    <?php
			    endwhile;
			    wp_reset_postdata();
			    endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>