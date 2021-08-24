<?php
/**
 * The main template file
 * 
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?> 

<?php get_header(); ?>

<div class="<?php _themename_main_column_class('sm-order-2 md-order-3 lg-order-3'); ?>">         
    <?php get_template_part( 'loop'); ?>      
</div><!-- .main end -->

<?php if( is_active_sidebar('left-sidebar') ): ?>
    <div class="sm-12 md-3 lg-3 sm-order-3 md-order-2 lg-order-2">
        <?php get_sidebar('left'); ?>
    </div><!-- .sidebar-left end -->
<?php endif; ?>

<?php if( is_active_sidebar('right-sidebar') ): ?>
    <div class="sm-12 md-3 lg-3 sm-order-4 md-order-4 lg-order-4">
        <?php get_sidebar('right'); ?>
    </div><!-- .sidebar-right end -->
<?php endif; ?>

<?php get_footer(); ?>