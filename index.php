<?php
/**
 * The main template file
 * 
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$both_sidebar = 'sm-col-span-12 md-col-span-8 md-order-4';
$one_sidebar  = 'sm-col-span-12 md-col-start-3 md-col-end-10 md-order-4';
$no_sidebar   = 'sm-col-span-12 md-col-start-3 md-col-end-11 md-order-4';

?> 

<?php get_header(); ?>

<div class="<?php _themename_main_column_class($both_sidebar, $one_sidebar, $no_sidebar); ?>">         
    <?php get_template_part( 'loop'); ?>      
</div><!-- .main end -->

<?php get_template_part( 'template-parts/page/sidebars'); ?>

<?php get_footer(); ?>