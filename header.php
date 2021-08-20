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

    <div class="wrapper <?php _themename_wrapper_class(); ?>" id="<?php echo _themename_wrapper_id(); ?>-wrapper">

      <div id="header-wrapper" class="header">
        <?php get_template_part( '/template-parts/header/nav', 'bootstrap' ); ?>
      </div><!-- #header-wrapper end -->
      
      <?php
      if( $in_customizer || $show_breadcrumb ) :
        get_template_part( '/template-parts/components/misc/breadcrumb');
      endif;
      ?>