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

  $both_sidebar = 'has-two-sidebar';
  $one_sidebar  = 'has-left-sidebar';
  $no_sidebar   = 'has-no-sidebar';

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

    <div class="<?php _themename_main_column_class($both_sidebar, $one_sidebar, $no_sidebar); ?>" id="<?php echo _themename_wrapper_id(); ?>-wrapper">

      <div id="header-wrapper" class="header">

        <?php get_template_part( '/template-parts/header/nav', 'default' ); ?>

        <?php
        if( $in_customizer || $show_breadcrumb ) :
          get_template_part( '/template-parts/components/misc/breadcrumb');
        endif;
        ?>

      </div><!-- #header-wrapper end -->