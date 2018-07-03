<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
           <?php
              printf('<a class="navbar-brand" href="%1$s" title="%2$s">%3$s</a>',
              get_bloginfo( 'url' ),
              get_bloginfo( 'description' ),
              get_bloginfo( 'sitename' )
            ); ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <?php
            $menu = array(
              'theme_location' => $menu,
                 'container' => 'ul',
                 'menu_class' => 'navbar-nav ml-auto',
                   'menu_id' => 'primary-menu',
                );
                wp_nav_menu( $menu );
            add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

           ?>
        </div>
      </div>
    </nav>