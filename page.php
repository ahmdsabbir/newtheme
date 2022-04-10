<?php
/**
 * The Page template file
 * _themename_get_wrapper_id() in /lib/helpers
 *
 * @package _themename
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php get_header(); ?>

<div class="main">
    <?php get_template_part( 'loop', 'page'); ?>      
</div><!-- .main end -->

<?php get_template_part( 'template-parts/page/sidebars'); ?>

<?php get_footer(); ?>
