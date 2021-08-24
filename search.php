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

get_header();
?> 

<div class="<?php _themename_main_column_class('sm-order-2 md-order-3 lg-order-3'); ?>">
    <h1>
        <?php printf(esc_html__( 'Search Result for: %s', '_themename' ), get_search_query( )); ?>
    </h1>
    <?php get_template_part( 'loop', 'search' ); ?> 
</div><!-- .main end -->

<?php if( is_active_sidebar('left-sidebar') ): ?>
    <div class="sm-12 md-3 lg-3 sm-order-3 md-order-2 lg-order-2">
        <?php get_sidebar('left'); ?>
    </div><!-- .col-3 end -->
<?php endif; ?>

<?php if( is_active_sidebar('right-sidebar') ): ?>
    <div class="sm-12 md-3 lg-3 sm-order-4 md-order-4 lg-order-4t">
        <?php get_sidebar('right'); ?>
    </div><!-- .sidebar-right end -->
<?php endif; ?>
 

<?php get_footer(); ?>