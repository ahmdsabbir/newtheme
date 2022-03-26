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
$both_sidebar = 'sm-col-span-12 md-col-span-6 md-order-4';
$one_sidebar  = 'sm-col-span-12 md-col-start-2 md-col-end-10 md-order-4';
$no_sidebar   = 'sm-col-span-12 md-col-start-3 md-col-end-11 md-order-4';
?>
<?php get_header(); ?> 

            
<div class="<?php _themename_main_column_class($both_sidebar,$one_sidebar,  $no_sidebar); ?>">

    <?php
    the_archive_title('<h1>', '</h1>');
    the_archive_description('<p>', '</p>');
    ?>

    <?php get_template_part( 'loop', 'archive' ); ?> 

</div><!-- .main end -->

<?php get_template_part( 'template-parts/page/sidebars'); ?>
 
<?php get_footer(); ?>