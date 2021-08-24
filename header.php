<?php
/**
 * Header
 * 
 * @package _themename
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 $show_breadcrumb = get_theme_mod( '_themename_display_breadcrumb', true);
 $in_customizer = isset($GLOBALS['wp_customize']);
?>
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

    <div class="container" id="<?php echo _themename_wrapper_id(); ?>-wrapper">

      <div id="header-wrapper" class="sm-12 md-12 lg-12 sm-order-1 md-order-1 lg-order-1">
        <?php get_template_part( '/template-parts/header/nav', 'bootstrap' ); ?>
      </div><!-- #header-wrapper end -->
      
      <?php
      if( $in_customizer || $show_breadcrumb ) :
        get_template_part( '/template-parts/components/misc/breadcrumb');
      endif;
      ?>