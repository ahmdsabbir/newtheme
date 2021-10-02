<?php
/**
 * The main template file
 * 
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$both_sidebar = 'sm-col-span-12 md-col-span-8 md-order-4';
$no_sidebar   = 'sm-col-span-12 md-col-span-10 md-col-start-2 md-order-4';
$one_sidebar  = 'sm-col-span-12 md-col-span-9 md-col-start-2 md-order-4';

?> 

<?php get_header(); ?>

<div class="<?php _themename_main_column_class($both_sidebar, $no_sidebar, $one_sidebar, 'md-order-3'); ?>">         
    <?php get_template_part( 'loop'); ?>      
</div><!-- .main end -->

<?php if( is_active_sidebar('left-sidebar') ): ?>
    <div class="sm-col-span-12 md-col-span-2 md-order-3">
        <?php get_sidebar('left'); ?>
    </div><!-- .sidebar-left end -->
<?php endif; ?>

<?php if( is_active_sidebar('right-sidebar') ): ?>
    <div class="sm-col-span-12 md-col-span-2 md-order-5">
        <?php get_sidebar('right'); ?>
    </div><!-- .sidebar-right end -->
<?php endif; ?>

<?php get_footer(); ?>