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

<div class="main">
    <?php get_template_part( '/template-parts/archives/author'); ?>
    <?php get_template_part( 'loop', 'archive' ); ?> 
</div><!-- .main end -->

<?php if( is_active_sidebar('left-sidebar') ): ?>
    <div class="sidebar-left">
        <?php get_sidebar('left'); ?>
    </div><!-- .sidebar-left end -->
<?php endif; ?>


<?php if( is_active_sidebar('right-sidebar') ): ?>
    <div class="sidebar-right">
        <?php get_sidebar('right'); ?>
    </div><!-- .sidebar-right end -->
<?php endif; ?>

<?php get_footer(); ?>