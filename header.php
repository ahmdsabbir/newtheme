<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="<?php echo bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>
    
  </head>
  <body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <div class="wrapper" id="header-wrapper">

    <?php get_template_part( '/template-parts/header/nav', 'bootstrap' ); ?>

  </div><!-- #header-wrapper end -->

  <?php _themename_breadcrumb( 'ol', 'breadcrumb', 'breadcrumb', 'active', true );
  
  ?>