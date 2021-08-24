<?php
/**
 * The Single post template file
 * _themename_get_wrapper_id() location: /lib/helpers
 *  _themename_main_column_length() location: /lib/helpers
 *
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//Get sidebar layout from post_meta for this single post
$layout = get_post_meta(get_the_ID(), '__themename_post_layout', true);
get_header();
?>

<div class="<?php _themename_main_column_class('md-order-3 lg-order-3'); ?>">
    <?php get_template_part( 'loop', 'single' ); ?>    
</div><!-- .main end -->

<?php if( is_active_sidebar('left-sidebar') && $layout == 'yes' ): ?>
    <div class="sm-12 md-2 lg-2 md-order-2 lg-order-2">
        <?php get_sidebar('left'); ?>
    </div><!-- .sidebar-left end -->
<?php endif; ?>

<?php if( is_active_sidebar('right-sidebar') && $layout == 'yes' ): ?>
    <div class="sm-12 md-2 lg-2 md-order-4 lg-order-4">
        <?php get_sidebar('right'); ?>
    </div><!-- .sidebar-right end -->
<?php endif; ?>

<?php get_footer(); ?>