<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Startup
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
        <div class="page-content">
        	<h1><?php echo esc_html(get_theme_mod('vw_startup_404_page_title',__('404 Not Found','vw-startup')));?></h1>	
			<p class="text-404"><?php echo esc_html(get_theme_mod('vw_startup_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','vw-startup')));?></p>
			<?php if( get_theme_mod('vw_startup_404_page_button_text','Return to the home page') != ''){ ?>
				<div class="read-moresec">
	        		<a href="<?php echo esc_url(home_url()); ?>" class="button hvr-sweep-to-right"><?php echo esc_html(get_theme_mod('vw_startup_404_page_button_text',__('Return to the home page','vw-startup')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_startup_404_page_button_text',__('Return to the home page','vw-startup')));?></span></a>
				</div>
			<?php } ?>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>