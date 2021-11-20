<?php
/**
 * The Page template file
 * _themename_get_wrapper_id() in /lib/helpers
 *
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$both_sidebar = 'sm-col-span-12 md-col-span-8 md-order-4';
$one_sidebar  = 'sm-col-span-12 md-col-start-2 md-col-end-10 md-order-4';
$no_sidebar   = 'sm-col-span-12 md-col-start-3 md-col-end-11 md-order-4';
?>

<?php get_header(); ?>

<div class="<?php _themename_main_column_class($both_sidebar,$one_sidebar,  $no_sidebar); ?>">
    <?php get_template_part( 'loop', 'page'); ?>      
</div><!-- .main end -->

<?php if( is_active_sidebar('left-sidebar') ): ?>
    <div class="sm-col-span-12 md-col-start-1 md-col-end-3 md-order-2">
        <?php get_sidebar('left'); ?>
    </div><!-- .sidebar-left end -->
<?php endif; ?>

<?php if( is_active_sidebar('right-sidebar') ): ?>
    <div class="sm-col-span-12 md-col-start-11 md-col-end-13 md-order-4">
        <?php get_sidebar('right'); ?>
    </div><!-- .sidebar-right end -->
<?php endif; ?>

<?php get_footer(); ?>
