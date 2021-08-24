<?php
/**
 * The Archive template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * _themename_get_wrapper_id() in /lib/helpers
 *
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php get_header(); ?> 

            
<div class="<?php _themename_main_column_class('md-order-3 lg-order-3'); ?>">

    <?php
    the_archive_title('<h1>', '</h1>');
    the_archive_description('<p>', '</p>');
    ?>

    <?php get_template_part( 'loop', 'archive' ); ?> 

</div><!-- .main end -->

<?php if( is_active_sidebar('left-sidebar') ): ?>
    <div class="sm-12 md-2 lg-2 md-order-2 lg-order-2">
        <?php get_sidebar('left'); ?>
    </div><!-- .sidebar-left end -->
<?php endif; ?>

<?php if( is_active_sidebar('right-sidebar') ): ?>
    <div class="sm-12 md-2 lg-2 md-order-4 lg-order-4">
        <?php get_sidebar('right'); ?>
    </div><!-- .sidebar-right end -->
<?php endif; ?>
 
<?php get_footer(); ?>