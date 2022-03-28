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

<div class="main">
    <?php get_template_part( 'loop', 'single' ); ?>    
</div><!-- .main end -->

<?php get_template_part( 'template-parts/page/sidebars'); ?>

<?php get_footer(); ?>