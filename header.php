<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exploore
 */

$custom_logo_id = get_theme_mod( 'custom_logo' );



?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="site">


  	<header id="masthead" class="site-header">
  
    <div class="header-search-form">
      <div class="container">
        <?php get_search_form();?>
      </div>
      <!-- end of /.contaienr -->
    </div>
    <!-- end of /header-search-form -->

      <nav class="navbar navbar-default">
          <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only"><?php esc_html_e('Toggle navigation', 'exploore');?></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>


        		        <?php if ( $custom_logo_id ) : ?>
        							<a  class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo wp_get_attachment_image_url( $custom_logo_id , 'full' ); ?>" alt="<?php bloginfo('name'); ?>" /></a>
        						<?php else : ?>
                        <h1 class="site-title">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                           <?php bloginfo( 'name' ); ?>
                          </a>
                         </h1>

                        <?php
                          $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                              <p class="site-description"><?php echo $description; ?></p>
                          <?php endif; ?> 
        						  <?php endif; ?> 
              </div>
              <!-- end of /.navbar-header -->

            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => '__return_false', 'menu' => 'primary', 'menu_class' => 'nav navbar-nav') ); ?>
                <div class="search-icon">
                  <span><i class="s-toggle ion-search"></i></span>
                </div>
              </div>
              <!-- end of /.navbar-collapse -->

          </div>
          <!-- end of /.container -->
      </nav>
      <!-- end of /.navbar -->
    </header><!-- #masthead -->


	<div id="content" class="site-content">
