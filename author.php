<?php
/**
 * The author template
 * 
 * @package _themaname
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php get_header(); ?> 

<div class="<?php _themename_main_column_class('md-order-3 lg-order-3'); ?>">
    <?php get_template_part( '/template-parts/archives/author'); ?>
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